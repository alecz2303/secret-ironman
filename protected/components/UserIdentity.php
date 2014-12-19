<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    const ERROR_NO_DOMAIN_CONTROLLER_AVAILABLE = 1001; // could not bind anonymously to any domain controllers
    const ERROR_INVALID_CREDENTIALS = 1002; // could not bind with user's credentials
    const ERROR_NOT_PERMITTED = 1003; //user was not found in search criteria

    private $_options;

    private $_domain;
    private $_email;
    private $_firstName;
    private $_lastName;
    private $_securityGroups;

    private $_loginEmail = false;


    public function __construct($username = null,$password = null)
    {
        $this->_options = Yii::app()->params['ldap'];

        $this->username = $username;
        $this->password = $password;

        if(strpos($username,'@') !== false){
            $this->_loginEmail = $username;
            $exploded = explode('@',$username);
            $this->username = $exploded[0];
        }

        $slashPos = strpos($this->username, "\\");
        if($slashPos !== false){
            $this->username = substr($this->username, $slashPos+1);
            $this->_domain = substr($this->username, 0, $slashPos);
        }else{
            $this->_domain = $this->_options['defaultDomain'];
        }
    }

	public function authenticate()
	{
        $this->errorCode = self::ERROR_NONE;
        if($this->username != '' && $this->password != ''){

            $bind = false;
            $connected = false;
            $ldap = false;

            //connect to the first available domain controller in our list
            foreach($this->_options['servers'] AS $server){
                $ldap = ldap_connect($server);
                if($ldap !== false){
                    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
                    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
                    $connected = @ldap_bind($ldap); //test if we can connect to ldap using anonymous bind
                    if($connected){
                        if($this->_loginEmail === false){
                            $ldaprdn = $this->_domain . "\\" . $this->username;
                        }else{
                            $ldaprdn = $this->_loginEmail;
                        }
                        $bind = @ldap_bind($ldap, $ldaprdn, $this->password);
                        break; //we connected to one successfully
                    }
                }
            }

            //were we able to connect to any domain controller?
            if(!$connected){
                $this->errorCode = self::ERROR_NO_DOMAIN_CONTROLLER_AVAILABLE;
            }else{
                //were we able to authenticate to a domain controller as our user?
                if ($bind) {
                    //if we can bind to active directory we must have valid AD credentials
                    $filter='(sAMAccountName='.$this->username.')';

                    $conn=array();
                    for($i = 0; $i < count($this->_options['search']); $i++){
                        $conn[] = $ldap;
                    }
                    $results = ldap_search($conn,$this->_options['search'],$filter);
                    $foundInSearch = false;
                    foreach($results AS $result){
                        $info = ldap_get_entries($ldap, $result);
                        if($info['count'] > 0){
                            $this->_firstName = (isset($info['0']['givenname']['0']))?($info['0']['givenname']['0']):('');
                            $this->_lastName = (isset($info['0']['sn']['0']))?($info['0']['sn']['0']):('');
                            $this->_email = (isset($info['0']['mail']['0']))?($info['0']['mail']['0']):('');

                            $this->_securityGroups = array();
                            foreach($info['0']['memberof'] AS $sg){
                                preg_match('/CN=(.*?),/',$sg, $matches);
                                if(isset($matches[1])){
                                    $this->_securityGroups[] = $matches['1'];
                                }
                            }
                            sort($this->_securityGroups);

                            $foundInSearch = true;
                            break;
                        }
                    }

                    if(!$foundInSearch){
                        $this->errorCode = self::ERROR_NOT_PERMITTED;
                    }
                }else{
                    //if we can't bind to active directory it means that the username / password was invalid
                    $this->errorCode = self::ERROR_INVALID_CREDENTIALS;
                }
            }
        }else{
            //if username or password is blank don't even try to authenticate
            $this->errorCode = self::ERROR_INVALID_CREDENTIALS;
        }

        switch($this->errorCode){
            case self::ERROR_INVALID_CREDENTIALS :
                $this->errorMessage = 'Invalid Credentials.';
                break;
            case self::ERROR_NO_DOMAIN_CONTROLLER_AVAILABLE :
                $this->errorMessage = 'No domain controller available.';
                break;
            case self::ERROR_NOT_PERMITTED:
                $this->errorMessage = 'Not permitted in application.';
                break;
            case self::ERROR_NONE :
                $this->setState('firstName', $this->_firstName);
                $this->setState('lastName', $this->_lastName);
                $this->setState('email', $this->_email);
                $this->setState('adSecurityGroups', $this->_securityGroups);
                break;
            default : $this->errorMessage = 'Unable to Authenticate';
        }


		return !$this->errorCode;
	}

    public function getName(){
        return $this->_firstName.' '.$this->_lastName;
    }
    public function getGroup(){
        return $this->adSecurityGroups;
    }
}