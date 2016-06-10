<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Automóviles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$title = $model->marca
?>
<div class="car-view">

    <div class="well well-sm text-center">
        <h1><?= Html::encode ($this->title) ?></h1>
    </div>

    <p class="pull-right">
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'title' => 'Eliminar',
            'data-confirm' => '¿Estas seguro que deseas eliminar el automóvil?',
            'data-method' => 'post'
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
            'nombre',
            'precio',
            'status',
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
