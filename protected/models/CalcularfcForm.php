<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CalcularfcForm
 *
 * @author soporte
 */
class CalcularfcForm extends CFormModel {
    public $nombre;
    public $ap_paterno;
    public $ap_materno;
    public $fec_nac;
    public $rfc;
    
    public function rules() {
        return array(
            array('nombre, ap_paterno, fec_nac','required'),
            array('fec_nac','numerical','integerOnly'=>true),
            array('fec_nac', 'length', 'max'=>6),
            array('nombre,ap_paterno,ap_materno', 'length', 'max'=>50),
            
        );
    }
    
    public function attributeLabels() {
        return array(
            'nombre'=>'Nombre',
            'ap_paterno'=>'Apellido Paterno',
            'ap_materno'=>'Apellido Materno',
            'fec_nac'=>'Fecha de Nacimiento',
            'rfc'=>'RFC'
        );
    }
}
