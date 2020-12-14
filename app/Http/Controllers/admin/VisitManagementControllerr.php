<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VisitPurpose;
use App\DepartmentModel;
use App\VisitorType;
use App\Visits;
use App\User;

use DB;


class VisitManagementControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['department']=DepartmentModel::all();
        //  $data['visitor_type']=VisitorType::all();
        //   $data['visit_purpose']=VisitPurpose::all();

       
        // return view('admin.visit_management.add_visit_management',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    /**
        GET UPDATE DATA CODE START
    */
        public function getupdatedata(Request $request){
            $visitData=array();

           $department=DepartmentModel::all();
          $visitor_type=VisitorType::all();
         $visit_purpose=VisitPurpose::all();
         $user=User::where('department_id','!=',null)->get();

         ////dd($department);
        $visit=Visits::where('id',$request->id)->get();

        
       

          $visitData['visit']=$visit;
          $visitData['department']=$department;
          $visitData['visitor_type']=$visitor_type;
           $visitData['visit_purpose']=$visit_purpose;
           $visitData['user']=$user;
            echo json_encode($visitData);
    
        }
}
