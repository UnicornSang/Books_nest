
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

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img style="width: 500px; height:500px" src=" <?= BASE_URL . $sanPham['hinh_anh']?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <?php foreach($listAnhSanPham as $key=>$anhSP): ?>
                  <div class="product-image-thumb"><img src="<?= BASE_URL . $anhSP['link_hinh_anh']; ?>" alt="Product Image"></div>
                <?php endforeach ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Tên sản phẩm : <?= $sanPham['ten_san_pham'] ?></h3>
              
              <hr>
              <h4 class="mt-4">Gía khuyến mãi: <?= $sanPham['gia_khuyen_mai']?>  </h4>
              <hr>
              <h4 class="mt-4">Lượt xem: <?= $sanPham['luot_xem']?>  </h4>
              <hr>
              <h4 class="mt-4">Số lượng sản phẩm: <?= $sanPham['so_luong']?>  </h4>
                 <hr>
              <h4 class="mt-4">Ngày nhập sản phẩm: <?= $sanPham['ngay_nhap']?>  </h4>
                 <hr>
              <h4 class="mt-4">Danh mục: <?= $sanPham['ten_danh_muc']?>  </h4>
                 <hr>
              <h4 class="mt-4">Trạng thái : <?= $sanPham['trang_thai'] ==1 ?'Còn hàng' :'Hết hàng' ?>  </h4>
              

             
           



             
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô tả</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Bình luận</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?= $sanPham['mo_ta'] ?></div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên người bình luận</th>
                  <th>Nội dung</th>
                  <th>Ngày đăng</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <tbody>
 <tbody>
  <?php foreach($listBinhLuanSanPham as $key => $binhluan): ?>
    <tr>
      <td><?= $key + 1 ?></td>
      <td><?= isset($binhluan['ten_nguoi_binh_luan']) ? htmlspecialchars($binhluan['ten_nguoi_binh_luan']) : 'Không rõ'; ?></td>
      <td><?= isset($binhluan['noi_dung']) ? htmlspecialchars($binhluan['noi_dung']) : ''; ?></td>
      <td><?= isset($binhluan['ngay_binh_luan']) ? htmlspecialchars($binhluan['ngay_binh_luan']) : 'Chưa xác định'; ?></td>
      <td>
        <a href="?act=an-binh-luan&id_binh_luan=<?= $binhluan['id'] ?>&id_san_pham=<?= $id ?>" class="btn btn-warning btn-sm">Ẩn</a>
        <a href="?act=xoa-binh-luan&id_binh_luan=<?= $binhluan['id'] ?>&id_san_pham=<?= $id ?>" class="btn btn-danger btn-sm">Xoá</a>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>


</tbody>
              
            </table>    
            
            </div>
              
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>

</html>