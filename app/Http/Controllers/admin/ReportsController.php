<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visits;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Visits::query()
       ->leftjoin('visitors', 'visitors.id', '=', 'visits.visitor_id')
       ->leftjoin('departments', 'departments.id', '=', 'visits.department_id')
       ->leftjoin('visitor_type', 'visitor_type.id', '=', 'visits.visitor_type_id')
       ->leftjoin('visit_purpose', 'visit_purpose.id', '=', 'visits.visit_purpose_id')
       ->leftjoin('users', 'users.id', '=', 'visits.user_id')
      
       ->get(['visits.*','departments.name as department_name','visitors.first_name as visitor_name','visitors.register_date','visitor_type.name as visitor_type ','visit_purpose.name as visit_purpose','users.name as assign_to']);
       //dd($data);
        return view('admin.reports.report')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
