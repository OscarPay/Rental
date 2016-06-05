<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Vendedores', 'url' => ['index-vendedores']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <div class="well well-sm text-center">
        <h1><?= Html::encode ($this->title) ?></h1>
    </div>

    <p class="pull-right">
        <?= Html::a('Actualizar', ['update-vendedor', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete-vendedor', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'title' => 'Eliminar',
                'data-confirm' => '¿Estas seguro que deseas eliminar el vendedor?',
                'data-method' => 'post'
            ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            'apellido',
            'password',
            'celular',
            'email:email'
        ],
    ]) ?>

</div>
