@extends('admin.layouts.master')
 @section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Visit Purpose</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Visit Purpose</a>
                            </li>
                            <li class="breadcrumb-item active">Add >Visit Purpose</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                <strong style="color: #fff;">Add Visit Purpose</strong></h1>
                            <ul class="header-dropdown m-r--5">
                                <div class="col-lg-12 p-t-20 text-center">
                           
                            </div>
                            </ul>
                        </div>
                         <form action="{{ route('visit_purpose.store') }}" method="post">
                        <div class="body">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control" placeholder="Enter Visit Purpose" />
                                            @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-line">
                                       <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="" >Please Seelect</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                          
                                        </select>
                                       @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    </div></div>
                                </div>
                                  
                                   <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                            <a href="{{route('visit_purpose.index')}}" class="btn btn-danger waves-effect">
                                                   Cancel
                                                </a>
                                        </div>
                                    </div>
                                </div> 
                               
                            </div>
                            
                            <div class="row clearfix">
                            </div>
                            
                            <div class="row">
                            
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                               
                                
                            </div>
                        </div>
                             </form>
                    </div>
                </div>
            </div>
        </div>
            
    </section>
 @endsection