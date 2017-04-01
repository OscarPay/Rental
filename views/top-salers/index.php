<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */

$cars = [];
$data = [];
foreach ($rents as &$rent) {
    array_push($cars,$rent['nombre']);
    array_push($data,intval($rent['num_rents']));
}

?>
<h1>Top Vendedores</h1>
<br>

<?= Html::beginForm(['top-salers/index'], 'post') ?>

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
    'name'=>'date_range_top_salers',
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

<br>

<?php if(empty($rents)){ ?>
<br><br><br>
<h1 class="text-center">No se encontró ningún resultado</h1>

<?php }else{ ?>

<?php
echo Highcharts::widget([
   'options' => [
      'chart' => ['type' => 'bar'],
      'title' => ['text' => ''],
      'xAxis' => [
         'categories' => $cars
      ],
      'yAxis' => [
         'allowDecimals' => false,
         'title' => ['text' => 'Rentas']
      ],
      'series' => [
         ['name' => 'Rentas', 'data' => $data]
      ]
   ]
]);
?>

<?php } ?>
