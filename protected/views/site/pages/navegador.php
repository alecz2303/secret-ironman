<?php
    $browser = Yii::app()->browser->getBrowser();
    $platform = Yii::app()->browser->getPlatform();
?>
<h1>Su navegador no es compatible con el sitio</h1>
<p class="text-justify">
<h3>Esta utilizando el navegador <font color="red"><?php echo $browser;?>.</font></h3>
<h3>En una plataforma <font color="red"><?php echo $platform;?>.</font></h3>
    
    
    Le recomendamos utilizar uno de los siguientes navegadores.<br />
    
    <a href="https://www.google.com/intl/en/chrome/browser/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/chrome.jpeg" width="60" height="60" /></a>
    <a href="https://www.mozilla.org/es-ES/firefox/new/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/firefox.jpeg" width="60" height="60" /></a>
    <a href="http://www.opera.com/es" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/opera.jpeg" width="60" height="60" /></a>
    <a href="http://support.apple.com/kb/DL1531?viewlocale=es_ES" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/safari.jpeg" width="60" height="60" /></a>
    
</p>