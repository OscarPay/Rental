<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'transmision')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'placas')->textInput(['maxlength' => true]) ?>

        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'poliza')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'num_serie')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'num_pasajeros')->textInput(['maxlength' => true]) ?>

        </div>

    </div>


    <div class="row">

        <div class="col-lg-12">
            <?= $form->field($model, 'imagen')->widget(FileInput::className(), [
                'options'=>['accept'=>'image/*'],
                'pluginOptions'=>[
                    'allowedFileExtensions'=>['jpg','gif','png'],
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  ' Selecciona una imagen'
                ]
            ])->label(false) ?>

            <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
