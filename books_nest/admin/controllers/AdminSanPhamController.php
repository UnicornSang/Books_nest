<?php 

class AdminSanPhamController {
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
    }

    public function dannhSachSanPham(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
       require_once './views/sanpham/listSanPham.php';

    }


    public function formAddSanPham(){
        // hàm hiển thị form nhập
        require_once './views/sanpham/addSanPham.php';
    }

     public function postAddSanPham(){
        // hàm sử lý thêm dữ liệu
    

        // kiểm tra xem dữ liệu được submit hay không
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //lấy ra dữ liệu

            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $hinh_anh = $_POST['hinh_anh'];
            $so_luong = $_POST['so_luong'];
            $luot_xem = $_POST['luot_xem'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            
            //tạo một mảng trống
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'tên san pham không để trống';
                # code...
            }
            //nếu có lỗi thì hiển thị sản phẩm
            if (empty($errors)) {
                // nếu ko lỗi thì tiến hành thêm sản phẩm
               $this->modelSanPham->insertSanPham($ten_san_pham,$gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai);
               header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
               exit();

            }else{
                    // trả về form và lỗi
                    require_once './views/sanpham/addSanPham.php';
            }
        }
    }
    public function formEditSanPham(){
        // hàm hiển thị form nhập
        //lấy ra thông tin cua form đang sửa
        $id = $_GET['id_san_pham'];
        
        $sanPham = $this->modelSanPham->getDetaiSanPham($id);
       
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
        }else{
            header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
        }
       
    }

     public function postEditSanPham(){
        // hàm sử lý thêm dữ liệu

        // kiểm tra xem dữ liệu được submit hay không
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $hinh_anh = $_POST['hinh_anh'];
            $so_luong = $_POST['so_luong'];
            $luot_xem = $_POST['luot_xem'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            //tạo một mảng trống
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'tên san pham không để trống';
                # code...
            }
            //nếu có lỗi thì sửa sản phẩm
            if (empty($errors)) {
                // nếu ko lỗi thì tiến hành thêm sản phẩm
               $this->modelSanPham->updateSanPham($id,$ten_san_pham,$gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai);
               header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
               exit();

            }else{
                    // trả về form và lỗi
                    $sanPham = ['id' => $id, 'ten_san_pham' => $ten_san_pham,'gia_san_pham' => $gia_san_pham,'gia_khuyen_mai'=> $gia_khuyen_mai,'hinh_anh'=> $hinh_anh,'so_luong'=> $so_luong,'luot_xem'=> $luot_xem,'ngay_nhap'=> $ngay_nhap,'mo_ta'=> $mo_ta,'danh_muc_id'=> $danh_muc_id,'trang_thai'=> $trang_thai];
                    require_once './views/sanpham/editSanPham.php';
            }
        }
    }
    public function deleteSanPham(){
         $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetaiSanPham($id);
        if ($sanPham) {
           $this->modelSanPham->destroySanPham($id);
         
        }

        header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
        exit();
    }
}









?>