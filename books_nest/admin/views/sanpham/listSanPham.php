
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
        <div class="col-sm-6">
          <h1>Quản lý danh sách sản phẩm</h1>
        </div>

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
           <a href="<?= BASE_URL_ADMIN. '?act=form-them-san-pham'?>">
            <button class="btn btn-success">thêm Sản Phẩm</button>
           </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
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
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listSanPham as $key => $sanPham): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
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
                      <td>
                        <a href="<?= BASE_URL_ADMIN. '?act=form-chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                         <button class="btn btn-primary" ><i class="far fa-eye"></i></button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN. '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                         <button class="btn btn-warning" ><i class="fas fa-cogs"></i></button>
                        </a>
                      <a href="<?= BASE_URL_ADMIN. '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>"
                       onclick="return confirm('bạn có muốn xóa không')">
                         <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                       </a>
                       
                      </td>
                    </tr>
                  <?php endforeach ?>
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

<!-- <script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->

</body>

</html>
