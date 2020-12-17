 @extends('admin.layouts.master')
 @section('title', 'Visitor Report')
@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Export Report</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Visit Report</a>
                            </li>
                            <li class="breadcrumb-item active">Export Report</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                <strong style="color: #fff;">Export Report</strong></h1>
                            <ul class="header-dropdown m-r--5">
                                <div class="col-lg-12 p-t-20 text-center">
                           
                            </div>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                        <b>Start Date</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                               <input type="date" id="min-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">
                                            </div>
                                        </div>
                                    </div>
                               <div class="col-md-4">
                                        <b>End Date</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="date"  id="max-date" class="form-control date-range-filter"  data-date-format="yyyy-mm-dd" placeholder="To:">
                                            </div>
                                        </div>
                                    </div>
                                   <!--  <div class="col-md-4">
                                       
                                        <div class="input-group">
                                            <button type="button" class="btn btn-primary waves-effect m-r-15" >Import</button>
                                        </div>

                                    </div> -->
                                  
                                   
                                </div> 
                               
                            </div>
                            
                            <div class="row clearfix">
                            </div>
                            
                            <div class="row">
                        
                            </div>
                            <div class="body">
                               <div class="table-responsive">
    
    <table width="100%" class="display table table-hover js-basic-example contact_list" id="my-table" cellspacing="0">
        <thead>
            <tr>
              <th class="center">Visit ID</th>
                                                   <th class="center"> Name </th>
                                                   <th class="center"> Visit Date </th>
                                                   <th class="center"> Check In </th>
                                                   <th class="center"> Check Out </th>
                                                   <th class="center"> Department </th>
                                                   <th class="center"> Purpose Of Visit </th>
                                                   <th class="center"> Vehicle No</th>
               
                
            </tr>
        </thead>
        <tbody >
            @foreach($data as $visit)
            <tr class="gradeX odd" role="row">
                <td id="data_table">{{ $visit->visit_no}}</td>
                <td id="data_table">{{ $visit->visitor_name}}</td>
                <td id="data_table">{{ $visit->created_at}}</td>
               
                <td id="data_table">{{ $visit->check_in_time}}</td>
                <td id="data_table">{{ $visit->check_out_time }}</td>
                <td id="data_table">{{ $visit->department_name }}</td>
                <td id="data_table">{{ $visit->visit_purpose}}</td>
                <td id="data_table">{{ $visit->vehicle_no}}</td>
                
              
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
    </section>
    @endsection
    @section('scripts')


@stop
