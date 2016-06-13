<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'automovil_id',
            'cliente_id',
            'vendedor_id',
            'status',
            // 'num_dias',
            // 'total',
            // 'fecha_entrega',
            // 'fecha_devolucion',
            // 'lugar_entrega',
            // 'penalizacion',
            // 'nota',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
