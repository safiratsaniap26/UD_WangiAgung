<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link rel="stylesheet" href="<?php echo e(asset('template/vendors/feather/feather.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('template/vendors/ti-icons/css/themify-icons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('template/vendors/css/vendor.bundle.base.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('template/vendors/ti-icons/css/themify-icons.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/js/select.dataTables.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('template/css/vertical-layout-light/style.css')); ?>">
  <link rel="shortcut icon" href="<?php echo e(asset('template/images/logo-udwangiagung.png')); ?>" />


  <?php echo $__env->yieldContent('css'); ?>

</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="<?php echo e(asset('template/images/logo-udwangiagung.png')); ?>" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html">WA</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item">
            <a href="/register" class="nav-link">Register</a>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?php echo e(asset('template/images/faces/user.png')); ?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="/profile" class="dropdown-item">
                <i class="ti-user text-primary"></i>
                Profile
              </a>
              <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
              </form>
            </div>
          </li>
        </ul>


      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <?php if(Auth()->user()->id == 3): ?>
            <li class="nav-item">
                <a class="nav-link" href="/sekertaris">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">User</span>
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#stok-barang" aria-expanded="false" aria-controls="stok-barang">
                  <i class="icon-layout menu-icon"></i>
                  <span class="menu-title">Stok Barang</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="stok-barang">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="/stok/stok_barang">Data Barang</a></li>
                      <li class="nav-item"> <a class="nav-link" href="">Data Transaksi</a></li>
                      <li class="nav-item"> <a class="nav-link" href="/stok/tambah">Tambah Barang</a></li>
                  </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#data-pembeli" aria-expanded="false" aria-controls="data-pembeli">
                  <i class="icon-grid-2 menu-icon"></i>
                  <span class="menu-title">Data Pembeli</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="data-pembeli">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="/keuangan/data_pembeli">Data Pembeli</a></li>
                      <li class="nav-item"> <a class="nav-link" href="/keuangan/tambahpembeli">Tambah Pembeli</a></li>
                  </ul>
                </div>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="/kasir/kasir">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Pembelian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/keuangan/grafik">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Modal</span>
                </a>
            </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.</span>
          </div>
        </footer>

      </div>
    </div>
  </div>

  <script src="<?php echo e(asset('template/vendors/js/vendor.bundle.base.js')); ?>"></script>

  <script src="<?php echo e(asset('template/vendors/chart.js/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/vendors/datatables.net/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')); ?>"></script>
  <script src="<?php echo e(asset('template/js/dataTables.select.min.js')); ?>"></script>

  <script src="<?php echo e(asset('template/js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('template/js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('template/js/template.js')); ?>"></script>
  <script src="<?php echo e(asset('template/js/settings.js')); ?>"></script>
  <script src="<?php echo e(asset('template/js/todolist.js')); ?>"></script>

  <script src="<?php echo e(asset('template/js/dashboard.js')); ?>"></script>
  <script src="<?php echo e(asset('template/js/Chart.roundedBarCharts.js')); ?>"></script>


  <?php echo $__env->yieldContent('js'); ?>

</body>

</html>

<?php /**PATH /home/aditasyhari/Project Laravel/stok_barang_laravel-main/resources/views/template/app.blade.php ENDPATH**/ ?>