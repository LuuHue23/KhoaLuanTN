<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/victory/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Mar 2020 03:05:40 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Victory Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/simple-line-icons/css/simple-line-icons.css">
  
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/css/vendor.bundle.base.css">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('public/Admin')}}/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('public/Admin')}}/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <!-- phần chung -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('index')}}"><img src="{{url('public/Admin')}}/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('index')}}"><img src="{{url('public/Admin')}}/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item dropdown d-none d-lg-flex">
            <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="#" data-toggle="dropdown">
              <span class="btn">+ Thêm mới</span>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">
              <!-- <a class="dropdown-item" href="pages/forms/add-user.html">
                <i class="icon-user text-primary"></i>
                Tài khoản nhân viên
              </a> -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('add_staff')}}">
                <i class="icon-user-following text-warning"></i>
                Thêm nhân viên
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('add_kpi')}}">
                <i class="icon-docs text-success"></i>
                Thêm mới mục tiêu
              </a>
            </div>
          </li>
        </ul>

 <ul class="navbar-nav navbar-nav-right">

        

           <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-user mx-0"></i>
              
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              
              <a class="dropdown-item preview-item" style=" padding: 7px 17px" href="{{route('logout')}}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success" style="margin-right: 10px">
                    <i class="icon-logout mx-0"></i>
                  </div>
                </div>
               <!--  <div class="preview-item-content">
                <a  href="{{route('logout')}}"><h6 class="preview-subject font-weight-medium">Đăng xuất </h6></a> 
                
                 
                </div> -->

                <div >Đăng xuất</div>
              </a>
            </div>
          </li>

        </ul>
     
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles primary" ></div>
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles pink"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>
        <!-- SIDEBAR BÊN PHẢI TODO AND CHATS -->
  <div id="right-sidebar" class="settings-panel">
          
          <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
             
          
           
            </div>
            <!-- To do section tab ends -->
            
            <!-- chat tab ends -->
          </div>
        </div>


        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <!-- MENUBAR  CHUNG -->

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="profile-image">
                  @if(Auth::guard('acc')->check())
                  <img src="{{url('')}}/uploads/{{Auth::guard('acc')->user()->image}}" alt="image"/>
                  @else
                  <img src="" alt="image">
                  @endif
                  <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
                </div>
             @if(Auth::guard('acc')->check())
            <div class="profile-name">
                  <p class="name">
                                 
                    {{Auth::guard('acc')->user()->Staff_Name}}
                  </p>
                  <p class="designation">
                    Super Admin
                  </p>
                </div>
                @else
                <p>Plese Login</p>
             @endif
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index')}}">
                <i class="icon-rocket menu-icon"></i>
                <span class="menu-title">Trang chủ</span>
                <span class="badge badge-success"></span>
              </a>
            </li>
      

            <!-- <li class="nav-item d-none d-lg-block">
              <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
                <i class="icon-layers menu-icon"></i>
                <span class="menu-title">Trang chủ bđ</span>
                <span class="badge badge-warning">1</span>
              </a>
              <div class="collapse" id="sidebar-layouts">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-fixed.html">Sidebar Fixed</a></li>
                </ul>
              </div>
            </li> -->
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('listkpi')}}">
                <i class="icon-clock menu-icon"></i>
                <span class="menu-title">Mục tiêu</span>
              </a>
            </li>

     <li class="nav-item">
              <a class="nav-link" href="{{route('add_workpro')}}">
                <i class="icon-directions menu-icon"></i>
                <span class="menu-title">Giao việc</span>
              </a>
            </li>

          <li class="nav-item">
              <a class="nav-link" href="{{route('list_staff')}}">
               <i class="icon-user menu-icon"></i>
                <span class="menu-title">Nhân viên</span>
              </a>
            </li>
          
         <li class="nav-item">
              <a class="nav-link" href="{{route('list_kpi')}}">
               <i class="icon-clock  menu-icon"></i>
                <span class="menu-title">Mục tiêu cá nhân</span>
              </a>
            </li>

          
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-key menu-icon"></i>
                <span class="menu-title">Đánh giá</span>
                <span class="badge badge-danger">3</span>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('list_workpro')}}"> Đánh giá công việc </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('total_rate')}}"> Hiệu suất </a></li>
                 
                  <li class="nav-item"> <a class="nav-link" href="{{route('rate_show')}}"> Lương nhân viên </a></li>
                 <!--   <li class="nav-item"> <a class="nav-link" href="{{route('error')}}"> Thống kê </a></li> -->
                  
                
                </ul>
              </div>
            </li>

    
          </ul>
        </nav>
        <!-- partial -->
         @yield('main')
      
      
        <!-- content-wrapper ends -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{url('public/Admin')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{url('public/Admin')}}/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="{{url('public/Admin')}}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{url('public/Admin')}}/vendors/raphael/raphael.min.js"></script>
  <script src="{{url('public/Admin')}}/vendors/morris.js/morris.min.js"></script>
  <script src="{{url('public/Admin')}}/vendors/jquery-sparkline/jquery.sparkline.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{url('public/Admin')}}/js/off-canvas.js"></script>
  <script src="{{url('public/Admin')}}/js/hoverable-collapse.js"></script>
  <script src="{{url('public/Admin')}}/js/misc.js"></script>
  <script src="{{url('public/Admin')}}/js/settings.js"></script>
  <script src="{{url('public/Admin')}}/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('public/Admin')}}/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/victory/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Mar 2020 03:06:23 GMT -->
</html>
