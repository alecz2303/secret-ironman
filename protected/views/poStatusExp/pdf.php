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
    $this->Cell(0,10,'Informe de Recepciones y Salidas de Toner',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

//Connect to database
mysql_connect('localhost','root','ericko2303');
mysql_select_db('notaria39');

$pdf=new PDF('L','mm','letter');
$pdf->AliasNbPages();
//-------------------------------------------------ENTRADAS--------------------------------------------------------
$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('courier','B',20);
$pdf->MultiCell(0, 10, 'Recepciones de Toner');
$pdf->SetFont('courier','',10);
$pdf->AddCol('id',10,'#','C');
$pdf->AddCol('receiving_time',30,'Dia Recepcion');
$pdf->AddCol('company_name',45,('Proveedor'));
$pdf->AddCol('name',10,('Item'));
$pdf->AddCol('description',65,('Descripcion'));
$pdf->AddCol('qty_purchased',10,('Cant'));
$pdf->AddCol('comment',60,('Coment'));
$prop=array('HeaderColor'=>array(144,144,144),
            'color1'=>array(224,224,224),
            'color2'=>array(255,255,255),
            'width'=>100,
            'padding'=>2);
$pdf->Table('select 
                    inv_receivings.id,receiving_time,inv_suppliers.company_name,name,inv_item.description,inv_receivings_items.qty_purchased,inv_receivings.comment
            from 
                    inv_receivings 
            left join inv_suppliers on inv_receivings.suplier_id = inv_suppliers.id
            left join inv_receivings_items on inv_receivings.id = inv_receivings_items.receivings_id 
            left join inv_item on inv_receivings_items.item_id = inv_item.id
            order by receiving_time desc',
             $prop);
//-------------------------------------------------SALIDAS--------------------------------------------------------
$pdf->Ln(10);
$pdf->SetFont('courier','B',20);
$pdf->MultiCell(0, 10, 'Salidas de Toner');
$pdf->SetFont('courier','',10);
$pdf->AddCol('id',10,'#','C');
$pdf->AddCol('sale_time',30,'Dia Salida');
$pdf->AddCol('first_name',45,('Nombre'));
$pdf->AddCol('name',10,('Item'));
$pdf->AddCol('description',65,('Descripcion'));
$pdf->AddCol('qty_purchased',10,('Cant'));
$pdf->AddCol('comment',60,('Coment'));
$prop=array('HeaderColor'=>array(144,144,144),
            'color1'=>array(224,224,224),
            'color2'=>array(255,255,255),
            'width'=>100,
            'padding'=>2);
$pdf->Table('select 
                inv_sales.id,sale_time,CONCAT(first_name," ",last_name) as first_name,name,inv_item.description,inv_sales_items.qty_purchased,inv_sales.comment
            from 
                inv_sales 
            left join inv_people on inv_sales.customer_id = inv_people.id
            left join inv_sales_items on inv_sales.id = inv_sales_items.sales_id 
            left join inv_item on inv_sales_items.item_id = inv_item.id
            order by sale_time desc',
        $prop);
//-------------------------------------------------EXISTENCIA--------------------------------------------------------
$pdf->Ln(10);
$pdf->SetFont('courier','B',20);
$pdf->MultiCell(0, 10, 'Existencia');
$pdf->SetFont('courier','',10);
$pdf->AddCol('name',10,('Item'));
$pdf->AddCol('description',65,('Descripcion'));
$pdf->AddCol('quantity',10,('Cant'));
$prop=array('HeaderColor'=>array(144,144,144),
            'color1'=>array(224,224,224),
            'color2'=>array(255,255,255),
            'width'=>100,
            'padding'=>2);
$pdf->Table('select name,description,quantity from inv_item where category = "Toner" order by name',
        $prop);
$pdf->Output('file.pdf','D');
Yii::app()->end(); 