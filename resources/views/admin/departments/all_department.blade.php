 @extends('admin.layouts.master')
 @section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">All Department</h4>
                            </li>
                           <!--  <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="{{route('department.index')}}" onClick="return false;">Department</a>
                            </li>
                            <li class="breadcrumb-item active">All Department</li> -->
                        </ul>
                    </div>
                </div>
            </div>
             @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>All</strong> Users
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" onClick="return false;">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                     <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            
                                            <th class="center">Department Name</th>
                                            <th class="center">Status</th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($department as $departments)
                                        <tr class="odd gradeX">
                                            <td class="table-img center">
                                              {{$i+1}}
                                            </td>

                                            <td class="center">{{$departments->name}}</td>

                                            <td class="center">
                                                <?php
                                                if($departments->status == '1'){
                                                   $status="Active";
                                                }else{
                                                   $status="Inactive";
                                                }
                                               
                                                 ?>
                                                {{$status}}</td>

                                            <td class="center">
                                                <form action="{{route('department.destroy', [$departments->id])}}" method="POST">
                                             @method('DELETE')
                                             @csrf
                                                <a href="{{route('department.edit', [$departments->id])}}" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                
                                             <button type="submit" class="btn btn-tbl-delete"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="material-icons">delete_forever</i></button>               
                                            </form>
                                            </td>
                                        </tr>
                                         <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="center">Department  Name </th>
                                            <th class="center">Status</th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection