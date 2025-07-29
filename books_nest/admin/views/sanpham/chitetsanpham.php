
<!-- heafer -->

<?php include './views/layout/header.php'; ?>

<!-- end-header -->


<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end-navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <h1>Chi tiết Sản Phẩm</h1>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
           
           </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tên san pham</th>
                    <th>Giá sản phẩm</th>
                    <th>Gía khuyến mãi</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Lượt xem</th>
                    <th>Ngày nhập</th>
                    <th>Mô tả</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                   <?php if (!empty($sanPham)) : ?>
                    <tr>
                      <td><?= $sanPham['ten_san_pham'] ?> </td>
                      <td><?= $sanPham['gia_san_pham'] ?> </td>
                      <td><?= $sanPham['gia_khuyen_mai'] ?> </td>
                      <td>
                     
                      <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="width: 100px" alt=""></td>
                      <td><?= $sanPham['so_luong'] ?> </td>
                      <td><?= $sanPham['luot_xem'] ?> </td>
                      <td><?= $sanPham['ngay_nhap'] ?> </td>
                      <td><?= $sanPham['mo_ta'] ?> </td>
                      <td><?= $sanPham['ten_danh_muc'] ?> </td>
                      <td><?= $sanPham['trang_thai'] ==1 ? 'còn hàng' : 'hết hàng' ?> </td>
                    </tr>
                  <?php endif; ?>
                  </tfoot>
              </table>
            </div>

            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->


</body>

</html>