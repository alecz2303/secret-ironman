<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/examples/ext/d3.v3.min.js');
$cs->registerScriptFile('https://www.google.com/jsapi');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/examples/ext/jquery-1.8.3.min.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/examples/ext/jquery-ui-1.9.2.custom.min.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/examples/ext/jquery.csv-0.71.min.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/dist/pivot.es.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/dist/gchart_renderers.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/dist/d3_renderers.js');
$cs->registerCssFile($baseUrl.'/alecz/pivottable-master/dist/pivot.css');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pivot Demo From Local CSV</title>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>        
    </head>
    <style>
        * {font-family: Verdana;}
        .node {
          border: solid 1px white;
          font: 10px sans-serif;
          line-height: 12px;
          overflow: hidden;
          position: absolute;
          text-indent: 2px;
        }
    </style>
    <body>
        <?php echo BsHtml::pageHeader('Tabla de Expedientes Anuales','Al 22/Nov/2014') ?>
        <script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart", "charteditor"]});
            $(function(){
                var derivers = $.pivotUtilities.derivers;
                


                $.getJSON("mps", function(mps) {
                    $("#output").pivotUI(mps, {
                        enderers: $.extend(
                            $.pivotUtilities.renderers, 
                            $.pivotUtilities.gchart_renderers, 
                            $.pivotUtilities.d3_renderers
                            ),
                        rows: ["Mes"],
                        cols: ["Año","Tipo"],
                        exclusions: {"Año":["2009","2010","2011","2012","2013"]}
                    });
                });
             });
        </script>
        <div id="output" style="margin: 30px;"></div>
    </body>
</html>
