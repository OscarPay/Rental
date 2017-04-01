<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Person;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Automóviles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <?php

    $options = [];

    if (Yii::$app->user->identity->tipo === Person::ADMINISTRADOR) {

        $options = [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'export' => false,
            'responsive' => true,
            'hover' => true,
            'toolbar' => [
                ['content' =>
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
                'modelo',
                'marca',
                'tipo',

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
        ];
    }else{
        $options = [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'export' => false,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => 'default',
                'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Automóviles </h4>',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nombre',
                'modelo',
                'marca',
                'tipo',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}'
                ],
            ],
        ];
    }

    ?>

    <?= GridView::widget($options); ?>
</div>
