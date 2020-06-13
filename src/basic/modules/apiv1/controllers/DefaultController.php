<?php

namespace app\modules\apiv1\controllers;

use yii\web\Controller;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth; 
use app\models\Usuario;
use Yii;
/**
 * Default controller for the `apiv1` module
 */
class DefaultController extends ActiveController
{
    public function behaviors()
{
    $behaviors = parent::behaviors();
    $behaviors['authenticator'] = [
        'class' => CompositeAuth::className(),
        'authMethods' => [
             [
                'class'=> HttpBasicAuth::className(),
                'auth'=> function($username, $password){
                    $user= Usuario::find()->where(['username'=>$username])->one();
                    if ($user!=null && Yii::$app->getSecurity()->validatePassword($password,$user->password)){
                        return $user;
                    } 
                    return null;

                }
            ],
            HttpBearerAuth::className(),
            QueryParamAuth::className(),
        ],
    ];
    return $behaviors;
}

    
}
