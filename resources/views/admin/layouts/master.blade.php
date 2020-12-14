
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Visitor</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('admin_assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('admin_assets/css/app.min.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{asset('admin_assets/css/styles/all-themes.css')}}" rel="stylesheet" />
    
  

    
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

</body>



</html>