@extends('admin.layouts.master')
@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">All Visits</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Visits</a>
                            </li>
                            <li class="breadcrumb-item active">All Visits</li>
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
                                <strong>All</strong> Visits
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
                                            <th class="center">Visitor ID</th>
                                            <th class="center"> Name </th>
                                            
                                            <th class="center">Phone</th>
                                            <th class="center">Email</th>
                                            <th class="center"> Gender </th>
                                            <th class="center"> Registor Date</th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @foreach($visitor as $visitors)
                                      
                                        <tr class="gradeX odd" role="row">
                                            
                                            <td class="center">#{{ $visitors->visitor_no}}</td>
                                            <td class="center">{{ $visitors->first_name}}</td>
                                            <td class="center">{{ $visitors->phone}}</td>
                                            <td class="center">{{ $visitors->email}}</td>
                                            <td class="center">{{ $visitors->gender}}</td>
                                            
                                            <td class="center">{{ $visitors->register_date}}</td>
                                           
                                            <td class="center">
                                                <form action="{{route('visitors.destroy', [$visitors->id])}}" method="POST">
                                             @method('DELETE')
                                             @csrf
                                                <a href="{{route('visitors.edit', [$visitors->id])}}" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                
                                             <button type="submit" class="btn btn-tbl-delete"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="material-icons">delete_forever</i></button>               
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                             <th class="center">Visitor ID</th>
                                            <th class="center"> Name </th>
                                            
                                            <th class="center">Phone</th>
                                            <th class="center">Email</th>
                                            <th class="center"> Gender </th>
                                            <th class="center"> Registor Date</th>
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