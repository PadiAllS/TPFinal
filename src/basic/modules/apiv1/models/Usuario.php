<?php

namespace app\modules\apiv1\models;


class Usuario extends \app\models\Usuario
{
    public function fields()
    {
        return ['id', 'name', 'username'];
    }
    
    public function estraFields()
    {
        return [''];
    }

    public function login($password) {
        if (\Yii::$app->getSecurity()->validatePassword($password, $this->password_hash)) {
            
            return true;
        }
        
        return false;
    }
}
