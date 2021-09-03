<?php

namespace backend\compoments\models\form;

use Yii;
use common\models\User;
use yii\base\Model;

/**
 * Description of ChangePassword
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class ChangePassword extends Model
{
    public $newPassword;
    public $retypePassword;
    public $id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'newPassword', 'retypePassword'], 'required'],
            [['newPassword'], 'string', 'min' => 6],
            [['retypePassword'], 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
//    public function validatePassword()
//    {
//        /* @var $user User */
//        $user = Yii::$app->user->identity;
//        if (!$user || !$user->validatePassword($this->oldPassword)) {
//            $this->addError('oldPassword', 'Incorrect old password.');
//        }
//    }

    /**
     * Change password.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function change()
    {
        if ($this->validate()) {
            /* @var $user User */
            $user = User::findIdentity($this->id);
            $user->setPassword($this->newPassword);
            $user->generateAuthKey();
            if ($user->save()) {
                return true;
            }
            $error = $this->getErrorSummary(true);
        }

        return false;
    }
}
