<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'automovil_id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?= $form->field($model, 'vendedor_id') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'num_dias') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'fecha_entrega') ?>

    <?php // echo $form->field($model, 'fecha_devolucion') ?>

    <?php // echo $form->field($model, 'lugar_entrega') ?>

    <?php // echo $form->field($model, 'penalizacion') ?>

    <?php // echo $form->field($model, 'nota') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
