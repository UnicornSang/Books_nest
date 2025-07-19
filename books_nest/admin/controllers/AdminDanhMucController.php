<?php 

class AdminDanhMucController {
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function dannhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
       require_once './views/danhmuc/DanhMuc.php';

    }

}









?>