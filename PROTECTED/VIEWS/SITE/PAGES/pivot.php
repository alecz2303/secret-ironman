<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/examples/ext/d3.v3.min.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/examples/ext/jquery-1.8.3.min.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/examples/ext/jquery-ui-1.9.2.custom.min.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/examples/ext/jquery.csv-0.71.min.js');
$cs->registerScriptFile($baseUrl.'/alecz/pivottable-master/dist/pivot.js');
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
        <h1>Tabla de Expedientes Anuales</h1>
        <script type="text/javascript">
            $(function(){
                var derivers = $.pivotUtilities.derivers;

                $.getJSON("mps", function(mps) {
                    $("#output").pivotUI(mps, {
                        
                    });
                });
             });
        </script>
        <div id="output" style="margin: 30px;"></div>
    </body>
</html>
