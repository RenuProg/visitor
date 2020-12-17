
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('admin_assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('admin_assets/css/app.min.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{asset('admin_assets/css/styles/all-themes.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <style type="text/css">
        #data_table{
    background-color:#657383;
}
    </style>
  

    
</head>

<body class="dark">
    <!-- Page Loader -->
   <!--  <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="{{asset('admin_assets/images/loading.png')}}" alt="admin">
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
   @include('admin.layouts.header')
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
         @include('admin.layouts.sidebar')
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        @include('admin.layouts.right_sidebar')
          @yield('content')
          
        <!-- #END# Right Sidebar -->
           <section class="content">
        <div class="container-fluid">
           
        </div>
    </section><section class="content">
        <div class="container-fluid">
           
        </div>
    </section>
   <section class="content">
        <div class="container-fluid">
           
        </div>
    </section><section class="content">
        <div class="container-fluid">
           
        </div>
    </section><section class="content">
        <div class="container-fluid">
           
        </div>
    </section><section class="content">
        <div class="container-fluid">
           
        </div>
    </section><section class="content">
        <div class="container-fluid">
           
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
           
        </div>
    </section><section class="content">
        <div class="container-fluid">
           
        </div>
    </section>
    </div>
     @yield('scripts')
   <!-- dash -->
    <script src="{{asset('admin_assets/js/app.min.js')}}"></script>
    <script src="{{ asset('admin_assets/js/chart.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('admin_assets/js/admin.js')}}"></script>
    <script src="{{asset('admin_assets/js/bundles/echart/echarts.js')}}"></script>
    <script src="{{asset('admin_assets/js/bundles/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/pages/index.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- button -->
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        // Set up your table
 $(function () {
table = $('#my-table').DataTable({
    "searching": true,
    "paging": true,
            "ordering": true,
            "info": true,
            dom: 'Bfrtip',
        buttons: [
           
              {
                extend: 'excel',
                title: 'Dataexport',
                text: 'Export '
            }
        ]
   
});
})

// Extend dataTables search
$.fn.dataTable.ext.search.push(
  function(settings, data, dataIndex) {
    var min = $('#min-date').val();
    var max = $('#max-date').val();
    var createdAt = data[2] || 0; // Our date column in the table

    if (
      (min == "" || max == "") ||
      (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
    ) {
      return true;
    }
    return false;
  }
);

// Re-draw the table when the a date range filter changes
$('.date-range-filter').change(function() {
  table.draw();
});

$('#my-table_filter').hide();
</script>

</body>



</html>