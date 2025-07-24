    <?php

    class AdminDonHangController
    {
        public $modelDonHang;
        public function __construct()
        {
            $this->modelDonHang = new AdminDonHang();
        }

        public function danhSachDonHang()
        {
            $listDonHang = $this->modelDonHang->getAllDonHang();
            require_once './views/donhang/listDonHang.php';
        }

        public function detailDonHang()
        {
            $don_hang_id = $_GET['id_don_hang'];
            // lấy ra thông tin của đơn hàng tại bảng đơn hàng
            $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
            // lấy ra thông tin của đơn hàng tại bảng chi tiết đơn hàng
            $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
            // lấy ra danh sách trạng thái đơn hàng
            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

            require_once './views/donhang/detailDonHang.php';
        }


        public function formEditDonHang()
        {
            // hàm hiển thị form nhập
            //lấy ra thông tin cua form đang sửa
            $id = $_GET['id_don_hang'];
            $donHang = $this->modelDonHang->getDetailDonHang($id);
            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
            // nếu không tìm thấy thì chuyển hướng về trang danh sách

            if ($donHang) {
                require_once './views/donhang/editDonHang.php';
                deleteSessionError();
            } else {
                header("location:" . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            }
        }

        public function postEditDonHang()
        {
            // hàm sử lý thêm dữ liệu
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //lấy ra dữ liệu
                $don_hang_id = $_POST['don_hang_id'];

                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
                $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
                $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
                $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
                $ghi_chu = $_POST['ghi_chu'] ?? '';
                $trang_thai_id = $_POST['trang_thai_id'] ?? '';

                $errors = [];
                if (empty($ten_nguoi_nhan)) {
                    $error['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
                }
                if (empty($sdt_nguoi_nhan)) {
                    $error['sdt_nguoi_nhan'] = 'Số điện thoại người nhận không được để trống';
                }
                if (empty($email_nguoi_nhan)) {
                    $error['email_nguoi_nhan'] = 'Email người nhận không được để trống';
                }
                if (empty($dia_chi_nguoi_nhan)) {
                    $error['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận không được để trống';
                }
                if (empty($trang_thai_id)) {
                    $error['trang_thai_id'] = 'Trạng thái đơn hàng không được để trống';
                }

                $_SESSION['error'] = $errors;
                // nếu không có lỗi thì tiến hành cập nhật đơn hàng
                if (empty($errors)) {
                    $this->modelDonHang->updateDonHang(
                        $don_hang_id,
                        $ten_nguoi_nhan,
                        $sdt_nguoi_nhan,
                        $email_nguoi_nhan,
                        $dia_chi_nguoi_nhan,
                        $ghi_chu,
                        $trang_thai_id
                    );
                    header("location:" . BASE_URL_ADMIN . '?act=don-hang');
                    exit();
                } else {
                    // nếu có lỗi thì trả về form và lỗi}
                    $_SESSION['flash'] = true;
                    header("location:" . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                    exit();
                }
            }
        }
        //  public function postEditDonHang(){
        //     // hàm sử lý thêm dữ liệu


        //     // kiểm tra xem dữ liệu được submit hay không
        //     if ($_SERVER['REQUEST_METHOD']=='POST') {
        //         //lấy ra dữ liệu
        //         $id = $_POST['id'];
        //         $ten_danh_muc = $_POST['ten_danh_muc'];
        //         $mo_ta = $_POST['mo_ta'];

        //         //tạo một mảng trống
        //         $errors = [];
        //         if (empty($ten_danh_muc)) {
        //             $errors['ten_danh_muc'] = 'tên danh mục không để trống';
        //             # code...
        //         }
        //         //nếu có lỗi thì sửa danh mục
        //         if (empty($errors)) {
        //             // nếu ko lỗi thì tiến hành thêm danh mục
        //            $this->modelDonHang->updateDonHang($id,$ten_danh_muc,$mo_ta);
        //            header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
        //            exit();

        //         }else{
        //                 // trả về form và lỗi
        //                 $DonHang = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
        //                 require_once './views/DonHang/editDonHang.php';
        //         }
        //     }
        // }
        // public function deleteDonHang(){
        //      $id = $_GET['id_danh_muc'];

        //     $DonHang = $this->modelDonHang->getDetaiDonHang($id);
        //     if ($DonHang) {
        //        $this->modelDonHang->destroyDonHang($id);

        //     }

        //     header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
        //     exit();
        // }
    }









    ?>