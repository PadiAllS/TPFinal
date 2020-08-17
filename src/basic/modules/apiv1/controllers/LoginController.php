<?php

namespace app\modules\apiv1\controllers;

use app\modules\apiv1\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\HttpException;
use yii\rest\Controller;

class LoginController extends \yii\rest\Controller {

    /**
     * {@inheritdoc}
     */
    public function actionIndex() {
        $data = \Yii::$app->request->getBodyParams();
        
        $username = $data['username'];
        $password = $data['password'];
        // $password = \Yii::$app->request->post('password');

        if (($user = Usuario::findOne(['username' => $username])) != null) {
            if (!empty($password) && $user->login($password)) {
                $user->generateToken();
                $user->save(false);

                $identity['username'] = $user->username;
                $identity['access_token'] = $user->access_token;
                $identity['token_expired'] = $user->token_expired;

                return json_encode($identity);
            } 
        } 
        return json_encode('usuario no encontrado');
        
    }

}
