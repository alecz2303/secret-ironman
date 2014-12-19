<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require(Yii::app()->basePath . '/extensions/fpdf/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    $this->Image('http://192.168.1.203:82/notaria39/img/n39logocolorrojo.png',10,10,20,30);
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,10,'Estatus de Expedientes Protocolo Especial Terminados',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

//Connect to database
//mysql_connect('localhost','root','ericko2303');
//mysql_select_db('notaria39');

$pdf=new PDF('L','mm','legal');
$pdf->AliasNbPages();
//-------------------------------------------------ENTRADAS--------------------------------------------------------
$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('courier','B',20);
$pdf->SetFont('courier','',9);
$pdf->AddCol('id',10,'#','C');
$pdf->AddCol('expediente_DBA',10,'DBA');
$pdf->AddCol('eps',10,'E.P.');
$pdf->AddCol('libro',10,'L');
$pdf->AddCol('fecha',17,'Fecha');
$pdf->AddCol('enajenante',40,'Enajenante');
$pdf->AddCol('adquirente',40,'Adquirente');
$pdf->AddCol('acto',40,'Acto');
$pdf->AddCol('lugar',15,('Lugar'));
$pdf->AddCol('sr',10,('S.R.'));
$pdf->AddCol('clg_fecha',17,('CLG F'));
$pdf->AddCol('sap_fecha',17,'SAP F');
$pdf->AddCol('itd',17,'ITD');
$pdf->AddCol('apendice',10,'Ap');
$pdf->AddCol('declaranot',10,'De');
$pdf->AddCol('rpp',17,'RPP');
$pdf->AddCol('nc',10,'NC');
$pdf->AddCol('r_rpp',17,'R RPP');
$pdf->AddCol('status',30,'Stat');
$prop=array('HeaderColor'=>array(144,144,144),
            'color1'=>array(224,224,224),
            'color2'=>array(255,255,255),
            'width'=>100,
            'padding'=>2);
$pdf->Table('select 
    pe_status_exp.id,
    expediente_DBA,
    eps,
    libro,
    fecha,
    enajenante,
    adquirente,
    acto,
    lugar,
    if(sr=1,"CHECK_MARK","") as sr, 
    if(clg=1,"CHECK_MARK","") as clg,
    clg_fecha,
    clg_volante,
    if(sap=1,"CHECK_MARK","") as sap,
    sap_fecha,
    sap_volante,
    itd,
    notas,
    if(apendice=1,"CHECK_MARK","") as apendice,
    if(declaranot=1,"CHECK_MARK","") as declaranot,
    rpp,
    rpp_volante,
    if(nc=1,"CHECK_MARK","") as nc,
    r_rpp,
    status,
    if(terminada=1,"CHECK_MARK","") as terminada
from 
    pe_status_exp left join pe_folios_control_expediente on eps = ep
where 
    terminada = 1',
             $prop);

$pdf->Output('file.pdf','D');
Yii::app()->end(); 