<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $username
 * @property string|null $password
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property int|null $status
 * @property int|null $confirmation_code
 */
class Client extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    const STATUS_ACTIVE = 1;

    const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'first_name', 'last_name', 'username', 'password', 'auth_key', 'access_token'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['status','confirmation_code'], 'integer'],
            [['email', 'phone', 'first_name', 'last_name', 'username', 'password', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'status' => 'Status',
            'confirmation_code' => 'Confirmation Code',
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findByUsername($username){
        foreach (self::find()->all() as $user){
            if(strcasecmp($user->username,$username) === 0){
                return new static($user);
            }
        }

        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password){

        return Yii::$app->security->validatePassword($password,$this->password);
    }

}
