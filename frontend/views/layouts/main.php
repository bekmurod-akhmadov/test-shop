<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<!--Preloader starts-->
        <div class="loader js-preloader">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Page Wrapper End -->
        <div class="page-wrapper">
            <div class="body_overlay"></div>
            <?= \frontend\widgets\Header::widget() ?>

                <?= $content ?>

            <?=\frontend\widgets\Footer::widget()?>
        </div>
        <!-- Page Wrapper End -->

        

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
