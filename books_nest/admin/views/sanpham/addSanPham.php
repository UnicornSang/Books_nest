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
          </div>
  </section>
         <section class="content">  

         <div class="container-fluid">

         <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN. '?act=them-san-pham'?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham"  placeholder="tên sản phẩm">
                    <?php if (isset($_SESSION['error']['ten_san_pham'])) {  ?>
             

                    <p class="text-danger"><?=$_SESSION['error']['ten_san_pham'] ?></p>

                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Giá sản phẩm</label>
                    <input type="text" class="form-control" name="gia_san_pham"  placeholder="giá sản phẩm">
                    <?php if (isset($_SESSION['error']['gia_san_pham'])) {  ?>
             

                    <p class="text-danger"><?=$_SESSION['error']['gia_san_pham'] ?></p>

                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Gía khuyến mãi</label>
                    <input type="text" class="form-control" name="gia_khuyen_mai"  placeholder="giá khuyến mãi">
                    <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) {  ?>
             

                    <p class="text-danger"><?=$_SESSION['error']['gia_khuyen_mai'] ?></p>

                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Hình ảnh</label>
                    <input type="file" class="form-control" name="hinh_anh"  placeholder="hinh_anh">
                    <?php if (isset($_SESSION['error']['hinh_anh'])) {  ?>
             

                    <p class="text-danger"><?=$_SESSION['error']['hinh_anh'] ?></p>

                    <?php } ?>
                  </div>
                   <div class="form-group">
                    <label >Allbum ảnh</label>
                    <input type="file" class="form-control" name="img_array[]"  placeholder="allbum anh" multiple>
                    <?php if (isset($_SESSION['error']['file_array'])) {  ?>
             

                    <p class="text-danger"><?=$_SESSION['error']['file_array'] ?></p>

                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Số lượng</label>
                    <input type="text" class="form-control" name="so_luong"  placeholder="số lượng">
                    <?php if (isset($_SESSION['error']['so_luong'])) {  ?>
             

                    <p class="text-danger"><?=$_SESSION['error']['so_luong'] ?></p>

                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Lượt xem</label>
                    <input type="text" class="form-control" name="luot_xem"  placeholder="lượt xem">
                    <?php if (isset($_SESSION['error']['luot_xem'])) {  ?>
             

                    <p class="text-danger"><?=$_SESSION['error']['luot_xem'] ?></p>

                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Ngày nhập</label>
                    <input type="date" class="form-control" name="ngay_nhap"  placeholder="ngày nhập">
                    <?php if (isset($_SESSION['error']['ngay_nhap'])) {  ?>
             

                    <p class="text-danger"><?=$_SESSION['error']['ngay_nhap'] ?></p>

                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label >Mô tả</label>
                    <textarea name="mo_ta"  class="form-control" placeholder="nhập mô ta"></textarea>
                  </div>
                  <div class="form-group">
                    <label >Danh mục</label>
                    <!-- <input type="text" class="form-control" name="danh_muc_id"  placeholder="danh mục"> -->
                     <select class="form-control" aria-label="exampleFormControlSelect1" name="danh_muc_id" >
                     <option selected disabled>Chọn danh mục</option> 
                     <?php foreach($listDanhMuc as $danhMuc): ?>
                        <option value="<?= $danhMuc['id']?>"><?= $danhMuc['ten_danh_muc']?></option>
                      <?php endforeach ?>
                     </select>
                    <?php if (isset($_SESSION['error']['danh_muc_id'])) {  ?>
                    
             

                    <p class="text-danger"><?=$_SESSION['error']['danh_muc_id'] ?></p>

                    <?php } ?>
                  </div>
                <div class="form-group">
                    <label >Trạng thái</label>
                    <!-- <input type="text" class="form-control" name="danh_muc_id"  placeholder="danh mục"> -->
                     <select class="form-control" aria-label="exampleFormControlSelect1" name="trang_thai" >
                     <option selected disabled>Chọn trạng thái</option> 
                     <option value="1">Còn hàng</option>
                     <option value="2">Hết hàng</option>
                     </select>
                    <?php if (isset($_SESSION['error']['trang_thai'])) {  ?>
                    
             

                    <p class="text-danger"><?=$_SESSION['error']['trang_thai'] ?></p>

                    <?php } ?>
                  </div>
                  
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
         </div>
         </div>
          
         

         </section>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->


</body>

</html>