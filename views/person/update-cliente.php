<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Person;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = 'Actualizar: ' . $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index-clientes']];
$this->params['breadcrumbs'][] = ['label' => $model->getFullName(), 'url' => ['view-cliente', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="person-update">

    <div class="well well-sm text-center">
        <h1><?= Html::encode ($this->title) ?></h1>
    </div>

    <div class="person-form">

        <?php $form = ActiveForm::begin([
            'action' => ['/person/update-cliente', 'id' => $model['id']]
        ]); ?>

        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'celular')->textInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo')->hiddenInput(['value' => Person::CLIENTE])->label(false) ?>

        <?= $form->field($model, 'num_licencia')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'num_cuenta')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'banco')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cuenta')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cod_seguridad')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vencimiento')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'licencia')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Actualizar', ['class' => 'btn btn-primary pull-right']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
