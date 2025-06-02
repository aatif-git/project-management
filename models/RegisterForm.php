<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    public $dob;
    public $profile;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['first_name', 'last_name', 'username', 'email', 'password','profile'], 'required'],
            [['first_name', 'last_name', 'username', 'email', 'password', 'dob', 'profile'], 'string'],
            ['email', 'unique', 'targetClass' => '\app\models\Users', 'message' => 'This email has already been taken.'],
            ['username', 'unique', 'targetClass' => '\app\models\Users', 'message' => 'This username has already been taken.'],
            [['dob'], 'date', 'format' => 'php:Y-m-d'],
            [['password'], 'string', 'min' => 8],
            [['password'], 'match', 'pattern' => "/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", 'message' => 'Password must contain at least one lower and upper case character and a digit.'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'password'],
            [['profile'], 'file'],
        ];
    }

    public function signup()
    {
        $user = new Users();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->dob = date("Y-m-d", strtotime($this->dob));
        $user->profile = UploadedFile::getInstance($this, 'profile');
        if ($this->upload($user)) {
            return $user->save() ? $user : null;
        }
        return false;


       
    }

    public function upload($user)
    {
        $uniquesavename=time().uniqid(rand());
        $path = 'uploads/' . "." . $user->profile->name . "." . $user->profile->extension;
        $user->profile->saveAs($path);
        $user->profile = $user->profile->name . "." . $uniquesavename. $user->profile->extension;
        $user->save();
        return true;
    }
}
