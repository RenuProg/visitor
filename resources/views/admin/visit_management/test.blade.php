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
               <!-- <li class="breadcrumb-item bcrumb-1">
                  <a href="../../index.html">
                      <i class="fas fa-home"></i> Home</a>
                  </li> -->
               <li class="breadcrumb-item bcrumb-2">
                  <a href="#" onClick="return false;">Visitor</a>
               </li>
               <li class="breadcrumb-item active">Add Visitor</li>
            </ul>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="header">
               <h1>
                  <!-- <strong style="color: #fff; font-size: 28px">Visitor ID #00786</strong> -->
                  <div class="tabs-wrapper">
                     <ul class="nav classic-tabs tabs-cyan" role="tablist">
                        <li class="nav-item ">
                           <a class="nav-link waves-light active btn1" id="myDIV"  data-toggle="tab" href="#panel1" role="tab">Add New</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel2" role="tab">Search</a>
                        </li>
                     </ul>
                  </div>
               </h1>
               <ul class="header-dropdown m-r--5">
                  <div class="col-lg-12  text-center">
                     <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".bd-example-modal-lg">Add Visit</button>
                  </div>
               </ul>
            </div>
            <div class="tab-content card">
               <div class=" tab-pane fade in show active" id="panel1" role="tabpanel">
                  <form action="{{ route('visitors.store')}}" method="post">
                     @csrf
                     <div class="body">
                        <div class="row clearfix">
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <div class="form-line">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" />
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <div class="form-line">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" />
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <div class="form-line">
                                    <?php
                                       $Date = date('Y-m-d'); ?>
                                    <input type="text"  name="register_date" class="datepicker form-control"
                                       value="<?php echo $Date ; ?>" disabled="true">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row clearfix">
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <div class="form-line">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" />
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <div class="form-line">
                                    <input id="email" type="email" name="email" class="validate form-control"
                                       placeholder="Email">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-4">
                              <div class="form-group form-float">
                                 <div class="form-line">
                                    <select class="form-control" name="gender">
                                       <option value="">Gender</option>
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
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
                                       placeholder="Address"></textarea>
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
               <div class="tab-pane fade " id="panel2" role="tabpanel">
                  <!-- search for -->
                  <div class="col-sm-4">
                     <div class="form-group">
                        <div class="form-line">
                           <input type="text" name="search" id="search_phone" class="form-control" placeholder="Search Phone Number" />
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-8"  id="visitor_data">
                  </div>
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                           <div class="header">
                              <h2>
                                 <strong>Visitor History</strong>
                              </h2>
                              <ul class="header-dropdown m-r--5">
                                 <li class="dropdown">
                                    <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                       <li>
                                          <a href="#" onclick="return false;">Action</a>
                                       </li>
                                       <li>
                                          <a href="#" onclick="return false;">Another action</a>
                                       </li>
                                       <li>
                                          <a href="#" onclick="return false;">Something else here</a>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                           <div class="body">
                              <div class="table-responsive">
                                 <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                       <div class="col-sm-12 col-md-6">
                                          <div class="dataTables_length" id="DataTables_Table_0_length">
                                             <label>
                                                Show 
                                                <div class="select-wrapper focused">
                                                   <ul id="select-options-97da84b3-6e1f-6f17-b6e9-f2fcc6d977e3" class="dropdown-content select-dropdown" tabindex="0" style="">
                                                      <li id="select-options-97da84b3-6e1f-6f17-b6e9-f2fcc6d977e30" tabindex="0" class="selected"><span>10</span></li>
                                                      <li id="select-options-97da84b3-6e1f-6f17-b6e9-f2fcc6d977e31" tabindex="0"><span>25</span></li>
                                                      <li id="select-options-97da84b3-6e1f-6f17-b6e9-f2fcc6d977e32" tabindex="0"><span>50</span></li>
                                                      <li id="select-options-97da84b3-6e1f-6f17-b6e9-f2fcc6d977e33" tabindex="0"><span>100</span></li>
                                                   </ul>
                                                   <svg class="caret" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M7 10l5 5 5-5z"></path>
                                                      <path d="M0 0h24v24H0z" fill="none"></path>
                                                   </svg>
                                                   <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm" tabindex="-1">
                                                      <option value="10">10</option>
                                                      <option value="25">25</option>
                                                      <option value="50">50</option>
                                                      <option value="100">100</option>
                                                   </select>
                                                </div>
                                                entries
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <table class="table table-hover js-basic-example contact_list" id="my-table">
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
                                                   <th class="center"> Action </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                @foreach($visitor_history as $history)
                                                <tr class="gradeX odd" role="row">
                                                   <td class="center">{{$history->visit_no}}</td>
                                                   <td class="center">{{$history->visitor_name}}</td>
                                                   <td class="center">{{ $history->register_date}}</td>
                                                   <td class="center">{{ $history->check_in_time}}</td>
                                                   <td class="center">{{ $history->check_out_time}}</td>
                                                   <td class="center">{{$history->department_name}}</td>
                                                   <td class="center">{{ $history->visit_purpose}}</td>
                                                   <td class="center">{{ $history->vehicle_no}}</td>
                                                   <td class="center">
                                                      <form action="{{route('visitors.delete_visit', [$history->id])}}" method="POST">
                                                         @method('DELETE')
                                                         @csrf
    <a href="edit-employee.html" class="btn btn-tbl-edit edit_visit" data-toggle="modal" data-target=".ed-example-modal-lg" data-id="{{ $history->id }}" data-department="{{ $history->department_id}}" data-purpose="{{ $history->visit_purpose_id}}">
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
                                                   <th class="center">Visit ID</th>
                                                   <th class="center"> Name </th>
                                                   <th class="center"> Visit Date </th>
                                                   <th class="center"> Check In </th>
                                                   <th class="center"> Check Out </th>
                                                   <th class="center"> Department </th>
                                                   <th class="center"> Purpose Of Visit </th>
                                                   <th class="center"> Vehicle No</th>
                                                   <th class="center"> Action </th>
                                                </tr>
                                             </tfoot>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-5">
                                          <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div>
                                       </div>
                                       <div class="col-sm-12 col-md-7">
                                          <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                             <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- #START# Large Modal-->
