<?php 

class HomeController
{
    public $modelSanPham;
    public function __construct()
    {
      $this->modelSanPham = new SanPham();
    }
    
public function Home(){
    require_once './views/layout/header.php';
    require_once './views/layout/menu.php';
    require_once './views/home.php';
    require_once './views/layout/footer.php';
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