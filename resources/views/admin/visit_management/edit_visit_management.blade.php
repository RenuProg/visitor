@extends('admin.layouts.master')
@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Visitor</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Visitor</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Visitor</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                <strong style="color: #fff; font-size: 28px">Edit Visitor</strong></h1>
                           <!--  <ul class="header-dropdown m-r--5">
                                <div class="col-lg-12  text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Add Visit</button>
                            </div>
                            </ul> -->
                        </div>
                        <div class="body">
                            <form action="{{ route('visitors.update',[$visitor['id']]) }}" method="post">
                                   {{ method_field('PUT') }}
                        <div class="body">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="first_name" class="form-control" value="{{ $visitor['first_name'] }}" placeholder="First Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="last_name" class="form-control" value="{{ $visitor['last_name']}}" placeholder="Last Name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                          
                                            <input type="text"  name="register_date" class="datepicker form-control"
                                               value="{{ $visitor['register_date']}}" disabled="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="phone"  value="{{ $visitor['phone']}}" class="form-control" placeholder="Phone" />
                                        </div>
                                    </div>
                                </div>  
                               
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="email" type="email" name="email" value="{{ $visitor['email']}}"  class="validate form-control"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control" name="gender">
                                                <option value="">Gender</option>
                                                <option value="male" <?php if($visitor['gender'] == 'male') { echo 'selected'; } ?>>Male</option>
                                                <option value="female" <?php if($visitor['gender'] == 'female') { echo 'selected'; } ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="address" class="form-control no-resize"
                                                placeholder="Address">{{ $visitor['address']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                           
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                   <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                            <a href="{{route('visitors.index')}}" class="btn btn-danger waves-effect">
                                                   Cancel
                                                </a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

          
    </section>
   
      @endsection