<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Staffmisa */
/* @var $form yii\widgets\ActiveForm */
AppAsset::register($this);
?>

<div class="staffmisa-form">

    <?php $form = ActiveForm::begin(); ?>
    <div>
        <form>
            <div class="tren row">
                <div class="trai">
                    <div class="row">
                        <div class="mb-3" style="width: 31%; margin-left: 1.5%;    margin-right: 4%;">
                            <label for="exampleFormControlInput1" class="form-label">Mã <strong>*</strong></label>
                            <input type="email" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3" style="width: 62%;">
                            <label for="exampleFormControlInput1" class="form-label"> Tên<strong>*</strong></label>
                            <input type="email" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="row-1">
                        <label>Đơn vị <strong>*</strong></label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Chức danh</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="row-1">
                        <label>Nhóm khách hàng,nhà cung cấp </label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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
                                <input type="date" id="date">
                            </p>
                        </div>

                        <div class="form-check gioitinh">
                            <label>Giới tính </label>
                            <div style="display: flex;margin-left: 28%;">
                                <div class="nam">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                           id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nam
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                           id="flexRadioDefault1">
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
                            <input type="email" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div>
                            <label for="date">Ngày cấp</label>
                            <p>
                                <input type="date" id="date">
                            </p>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nơi cấp</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-1 tkthu">
                            <label>TK công nợ phải thu </label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-1">
                            <label>TK công nợ phải trả </label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
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
                        <div class="row-1 diachi" >
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Địa chỉ </label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="row" style="padding-left:0.75%">
                            <div class="mb-3 dienthoai">
                                <label for="exampleFormControlInput1" class="form-label">ĐT di động </label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3 dienthoai">
                                <label for="exampleFormControlInput1" class="form-label">ĐT cố định</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3 dienthoai">
                                <label for="exampleFormControlInput1" class="form-label">Email </label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                    </div>
                    <div class="taikhoannganhang">
                        <div class="row taikhoannganhang1">
                            <div class="mb-3 dienthoai">
                                <label for="exampleFormControlInput1" class="form-label">Nơi cấp</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3 dienthoai">
                                <label for="exampleFormControlInput1" class="form-label">Nơi cấp</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3 dienthoai">
                                <label for="exampleFormControlInput1" class="form-label">Nơi cấp</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3 dienthoai">
                                <label for="exampleFormControlInput1" class="form-label">Nơi cấp</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                    </div>
                </div>
                           
            </div>

        </form>
    </div>
    <div class="form-group button-save">
        <div style="margin-right: 24%;">    <?= Html::a('Cancel', '/staff/index', ['class' => 'btn btn-secondary']) ?></div>
       <div> <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?></div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
