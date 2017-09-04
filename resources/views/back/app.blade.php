<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @section('title', config('app.name', 'Laravel') )</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @section('head')
    @include('back.head')
  @show

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
@section('body')
  <body class="hold-transition skin-blue sidebar-mini">
@show

    @section('wrapper')
        <div class="wrapper">
    @show

  @section('header')
       @include('back.header')
    @show

    @section('aside')
        @include('back.aside')
    @show

    @section('content-wrapp')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <i class="fa fa-users"></i>  Customers &nbsp;&nbsp;

                    <!--START BUTTON -->

                    <a href="http://crudbooster.app/admin/customers?m=3" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>


                    <a href="http://crudbooster.app/admin/customers/add?return_url=http%3A%2F%2Fcrudbooster.app%2Fadmin%2Fcustomers%3Fm%3D3&amp;parent_id=&amp;parent_field=" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>



                    <a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">
                        <i class="fa fa-upload"></i> Export Data
                    </a>

                    <a href="http://crudbooster.app/admin/customers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">
                        <i class="fa fa-download"></i> Import Data
                    </a>

                    <!--ADD ACTIon-->
                    <!-- END BUTTON -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>


            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
    @show

     @yield('content')

     @section('end-content-wrapp')
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
     @show

    @section('footer')
      @include('back.footer')
    @show

    @section('asidecontrol')
      @include('back.asidecontrol')
    @show

    @section('endwrapper')
    </div>
    <!-- ./wrapper -->
    @show

@section('javascript')
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
@show

</body>
</html>