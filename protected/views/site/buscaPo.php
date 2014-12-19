<?php
$this->pageTitle=Yii::app()->name . ' - Busqueda de Respaldo de Escrituras en Libros Protocolo Ordinario';
$this->breadcrumbs=array(
	'Busqueda de Respaldo de Escrituras en Libros Protocolo Ordinario',
);

?>

<h1>B&uacute;squeda de documentos Protocolo Ordinario</h1>

<?php if(Yii::app()->user->hasFlash('busqueda')): ?>

    <?php $this->widget('bootstrap.widgets.BsAlert', array(
        'alerts'=>array('busqueda'),
    )); ?>

<?php else: ?>

<p>
Escriba en el formulario los parametros de busqueda.
</p>

<div class="search-form">

<?php $this->widget('ext.widgets.loading.LoadingWidget'); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'busqueda-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldControlGroup($model,'parametro'); ?>

        <?php echo BsHtml::submitButton('Buscar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY,'onClick'=>'Loading.show();',)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>

<?php 
    if(isset($_POST['BusquedaForm'])){
                $searchstr = $_POST['BusquedaForm']['parametro'];	
		echo "<h3>Resultados de la busqueda ' <font color='#990000'><b>" . $searchstr . "' : </b></font></h3></br>";
		if ( ! empty( $searchstr ) ) {
			// empty() is used to check if we've any search string
			// if we do, call grep and display the results.
			echo "<hr/> ";
			// call grep with case-insensitive search mode on all files
			
			//$cmdstr = "find '/mnt/sistema/archivosRecuperados' -type f -name '*.doc' -print0 | xargs -0 grep -o '$searchstr'";
			$cmdstr = "find '/mnt/sistema/1 PROTOCOLO ORDINARIO/RESPALDO DE ESCRITURAS EN LIBROS DEL  PROT ORD' -type f -name '*.DO*' -print0 | xargs -0 grep -io '$searchstr'";
			$cmdstr1 = "find '/mnt/sistema/1 PROTOCOLO ORDINARIO/RESPALDO DE ESCRITURAS EN LIBROS DEL  PROT ORD' -type f -name '*.do*' -print0 | xargs -0 grep -io '$searchstr'";
			//$cmdstr = "grep -iwr $searchstr '/mnt/sistema/1 PROTOCOLO ORDINARIO/RESPALDO DE ESCRITURAS EN LIBROS DEL  PROT ORD'/*";
			$fp = popen( $cmdstr, "r" ); // open the output of command as a pipe
			$fp1 = popen( $cmdstr1, "r" ); // open the output of command as a pipe
                        ?>
                    <div class="grid-view">
                        <table class="items table table-striped">
                         
                            <tbody>
                            
                        <?php
                        $i = 1;
			while( $buffer = fgetss ( $fp, 4096 ) ) {
                            
			// grep returns in the format
			// filename: line
			// So, we use split() to split the data
                            
                            list( $fname, $fline ) = explode( "Binary file /mnt/sistema/1 PROTOCOLO ORDINARIO/RESPALDO DE ESCRITURAS EN LIBROS DEL  PROT ORD", $buffer);
                            // we take only the first hit per file
                            //if ( !defined( $myresult[$fname] ) ) {
                            //$myresult[$fname] = $fline;
                            //}
                            echo "<tr>"
                                . "<td>".
                                    $i.'. '. $fline
                                . "</td>"
                               . "</tr>";
                            $i++;
			}
                        
                        while( $buffer = fgetss ( $fp1, 4096 ) ) {
                            
			// grep returns in the format
			// filename: line
			// So, we use split() to split the data
                            
                            list( $fname1, $fline1 ) = explode( "Binary file /mnt/sistema/1 PROTOCOLO ORDINARIO/RESPALDO DE ESCRITURAS EN LIBROS DEL  PROT ORD", $buffer);
                            // we take only the first hit per file
                            //if ( !defined( $myresult[$fname] ) ) {
                            //$myresult[$fname] = $fline;
                            //}
                            echo "<tr>"
                                . "<td>".
                                    $i.'. '. $fline1
                                . "</td>"
                               . "</tr>";
                            $i++;
			}
                        
			// we have results in a hash. lets walk through it and print it
			/*
                        if ( count( $myresult ) ) {
			echo "<ol> ";
			while( list( $fname, $fline ) = each( $myresult ) ) {
			echo "<li><a href=".$fname.">$fname</a> : $fline </li> ";
			}
			echo "</ol> ";
			}*/ 
                        //else {
			// no hits
			//echo "Lo siento. La cadena <strong>$searchstr</strong> no encontro resultados.<br/> ";
			//}
			pclose( $fp );
			pclose( $fp1 );
			}
			//echo $cmdstr;
                        
    }
?>
                                
                                </tbody>
                        </table>
                    </div>