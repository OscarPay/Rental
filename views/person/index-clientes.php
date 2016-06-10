<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
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
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Cliente', ['create-cliente'],
                    ['class' => 'btn btn-success pull-right'])
            ],
        ],
        'panel' => [
            'type' => 'default',
            'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Clientes</h4>',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'nombre',
            'apellido',
            'celular',
            'email:email',
            'num_licencia',
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
                            ['view-cliente', 'id' => $model['id']]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            ['update-cliente', 'id' => $model['id']]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                            ['delete-cliente', 'id' => $model['id']],
                            [
                                'title' => 'Eliminar',
                                'data-confirm' => '¿Estas seguro que deseas eliminar el cliente?',
                                'data-method' => 'post'
                            ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
