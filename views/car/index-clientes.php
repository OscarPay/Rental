<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Automóviles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'export' => false,
        'responsive'=>true,
        'hover'=>true,
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Automóvil', ['create'],
                    ['class' => 'btn btn-success pull-right'])
            ],
        ],
        'panel' => [
            'type' => 'default',
            'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Automóviles </h4>',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            //'transmision',
            'modelo',
            'marca',
            //'placas',
            //'precio',
            'tipo',
            // 'poliza',
            // 'num_serie',
            // 'num_pasajeros',
            // 'descripcion:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
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
