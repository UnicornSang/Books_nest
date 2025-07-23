
<?php

class AdminTaiKhoanController
{

    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }
    public function danhSachQuanTri()
    {

        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        // var_dump($listQuanTri);die;
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

        public function formAddQuanTri(){

            require_once './views/taikhoan/quantri/addQuanTri.php';

            deleteSessionError();
        }

}









?>