<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\Person;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */

$this->title = $model->id;
?>
<div class="rent-view">

    <div class="well well-sm text-center">
        <h1><?= Html::encode ($this->title) ?></h1>
    </div>

    <?php if (Yii::$app->user->identity->tipo === Person::CLIENTE) { ?>

    <p class="pull-right">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <br><br><br>

    <?php } ?>

    <?= DetailView::widget([
        'hideIfEmpty' => true,
        'hAlign' => DetailView::ALIGN_LEFT,
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Automóvil',
                'value' => $model->automovil->getFullName()
            ],
            [
                'label' => 'Cliente',
                'value' => $model->cliente->getFullName()
            ],
            'vendedor_id',
            [
                'label' => 'Status',
                'format' => 'html',
                'value' => $model->getLabelStatus()
            ],
            'num_dias',
            'total',
            'fecha_entrega',
            'fecha_devolucion',
            'lugar_entrega',
            'penalizacion',
            'nota',
        ],
    ]) ?>

</div>
