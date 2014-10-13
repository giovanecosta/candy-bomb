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

            <form class="form-horizontal" role="form">
                <div class="form-group" ng-repeat="field in fields">
                    <label class="col-sm-2 control-label">Campo {{$index}}</label>
                    <div class="row col-sm-10">
                        <div class="col-xs-2">
                            <label for="mtFieldName{{$index}}">Nome</label>
                            <input type="text" class="form-control" id="mtFieldName{{$index}}" placeholder="Nome">
                        </div>
                        <div class="col-xs-2">
                            <label for="mtFieldSF{{$index}}">Tipo</label>
                            <select id="mtFieldSF{{$index}}" class="form-control" ng-model="field.smartField" ng-options="sf.title for sf in smartFields"></select>
                        </div>
                        <p class="help-block">Selecione um tipo.</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <button ng-click="fields.push({})" class="btn btn-default">+</button>
                    <button ng-click="doIt()" class="btn btn-default">Do it!</button>
                </div>
            </form>

        </div>
    </div>

    <footer class="footer">
        Footer
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
