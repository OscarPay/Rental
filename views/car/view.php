<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= Html::img(Yii::$app->params['uploadPath'] . $model->imagen);?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'imagen',
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
