    <?php 

class AdminDanhMucController {
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function dannhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
       require_once './views/danhmuc/listDanhMuc.php';

    }


    public function formAddDanhMuc(){
        // hàm hiển thị form nhập
        require_once './views/danhmuc/addDanhMuc.php';
    }

     public function postAddDanhMuc(){
        // hàm sử lý thêm dữ liệu
    

        // kiểm tra xem dữ liệu được submit hay không
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //lấy ra dữ liệu

            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            
            //tạo một mảng trống
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'tên danh mục không để trống';
                # code...
            }
            //nếu có lỗi thì hiển thị danh mục
            if (empty($errors)) {
                // nếu ko lỗi thì tiến hành thêm danh mục
               $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
               header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
               exit();

            }else{
                    // trả về form và lỗi
                    require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }
    public function formEditDanhMuc(){
        // hàm hiển thị form nhập
        //lấy ra thông tin cua form đang sửa
        $id = $_GET['id_danh_muc'];
        
        $danhMuc = $this->modelDanhMuc->getDetaiDanhMuc($id);
       
        if ($danhMuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        }else{
            header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
        }
       
    }

     public function postEditDanhMuc(){
        // hàm sử lý thêm dữ liệu
   

        // kiểm tra xem dữ liệu được submit hay không
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            
            //tạo một mảng trống
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'tên danh mục không để trống';
                # code...
            }
            //nếu có lỗi thì sửa danh mục
            if (empty($errors)) {
                // nếu ko lỗi thì tiến hành thêm danh mục
               $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta);
               header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
               exit();

            }else{
                    // trả về form và lỗi
                    $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                    require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }
    public function deleteDanhMuc(){
         $id = $_GET['id_danh_muc'];

        $danhMuc = $this->modelDanhMuc->getDetaiDanhMuc($id);
        if ($danhMuc) {
           $this->modelDanhMuc->destroyDanhMuc($id);
         
        }

        header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
}









?>