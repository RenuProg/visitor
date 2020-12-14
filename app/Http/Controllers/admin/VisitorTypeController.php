<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VisitorType;

class VisitorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $visitor_type= VisitorType::all();
       // dd($departments);
        return view('admin.visitor_type.all_visitor_type',['visitor_type'=>$visitor_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visitor_type.add_visitor_type');
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
        $visitor_type = VisitorType::create([
            'name' => $request['name'],
            'status' => $request['status'],

        ]);

        return redirect('admin/visitor_type')->with('success',' Visitor Type successfully!');
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
        $visitor_type=VisitorType::where('id',$id)->first();
        //dd($department);
        
         return view('admin.visitor_type.edit_visitor_type',['visitor_type'=>$visitor_type]);
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
       $visitor_type=VisitorType::find($id);
        //dd($user);
        
             $request->validate([
            'name' => 'required',
            'status'=>'required',            
            
        ]);
            $visitor_type['name']=$request['name'];
           
            $visitor_type['status']=$request['status'];

        
        $visitor_type->save();
        
           return redirect('admin/visitor_type')->with('success','Visitor Type updated successfully!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor_type=VisitorType::find($id);
        $visitor_type->delete();
        return redirect('admin/visitor_type')->with('success','Visitor Type deleted successfully!');
    }
}
