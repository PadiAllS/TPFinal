<?php

namespace app\modules\apiv1\controllers;

//use yii\web\Controller;

use app\modules\apiv1\models\Patologia;
use app\models\PatologiaSearch;
use app\models\Usuario;
use yii\web\Controller;
use Yii;
use yii\rest\ActiveController;
use yii\behaviors\TimestampBehavior;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Default controller for the `apiv1` module
 */
class PatologiaController extends DefaultController
{
    public $modelClass = Patologia::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new PatologiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}


