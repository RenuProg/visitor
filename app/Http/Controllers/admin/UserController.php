<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\DepartmentModel;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::where('department_id','!=',null)->get();
        
        

        return view('admin.users.all_user',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

        $data['department']=DepartmentModel::all();
        //dd($data);
        
        return view('admin.users.add_user',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request);
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'phone'=>'required|numeric',
            'password'=>'required',
            'department'=>'required',
            'designation'=>'required',
            'status'=>'required'
        ]);
        $users = User::create([
            'name' => $request['name'],
            'email' => $request['email'],            
            'password' => Hash::make($request['password']),            
            'phone'=>$request['phone'],
            'designation'=>$request['designation'],
            'department_id'=>$request['department'],
            'status'=>$request['status']

        ]);

        return redirect('admin/users')->with('success','User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['department']=DepartmentModel::all();
        $data['user']=User::where('id',$id)->first();
        //dd($data);
        
         return view('admin.users.edit_user',$data);
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
        
        $user=User::find($id);
        //dd($user);
        if($request['password']!=""){
             $request->validate([
            'name' => 'required',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required|required_with:confirm_password|same:confirm_password',
            'department'=>'required',
            'designation'=>'required',
            'status'=>'required'
            
        ]);
            $user['name']=$request['name'];
            $user['email']=$request['email'];
            $user['phone']=$request['phone'];
            $user['password']=Hash::make($request['password']);
            $user['designation']=$request['designation'];
            $user['department_id']=$request['department'];
            $user['status']=$request['status'];


        }else{
             $request->validate([
            'name' => 'required',
            'email'=>'required|email',
            'phone'=>'required', 
            'department'=>'required',
            'designation'=>'required',
            'status'=>'required'           
            
        ]);
            $user['name']=$request['name'];
            $user['email']=$request['email'];
            $user['phone']=$request['phone'];
            $user['designation']=$request['designation'];
            $user['department_id']=$request['department'];
            $user['status']=$request['status'];

        }
        $user->save();
        
           return redirect('admin/users')->with('success','User updated successfully!');  

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect('admin/users')->with('success','User deleted successfully!');  


    }
}
