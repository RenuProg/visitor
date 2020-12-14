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
                                <a href="#" onClick="return false;">User</a>
                            </li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                <strong style="color: #fff;">Edit user</strong></h1>
                            <ul class="header-dropdown m-r--5">
                                <div class="col-lg-12 p-t-20 text-center">                           
                            </div>
                            </ul>
                        </div>
                         <form action="{{ route('users.update',[$user['id']]) }}" method="post">
                            {{ method_field('PUT') }}
                        <div class="body">
                           
                            @csrf  
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" value="{{ $user['name']}}" class="form-control" placeholder="Enter Name" />
                                            @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                        </div>
                                    </div>
                                </div>                             
                                  
                                   <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="email" name="email" type="email" value="{{ $user['email']}}" class="validate form-control"
                                                placeholder="Email">
                                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                        </div>
                                    </div>
                                </div> 
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="phone" name="phone" type="number" value="{{ $user['phone']}}" class="validate form-control"
                                                placeholder="Mobile*">
                                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" placeholder="Password*" />
                                            @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                        </div>
                                    </div>
                                </div>  
                                     <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" />
                                            
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-line">
                                       <label>Department</label>
                                        <select name="department" class="form-control">
                                            <option value="" >Please select</option>
                                            @foreach($department as $departments)
                                            <
                                            <option value="{{ $departments->id }}" <?php if($departments->id==$user['department_id']){ echo "selected";}?>>{{ $departments->name }}</option>
                                            @endforeach
                                          
                                        </select>
                                       @error('department')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    </div></div>
                                </div>                         
                                
                            </div>
                            <div class="row clearfix">
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="designation" class="form-control" placeholder="designation*" />
                                @error('designation')
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
                                            <option value="" >Please select</option>
                                            <option value="1" <?php if($user['status'] == '1') { echo 'selected'; } ?>>Active</option>
                                    <option value="0" <?php if($user['status'] == '0') { echo 'selected'; } ?>>Inactive</option>
                                          
                                        </select>
                                       @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    </div></div>
                                </div>
                            </div>
                            
                            <div class="row">
                            
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                               <a href="{{route('users.index')}}" class="btn btn-danger waves-effect">
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