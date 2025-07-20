<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link text-center" >
    <!-- <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://cellphones.com.vn/sforum/wp-content/uploads/2023/10/avatar-trang-4.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="../widgets.html" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
             Dashboard
             
            </p>
          </a>
        </li>

       
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN. '?act=danh-muc'?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              danh mục sản phẩm
              
            </p>
          </a>
        </li>
         <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN. '?act=san_pham'?>" class="nav-link">
            <i class="nav-icon fas fa-cat"></i>
            <p>
              danh mục sản phẩm
              
            </p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>