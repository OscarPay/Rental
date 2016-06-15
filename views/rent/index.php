<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rentas';
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
            'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Rentas </h4>',
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
            //'cliente_id',
            //'vendedor_id',
            [
                'label' => 'Status',
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->getLabelStatus();
                },
            ],
            // 'num_dias',
            // 'total',
            // 'fecha_entrega',
            'fecha_devolucion',
            'lugar_entrega',
            // 'penalizacion',
            // 'nota',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {aprobar} {cancelar}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                            ['delete', 'id' => $model['id']],
                            [
                                'title' => 'Eliminar',
                                'data-confirm' => '¿Estas seguro que deseas eliminar el automóvil?',
                                'data-method' => 'post'
                            ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
