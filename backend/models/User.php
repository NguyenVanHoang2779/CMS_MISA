<?php

namespace app\models;

use Yii;

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
 * @property string|null $gender
 * @property string $unit
 * @property string $phonenumber
 * @property int $status
 * @property int|null $admin
 * @property int|null $id_ho
 * @property int|null $id_partner
 * @property int|null $id_branch
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 *
 * @property CartItems[] $cartItems
 * @property Orders[] $orders
 * @property Products[] $products
 * @property Products[] $products0
 * @property UserAddresses[] $userAddresses
 */
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'fullname', 'username', 'auth_key', 'password_hash', 'email', 'unit', 'phonenumber', 'created_at', 'updated_at'], 'required'],
            [['status', 'admin', 'id_ho', 'id_partner', 'id_branch', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'lastname', 'username', 'password_hash', 'password_reset_token', 'email', 'gender', 'verification_token'], 'string', 'max' => 255],
            [['fullname', 'unit'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 32],
            [['auth_key'], 'string', 'max' => 32],
            [['phonenumber'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
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
            'unit' => 'Unit',
            'phonenumber' => 'Phone Number',
            'status' => 'Status',
            'admin' => 'Admin',
            'id_ho' => 'ID HO',
            'id_partner' => 'ID Partner',
            'id_branch' => 'ID Branch',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    /**
     * Gets query for [[CartItems]].
     *
     * @return \yii\db\ActiveQuery|\common\models\Query\CartItemsQuery
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItems::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|\common\models\Query\OrdersQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery|\common\models\Query\ProductsQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Products0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\Query\ProductsQuery
     */
    public function getProducts0()
    {
        return $this->hasMany(Products::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[UserAddresses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\Query\UserAddressesQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(UserAddresses::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\Query\UserQuery(get_called_class());
    }
}
