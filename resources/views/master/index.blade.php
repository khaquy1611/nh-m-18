<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrd-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('public/backend')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('public/backend')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('public/backend')}}/css/AdminLTE.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{url('public/backend')}}/css/_all-skins.min.css">

  <link rel="stylesheet" href="{{url('public/backend')}}/css/style.css" />
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <ul class="nav navbar-nav navbar-right" style="margin-right: 10px">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">xin chào {{Auth::user()->email}}<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Thông tin</a></li>
            <li><a href="{{route('logout')}}">Thoát tài khoản</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  
  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Trang Chủ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('home.index')}}"><i class="fa fa-circle-o"></i>Trang Chủ</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Quản Lý Danh Mục</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Danh Mục</a></li>
     
          </ul>
        </li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i><span>Quản Lý tài khoản Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Tài Khoản</a></li>
 
          </ul>
        </li>
             <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i><span>Nhà Sản Xuất</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('producer.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Tài Khoản</a></li>
  
          </ul>
        </li>
             <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i><span>Quản Lý Sản Phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('product.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Sản Phẩm</a></li>
      
          </ul>
        </li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i><span>Quản Lý Màu Sắc</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('color.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Màu Sắc</a></li>
           
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i><span>Quản Lý Kích Cỡ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('size.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Kích Cỡ</a></li>
           
          </ul>
        </li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i><span>Quản Lý Banner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('banner.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Banner</a></li>
        
          </ul>
        </li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i><span>Quản Lý Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('slider.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Slider</a></li>
          
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i><span>Quản Lý Khách Hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('customer.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Khách Hàng</a></li>
          
          </ul>
        </li>
        <li>
          <a href="">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php 
       $url = url('').'/'.Request::segment(1).'/'?>
         <?php for ($i = 1; $i <= count(Request::segments()) ; $i ++): ?>
           <?php if ($i > 1): ?>
            <?php $url .= Request::segment($i).'/'?>
          <?php endif ?>
          <a href ="{{$url}}">
            {{strtoupper(Request::segment($i))}}
          </a>
          <?php if ($i < count(Request::segments())): ?>
            <?= '/' ?>
          <?php endif ?>
        <?php endfor ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          
        </div>
        <div class="box-body">
         @yield('main')
        @include('sweetalert::alert')

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{url('public/backend')}}/js/jquery.min.js"></script>
<script src="{{url('public/backend')}}/js/bootstrap.min.js"></script>
<script src="{{url('public/backend')}}/js/adminlte.min.js"></script>
<script src="{{url('public/backend/tinymce')}}/tinymce.min.js"></script>
<script src="{{url('public/backend/tinymce')}}/config.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

 <script>
tinymce.init({
  selector: 'textarea#content'
});
</script>
@yield('script')

<script>
  $('#modal-file').on('hide.bs.modal',function(){
    var image =  $('#image').val();
    $('#img').attr('src',image);
  })

    $('#modal-file-list').on('hide.bs.modal',function(){
    var images =  $('#image_list').val();
    var imageList = $.parseJSON(images);
    var html = "";
    for(var i = 0 ; i < imageList.length ; i++){
        html+= "<div class='col-md-3 thumbnail'>";
        html+= "<img src='"+imageList[i]+"' class='img-responsive' width='200px'  alt='ảnh đẹp'>";
        html+= "</div>";
    }
    $('#show').html(html);
/*    $('#image_list').attr('src',images);*/
  })





</script>
</body>
</html>
