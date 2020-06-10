<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/victory/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Mar 2020 03:16:43 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Victory Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="{{url('public/Admin')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('public/Admin')}}/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('public/Admin')}}/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth register-full-bg">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5" style="margin-top: 40px;">
                <h2>Đăng nhập</h2>
                <h4 class="font-weight-light">Hello! let's get started</h4>

                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                @if(session()->has('message'))
                <div class="alert alert-danger">
                  {{ session()->get('message') }}
                </div>
                @endif
                <form class="pt-4" method="POST" action="{{route('login')}}">                  
                @csrf
              <div class="form-group">
                    <label for="exampleInputEmail1">Email đăng nhập</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <i class="mdi mdi-account"></i>
                  </div>
                  <div class="form-group">
                    <label >Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    <i class="mdi mdi-eye"></i>
                  </div>
                <!--   <div class="form-group">
                    <label for="exampleInputPassword2">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm password">
                    <i class="mdi mdi-eye"></i>
                  </div> -->
                  <div class="mt-5">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium"  type="submit">Đăng nhập</button>
                  </div>
                  <div class="mt-3 text-center">
                    <a href="#" class="auth-link text-black">Quên mật khẩu?</a>
                  </div> 
                 <!--  <div class="mt-2 w-75 mx-auto">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        I accept terms and conditions
                      </label>
                    </div>
                  </div>
                  <div class="mt-2 text-center">
                    <a href="login.html" class="auth-link text-black">Already have an account? <span class="font-weight-medium">Sign in</span></a>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{url('public/Admin')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{url('public/Admin')}}/js/off-canvas.js"></script>
  <script src="{{url('public/Admin')}}/js/hoverable-collapse.js"></script>
  <script src="{{url('public/Admin')}}/js/misc.js"></script>
  <script src="{{url('public/Admin')}}/js/settings.js"></script>
  <script src="{{url('public/Admin')}}/js/todolist.js"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/victory/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Mar 2020 03:16:43 GMT -->
</html>