<!--add visit model open-->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
   <p>Large Modal</p>
   <button type="button" class="btn btn-primary" data-toggle="modal"
      data-target=".bd-example-modal-lg">Large
   Modal</button>
   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
      aria-labelledby="myLargeModalLabel" aria-hidden="true" id="hide_model">
      <div class="modal-dialog modal-lg">
         <div class="modal-content" style="border-radius: 15px !important;">
            <div class="modal-header">
               <h2 class="modal-title" id="myLargeModalLabel" style="text-align: center; color:#000;padding-left: 45%">Create Visit</h2>
               <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="card">
                        <div class="header">
                           <label>Visitor Name:</label>
                           <h2 style="color:#fff; margin-bottom: 7px" id="visitorfistname"></h2>
                           <label>Visitor Id:</label>
                           <h2 style="color:#fff" id="visitorNo"></h2>
                        </div>
                        <div class="body">
                           <form method="POST" action="" id="visitform" enctype="multipart/form-data">
                              @csrf
                              <div class="row clearfix">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line"  style="margin-top: 26px;">
                                          <select class="form-control" id="department_id" name="department_id">
                                             <option  value="">Select Department</option>
                                             @foreach($department as $departments)
                                             <option value="{{$departments->id}}">{{$departments->name}}</option>
                                             @endforeach
                                          </select>
                                          <span id="d_error"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line"  style="margin-top: 26px;">
                                          <select class="form-control" name="user_id" id="user_id">
                                          </select>
                                          <span id="u_error"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row clearfix">
                                 <div class="col-md-4">
                                    <input type="hidden" name="visitor_id" id="vistorId">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <select class="form-control" name="visitor_type" id="visitor_type_id">
                                             <option value="">Visitor Type</option>
                                             @foreach($visitor_type as $visitor_types)
                                             <option value="{{$visitor_types->id}}">{{$visitor_types->name}}</option>
                                             <@endforeach
                                          </select>
                                          <span id="v_t_error"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <input type="text" id="datepicker" name="end_date" class="datepicker2 form-control" placeholder="End Date"
                                             required />                 
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <input type="text" name="visiting_area" class="form-control" placeholder="Visiting Area" id="visiting_area">
                                          <span id="v_area_error"> </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row clearfix">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <h5>Check In Time</h5>
                                          <input type="time" id="check_in_time" name="check_in_time"  class="form-control " placeholder="Check in Time">
                                          <span id="c_in_error"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <h5>Check Out Time</h5>
                                          <input type="time" id="check_out_time" name="check_out_time" class="form-control" placeholder="Check Out Time">
                                          <span id="c_out_error"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row clearfix">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <select class="form-control" id="purpose_id" name="purpose_id">
                                             <option  selected="">Purpose Of Visit</option>
                                             @foreach($visit_purpose as $purpose)
                                             <option value="{{$purpose->id}}">{{$purpose->name}}</option>
                                             @endforeach
                                          </select>
                                          <span id="P_v_error"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <select class="form-control" name="vehicle_type">
                                             <option  selected="">Vehicle Type</option>
                                             <option>Two Wheeler</option>
                                             <option>Three Wheeler</option>
                                             <option>Four Wheeler</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <input type="text" name="remarks" class="form-control" placeholder="Remarks*">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row clearfix">
                                 <div class="col-md-4">
                                    <div class="capture" id="">
                                       <img src="/admin_assets/images/capture.png" id="image-tag">
                                       <!-- <input type="text" name="image" id="image-tags"> -->
                                    </div>
                                    <div class="col-md-6">
                                       <div id="my_camera"></div>
                                       <br/>
                                       <input type="button" value="Access Camera" onClick="setup(); $(this).hide().next().show();">
                                       <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                       <input type="hidden" name="image" class="image-tag">
                                    </div>
                                    <div class="col-md-6">
                                       <div id="results">Your captured image will appear here...</div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <input type="text" name="vehicle_no" class="form-control" placeholder="Vehicle No">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row clearfix">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <button type="submit" Style="width:123px;float:right" class="btn btn-primary waves-effect m-r-15" download>Submit & Print</button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <div class="form-line">
                                          <button type="button"  Style="width:123px; float:right;margin-right:5% "  class="btn btn-danger waves-effect">Cancel Visit</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--add visit model end-->
