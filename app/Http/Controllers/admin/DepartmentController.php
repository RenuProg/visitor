<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DepartmentModel;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department= DepartmentModel::all();
       // dd($departments);
        return view('admin.departments.all_department',['department'=>$department]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.add_department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $this->validate(request(), [
            'name' => 'required',
            'status' => 'required',
            
        ]);  
        $department = DepartmentModel::create([
            'name' => $request['name'],
            'status' => $request['status'],

        ]);

        return redirect('admin/department')->with('success','User created successfully!');
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
        $department=DepartmentModel::where('id',$id)->first();
        //dd($department);
        
         return view('admin.departments.edit_department',['department'=>$department]);
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
         $department=DepartmentModel::find($id);
        //dd($user);
        
             $request->validate([
            'name' => 'required',
            'status'=>'required',            
            
        ]);
            $department['name']=$request['name'];
           
            $department['status']=$request['status'];

        
        $department->save();
        
           return redirect('admin/department')->with('success','department updated successfully!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department=DepartmentModel::find($id);
        $department->delete();
        return redirect('admin/department')->with('success','department deleted successfully!'); 
    }
}
