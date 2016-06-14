<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rentas Aprobadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => null,
        'export' => false,
        'responsive'=>true,
        'hover'=>true,
        'panel' => [
            'type' => 'default',
            'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Rentas Aprobadas </h4>',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'Automóvil',
                'attribute' => 'automovil',
                'value' => function ($model) {
                    return $model->automovil->getFullName();
                },
            ],
            [
                'label' => 'Cliente',
                'attribute' => 'cliente',
                'value' => function ($model) {
                    return $model->cliente->getFullName();
                },
            ],
            //'vendedor_id',
            //'status',
            //'num_dias',
            // 'total',
            'fecha_entrega',
            'fecha_devolucion',
            // 'lugar_entrega',
            // 'penalizacion',
            // 'nota',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
</div>
