<?php
    $userId= isLogin()['user_id'];
    $userDetail = getUserInfo($userId);
 ?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo _WEB_HOST_ROOT_ADMIN; ?>" class="brand-link">
      <?php echo $userDetail['email'] ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="<?php echo getLinkAdmin('users', 'profile') ?>" class="d-block">
            <?php echo $userDetail['fullname'] ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo _WEB_HOST_ROOT_ADMIN ?>" class="nav-link  <?php echo activeMenuSidebar('dashboard') ? "active" : false; ?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>
                Tổng quan
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview <?php echo activeMenuSidebar('groups') ? "menu-open" : false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('groups') ? "active" : false; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Danh mục group
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo _WEB_HOST_ROOT_ADMIN.'?module=groups'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Danh sách</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?php echo _WEB_HOST_ROOT_ADMIN.'?module=groups&action=add'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Thêm mới </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Danh mục blog
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Danh sách</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Thêm mới </p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview <?php echo activeMenuSidebar('blog') ? "menu-open" : false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('blog') ? "active" : false; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý blog
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo _WEB_HOST_ROOT_ADMIN.'?module=blog'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Danh sách</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?php echo _WEB_HOST_ROOT_ADMIN.'?module=blog&action=add'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Thêm mới </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