<!-- #END# Large Modal-->

<!--edit visit model open-->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
   <p>Large Modal</p>
   <button type="button" class="btn btn-primary" data-toggle="modal"
      data-target=".ed-example-modal-lg">Large
   Modal</button>
   <div class="modal fade ed-example-modal-lg" tabindex="-1" role="dialog"
      aria-labelledby="myLargeModalLabel" aria-hidden="true" id="hide_model">
      <div class="modal-dialog modal-lg">
         <div class="modal-content" style="border-radius: 15px !important;">
            <div class="modal-header">
               <h2 class="modal-title" id="myLargeModalLabel" style="text-align: center; color:#000;padding-left: 45%">Edit Visit</h2>
               <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
          <!--   <div id="appenddata"></div> -->
          
           
         </div>
      </div>
   </div>
</div>
<!--edit visit model end-->
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- 
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<script type="text/javascript">
   $(document).ready(function(){
   
    //fetch_customer_data();
    // code for fetch search data
   
    function fetch_customer_data(query = '')
    {
   
     $.ajax({
      url:"{{route('visitors.search')}}",
      method:'POST',
      data:{query:query,"_token": "{{ csrf_token() }}"},
      dataType:'json',
      success:function(data)
      {
       //alert(data);
        $('#visitor_data').html(data.visitor);
       // $('#total_records').text(data.total_data);
      }
     })
    }
   
    $(document).on('focusout', '#search_phone', function(){
     var query = $(this).val();
     //alert(query);
     fetch_customer_data(query);
    });
    $(document).on('click','.add_visit',function(){
       var id = $(this).data('id');
       $('#vistorId').val(id);
       var first_name= $(this).data('first_name');
       $('#visitorfistname').text(first_name);
       var visitor_no = $(this).data('visitor_id');
       $('#visitorNo').text(visitor_no);
   
   
    })
   });

   // select department in model
   $(document).ready(function () {
   $('#department_id').on('change',function(e) {
   var cat_id = e.target.value;
   //alert(cat_id);
   $.ajax({
   url:"{{route('visitors.getuser')}}",
   method:"POST",
   dataType:'json',
   data: {
   cat_id: cat_id,"_token": "{{ csrf_token() }}"
   },
   success:function (data) {
       //alert(data.user);
   $('#user_id').html(data.user);
   
   }
   })
   });
   });
   
   
