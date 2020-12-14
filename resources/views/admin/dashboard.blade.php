 @extends('admin.layouts.master')
@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                            
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-5">
                                    <span class="info-box-icon"><i class="fas fa-user-alt"></i></span>
                                </div>
                                <div class="col-lg-7 col-7">
                                    <div>
                                        <h2 class="col-cyan">
                                            <span>125</span>
                                        </h2>
                                        <p>Active Visitors</p><br>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-5">
                                    <span class="info-box-icon"><i class="fas fa-user-friends"></i></span>
                                </div>
                                <div class="col-lg-7 col-7">
                                    <div>
                                        <h2 class="col-green">
                                            <span>213</span>
                                        </h2>
                                        <p>Checkout</p><br>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-5">
                                     <span class="info-box-icon"><i class="fas fa-user-friends"></i></span>
                                </div>
                                <div class="col-lg-7 col-7">
                                    <div>
                                        <h2 class="col-orange">
                                            <span>145</span>
                                        </h2>
                                        <p>Total Visitors</p><br>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-5">
                                    <span class="info-box-icon"><i class="fas fa-user-friends"></i></span>
                                </div>
                                <div class="col-lg-7 col-7 pl-0">
                                    <div>
                                        <h2 class="col-cyan">
                                            <span>99</span>
                                        </h2>
                                        <p>Visitors</p><br>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
  
    @endsection