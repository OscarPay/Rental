<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$title = $model->marca
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="text-center">
        <?= Html::img($model->getImageUrl(), [
            'class'=>'img-thumbnail',
            'alt'=>$title,
            'title'=>$title
        ]); ?>
    </div>



    <br><br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'transmision',
            'modelo',
            'marca',
            'placas',
            'tipo',
            'poliza',
            'num_serie',
            'num_pasajeros',
            'descripcion:ntext',
        ],
    ]) ?>

</div>