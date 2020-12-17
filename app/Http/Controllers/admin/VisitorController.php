<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitor;
use App\DepartmentModel;
use App\VisitorType;
use App\VisitPurpose;
use App\User;
use App\Visits;
use App\Notification;
use QRCode;
use File;
use Mail;
class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['visitor']=Visitor::all();
        return view('admin.visit_management.all_visit_management',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['department']=DepartmentModel::all();
        $data['visitor_type']=VisitorType::all();
    $data['visit_purpose']=VisitPurpose::all();

    $data['visitor_history']=Visits::query()
       ->leftjoin('visitors', 'visitors.id', '=', 'visits.visitor_id')
       ->leftjoin('departments', 'departments.id', '=', 'visits.department_id')
       ->leftjoin('visitor_type', 'visitor_type.id', '=', 'visits.visitor_type_id')
       ->leftjoin('visit_purpose', 'visit_purpose.id', '=', 'visits.visit_purpose_id')
       ->leftjoin('users', 'users.id', '=', 'visits.user_id')
      
       ->get(['visits.*','departments.name as department_name','visitors.first_name as visitor_name','visitors.register_date','visitor_type.name as visitor_type ','visit_purpose.name as visit_purpose','users.name as assign_to']);
       //dd($data['visitor_history']);
        return view('admin.visit_management.add_visit_management',$data);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone'=>'required|unique:visitors,phone'            
        ]);  
           
        
        $Date = date('Y-m-d'); 
        $visitor = new Visitor();
            $visitor->first_name = $request['first_name'];
            $visitor->last_name = $request['last_name'];
            $visitor->email = $request['email'];
            $visitor->phone = $request['phone'];
            $visitor->gender = $request['gender'];
            $visitor->address= $request['address'];
            $visitor->register_date= $Date;
            
        $visitor->save();
        
        $rand = mt_rand(1000, 9999);
        $visitor->visitor_no=$rand.$visitor['id'];
        $visitor->save();

        return redirect('admin/visitors')->with('success','Visit Added successfully!');
        //dd($request);
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
        $data['visitor']=Visitor::find($id);

        return view('admin.visit_management.edit_visit_management',$data);
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
        $visitor= Visitor::find($id);
         $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone'=>'required'
            
        ]);  
        
            $visitor->first_name = $request['first_name'];
            $visitor->last_name = $request['last_name'];
            $visitor->email = $request['email'];
            $visitor->phone = $request['phone'];
            $visitor->gender = $request['gender'];
            
            
        $visitor->save();
        return redirect('admin/visitors')->with('success','Visitor Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor=Visitor::find($id);
        $visitor->delete();
        return redirect('admin/visitors')->with('success','Visitor deleted successfully!');
    }
    public function searchVisitor(Request $request){
        //dd($request['query']);
        $data=array();
        $visitor="";

        $query=Visitor::where('phone','=',$request['query'])->first();
        
    if(!empty($query)){
        
          $visitor .= '
          <ul class="header-dropdown m-r--5">
          <div class="col-lg-12  text-center">
          <a href="" class="btn btn-primary add_visit" data-id="'.$query->id.'"  data-first_name="'.$query->first_name.'" data-last_name="'.$query->last_name.'" data-visitor_id="'.$query->visitor_no.'" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Add Visit</a>
                                
                            </div>
                            </ul>
          <table>
         <tr>
         <td>Name</td>
         <td>'.$query->first_name.'</td>
         </tr>
         <tr>
         <td>Email:</td>
          <td>'.$query->email.'</td>
          </tr><tr>
         <td>adress</td>
         <td>'.$query->address.'</td>
         </tr><tr>
         <td>Phone</td>
          <td>'.$query->phone.'</td>
         </tr>
         <tr>
        
        </table>
        ';
     }else{

         $visitor.='<table>
         
         <tr >
           <td colspan="4" align="center"> no data found </td>
         </tr>
         </table>';

    }
    //dd($visitor);
    $data['visitor']=$visitor;
     echo json_encode($data);
     }
     public function getUser(Request $request)
    {
         //dd($request);
        $data=array();
        $parent_id = $request->cat_id;
         $visitor='';
        $subcategories = User::where('department_id',$parent_id)->get();
        foreach ($subcategories as $key => $value) {
        $visitor .='<option value="'.$value->id.'"> '.$value->name.'</option>';
            # code...
        }

       $data['user']=$visitor;
     echo json_encode($data);
    }
    public function addVisit(Request $request){
         //dd($request);
        //dd(date('Y-m-d',strtotime($request['end_date'])));
        
        $q_data['visitor_data']=Visitor::where('id',$request['visitor_id'])->first();
        $q_data['purpose_data']=VisitPurpose::where('id',$request['purpose_id'])->first();
        $q_data['visitor_type']=VisitorType::where('id',$request['visitor_type'])->first();
        $q_data['department_data']=DepartmentModel::where('id',$request['department_id'])->first();
        $q_data['User_data']=User::where('id',$request['user_id'])->first();

         //dd($q_data)
         $qrcode="visit_qrcode/".uniqid().'.png';
        $visitor_id=$request['vistor_id'];
        $vdata ="Visitor ID=".$q_data['visitor_data']['visitor_no']."\n Name =".$q_data['visitor_data']['last_name']."".$q_data['visitor_data']['first_name']." \nEmail =".$q_data['visitor_data']['email']." \nPhone Number=".$q_data['visitor_data']['phone']." \nVisit Purpose=".$q_data['purpose_data']['name']." \nVisit Department=".$q_data['department_data']['name']."  \nVisitor Type=".$q_data['visitor_type']['name']."\nCheckin Time=".$request['check_in_time']."\nCheckout Time=".$request['check_out_time']."\nQRCode Expire Date=".date('Y-m-d',strtotime($request['end_date']))."\nVisiting Area=".$request['visiting_area']."\nAssign To=".$q_data['User_data']['name']."\nVehicle Type=".$request['vehicle_type']."\nVehicle No=".$request['vehicle_no']."";
        //dd($vdata);
        QRCode::text($vdata)
        ->setSize(8)
        ->setMargin(2)
        ->setOutFile($qrcode)
        ->png();

            $img = $request->image;   
            $folderPath = "upload/";  
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
          
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
          
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);
          
            //print_r($fileName);
            $visits = new Visits;
            //dd($visits);
                      $visits->qr_code=$qrcode;
                      $visits->user_id= $request['user_id'];
                      $visits->department_id = $request['department_id'];
                      $visits->visitor_type_id=$request['visitor_type'];
                      $visits->image=$file;
                      $visits->end_date=date('Y-m-d',strtotime($request['end_date']));
                     $visits->visiting_area=$request['visiting_area'];
                     $visits->check_in_time=$request['check_in_time'];
                     $visits->check_out_time=$request['check_out_time'];
                     $visits->visit_purpose_id=$request['purpose_id'];
                     $visits->visitor_id =$request['visitor_id'];
                     $visits->visiting_area=$request['visiting_area'];
                     $visits->vehicle_type=$request['vehicle_type'];
                     $visits->vehicle_no=$request['vehicle_no'];
                     $visits->remarks=$request['remarks'];

                 $visits->save();
                $rand = mt_rand(1000, 9999);
                $visits->visit_no=$rand.$visits['id'];
                $visits->save();
               
                
                 $recipient=array();
               $recipient['email']= $q_data['User_data']['email'];
                $recipient['code']=$visits->qr_code;
            Mail::send('admin.visit_management.qr_code_mail',$recipient, function ($message) use ($recipient) {
            $message->to($recipient['email'])->subject('QRCode code [Visit]');
         $message->attach($recipient['code']);
             $message->from("test@gmail.com");

             
         });
            
                 $data=array();
                 if($visits->id){
                    $data['qr']=$qrcode;
                    $data['sus']=1;
                    echo json_encode($data);
                 }else{

                    $data['sus']=0;
                    echo json_encode($data);
                 }    

    }
    public function delete_visit($id){

$visits=Visits::find($id);
//dd($visits['image']);

if ($visits != null) {
    if(file_exists(public_path($visits['image']))){

   File::delete(public_path($visits['image']));

    }
    if(file_exists(public_path($visits['qr_code']))){
         File::delete(public_path($visits['qr_code']));
    }
        $visits->delete();
        return redirect()->back();
    }
    }
    public function editVisit(Request $request){
     //dd($request);
     $visits=Visits::find($request['visit_id']);


      $q_data['visitor_data']=Visitor::where('id',$visits['visitor_id'])->first();
       //dd($q_data);
        $q_data['purpose_data']=VisitPurpose::where('id',$request['purpose_id'])->first();
        $q_data['visitor_type']=VisitorType::where('id',$request['visitor_type'])->first();
        $q_data['department_data']=DepartmentModel::where('id',$request['department_id'])->first();
        $q_data['User_data']=User::where('id',$request['user_id'])->first();
        //dd($q_data['purpose_data']['name']);
        $visitor_id=$request['vistor_id'];

        if($request->image != ""){
            if(file_exists(public_path($visits->image))){

           File::delete(public_path($visits->image));

           }
            $img = $request->image;   
            $folderPath = "upload/";  
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
          
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
          
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);



            $visits->image=$file;
          }
            //print_r($fileName);
            // $visits = new Visits;
            //dd($visits);

                     
                      $visits->user_id= $request['user_id'];
                      $visits->department_id = $request['department_id'];
                      $visits->visitor_type_id=$request['visitor_type'];
                      
                      $visits->end_date=date('Y-m-d',strtotime($request['end_date']));
                     $visits->visiting_area=$request['visiting_area'];
                     $visits->check_in_time=$request['check_in_time'];
                     $visits->check_out_time=$request['check_out_time'];
                     $visits->visit_purpose_id=$request['purpose_id'];
                     
                     $visits->visiting_area=$request['visiting_area'];
                     $visits->vehicle_type=$request['vehicle_type'];
                     $visits->vehicle_no=$request['vehicle_no'];
                     $visits->remarks=$request['remarks'];

                 $visits->save();

               //$rand = mt_rand(1000, 9999);
                //$visits->visit_no=$rand.$visits['id'];
                
                //dd($visits->check_in_time);

            $qrcode="visit_qrcode/".uniqid().'.png';
        $vdata ="Visitor ID=".$q_data['visitor_data']['visitor_no']."\n Name =".$q_data['visitor_data']['last_name']."".$q_data['visitor_data']['first_name']." \nEmail =".$q_data['visitor_data']['email']." \nPhone Number=".$q_data['visitor_data']['phone']." \nVisit Purpose=".$q_data['purpose_data']['name']." \nVisit Department=".$q_data['department_data']['name']."  \nVisitor Type=".$q_data['visitor_type']['name']."\nCheckin Time=".$visits->check_in_time."\nCheckout Time=".$request['check_out_time']."\nQRCode Expire Date=".date('Y-m-d',strtotime($visits->end_date))."\nVisiting Area=".$visits->visiting_area."\nAssign To=".$q_data['User_data']['name']."\nVehicle Type=".$visits->vehicle_type."\nVehicle No=".$visits->vehicle_no."";
        //dd($vdata);$visits->date('Y-m-d',strtotime($visits->end_date))
        QRCode::text($vdata)
        ->setSize(8)
        ->setMargin(2)
        ->setOutFile($qrcode)
        ->png();
        if($qrcode !=""){
            if(file_exists(public_path($visits->qr_code))){
         File::delete(public_path($visits->qr_code));
    }
        $visits->qr_code=$qrcode;
        $visits->save();
        $recipient=array();
               $recipient['email']= $q_data['User_data']['email'];
                $recipient['code']=$visits->qr_code;
            Mail::send('admin.visit_management.qr_code_mail',$recipient, function ($message) use ($recipient) {
            $message->to($recipient['email'])->subject('QRCode code [Visit]');
         $message->attach($recipient['code']);
             $message->from("test@gmail.com");
         });
    }
                 $data=array();
                 if($visits->id){
                    $data['qr']=$qrcode;
                    $data['sus']=1;
                    echo json_encode($data);
                 }else{

                    $data['sus']=0;
                    echo json_encode($data);
                 }    

    }

}
