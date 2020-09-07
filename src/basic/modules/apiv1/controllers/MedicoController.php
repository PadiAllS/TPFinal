<?php

namespace app\modules\apiv1\controllers;

//use yii\web\Controller;
use yii\rest\ActiveController;
use app\models\Medicoatencion;
use app\models\MedicoSearch as ModelsMedicoSearch;
use app\models\Usuario;
use app\modules\apiv1\models\Medico;
use app\modules\apiv1\models\MedicoSearch;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;
use yii\data\DataFilter;
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
class MedicoController extends DefaultController
{
    public $modelClass = Medico::class;

    public function beforeAction($action)
    {
        if($action->id=='create') {
            Yii::$app->db->beginTransaction();
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function afterAction($action, $result)
    {
        if($action->id=='create'){
            $params = Yii::$app->getRequest()->getBodyParams();
            if(isset($params['Horaatencion'])) {
                foreach ($params['horarios'] as $horario_id) {
                    $model = new Medicoatencion(['medico_id' => $result->id, 'hatencion_id' => $horario_id]);
                    if(!$model->save()){
                        $result->addErrors($model->getErrors());
                    }
                }
            }
            $transaction = Yii::$app->db->getTransaction();
            if(!$result->hasErrors()){
                $transaction->commit();
            }else{
                $transaction->rollBack();
            }
        }
        return parent::afterAction($action, $result);
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new ModelsMedicoSearch();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}
