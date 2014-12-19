<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require(Yii::app()->basePath . '/extensions/fpdf/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
    public $tipo;



    function Header()
    {
        if($_GET['tipo']==='0'){
            $tipo = 'Bancos';
        }elseif($_GET['tipo']==='1'){
            $tipo = 'Particulares';
        }else{
            $tipo = 'Solida';
        }            

        $this->Image('http://192.168.1.203:82/notaria39/img/n39logocolorrojo.png',10,10,20,30);
        //Title
        $this->SetFont('Arial','',18);
        $this->Cell(0,10,'Informe',0,1,'C');
        $this->Cell(0,10,'Protocolo Ordinario '.$tipo,0,1,'C');
        $this->SetFont('Arial','',10);
        $this->Ln(10);
        $this->Cell(25,5,'ETAPA 1 Y 2',1,0);
        $this->Cell(0,5,'Integracion del Exp. y documentacion necesaria para firma. (Dar de alta, escanear y subir al DBA)',1,1);
        $this->Cell(25,5,'ETAPA 3',1,0);
        $this->Cell(0,5,'Escritura (elaborar proyecto y firma de escritura)',1,1);
        $this->Cell(25,5,'ETAPA 4',1,0);
        $this->Cell(0,5,'Avisos y Declaraciones (Solicitar Recursos para pagos CLG inicio 2do Aviso-ITD-RPP)',1,1);
        $this->Cell(25,5,'ETAPA 5',1,0);
        $this->Cell(0,5,'Elaborar Testimonios (Apendice-Declaranot)',1,1);
        $this->Cell(25,5,'ETAPA 6',1,0);
        $this->Cell(0,5,'Presentar RPP',1,1);
        $this->Cell(25,5,'ETAPA 7',1,0);
        $this->Cell(0,5,'Actualizacion de apendices y cierre (Notas Complementarias)',1,1);
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
$pdf->AddCol('fecha',17,'Fecha Alta');
$pdf->AddCol('expediente_DBA',10,'DBA');
$pdf->AddCol('acto',40,'Acto');
$pdf->AddCol('enajenante',60,'Cliente');
$pdf->AddCol('eps',10,'E.P.');
$pdf->AddCol('status',60,'Status');
$pdf->AddCol('e12',15,'E. 1 y 2','C');
$pdf->AddCol('e3',15,'E. 3','C');
$pdf->AddCol('e4',15,'E. 4','C');
$pdf->AddCol('e5',15,'E. 5','C');
$pdf->AddCol('e6',15,'E. 6','C');
$pdf->AddCol('e7',15,'E. 7','C');
$pdf->AddCol('notas',60,'Comentarios');

$prop=array('HeaderColor'=>array(144,144,144),
            'color1'=>array(224,224,224),
            'color2'=>array(255,255,255),
            'width'=>100,
            'padding'=>2);
$pdf->Table('select 
    fecha,
    expediente_DBA,
    acto,
    enajenante,
    eps,
    status,
    "CHECK_MARK" as e12,
    "CHECK_MARK" as e3,
    if (r_rpp>0 or rpp>0 or rpp_volante<>"" or (apendice = 1 and declaranot = 1) or (clg_fecha>0 and itd>0 and sap_fecha>0),"CHECK_MARK","") as e4,
    if (r_rpp>0 or rpp>0 or rpp_volante<>"" or (apendice = 1 and declaranot = 1),"CHECK_MARK","") as e5,
    if (r_rpp>0 or rpp>0 or rpp_volante<>"","CHECK_MARK","") as e6,
    if (r_rpp>0,"CHECK_MARK","") as e7,
    notas
from 
    po_status_exp left join po_folios_control_expediente on eps = ep
where 
    terminada = 0 and tipo = "'.$_GET['tipo'].'"
order by
    fecha desc',
             $prop);
$pdf->Output('file.pdf','D');
Yii::app()->end(); 