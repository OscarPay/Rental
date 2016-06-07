<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index-clientes']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <div class="well well-sm text-center">
        <h1><?= Html::encode ($this->title) ?></h1>
    </div>

    <p class="pull-right">
        <?= Html::a('Actualizar', ['update-cliente', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete-cliente', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'title' => 'Eliminar',
                'data-confirm' => '¿Estas seguro que deseas eliminar el cliente?',
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
            'email:email',
            'num_licencia',
            'num_cuenta',
            'banco',
            'cuenta',
            'cod_seguridad',
            'vencimiento',
            'licencia',
        ],
    ]) ?>

</div>
