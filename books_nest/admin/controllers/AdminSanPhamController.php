<?php

class AdminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelBinhLuan;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    public function dannhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }


    public function formAddSanPham()
    {
        // hàm hiển thị form nhập
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';

        //xóa session
        deleteSessionError();
    }

    public function postAddSanPham()
    {
        // hàm sử lý thêm dữ liệu
        // echo '<pre>';
        // echo 'Đường dẫn đang chạy: ' . $_SERVER['SCRIPT_FILENAME'];
        // echo '</pre>';
        // die();

        // kiểm tra xem dữ liệu được submit hay không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            $img_array = $_FILES['img_array'];

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
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'phải chọn ảnh sản phẩm';
                # code...
            }

            $_SESSION['error'] = $errors;
            //nếu có lỗi thì hiển thị sản phẩm
            if (empty($errors)) {
                // nếu ko lỗi thì tiến hành thêm sản phẩm
                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai, $file_thumb);

                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }
                header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
                exit();
            } else {
                // trả về form và lỗi
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function formEditSanPham()
    {
        // hàm hiển thị form nhập
        //lấy ra thông tin cua form đang sửa
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetaiSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
        }
    }

    public function postEditSanPham()
    {
        // hàm sử lý thêm dữ liệu

        // kiểm tra xem dữ liệu được submit hay không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //     echo '<pre>';
            // echo 'Dữ liệu POST: ';
            // var_dump($_POST); // Hiển thị tất cả dữ liệu từ form (text, number, select...)
            // echo 'Dữ liệu FILES (ảnh): ';
            // var_dump($_FILES); // Hiển thị dữ liệu liên quan đến file upload (ảnh)
            // echo '</pre>';
            // die();
            //lấy ra dữ liệu
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $sanPhamOld = $this->modelSanPham->getDetaiSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // lấy ảnh cũ để phục vụ cho nhu cầu sửa ảnh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $luot_xem = $_POST['luot_xem'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            //tạo một mảng trống

            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            //lưu hình ảnh
            $file_thumb = uploadFile($hinh_anh, './uploads/');

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

            $_SESSION['error'] = $errors;
            //nếu có lỗi thì sửa sản phẩm

            //logic sửa ảnh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                // Up load ảnh mới lên 
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                } else {
                    $new_file = $old_file;
                }
            }

            if (empty($errors)) {
                // nếu ko lỗi thì tiến hành thêm sản phẩm
                $san_pham_id = $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai, $new_file);
                header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
                exit();
            } else {
                // trả về form và lỗi
                // $sanPham = ['san_pham_id' => $san_pham_id, 'ten_san_pham' => $ten_san_pham,'gia_san_pham' => $gia_san_pham,'gia_khuyen_mai'=> $gia_khuyen_mai,'hinh_anh'=> $hinh_anh,'so_luong'=> $so_luong,'luot_xem'=> $luot_xem,'ngay_nhap'=> $ngay_nhap,'mo_ta'=> $mo_ta,'danh_muc_id'=> $danh_muc_id,'trang_thai'=> $trang_thai];
                // require_once './views/sanpham/editSanPham.php';
                // đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham' . $san_pham_id);
                exit();
            }
        }
    }
    public function detailSanPham()
    {
        if (isset($_GET['id_san_pham'])) {
            $id = $_GET['id_san_pham'];
            $sanPhamMoldel = new AdminSanPham();
            $sanPham = $sanPhamMoldel->getDetaiSanPham($id);
            $listAnhSanPham = $sanPhamMoldel->getListAnhSanPham($id);
            $listBinhLuanSanPham = $this->modelBinhLuan->getBinhLuanByIdSanPham($id);
            // var_dump($listAnhSanPham);die;
            require_once './views/sanpham/detailsanpham.php';
        }
    }

    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetaiSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        if ($sanPham) {
            deleteFile($sanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
           
        }
        if ($listAnhSanPham) {
           foreach($listAnhSanPham as $key=>$anhSP){
            deleteFile($anhSP['link_hinh_anh']);
            $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
           }
           
        }

        header("location:" . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
        exit();
    }

    public function postEditAnhSanPham(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            //lấy danh sách ảnh hiện tại của sản phẩm
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
            /// xử lý các ảnh đc gửi từ form
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $currtent_img_ids = $_POST['current_img_ids'] ?? [];

            // khai báo để thêm mới hoặc thay thế ảnh cũ
            $upload_file = [];

            // upload ảnh mới hoặc thay thế ảnh
            foreach($img_array['name'] as $key=>$value){
              if($img_array['error'][$key]== UPLOAD_ERR_OK){
                $new_file = uploadFileAlbum($img_array, './uploads' ,$key);
                if($new_file){
                    $upload_file[] = [
                        'id'=>$currtent_img_ids[$key] ?? null,
                        'file' => $new_file
                    ];
                }
              }
            }
            // lưu ảnh mới vào db và xóa ảnh cũ
          foreach($upload_file as $file_info){
            if($file_info['id']){
                $old_file = $this->modelSanPham->getDetaiAnhSanPham($file_info['id'])['link_hinh_anh'];

                //cập nhật ảnh cũ
                $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                //Xóa ảnh cũ

                deleteFile($old_file);

            }else{
                //thêm ảnh mới
                $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$file_info['file']);
            }
          }
          foreach($listAnhSanPhamCurrent as $anhSP){
            $anh_id = $anhSP['id'];
            if(in_array($anh_id, $img_delete)){
                // xoa  ảnh
                $this->modelSanPham->destroyAnhSanPham($anh_id);

                //xóa file
                deleteFile($anhSP['link_hinh_anh']);
            }
          }
        }
        header("location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham' . $san_pham_id);
                exit();
    }
}
