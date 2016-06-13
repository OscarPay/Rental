<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\Person;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Automóviles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$title = $model->marca
?>
<div class="car-view">

    <div class="well well-sm text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?php if (Yii::$app->user->identity->tipo === Person::ADMINISTRADOR) { ?>

        <p class="pull-right">
            <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'title' => 'Eliminar',
                'data-confirm' => '¿Estas seguro que deseas eliminar el automóvil?',
                'data-method' => 'post'
            ]) ?>
        </p>

    <?php } ?>

    <br><br>

    <div class="row">
        <div class="col-lg-6">
            <?= Html::img($model->getImageUrl(), [
                'class' => 'img-thumbnail',
                'alt' => $title,
                'title' => $title,
                'width' => 500,
                'height' => 500
            ]); ?>
        </div>

        <div class="col-lg-6 text-center">

            <p>
                <?php
                if ($model->status === \app\models\Car::DISPONIBLE) {

                    if (Yii::$app->user->identity->tipo === Person::CLIENTE) {
                        echo Html::a('Rentar', ['update', 'id' => $model->id], ['class' => 'btn btn-warning btn-lg btn-block']);
                    }

                    echo '<h2><span class="label label-success">' . $model->status . '</span></h2>';

                } else {

                    echo '<h2><span class="label label-danger">' . $model->status . '</span></h2>';

                } ?>

            </p>

            <br>

            <h2><b>Precio:</b> <?= Yii::$app->formatter->asCurrency($model->precio) ?> por día </h2>

            <br>

            <?= DetailView::widget([
                'panel' => [
                    'heading' => '<i class="glyphicon glyphicon-book"></i> Información General',
                    'type' => DetailView::TYPE_DEFAULT,
                ],
                'buttons1' => '',
                'model' => $model,
                'attributes' => [
                    'nombre',
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

    </div>

    <br><br>


</div>
