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
<body ng-controller="ModuleTemplateCtrl">

<?php $this->beginBody() ?>
    <div class="wrap">

        <div class="container">
            <p>Opa!</p>
            <ul>
                <li ng-repeat="field in fields">
                    <p>{{field.title}} - {{field.flag}}</p>
                </li>
            </ul>

        </div>
    </div>

    <footer class="footer">
        Footer
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
