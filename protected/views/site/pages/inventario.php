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
    $this->Image(Yii::app()->getBaseUrl(true).'/img/n39logocolorrojo.png',10,10,20,30);
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,10,'Informe de Inventario Total',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

//Connect to database
mysql_connect('localhost','root','ericko2303');
mysql_select_db('notaria39');

$pdf=new PDF('P','mm','letter');
$pdf->SetFont('courier','',10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(10);
$pdf->AddCol('name',40,'Item');
$pdf->AddCol('category',20,'Categoria');
$pdf->AddCol('description',65,('Descripcion'));
$pdf->AddCol('quantity',10,('Exist'));
$pdf->AddCol('company_name',65,('Proveedor'));
$prop=array('HeaderColor'=>array(144,144,144),
            'color1'=>array(224,224,224),
            'color2'=>array(255,255,255),
            'width'=>100,
            'padding'=>2);
$pdf->Table('select name, category, description, quantity, company_name from inv_item left join inv_suppliers on inv_item.supplier_id = inv_suppliers.id order by category,company_name,name',$prop);
$pdf->Output('file.pdf','D');
Yii::app()->end(); 