</script>
<!-- Configure a few settings and attach camera for take picture-->
<script language="JavaScript">
   Webcam.set({
       width: 490,
       height: 390,
       image_format: 'jpeg',
       jpeg_quality: 90
   });
   function setup() {
           Webcam.reset();
           Webcam.attach( '#my_camera' );
       }
   
   //Webcam.attach( '#my_camera' );
   
   function take_snapshot() {
       Webcam.snap( function(data_uri) {
           $(".image-tag").val(data_uri);
           document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
       } );
   }
</script>
  <!--datepicker -->
<script>

   $( function() {
     $( "#datepicker" ).datepicker({minDate: new Date()});
   } );
   
</script>
<!--validation after submit add visit form-->
<script type="text/javascript">
   $(document).ready(function(){
     $(document).on('submit','#visitform',function(event){
   event.preventDefault();
   //alert("hello");
   var department_id=$('#department_id').val();
   var user_id=$('#user_id').val();
   var visitor_type_id=$('#visitor_type_id').val();
   
   var visiting_area= $('#visiting_area').val();
   var check_in_time= $('#check_in_time').val();
   var check_out_time= $('#check_out_time').val();
   var purpose_id = $('#purpose_id').val();
   //alert(department_id);
   var err=0;
   if(department_id==""){
     err=1;
     $('#d_error').html('<span style="color:red">Department is required</span>');
     return false;
   }else{
     $('#d_error').html();
   }
   if(user_id==""){
     err=1;
     $('#u_error').html('<span style="color:red">User is required</span>');
     return false;
   }else{
     $('#u_error').html();
   }
   if(visitor_type_id==""){
     err=1;
     $('#v_t_error').html('<span style="color:red">Vsitor Type is required</span>');
     return false;
   }else{
     $('#v_t_error').html();
   }
   
   if(visiting_area==""){
     err=1;
     $('#v_area_error').html('<span style="color:red">Visiting Area is required</span>');
     return false;
   }else{
     $('#v_area_error').html();
   }
   if(check_in_time==""){
     err=1;
     $('#c_in_error').html('<span style="color:red">Check In Time is required</span>');
     return false;
   }else{
     $('#c_in_error').html();
   }
   if(check_out_time==""){
     err=1;
     $('#c_out_error').html('<span style="color:red">Check Out Time is required</span>');
     return false;
   }else{
     $('#c_out_error').html();
   }
   if(purpose_id==""){
     err=1;
     $('#p_v_error').html('<span style="color:red">Purpose is required</span>');
     return false;
   }else{
     $('#p_v_error').html();
   }
   // submit add visit form data
   if(err==0){
     $.ajax({
   url:"{{route('visitors.addVisit')}}",
   method:'POST',
   data:$('#visitform').serialize(),
   dataType:'json',
   success:function(data)
   {
   
   //alert(data);
   if(data.sus==1){
     $('#visitform').trigger("reset");
     $('#hide_model').hide();
     Swal.fire(
   'Good job!',
   'Data saved Successfully!',
   'success'
   );
     location.reload(true);
   
   // $('#visitor_data').html('<img src="'+data.qr+'" >');
   // $('#sus').html(data.total_data);
   }else{
     Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: 'Something went wrong!',
   
   })
   }
   // $('#total_records').text(data.total_data);
   // $('#sus').html(data.total_data);
   }
   })
   }
   })
   
   })
