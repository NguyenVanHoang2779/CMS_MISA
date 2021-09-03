<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staffmisa".
 *
 * @property int $id
 * @property string $manhanvien
 * @property string $tennhanvien
 * @property string $donvi
 * @property string|null $chucdanh
 * @property string|null $noicap
 * @property string|null $diachi
 * @property string|null $email
 * @property string|null $tennganhang
 * @property string|null $chinhanh
 * @property int|null $keychucdanh
 * @property int|null $gioitinh
 * @property int|null $socmnd
 * @property int|null $sodienthoai
 * @property int|null $sodienthoaicodinh
 * @property int|null $taikhoannganhang
 * @property string|null $ngaysinh
 * @property string|null $ngaycap
 * @property string|null $diachinganhang
 * @property string|null $nhomkhachang
 * @property int|null $congnothu
 * @property int|null $congnotra
 */
class Staffmisa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staffmisa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manhanvien', 'tennhanvien', 'donvi'], 'required'],
            [['donvi'], 'string'],
            [['keychucdanh', 'gioitinh', 'socmnd', 'sodienthoai', 'sodienthoaicodinh', 'taikhoannganhang', 'congnothu', 'congnotra'], 'integer'],
            [['ngaysinh', 'ngaycap'], 'safe'],
            [['manhanvien', 'noicap'], 'string', 'max' => 45],
            [['tennhanvien', 'chucdanh', 'diachi', 'email', 'tennganhang', 'chinhanh', 'diachinganhang', 'nhomkhachang'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manhanvien' => 'Mã nhân viên ',
            'tennhanvien' => 'Tên nhân viên ',
            'donvi' => 'Đơn vị ',
            'chucdanh' => 'Chức danh ',
            'noicap' => 'Nơi cấp ',
            'diachi' => 'Địa chỉ ',
            'email' => 'Email',
            'tennganhang' => 'Tên ngân hàng ',
            'chinhanh' => 'Chi nhánh ',
            'keychucdanh' => 'Keychucdanh',
            'gioitinh' => 'Giới tính ',
            'socmnd' => 'Số CMND ',
            'sodienthoai' => 'Số điện thoại ',
            'sodienthoaicodinh' => 'Số điện thoại cố điịnh ',
            'taikhoannganhang' => 'Tài khoản ngân hàng ',
            'ngaysinh' => 'Ngày sinh ',
            'ngaycap' => 'Ngày cấp ',
            'diachinganhang' => 'Địa chỉ ngân hàng ',
            'nhomkhachang' => 'Nhóm khách hàng,cung cấp  ',
            'congnothu' => 'TK công nợ phải thu ',
            'congnotra' => 'TK công nợ phải trả ',
        ];
    }
}
