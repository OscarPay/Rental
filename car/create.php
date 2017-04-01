<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = 'Crear Automóvil';
$this->params['breadcrumbs'][] = ['label' => 'Automóviles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-create">

    <div class="well well-sm text-center">
        <h1><?= Html::encode ($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
