<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "form_table".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $age
 * @property string|null $birthday
 * @property string|null $creat_at
 * @property string|null $update_at
 */
class FormTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'form_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age'], 'integer'],
            [['creat_at', 'update_at'], 'safe'],
            [['name', 'birthday'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'birthday' => 'Birthday',
            'creat_at' => 'Creat At',
            'update_at' => 'Update At',
        ];
    }
}
