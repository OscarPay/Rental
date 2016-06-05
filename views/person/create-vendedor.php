<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Person;


/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = 'Crear Vendedor';
$this->params['breadcrumbs'][] = ['label' => 'Vendedores', 'url' => ['index-vendedores']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">

    <div class="well well-sm text-center">
        <h1><?= Html::encode ($this->title) ?></h1>
    </div>

    <div class="person-form">

        <?php $form = ActiveForm::begin([
            'action' => ['/person/create-vendedor']
        ]); ?>

        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'celular')->textInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo')->hiddenInput(['value' => Person::VENDEDOR])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Crear', ['class' => 'btn btn-success pull-right']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
