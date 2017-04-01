<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reporte de Ventas';
$this->params['breadcrumbs'][] = $this->title;

//var_dump($startDate);
?>
<div class="sales-report-index">

<?= Html::beginForm(['sales-report/index'], 'post') ?>

<div class="row">
    <div class="col-md-10">

    <?php

$initRangeExpr = true;
$ranges = [
    "Hoy" => ["moment().startOf('day')", "moment()"],
    "Ayer" => ["moment().startOf('day').subtract(1,'days')", "moment().endOf('day').subtract(1,'days')"],
    "Últimos 7 días" => ["moment().startOf('day').subtract(6, 'days')", "moment()"],
    "Últimos 30 días" => ["moment().startOf('day').subtract(29, 'days')", "moment()"],
    "Mes actual" => ["moment().startOf('month')", "moment().endOf('month')"],
    "Mes anterior" => ["moment().subtract(1, 'month').startOf('month')", "moment().subtract(1, 'month').endOf('month')"]
];

  echo DateRangePicker::widget([
    'value'=> $date,
    'name'=>'date_range',
    'startAttribute' => 'datetime_start',
    'endAttribute' => 'datetime_end',
    'useWithAddon'=>true,
    'convertFormat'=>true,
    'language'=>'es',             // from demo config
    'hideInput'=>true,           // from demo config
    'presetDropdown'=>$ranges, // from demo config
    'pluginOptions'=>[
        'locale'=>['format'=>'d-M-y'], // from demo config
        'separator'=>'-',       // from demo config
        'opens'=>'left'
    ]
]);

?>

    </div>

    <div class="col-md-2">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>
</div>
<?php Html::endForm() ?>


<?php
    $options = [];

    $options = [
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'export' => false,
            'responsive' => true,
            'hover' => true,
            'showPageSummary' => true,
            'panel' => [
                'type' => 'default',
                'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Automóviles </h4>',
            ],
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],

                [
                'label' => 'Automóvil',
                'attribute' => 'automovil',
                'value' => function ($model) {
                    return $model->automovil->getFullName();
                    },
                ],

                [
                'attribute' => 'fecha_entrega',
                'format' => ['date', 'php:d-M-y']
                ],   
                [
                'attribute' => 'fecha_devolucion',
                'format' => ['date', 'php:d-M-y']
                ],
                'lugar_entrega',
                [
                    'attribute' => 'total',
                    'pageSummary' => true,
                    'format'=>['decimal', 2]
                ]
            ],
        ];
  
    ?>

    <br> 


    <?=  GridView::widget($options); ?>

</div>
