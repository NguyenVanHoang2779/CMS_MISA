<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Staffmisa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staffmisa-form">
    <?php $form = ActiveForm::begin(); ?>
    <form id="w0" action="/staff/create" method="post">
        <input type="hidden" name="_csrf-backend"
               value="RrKWunk2Qhr7nydFFEle7sWFw_5ZNE1s93fnCDM63Xow-cDPTlMgQI3sYA1ZJQ-BrO7zyAMMBQmfRK1je1HpNg==">
        <div class="tren row">
            <div class="trai">
                <div class="row">
                    <div class=" form-group field-staffmisaone-manhanvien required " style="width: 31%; margin-left: 1.5%;    margin-right: 4%;">
                        <label  class="form-label control-label" for="staffmisaone-manhanvien" >Mã <strong>*</strong></label>
                        <input type="text" class="form-control" id="staffmisaone-manhanvien" name="Staffmisa[manhanvien]">
                        <div class="help-ma" style="display: none">Mã nhân viên không được để trống</div>
                    </div>
                    <div class="mb-3" style="width: 62%;">
                        <label for="exampleFormControlInput1" class="form-label"> Tên<strong>*</strong></label>
                        <input type="text" class="form-control" id="tennhanvien"
                               name="Staffmisa[tennhanvien]">
                        <div class="help-ten" style="display: none">Tên nhân viên không được để trống</div>
                    </div>
                </div>
                <div class="row-1">
                    <label>Đơn vị <strong>*</strong></label>
                    <div class="input-group mb-3">
                        <select class="custom-select donvi" id="inputGroupSelect01" name="Staffmisa[donvi]" >
                            <option value = "">Choose...</option>
                            <option value="Công ty cổ phần MISA">Công ty cổ phần MISA </option>
                            <option value="Công ty trách nhiệm MISA">Công ty trách nhiệm MISA </option>
                            <option value="Học viện đào tạo MISA  ">Học viện đào tạo MISA </option>
                        </select>
                        <div class="help-donvi" style="display: none">Đơn vị không được để trống</div>
                    </div>
                </div>
                <div class="row-1">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Chức danh</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               name="Staffmisa[chucdanh]">
                    </div>
                </div>
                <div class="row-1 nhomkhachhang" style="display: none">
                    <label>Nhóm khách hàng,nhà cung cấp </label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01" name="Staffmisa[nhomkhachang]">
                            <option value="">Choose...</option>
                            <option value="KH,NCC 1">KH,NCC 1</option>
                            <option value="KH,NCC 2">KH,NCC 2</option>
                            <option value="KH,NCC 3">KH,NCC 3 </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="phai">
                <div class="row">
                    <div class="ngaysinh">
                        <div>
                            <label for="date">Ngày sinh</label>
                        </div>
                        <p>
                            <input type="date" id="date" name="Staffmisa[ngaysinh]">
                        </p>
                    </div>

                    <div class="form-check gioitinh">
                        <label>Giới tính </label>
                        <div style="display: flex;margin-left: 28%;">
                            <div class="nam">
                                <input class="form-check-input" type="checkbox" value="1" name="flexRadioDefault" id="flexRadioDefault1" name="Staffmisa[gioitinh]">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nam
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="0" name="flexRadioDefault"
                                       id="flexRadioDefault1" name="Staffmisa[gioitinh]">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nữ
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 socmnd">
                        <label for="exampleFormControlInput1" class="form-label">Số CMND</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[socmnd]">
                    </div>
                    <div>
                        <label for="date">Ngày cấp</label>
                        <p>
                            <input type="date" id="date" name="Staffmisa[ngaycap]">
                        </p>
                    </div>
                </div>
                <div class="row-1">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nơi cấp</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[noicap]">
                    </div>
                </div>
                <div class="row">
                    <div class="row-1 tkthu" style=" display:none;">
                        <label>TK công nợ phải thu </label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="Staffmisa[congnothu]">
                                <option value="">Choose...</option>
                                <option value="Tài khoản 1">Tài khoản 1</option>
                                <option value="Tài khoản 2">Tài khoản 2 </option>Nhóm khách hàng,nhà cung cấp
                                <option value="Tài khoản 3 ">Tài khoản 3 </option>
                            </select>
                        </div>
                    </div>
                    <div class="row-1 tkno " style="display: none ">
                        <label>TK công nợ phải trả </label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="Staffmisa[congnotra]">
                                <option value="">Choose...</option>
                                <option value="Tài khoản 1">Tài khoản 1 </option>
                                <option value="Tài khoản 2">Tài khoản 2 </option>
                                <option value="Tài khoản 3">Tài khoản 3 </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="duoi">
            <div class="button-tyoe row">
                <button type="button" class="btn btn-outline-dark button-lienhe">Liên hệ</button>
                <button type="button" class="btn btn-outline-dark button-taikhoan">Tài khoản ngân hàng</button>
            </div>
            <div class="baotrum">
                <div class="lienhe">
                    <div class="row-1 diachi">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Địa chỉ </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[diachi]">
                        </div>
                    </div>
                    <div class="row" style="padding-left:0.75%">
                        <div class="mb-3 dienthoai">
                            <label for="exampleFormControlInput1" class="form-label">ĐT di động </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[sodienthoai]">
                        </div>
                        <div class="mb-3 dienthoai">
                            <label for="exampleFormControlInput1" class="form-label">ĐT cố định</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[sodienthoaicodinh]">
                        </div>
                        <div class="mb-3 dienthoai">
                            <label for="exampleFormControlInput1" class="form-label">Email </label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="Staffmisa[email]">
                        </div>
                    </div>
                </div>
                <div class="taikhoannganhang">
                    <div class="row taikhoannganhang1">
                        <div class="mb-3 dienthoai">
                            <label for="exampleFormControlInput1" class="form-label">Số tài khoản</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[taikhoannganhang]">
                        </div>
                        <div class="mb-3 dienthoai">
                            <label for="exampleFormControlInput1" class="form-label">Tên ngân hàng </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[tennganhang]">
                        </div>
                        <div class="mb-3 dienthoai">
                            <label for="exampleFormControlInput1" class="form-label">Chi nhánh </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[chinhanh]">
                        </div>
                        <div class="mb-3 dienthoai">
                            <label for="exampleFormControlInput1" class="form-label">Tỉnh/TP của ngân hàng </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Staffmisa[diachinganhang]">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-group button-save">
            <div style="margin-right: 24%;">    <?= Html::a('Hủy', '/staff/index', ['class' => 'btn btn-secondary']) ?></div>
            <div> <?= Html::submitButton('Lưu ', ['class' => 'btn btn-primary save']) ?></div>
        </div>

    </form>
    <?php $form = ActiveForm::end(); ?>

</div>
