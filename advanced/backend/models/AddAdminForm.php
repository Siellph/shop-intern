<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class AddAdminForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $sex;
    public $phone;
    public $status;
    public $id_role;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Это имя пользователя уже занято.'],
            ['username', 'string', 'min' => 5, 'max' => 255],

            ['firstname', 'trim'],
            ['firstname', 'required'],
            ['firstname', 'string', 'max' => 255],

            ['lastname', 'trim'],
            ['lastname', 'required'],
            ['lastname', 'string', 'max' => 255],

            ['sex', 'trim'],
            ['sex', 'string'],

            ['phone', 'filter', 'filter' => function ($value) {
                $result = preg_replace("/(\+7)(\d{3})(\d{3})(\d{2})(\d{2})/", "$1 ($2) $3-$4-$5", $value);
                return $result;
            }],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот адрес электронной почты уже занят.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['status', 'trim'],
            ['status', 'required'],
            ['status', 'integer'],

            ['id_role', 'trim'],
            ['id_role', 'required'],
            ['id_role', 'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function addAdmin()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->sex = $this->sex;
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->id_role = $this->id_role;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save();

    }

}