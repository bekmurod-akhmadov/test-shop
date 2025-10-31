<?php
/** @var yii\web\View $this */
/** @var Exception $exception */
use yii\helpers\Html;

$this->title = $exception ? $exception->statusCode : 'Error';
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?php if ($exception): ?>
            <?= nl2br(Html::encode($exception->getMessage())) ?>
        <?php else: ?>
            <?= nl2br(Html::encode($message ?? 'No message available.')) ?>
        <?php endif; ?>
    </div>

    <p>The above error occurred while the Web server was processing your request.</p>
</div>
