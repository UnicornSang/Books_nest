<?php include './views/layout/header.php'; ?>

<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit sản phẩm <?= $sanPham['ten_san_pham'] ?></h1>
        </div>
      </div>
    </div>
  </section>


  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?> " method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                <label for="ten_san_pham">Tên sản phẩm</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?= $sanPham['ten_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['ten_san_pham'])) {  ?>
                  <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_san_pham">Giá sản phẩm</label>
                <input type="text" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $sanPham['gia_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['gia_san_pham'])) {  ?>
                  <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                <input type="text" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>">
                <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) {  ?>
                  <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="hinh_anh">Hình ảnh</label>
                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                <?php if (!empty($sanPham['hinh_anh'])) { ?>
                  <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="so_luong">Số lượng</label>
                <input type="text" id="so_luong" name="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>">
                <?php if (isset($_SESSION['error']['so_luong'])) {  ?>
                  <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="luot_xem">Lượt xem</label>
                <input type="text" id="luot_xem" name="luot_xem" class="form-control" value="<?= $sanPham['luot_xem'] ?>">
                <?php if (isset($_SESSION['error']['luot_xem'])) {  ?>
                  <p class="text-danger"><?= $_SESSION['error']['luot_xem'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="ngay_nhap">Ngày nhập</label>
                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>">
                <?php if (isset($_SESSION['error']['ngay_nhap'])) {  ?>
                  <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="mo_ta">Mô tả</label>
                <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $sanPham['mo_ta'] ?></textarea>
              </div>
              <div class="form-group">
                <label for="danh_muc_id">Danh mục sản phẩm</label>
                <select id="danh_muc_id" name="danh_muc_id" class="form-control custom-select">
                  <?php foreach ($listDanhMuc as $danhMuc) : ?>
                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id']; ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                  <?php endforeach ?>
                </select>
                <?php if (isset($_SESSION['error']['danh_muc_id'])) {  ?>
                  <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="trang_thai">Trạng thái sản phẩm</label>
                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                  <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn hàng</option>
                  <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Hết hàng</option>
                </select>
                <?php if (isset($_SESSION['error']['trang_thai'])) {  ?>
                  <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-12">
                  <a href="#" class="btn btn-secondary">Hủy</a>
                  <input type="submit" value="Lưu thay đổi" class="btn btn-success float-right">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Files</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">




           
            <div class="table-responsive">
              <form action="<?= BASE_URL_ADMIN . '?act=allbum-anh-san-pham' ?> " method="post" enctype="multipart/form-data">
              <table id="faqs" class="table table-hover">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>file</th>
                    <th> <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i> Thêm </button></div></th>
                    <!-- <th>Status</th> -->
                  </tr>
                </thead>
                <tbody>
                   <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']?>">
                    <input type="hidden" id="img_delete" name="img_delete">
                    <?php foreach($listAnhSanPham as $key=> $value): ?>
                  <tr id="faqs-row-<?= $key ?>">
                    <input type="hidden" name="current_img_ids[]" value="<?=$value['id'] ?>">
                    <td><img src="<?= BASE_URL . $value['link_hinh_anh']  ?>" style="width: 50px; height: 50px" alt=""></td>
                    <td><input type="file" name="img_array[]" class="form-control"></td>
                    
                    <td class="mt-10">
                    <button type="button" class="badge badge-danger" onclick="removeRow(<?= $key ?> , <?=$value['id'] ?> )"><i class="fa fa-trash"></i> Delete</button>
                  
                  </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
              <div class="card-footer text-center">
                <button class="btn btn-primary">Sửa</button>
              </div>
              </form>
            </div>
           


          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include './views/layout/footer.php'; ?>
  </body>
  <script>
    var faqs_row = <?= count($listAnhSanPham)?>;

    function addfaqs() {
      html = '<tr id="faqs-row' + faqs_row + '">';
      html += '<td><img src="https://simg.zalopay.com.vn/zlp-website/assets/sach_hay_nen_doc_nha_gia_kim_ea63da0d8f.jpeg" style="width: 50px; height: 50px" alt=""></td>';
      html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
      
      html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null );"><i class="fa fa-trash"></i> Delete</button></td>';

      html += '</tr>';

      $('#faqs tbody').append(html);

      faqs_row++;
    }

    function removeRow(rowId, imgId){
      
      $('#faqs-row-' + rowId).remove();
      if(imgId !== null){
        var imgDeleteInput = document.getElementById('img_delete')
        var currentValue = imgDeleteInput.value;
        imgDeleteInput.value = currentValue ? currentValue + ',' + imgId :imgId;
      }
    }
  </script>

  </html>