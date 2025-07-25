<?php 

class AdminSanPhamController {
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function dannhSachSanPham(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
       require_once './views/sanpham/listSanPham.php';

    }


    public function formAddSanPham(){
        // hàm hiển thị form nhập
         $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';

        //xóa session
        deleteSessionError();
    }

     public function postAddSanPham(){
        // hàm sử lý thêm dữ liệu
    // echo '<pre>';
    // echo 'Đường dẫn đang chạy: ' . $_SERVER['SCRIPT_FILENAME'];
    // echo '</pre>';
    // die();

        // kiểm tra xem dữ liệu được submit hay không
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //lấy ra dữ liệu

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            
            $so_luong = $_POST['so_luong'] ?? '';
            $luot_xem = $_POST['luot_xem'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            
            $hinh_anh = $_FILES['hinh_anh']  ?? null;
            //lưu hình ảnh
            $file_thumb = uploadFile($hinh_anh , './uploads/');
    //         echo '<pre>';
    // var_dump($file_thumb);
    // echo '</pre>';
    // die;
            //tạo một mảng trống
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'tên sản phẩm không để trống';
                # code...
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'giá sản phẩm không để trống';
                # code...
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'giá khuyến mãi không để trống';
                # code...
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'số lượng không để trống';
                # code...
            }
            if (empty($luot_xem)) {
                $errors['luot_xem'] = 'lượt xem không để trống';
                # code...
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'ngày nhập không để trống';
                # code...
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'mô tả không để trống';
                # code...
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'danh mục phải chọn';
                # code...
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái không để trống';
                # code...
            }
            if ($hinh_anh['error'] !==0) {
                $errors['hinh_anh'] = 'phải chọn ảnh sản phẩm';
                # code...
            }

            $_SESSION['error'] =$errors;
            //nếu có lỗi thì hiển thị sản phẩm
            if (empty($errors)) {
                // nếu ko lỗi thì tiến hành thêm sản phẩm
               $san_pham_id=$this->modelSanPham->insertSanPham($ten_san_pham,$gia_san_pham, $gia_khuyen_mai, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai,$file_thumb);
               header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
               exit();

            }else{
                    // trả về form và lỗi
                   $_SESSION['flash']=true;
                    header("location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
               exit();
            }
        }
    }
    public function formEditSanPham(){
        // hàm hiển thị form nhập
        //lấy ra thông tin cua form đang sửa
        $id = $_GET['id_san_pham'];
        
        $sanPham = $this->modelSanPham->getDetaiSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
       
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
        //     echo '<pre>';
        // echo 'Dữ liệu POST: ';
        // var_dump($_POST); // Hiển thị tất cả dữ liệu từ form (text, number, select...)
        // echo 'Dữ liệu FILES (ảnh): ';
        // var_dump($_FILES); // Hiển thị dữ liệu liên quan đến file upload (ảnh)
        // echo '</pre>';
        // die();
            //lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $luot_xem = $_POST['luot_xem'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            //tạo một mảng trống

             $hinh_anh = $_FILES['hinh_anh'];
            //lưu hình ảnh
            $file_thumb = uploadFile($hinh_anh , './uploads/');
            
            //tạo một mảng trống
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'tên sản phẩm không để trống';
                # code...
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'giá sản phẩm không để trống';
                # code...
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'giá khuyến mãi không để trống';
                # code...
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'số lượng không để trống';
                # code...
            }
            if (empty($luot_xem)) {
                $errors['luot_xem'] = 'lượt xem không để trống';
                # code...
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'ngày nhập không để trống';
                # code...
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'mô tả không để trống';
                # code...
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'danh mục phải chọn';
                # code...
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái không để trống';
                # code...
            }
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'tên san pham không để trống';
                # code...
            }
            //nếu có lỗi thì sửa sản phẩm
            if (empty($errors)) {
                // nếu ko lỗi thì tiến hành thêm sản phẩm
               $this->modelSanPham->updateSanPham($id,$ten_san_pham,$gia_san_pham, $gia_khuyen_mai, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai,$file_thumb);
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