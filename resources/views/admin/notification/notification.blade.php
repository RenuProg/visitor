 @extends('admin.layouts.master')
@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Notification Setting</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Notification Setting</a>
                            </li>
                            <li class="breadcrumb-item active">Manage Notification Setting</li>
                        </ul>
                    </div>
                </div>
            </div>
           
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                <strong style="color: #fff;">Turn On/Off SMS/Email Notification</strong></h1>
                            <ul class="header-dropdown m-r--5">
                                <div class="col-lg-12 p-t-20 text-center">
                           
                            </div>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('notification.update',1) }}" method="POST">
                                {{ method_field('PUT') }}
                            <div class="row clearfix">
                                @csrf
                                  <div class="col-md-4">
                                    <div class="form-line">
                                        <select class="form-control" name="type">
                                            
                                            <option value="email_notification">Email Notification</option>
                                            <option value="sms_notification">SMS Notification</option>
                                          
                                        </select>
                                      
                                    </div>
                                </div>
                               <div class="col-md-4">
                                    <div class="form-line">
                                        <select class="form-control" name="status">
                                            <option value=""  selected>Status</option>
                                            <option value="1">ON</option>
                                            <option value="0">OFF</option>
                                          
                                        </select>
                                      
                                    </div>
                                </div>
                                  
                                   <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <button type="submit" class="btn btn-primary waves-effect m-r-15">Save</button>
                            
                                        </div>
                                    </div>
                                </div> 
                               
                            </div>
                            </form>
                            <div class="row clearfix">
                            </div>
                            
                            <div class="row">
                            
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endsection