</script>
<!-- on click edit fetch id of visit -->
<script type="text/javascript">
    $(document).on('click','.edit_visit',function(){
       var id = $(this).data('id');
       var department_id=$(this).data('department');
       // alert(department_id);
       $('#visitId').val(id);

       $.ajax({
   url:"{{ route('getupdatedata')}}",
   method:'POST',
   data:{id:id,"_token": "{{ csrf_token() }}"},
   dataType:'json',
   success:function(data)
   {
    alert(data);
   }
});
      
   
   
    })
</script>

<script type="text/javascript">
   $(document).ready(function(){
     $(document).on('submit','#editvisitform',function(event){
   event.preventDefault();
   
   var dep_id=$('#dep_id').val();
   //alert(department_id);
   var u_id=$('#u_id').val();
   var visit_id= $('#visitId').val();
   //alert(u_id);
   var visitor_t_id=$('#visitor_t_id').val();
   
   // var visiting_area= $('#visiting_area').val();
   // var check_in_time= $('#check_in_time').val();
   // var check_out_time= $('#check_out_time').val();
   // var purpose_id = $('#purpose_id').val();
   //alert(department_id);
   var err=0;
   if(dep_id==""){
     err=1;
     $('#dep_error').html('<span style="color:red">Department is required</span>');
     return false;
   }else{
     $('#dep_error').html();
   }
   if(u_id==""){
     err=1;
     $('#user_error').html('<span style="color:red">User is required</span>');
     return false;
   }else{
     $('#user_error').html();
   }
   if(visitor_t_id==""){
     err=1;
     $('#visitor_t_error').html('<span style="color:red">Vsitor Type is required</span>');
     return false;
   }else{
     $('#visitor_t_error').html();
   }
   
   // if(visiting_area==""){
   //   err=1;
   //   $('#v_area_error').html('<span style="color:red">Visiting Area is required</span>');
   //   return false;
   // }else{
   //   $('#v_area_error').html();
   // }
   // if(check_in_time==""){
   //   err=1;
   //   $('#c_in_error').html('<span style="color:red">Check In Time is required</span>');
   //   return false;
   // }else{
   //   $('#c_in_error').html();
   // }
   // if(check_out_time==""){
   //   err=1;
   //   $('#c_out_error').html('<span style="color:red">Check Out Time is required</span>');
   //   return false;
   // }else{
   //   $('#c_out_error').html();
   // }
   // if(purpose_id==""){
   //   err=1;
   //   $('#p_v_error').html('<span style="color:red">Purpose is required</span>');
   //   return false;
   // }else{
   //   $('#p_v_error').html();
   // }
   // submit add visit form data
   if(err==0){
    
     $.ajax({
   url:"{{ route('visitors.editVisit')}}",
   method:'POST',
   data:$('#editvisitform').serialize(),
   dataType:'json',
   success:function(data)
   {
   
   //alert(data);
   if(data.sus==1){
     $('#editvisitform').trigger("reset");
     $('#hide_model').hide();
     Swal.fire(
   'Good job!',
   'Data saved Successfully!',
   'success'
   );
     location.reload(true);
   
   // $('#visitor_data').html('<img src="'+data.qr+'" >');
   // $('#sus').html(data.total_data);
   }else{
     Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: 'Something went wrong!',
   
   })
   }
   // $('#total_records').text(data.total_data);
   // $('#sus').html(data.total_data);
   }
   })
   }
   })
   
   })
   //edit get user after department select
   $(document).ready(function () {
   $('#dep_id').on('change',function(e) {
   var cat_id = e.target.value;
   //alert(cat_id);
   $.ajax({
   url:"{{route('visitors.getuser')}}",
   method:"POST",
   dataType:'json',
   data: {
   cat_id: cat_id,"_token": "{{ csrf_token() }}"
   },
   success:function (data) {
       //alert(data.user);
   $('#u_id').html(data.user);
   
   }
   })
   });
   });
</script>
@stop