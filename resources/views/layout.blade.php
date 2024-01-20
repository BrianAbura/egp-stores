<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/izitoast/css/iziToast.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/bootstrap-social/bootstrap-social.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('assets/img/egp_logo.png')}}'/>
  <style>
    .form-control{
        color:midnightblue
    }
  </style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
                <h4 class="m-1 text-default" style="color:navy">eGP Stores</h4>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{asset('assets/img/user.png')}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello  {{ Auth::user()->name }} </div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                  <button type="submit" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </div>
          </li>
        </ul>
      </nav>


      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('assets/img/egp_logo.png') }}" class="header-logo" /> <span
                class="logo-name" style="color:navy">Stores</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Stores</li>

            <li class="dropdown {{ (request()->is('purchase_order*')) ? 'active' : '' }}">
              <a href="{{ route('purchase_order.index') }}"><i data-feather="shopping-cart"></i><span>Purchase Orders</span></a>
            </li>

            <li class="dropdown {{ (request()->is('supplier*')) ? 'active' : '' }}">
                <a href="{{ route('supplier.index') }}"><i data-feather="users"></i><span>Suppliers</span></a>
              </li>

          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      @yield('main-content')

      <footer class="main-footer" style="bottom: 0; position:absolute;">
        <div class="footer-left">
          <a href="templateshub.net">eGP Stores</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/js/page/index.js')}}"></script>
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <script src="{{asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('assets/js/page/datatables.js')}}"></script>
  <script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
  <script src="{{asset('assets/js/page/toastr.js')}}"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

@if (session('success'))
<script>
    var toastMessage = @json(session('success', ''));
    iziToast.success({
      title: 'Success',
      message: toastMessage,
      position: 'topRight',
      timeout: 5000
    });
    </script>
@endif

@if ($errors->any())
<script>
    iziToast.error({
      title: 'Error!',
      position: 'topRight',
      timeout: 5000
    });
    </script>
@endif
</body>
</html>
