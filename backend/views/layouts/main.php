<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
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
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
<?php $this->beginBody() ?>

<div class="app-wrapper">
    <!--begin::Header-->
      <?=\backend\widgets\Header::widget()?>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?=\backend\widgets\Sidebar::widget()?>
      <!--end::Sidebar-->

        <main class="app-main">
             <div class="app-content">
                <?= $content ?>
             </div>
        </main>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
