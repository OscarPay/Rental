<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\Person;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */

$this->title = $model->id;
$attributes = [];
?>
<div class="rent-view">

    <div class="well well-sm text-center">
        <h1>Renta de <?= $model->automovil->getFullName() ?></h1>
    </div>

    <?php

    $vendedor = [
        'label' => 'Vendedor',
        'value' => null
    ];

    if ($model->status !== \app\models\Rent::NO_APROBADO) {
        $vendedor = [
            'label' => 'Vendedor',
            'value' => $model->vendedor->getFullName()
        ];
    }

    if (Yii::$app->user->identity->tipo === Person::CLIENTE) {



    $attributes = [
        [
            'label' => 'Automóvil',
            'value' => $model->automovil->getFullName()
        ],
        $vendedor,
        [
            'label' => 'Status',
            'format' => 'html',
            'value' => $model->getLabelStatus()
        ],
        'num_dias',
        [
            'label' => 'Total',
            'format' => 'currency',
            'value' => $model->total
        ],
        'fecha_entrega',
        'fecha_devolucion',
        'lugar_entrega',
        'penalizacion',
        'nota',
    ];

    } else {

        $attributes = [
            [
                'label' => 'Automóvil',
                'value' => $model->automovil->getFullName()
            ],
            [
                'label' => 'Cliente',
                'value' => $model->cliente->getFullName()
            ],
            $vendedor,
            [
                'label' => 'Status',
                'format' => 'html',
                'value' => $model->getLabelStatus()
            ],
            'num_dias',
            [
                'label' => 'Total',
                'format' => 'currency',
                'value' => $model->total
            ],
            'fecha_entrega',
            'fecha_devolucion',
            'lugar_entrega',
            'penalizacion',
            'nota',
        ];

    } ?>

    <?= DetailView::widget([
        'hideIfEmpty' => true,
        'hAlign' => DetailView::ALIGN_LEFT,
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

</div>
