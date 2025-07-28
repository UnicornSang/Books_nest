<?php 
session_start(); // Bắt đầu phiên làm việc
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers


require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php';

// Require toàn bộ file Models

require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route báo cáo thông kê
    '/' =>(new AdminBaoCaoThongKeController())->home(),





    // route danh muc
    'danh-muc' =>(new AdminDanhMucController())->dannhSachDanhMuc(),
    'form-them-danh-muc' =>(new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' =>(new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' =>(new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' =>(new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' =>(new AdminDanhMucController())->deleteDanhMuc(),

    // route quan ly don hang
    'don-hang' =>(new AdminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang' =>(new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' =>(new AdminDonHangController())->postEditDonHang(),
    'chi-tiet-don-hang' =>(new AdminDonHangController())->detailDonHang(),
     // Sản phẩm
    'danh-sach-san-pham' => (new AdminSanPhamController())->dannhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),

    //router quản lý tài khoản
        //quản trị
        'list-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->danhSachQuanTri(),
        'form-them-quan-tri' =>(new AdminTaiKhoanController())->formAddQuanTri(),
        'them-quan-tri' =>(new AdminTaiKhoanController())->postAddQuanTri(),
        'form-sua-quan-tri' =>(new AdminTaiKhoanController())->formEditQuanTri(),
        'sua-quan-tri' =>(new AdminTaiKhoanController())->postEditQuanTri(),

    // route reset tài khoản password
        'reset-password' =>(new AdminTaiKhoanController())->resetPassword(),


    // quản lý tk khach hàng
         'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->danhSachKhachHang(),
        'form-sua-khach-hang' =>(new AdminTaiKhoanController())->formEditKhachHang(),
        'sua-khach-hang' =>(new AdminTaiKhoanController())->editKhachHang(),
        'chi-tiet-khach-hang' =>(new AdminTaiKhoanController())->detailKhachHang(),





    
};

?>