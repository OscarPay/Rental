<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="car-index">

    <?php foreach ($dataProvider->getModels() as $car) { ?>

        <div class="row">
            <div class="col-lg-6 text-center">
                <div class="thumbnail">
                    <img src="<?= $car->getImageUrl(); ?>" alt="...">
                </div>
            </div>
            <div class="col-lg-6">
                <h1><?= $car->getFullName(); ?></h1>
                <h3><?= Yii::$app->formatter->asCurrency($car->precio) ?> por día</h3>
                <p><?= $car->descripcion; ?></p>
                <p><a href="<?= Url::to(['/car/view', 'id' => $car->id]) ?>" class="btn btn-primary"
                      role="button">Más detalles</a></p>
            </div>

        </div>

        <hr>

    <?php } ?>

</div>
