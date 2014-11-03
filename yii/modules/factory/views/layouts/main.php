<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\modules\factory\assets\FactoryAsset;

/* @var $this \yii\web\View */
/* @var $content string */

FactoryAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="FactoryApp">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <header>
            Header
        </header>

        <div class="menu">
            <ul>
                <li><a href="#/module_template">Module Template</a></li>
                <li><a href="#/module">Modules</a></li>
            </ul>
        </div>

        <div ng-view class="container">

        </div>

    </div>

    <footer class="footer">
        Footer
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
