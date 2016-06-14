<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rentas por aprobar';
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
            'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Rentas por aprobar </h4>',
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
                'template' => '{view} {aprobar} {cancelar}',
                'buttons' => [
                    'aprobar' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>',
                            ['aprobar', 'id' => $model['id']],
                            [
                                'title' => 'Aprobar',
                                'data-confirm' => '¿Estas seguro que deseas aprobar la renta?',
                                'data-method' => 'post'
                            ]);
                    },
                    'cancelar' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>',
                            ['cancelar', 'id' => $model['id']],
                            [
                                'title' => 'Cancelar',
                                'data-confirm' => '¿Estas seguro que deseas cancelar la renta?',
                                'data-method' => 'post'
                            ]);
                    },
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
