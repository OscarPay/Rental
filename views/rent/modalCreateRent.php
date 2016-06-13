<?php

use app\models\Rent;
use kartik\field\FieldRange;
use kartik\form\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

Modal::begin ([
    'id' => 'modalChooseDate',
    'header' => '<h2>Solicitud de Renta</h2>',
]);

$model = new Rent();

$form = ActiveForm::begin ([
    'action' => Url::to (['/rent/request'])
]);

?>

    <div class="input-group drp-container">

        <?= $form->field($model, 'automovil_id')->hiddenInput(['value' => $automovil_id])->label(false) ?>

        <?= $form->field($model, 'cliente_id')->hiddenInput(['value' => Yii::$app->user->identity->getId()])->label(false) ?>

        <?= $form->field($model, 'lugar_entrega')->textInput(['maxlength' => true]) ?>

        <br><br>

        <?= FieldRange::widget ([
            'form' => $form,
            'model' => $model,
            'label' => 'Ingrese el dia de entrega y de devolución',
            'separator' => ' al ',
            'attribute1' => 'fecha_entrega',
            'attribute2' => 'fecha_devolucion',
            'type' => FieldRange::INPUT_DATE,
            'widgetOptions1' => [
                'pluginOptions' => [
                    'daysOfWeekDisabled' => [0, 6],
                    'autoclose' => true,
                    'format' => 'yyyy-m-d'
                ]
            ],
            'widgetOptions2' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d'
                ]
            ],
        ]); ?>
    </div>
    <br><br>
<?= Html::submitButton ('Solicitar', [
    'class' => 'btn btn-success'
]) ?>
<?php ActiveForm::end (); ?>
<?php Modal::end (); ?>