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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
