<?php

namespace backend\models;

use common\models\User;
use Yii;
use common\models\TblBranch;

/**
 * This is the model class for table "tbl_bts".
 *
 * @property int $id
 * @property string $bts_code
 * @property string|null $bts_type
 * @property string|null $bang_tang
 * @property int|null $so_luong_rru
 * @property string|null $loai_code
 * @property int|null $do_cao_cot
 * @property int $branch_id
 * @property string|null $dia_chi
 * @property string|null $longtitude
 * @property string|null $latitude
 * @property int|null $so_luong_angten
 * @property int|null $so_mong_co
 * @property string|null $loai_nha
 * @property string|null $coc_tiep_dia
 * @property int|null $trang_thai
 * @property string $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 *
 * @property TblBranch $branch
 * @property TblKehoach[] $tblKehoaches
 */
class Bts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_bts';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bts_code', 'branch_id'], 'required'],
            [['so_luong_rru', 'do_cao_cot', 'branch_id', 'so_luong_angten', 'so_mong_co', 'trang_thai', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['bts_code', 'bts_type', 'bang_tang', 'loai_code', 'loai_nha', 'coc_tiep_dia'], 'string', 'max' => 50],
            [['dia_chi'], 'string', 'max' => 255],
            [['longtitude', 'latitude'], 'string', 'max' => 100],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblBranch::className(), 'targetAttribute' => ['branch_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bts_code' => 'BTS Code',
            'bts_type' => 'BTS Type',
            'bang_tang' => 'Frequency band',
            'so_luong_rru' => 'Amount RRU',
            'loai_code' => 'Column Type',
            'do_cao_cot' => 'Column Height',
            'branch_id' => 'Branch ',
            'dia_chi' => 'Adress',
            'longtitude' => 'Longtitude',
            'latitude' => 'Latitude',
            'so_luong_angten' => 'Amount Angten',
            'so_mong_co' => 'Amount Foundation',
            'loai_nha' => 'Home type',
            'coc_tiep_dia' => 'Amount Ground Rod',
            'trang_thai' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
//        if($this->branch_id == User::findIdentity(Yii::$app->user->id)->branch_id)
//        {
////            return $this->hasOne(TblBranch::className(), ['id' => 'branch_id']);
//            return TblBranch::findOne($this->branch_id)->name;
//        }
        return $this->hasOne(TblBranch::className(), ['id' => 'branch_id']);
    }

    /**
     * Gets query for [[TblKehoaches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblKehoaches()
    {
        return $this->hasMany(TblKehoach::className(), ['bts_id' => 'id']);
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public static function findBtsByBranch($branchid)
    {
        return self::find()->select(['id', 'bts_code'])->where(['branch_id' => $branchid])->all();
    }
}
