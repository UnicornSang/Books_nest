<?php
class AdminBinhLuanController{
public $modelBinhLuan;
public function __construct()
    {
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    public function anBinhLuan(){
        if(isset($_GET['id_binh_luan']) && isset($_GET['id_san_pham'])){
            $id = $_GET['id_binh_luan'];
            $id_san_pham = $_GET['id_san_pham'];
            $this->modelBinhLuan->updateTrangThaiBinhLuan($id, 0);
        }
        header("Location: ?act=form-chi-tiet-san-pham&id_san_pham=" . $id_san_pham);
        exit;
    }

    public function hienBinhLuan(){
        if(isset($_GET['id_binh_luan']) && isset($_GET['id_san_pham'])){
            $id = $_GET['id_binh_luan'];
            $id_san_pham = $_GET['id_san_pham'];
            $this->modelBinhLuan->updateTrangThaiBinhLuan($id, 1);
        }
        header("Location: ?act=form-chi-tiet-san-pham&id_san_pham=" . $id_san_pham);
        exit;
    }

    public function xoaBinhLuan(){
        if(isset($_GET['id_binh_luan']) && isset($_GET['id_san_pham'])){
            $id = $_GET['id_binh_luan'];
            $id_san_pham = $_GET['id_san_pham'];
            $this->modelBinhLuan->deleteBinhLuan($id);
        }
        header("Location: ?act=form-chi-tiet-san-pham&id_san_pham=" . $id_san_pham);
        exit;
    }
}

?>