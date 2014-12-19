<?php
/*
Yii::import('application.extensions.EGCal.EGCal');
$cal = new EGCal('alejandrorueda2303@gmail.com', 'ericko2303!@');
$timestamp = time();


$response = $cal->delete(
        array(
            'id'=>'tlnckngqunuh9bnpupp3btlck8',
            'calendar_id'=>Yii::app()->params['googlecal'],
        )
    );


$response = $cal->find(
                            array(
                                'min'=>date('1968/05/01', strtotime("8 am")), 
                                'max'=>date('2014/09/01', strtotime("5 pm")),
                                'limit'=>50,
                                'order'=>'a',
                                'calendar_id'=>Yii::app()->params['googlecal'],
                            )
                        );

echo '<pre>';
print_r($response);
echo '</pre>';
*/
 ?>


<?php 
    $this->widget('bootstrap.widgets.TbCarousel',array(
        'items'=>array(
            array(
                'image'=>Yii::app()->baseUrl . '/img/404.jpg', 
                'label'=>'First Thumbnail label', 
                'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'
                ),
            array(
                'image'=>Yii::app()->baseUrl . '/img/logo_alex.png', 
                'label'=>'First Thumbnail label', 
                'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'
                ),
            array(
                'image'=>Yii::app()->baseUrl . '/img/vet.jpg', 
                'label'=>'First Thumbnail label', 
                'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'
                ),
        ),
    ));
?>

    <?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
    ); ?>
     
    <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
    </div>
     
    <div class="modal-body">
    <p>One fine body...</p>
    </div>
     
    <div class="modal-footer">
    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'type' => 'primary',
    'label' => 'Save changes',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal'),
    )
    ); ?>
    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Close',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal'),
    )
    ); ?>
    </div>
     
    <?php $this->endWidget(); ?>
    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Click me',
    'type' => 'primary',
    'htmlOptions' => array(
    'data-toggle' => 'modal',
    'data-target' => '#myModal',
    ),
    )
    );