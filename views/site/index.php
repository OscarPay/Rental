<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <img src="logomayanheritage.png" alt="logo">
        <br><br>
        <h1>Bienvenido <?php echo Yii::$app->user->identity->getFullName(); ?>!</h1>
    </div>

</div>
