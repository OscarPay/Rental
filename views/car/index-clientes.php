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
            <div class="col-lg-offset-3 col-lg-6 text-center">
                <div class="thumbnail">
                    <img src="<?= $car->getImageUrl(); ?>" alt="...">
                    <div class="caption">
                        <h3><?= $car->getFullName(); ?></h3>
                        <p><?= Yii::$app->formatter->asCurrency($car->precio) ?> por día</p>
                        <p><a href="<?= Url::to (['/car/view', 'id' => $car->id]) ?>" class="btn btn-primary" role="button">Ver</a></p>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

</div>
