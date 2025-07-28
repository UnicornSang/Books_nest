
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

    public function formAddQuanTri()
    {

        require_once './views/taikhoan/quantri/addQuanTri.php';
    }

    public function postAddQuanTri()
    {

        // hàm sử lý thêm dữ liệu

        // kiểm tra xem dữ liệu được submit hay không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lấy ra dữ liệu

            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            //tạo một mảng trống
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không để trống';
                # code...
            }
            if (empty($email)) {
                $errors['email'] = 'Email không để trống';
                # code...
            }

            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                //nếu không có lỗi tiến hành thêm tài khoản
                // đặt password  mặc định
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);

                $chuc_vu_id = 1;

                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);


                header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // trả về form và lỗi
                $_SESSION['flash'] = true;

                header("location:" . BASE_URL_ADMIN . '?act=form-them-quan-tri');
            }
        }
    }


    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetaiTaikhoan($id_quan_tri);

        require_once './views/taikhoan/quantri/editQuanTri.php';

        deleteSessionError();
    }

    public function postEditQuanTri()
    {
        // hàm sử lý thêm dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lấy ra dữ liệu
            $quan_tri_id = $_POST['quan_tri_id'];

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'vui lòng chọn trạng thái';
            }


            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan(
                    $quan_tri_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $trang_thai,

                );
                header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // nếu có lỗi thì trả về form và lỗi}
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-sua-quan-trig&id_quan_tri=');
                exit();
            }
        }
    }

    public function resetPassword()
    {

        $tai_khoan_id = $_GET['id_quan_tri'];

        $tai_khoan = $this->modelTaiKhoan->getDeTaiTaiKhoan($tai_khoan_id);
        $password = password_hash('123@123ab', PASSWORD_BCRYPT);

        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);

        if ($status && $tai_khoan['chuc_vu_id'] == 1) {
            header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } elseif ($status && $tai_khoan['chuc_vu_id'] == 2) {
            header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
            var_dump("lỗi reset tài khoản");
            die;
        }
    }

    public function danhSachKhachHang()
    {

        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        // var_dump($listQuanTri);die;
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }




    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetaiTaikhoan($id_khach_hang);

        require_once './views/taikhoan/khachhang/editKhachhang.php';

        deleteSessionError();
    }



    public function editKhachHang()
    {
        // hàm sử lý thêm dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lấy ra dữ liệu
            $khach_hang_id = $_POST['khach_hang_id'];

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'vui lòng chọn trạng thái';
            }


            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $this->modelTaiKhoan->updateKhachHang(
                    $khach_hang_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $trang_thai,

                );
                header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                // nếu có lỗi thì trả về form và lỗi}
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-sua-khach-hangg&id_khach-hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function detailKhachHang(){
        
    }
}











?>