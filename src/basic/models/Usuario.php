<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $email
 * @property string $activate 
 * @property string $verification_code
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 */
class Usuario extends ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'email'], 'required'],
            [['username', 'name', 'email', 'activate'], 'string', 'max' => 80],
            [['password', 'authKey', 'accessToken', 'verification_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Nombre',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    public static function findIdentity($id) 
    {
        $usuario = Usuario::find()
            ->where("activate = :activate", [":activate" =>1])
            ->andWhere("id=:id", ["id" => $id])
            ->one();
        return isset($usuario) ? new static($usuario) : null;
         //self::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null) 
    {
        return self::findOne(['accessToken'=>$token]);
        
    }
    
    public static function findByUsername($username)
    {
        $usuarios = Usuario::find()
            ->where("activate=:activate", ["activate" => 1])
            ->andWhere("username=:username", [":username" => $username])
            ->all();
        foreach ($usuarios as $usuario){
            if(strcasecmp($usuario->username, $username) === 0){
                return new static($usuario);
            }
        }
        return null;
        //return self::findOne(['username'=>$username]);
    }

    public function getId() 
    {
        return $this->id;
    }
    
    public function getAuthKey(): string 
    {
        return $this->authKey;
        
    }

    public function validateAuthKey($authKey): bool 
    {
        return $this->authKey === $authKey;
        
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }  
          

    
}
