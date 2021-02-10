<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Badan Kesatuan Bangsa dan Politik Kabupaten Lebak">
  <meta content="Kesbangpol Lebak, kesbangpol_lebak, kesbangpol kabupaten lebak, kesbangpollebak" name="keywords" />
  <meta name="author" content="Abdul Salam">
  <link rel="icon" href="{{ asset('/images/favicon.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('vendor/lte/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{asset('vendor/lte/plugins/select2/css/select2-bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('vendor/lte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('vendor/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('lib/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('lib/css/responsive.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('lib/css/yearpicker.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/lte/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/lte/plugins/ekko-lightbox/ekko-lightbox.css')}}">
  <link rel="stylesheet" href="{{asset('lib/css/styles.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileinput/css/fileinput.css')}}">

  <style>
    .ck-editor__editable_inline {
      min-height: 200px;
    }

    .ck-editor__editable {
      max-height: 200px;
    } 

    .fileinput-upload,
    .fileinput-remove{
      display: none;
    }

    .file-footer-buttons .kv-file-upload {
      display: none;
    }
    
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    @include('sweetalert::alert')
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <span class="mr-1">{{auth()->user()->name}}</span>
            <i class="far fa-user-circle"></i>
            <i class="fas fa-caret-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <div class="media">
                <img src="{{asset('images/user.png')}}" alt="Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{auth()->user()->name}}
                  </h3>
                  <p class="text-sm">{{auth()->user()->email}}</p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <div class="dropdown-item">
              <a href="{{route('changePassword')}}" class="btn btn-xs bg-gradient-info">Ganti Password</a>
              <a href="{{route('logout')}}" class="btn btn-xs bg-gradient-danger float-right"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->