$(document).ready(function () {
    $('.taikhoannganhang').hide();
    $('.button-taikhoan').click(function () {
        $('.taikhoannganhang').show();
        $('.lienhe').hide();

    });
    $('.button-lienhe').click(function () {
        $('.taikhoannganhang').hide();
        $('.lienhe').show();

    });
    $('.save').click(function () {
        if ($('#staffmisaone-manhanvien').val() == '') {
            alert('Mã nhân viên không được để trống');
            return false;
        }
        if ($('#tennhanvien').val() == '') {
            alert('Tên nhân viên không được để trống');
            return false;
        }
        if ($('.donvi :selected').val() == "") {
            alert('Đơn vị không được để trống');
            return false;
        }
    });
    $('.lanhanvien1').click(function () {
        if (this.checked) {
            $('.nhomkhachhang').show();
            $('.tkthu').show();
            $('.lanhanvien3').click(function (){
                if (!this.checked) {
                    $('.tkno').hide();
                }
                else {
                    $('.tkno').show();
                }
            });
        }
        else
            {
                $('.nhomkhachhang').hide();
                $('.tkthu').hide();
            }
        }
    );
    $('.lanhanvien3').click(function () {
        if (this.checked) {
            $('.nhomkhachhang').show();
            $('.tkno').show();

        } else {
            $('.nhomkhachhang').hide();
            $('.tkno').hide();

        }
    });

});