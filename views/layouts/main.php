<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Person;
use yii\bootstrap\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    $elementosNav = [];

    NavBar::begin([
        'brandLabel' => 'Rental',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if(Yii::$app->user->isGuest){
        //array_push($elementosNav,  ['label' => 'About', 'url' => ['/site/about']]);
        //array_push($elementosNav, ['label' => 'Contact', 'url' => ['/site/contact']]);
        array_push($elementosNav, ['label' => 'Login', 'url' => ['/site/login']]);
    }else{

        if(Yii::$app->user->identity->tipo === Person::ADMINISTRADOR){
            array_push($elementosNav,  ['label' => 'Automóviles', 'url' => "#"]);
            array_push($elementosNav,  ['label' => 'Vendedores', 'url' => ['/person/index-vendedores']]);
        }

        if(Yii::$app->user->identity->tipo === Person::VENDEDOR){
            array_push($elementosNav,  ['label' => 'Automóviles', 'url' => "#"]);
            array_push($elementosNav,  ['label' => 'Clientes', 'url' => ['/person/index-clientes']]);
        }

        if(Yii::$app->user->identity->tipo === Person::CLIENTE){
            array_push($elementosNav,  ['label' => 'Automóviles', 'url' => "#"]);
        }

        array_push($elementosNav,
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->getFullName() . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>');
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $elementosNav,
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?php
        foreach (Yii::$app->getSession ()->getAllFlashes () as $key => $message) {
            echo Alert::widget ([
                'options' => [
                    'class' => 'alert-' . $key,
                ],
                'body' => $message,
            ]);
        }
        ?>

        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Rental <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
