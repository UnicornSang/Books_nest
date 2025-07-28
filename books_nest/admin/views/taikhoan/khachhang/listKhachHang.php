<!-- heafer -->

<?php include './views/layout/header.php'; ?>

<!-- end-header -->


<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end-navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản tài khoản khách hàng</h1>
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
             
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                     <th>Ảnh đại diện</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </tr>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listKhachHang as $key => $khachHang): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $khachHang['ho_ten'] ?> </td>
                      <td>
                      <img src="<?= BASE_URL . $khachHang['anh_dai_dien']?>" style="width: 100px" alt="" onerror="this.onerror=null
                       this.src='https://vietq.vn/Images/xuanhiep/2023/10/28/huong-dan-tao-facebook-avatar.jpg'"
                     ></td>
                      <td><?= $khachHang['email'] ?> </td>
                      <td><?= $khachHang['so_dien_thoai']?> </td>
                    <td><?= $khachHang['trang_thai'] == 1 ? 'Active':'Inactive' ?> </td>
                          
                      <td>
                        <div class="">
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                          <button class="btn btn-primary">Chi tiết</button>
                        </a>
                        
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                          <button class="btn btn-warning">Sửa</button>
                        </a>
                         <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $khachHang['id'] ?>"
                         onclick="return confirm('bạn có muốn reset password của tài khoản')">
                          <button class="btn btn-danger">Reset</button>
                        </a>


                        </div>
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