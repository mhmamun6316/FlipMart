<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Sunny Admin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend') }}/css/style.css">
	<link rel="stylesheet" href="{{ asset('backend') }}/css/skin_color.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/toastr.css">
  <link href="{{ asset('backend') }}/summernote/summernote-bs4.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('backend') }}/bootstrap-tagsinput.css" crossorigin="anonymous">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

 @include('admin.include.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	 
    @yield('admin-content')

  </div>
 
  <!-- /.content-wrapper --> 

    
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('backend') }}/js/vendors.min.js"></script>
    <script src="{{ asset('backend') }}/assets/icons/feather-icons/feather.min.js"></script>	
	<script src="{{ asset('backend') }}/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
	<script src="{{ asset('backend') }}/assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
	<script src="{{ asset('backend') }}/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="{{ asset('backend') }}/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend') }}/js/template.js"></script>
	<script src="{{ asset('backend') }}/js/pages/dashboard.js"></script>

  <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>

  <script src="{{ asset('backend') }}/summernote/summernote-bs4.min.js"></script>
  <script>
      $(function() {
          'use strict';
          // Summernote editor
          $('#summernote').summernote({
              height: 150,
              tooltip: false
          })

          $('#summernote2').summernote({
              height: 150,
              tooltip: false
          })

          $('#summernote3').summernote({
              height: 150,
              tooltip: false
          })

          $('#summernote4').summernote({
              height: 150,
              tooltip: false
          })
      });

  </script>

  <script type="text/javascript" src="{{ asset('backend') }}/toastr.min.js"></script>

  <script>
      @if (Session::has('message'))
          var type ="{{ Session::get('alert-type', 'info') }}"
          switch(type){
          case 'info':
          toastr.info(" {{ Session::get('message') }} ");
          break;
      
          case 'success':
          toastr.success(" {{ Session::get('message') }} ");
          break;
      
          case 'warning':
          toastr.warning(" {{ Session::get('message') }} ");
          break;
      
          case 'error':
          toastr.error(" {{ Session::get('message') }} ");
          break;
          }
      @endif

  </script>

  
  <script type="text/javascript"> 
      $('button#deleteButton').on('click', function(e){
  var name = $(this).data('id');
  e.preventDefault();
  swal({
      title: "Careful!",
      text: "Are you sure you want to delete "+name+"?",
      icon: "warning",
      dangerMode: true,
      buttons: {
        cancel: "Exit",
        confirm: "Confirm",
      },
  })
  .then ((willDelete) => {
      if (willDelete) {
        $(this).closest("form").submit();
      }
  });
  });
  </script> 

  <script src="{{ asset('backend') }}/sweetalert/sweetalert.min.js"></script>
  <script src="{{ asset('backend') }}/sweetalert/code.js"></script>
    
</body>
</html>
