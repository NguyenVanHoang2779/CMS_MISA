<?php

namespace common\models;

use Yii;
use yii\base\BaseObject;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $fullname
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int|null $gender
 * @property string $unit
 * @property string $phonenumber
 * @property int $status
 * @property int|null $admin
 * @property int|null $user_type
 * @property int|null $ho_id
 * @property int|null $partner_id
 * @property int|null $branch_id
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property CartItems[] $cartItems
 * @property Orders[] $orders
 * @property Products[] $products
 * @property Products[] $products0
// * @property TblBranch $branch
// * @property TblHo $ho
// * @property TblPartner $partner
 * @property  string departementName;
 * @property  string departementID;
 * @property UserAddresses[] $userAddresses
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public const SCENARIO_UPDATE = 'update';
    const SCENARIO_RESET_PASS = 'RESET_PASSWORD';
    const SCENARIO_CREATE_USER = 'CREATE_USER';
    public $password;
    public $re_password;
    public $password_old;
    public $new_password;
    public $password_repeat;
    public $unit;
    public $departementName;
    public $departementID;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            self::SCENARIO_UPDATE => ['firstname', 'lastname', 'email', 'username', 'password', 'password_repeat']
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'username', 'email',], 'required'],
            [['firstname', 'lastname', 'username', 'email','new_password'], 'string', 'max' => 50],
            [['re_password'], 'compare', 'compareAttribute' => 'new_password'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            ['password', 'string', 'min' => 6],
            ['admin', 'default', 'value' => 0],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['username', 'unique', 'targetClass' => self::class, 'message' => 'This username has already been taken.'],
            ['email', 'unique', 'targetClass' => self::class, 'message' => 'This email address has already been taken.'],
            [['phonenumber'], 'string', 'max' => 20],
//            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblBranch::className(), 'targetAttribute' => ['branch_id' => 'id']],
//            [['ho_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblHo::className(), 'targetAttribute' => ['ho_id' => 'id']],
//            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPartner::className(), 'targetAttribute' => ['partner_id' => 'id']],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'fullname' => 'Full name',
            'username' => 'User name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'gender' => 'Gender',
            'phonenumber' => 'Phone number',
            'status' => 'Status',
            'admin' => 'Admin',
            'unit'  => 'Unit',
            'user_type' => 'User type',
//            'ho_id' => 'HO',
//            'partner_id' => 'Partner',
//            'branch_id' => 'Branch',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'new_password' => 'New Password',
            're_password'=>'Password repeat',
        ];
    }

    /**
     * Gets query for [[CartItems]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CartItemsQuery
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItems::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrdersQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProductsQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Products0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProductsQuery
     */
    public function getProducts0()
    {
        return $this->hasMany(Products::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TblBranchQuery
     */
//    public function getBranch()
//    {
//        return $this->hasOne(TblBranch::className(), ['id' => 'branch_id']);
//    }

    /**
     * Gets query for [[Ho]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TblHoQuery
     */
//    public function getHo()
//    {
//        return $this->hasOne(TblHo::className(), ['id' => 'ho_id']);
//    }

    /**
     * Gets query for [[Partner]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TblPartnerQuery
     */
//    public function getPartner()
//    {
//        return $this->hasOne(TblPartner::className(), ['id' => 'partner_id']);
//    }

    /**
     * Gets query for [[UserAddresses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserAddressesQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(UserAddresses::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserQuery(get_called_class());
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $rs = Yii::$app->security->validatePassword($password, $this->password_hash);
        Yii::error("======> " . $rs);
        return $rs;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getDisplayName()
    {
        $fullName = trim($this->firstname.' '.$this->lastname);
        return $fullName ?: $this->email;
    }

    /**
     * @return mixed
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     */
    public function getAddresses()
    {
        return $this->hasMany(UserAddress::class, ['user_id' => 'id']);
    }

    /**
     * @return \common\models\UserAddress|null
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     */
    public function getAddress(): ?UserAddress
    {
        $address = $this->addresses[0] ?? new UserAddress();
        $address->user_id = $this->id;
        return $address;
    }

    public function afterValidate()
    {
        parent::afterValidate();
        if ($this->password) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }
    }
}
