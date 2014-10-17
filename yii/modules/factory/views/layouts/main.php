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
        <header>
            Header
        </header>

        <div class="container">

            <form class="form-horizontal" role="form">
                <div class="form-group" ng-repeat="field in fields">
                    <h3 class="col-sm-2 control-label">Campo {{$index + 1}}</h3>
                    <div class="row col-sm-10">
                        <div class="col-xs-3">
                            <label for="mtFieldName{{$index}}">Nome</label>
                            <input type="text" class="form-control" ng-model="field.name" id="mtFieldName{{$index}}" placeholder="Nome">
                        </div>
                        <div class="col-xs-2">
                            <label for="mtFieldSF{{$index}}">Tipo</label>
                            <select id="mtFieldSF{{$index}}" class="form-control" ng-model="field.smartField" ng-options="sf.title for sf in smartFields"></select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"> &nbsp; </label>
                    <div class="row col-sm-10">
                        <div class="col-xs-6">
                            <button ng-click="doIt()" class="btn btn-default">Do it!</button>
                        </div>
                        <div class="col-xs-2">
                            <button ng-click="fields.push({})" class="btn btn-default">Adicionar</button>
                        </div>
                        <div class="col-xs-2">
                            <button ng-click="save()" class="btn btn-default">Salvar</button>
                        </div>
                    </div>
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
