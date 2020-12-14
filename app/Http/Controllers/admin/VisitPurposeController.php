<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VisitPurpose;

class VisitPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
public function index()
    {
        $data=array();
       $data['visit_purpose']= VisitPurpose::all();
       // dd($departments);
        return view('admin.visit_purpose.all_visit_purpose',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visit_purpose.add_visit_purpose');
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
        $visit_purpose = VisitPurpose::create([
            'name' => $request['name'],
            'status' => $request['status'],

        ]);

        return redirect('admin/visit_purpose')->with('success','User Visitor Purpose successfully!');
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
        $visit_purpose=VisitPurpose::where('id',$id)->first();
        //dd($department);
        
         return view('admin.visit_purpose.edit_visit_purpose',['visit_purpose'=>$visit_purpose]);
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
       $visit_purpose=VisitPurpose::find($id);
        //dd($user);
        
             $request->validate([
            'name' => 'required',
            'status'=>'required',            
            
        ]);
            $visit_purpose['name']=$request['name'];
           
            $visit_purpose['status']=$request['status'];

        
        $visit_purpose->save();
        
           return redirect('admin/visit_purpose')->with('success','Visitor Purpose updated successfully!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit_purpose=VisitPurpose::find($id);
        $visit_purpose->delete();
        return redirect('admin/visit_purpose')->with('success','Visitor Purpose deleted successfully!');
    }
}
