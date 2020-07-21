<?php

namespace app\modules\apiv1\controllers;

//use yii\web\Controller;

use app\modules\apiv1\models\Medicoatencion;
use app\models\MedicoatencionSearch;
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
class MedicoatencionController extends DefaultController
{
    public $modelClass = Medicoatencion::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new MedicoatencionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}

