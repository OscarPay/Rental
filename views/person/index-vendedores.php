<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <div class="well well-sm text-center">
        <h1><?= Html::encode ($this->title) ?></h1>
    </div>

    <br><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'export' => false,
        'responsive'=>true,
        'hover'=>true,
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Vendedor', ['create-vendedor'],
                    ['class' => 'btn btn-success pull-right'])
            ],
        ],
        'panel' => [
            'type' => 'default',
            'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Vendedores</h4>',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'apellido',
            //'password',
            'celular',
            'email:email',
            // 'tipo',
            // 'num_licencia',
            // 'num_cuenta',
            // 'banco',
            // 'cuenta',
            // 'cod_seguridad',
            // 'vencimiento',
            // 'licencia',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                            ['view-vendedor', 'id' => $model['id']]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            ['update-vendedor', 'id' => $model['id']]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                            ['delete-vendedor', 'id' => $model['id']],
                            [
                                'title' => 'Eliminar',
                                'data-confirm' => '¿Estas seguro que deseas eliminar el vendedor?',
                                'data-method' => 'post'
                            ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
