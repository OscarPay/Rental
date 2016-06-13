<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'automovil_id')->textInput() ?>

    <?= $form->field($model, 'cliente_id')->textInput() ?>

    <?= $form->field($model, 'vendedor_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_dias')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'fecha_entrega')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_devolucion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugar_entrega')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penalizacion')->textInput() ?>

    <?= $form->field($model, 'nota')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
