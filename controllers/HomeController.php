<?php 

class HomeController
{
    public $modelSanPham;
    public function __construct()
    {
      $this->modelSanPham = new SanPham();
    }
    
public function Home(){
    echo "đây là hom";
}
public function trangChu(){
    echo " đây là trang chủ";
}
public function danhSachSanPham(){
   $listBooks = $this->modelSanPham->getAllBooks();
//    var_dump($listBooks);die();

    require_once './views/ListBooks.php';
}
}