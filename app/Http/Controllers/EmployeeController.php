<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use Validator;
use DB;
use Response;
use Hash;
use Auth;
use App\EmployeeCovidStatus;
 
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }

    public function findall(request $request)
    {
        if($request['module'] == 'modal'){
            $results = Employee::join('users', 'users.employee_id', 'employees.id')
                ->select('employees.id as employee_id','users.id as user_id', 'employees.*','users.*')
                ->where('users.status', '=', '1')
                ->get();
        }else{
            $results = Employee::join('users', 'users.employee_id', 'employees.id')
                ->select('employees.id as employee_id','users.id as user_id', 'employees.*','users.*')
                ->get();
        }

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                
                if($request['module'] == 'modal'){
                    $buttons = '<button onclick="select('. $result->user_id .',\''. strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename) .'\')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> SELECT</button>';
                }else{
                    $buttons = '<button onclick="edit('. $result->employee_id .')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> UPDATE</button> ';

                    $buttons .= ($result->status == 1)?'<button onclick="del('. $result->employee_id .')" class= "btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>':'<button onclick="del('. $result->employee_id .')" class= "btn btn-warning btn-sm"><i class="fa fa-recycle"></i> RESTORE</button>';

                }

                $status = ($result->status == 1)?'<span class="badge bg-primary">ACTIVE</span>':'<span class="badge bg-danger">IN-ACTIVE</span>';

                $nestedData['id'] = $result->employee_id;
                $nestedData['employee_code'] =  $result->employee_code ;
                $nestedData['fullname'] =  strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename);
                $nestedData['address'] =  strtoupper($result->address);
                $nestedData['contact'] =  $result->contact_number;
                $nestedData['status'] =  $status;
                $nestedData['actions'] = $buttons;
                $data[] = $nestedData;
            }
        }

        echo json_encode(array( "data" => $data));

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
        $validator = Validator::make($request->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'dateofbirth' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'employee_code' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{

            $email_exist = User::where('email', '=', $request['email'])->first();
            $contact_exist = User::where('contact_number', '=', $request['contact'])->first();

            if($email_exist){
                return response()->json(array('success'=> false, 'messages' => 'Email address already Exist!'));
            }else{
                if($contact_exist){
                    return response()->json(array('success'=> false, 'messages' => 'Contact Number already Used!'));
                }else{
                     try {
                        DB::beginTransaction();
            
                        $employee = new Employee;
                        $employee->employee_code = strtoupper($request['employee_code']); 
                        $employee->lastname = $request['lastname'];
                        $employee->firstname = $request['firstname'];
                        $employee->middlename = $request['middlename'];
                        $employee->suffix = $request['suffix'];
                        $employee->date_of_birth = $request['dateofbirth'];
                        $employee->gender = $request['gender'];
                        $employee->address = $request['address'];
                        $employee->civil_status = $request['civil_status'];
                        $employee->status = 1;
                        $employee->save();
            
                        $user = new User;
                        $user->employee_id = $employee->id;
                        $user->email = $request['email'];
                        $user->contact_number = $request['contact'];
                        $user->password = bcrypt('secret123');
                        $user->status = 1;
                        $user->save();
                        
                        DB::commit();

                        return response()->json(array('success'=> true, 'messages' => 'Record Successfully saved'));
                    } catch (\PDOException $e) {
                        DB::rollBack();
                        return response()->json(array('success'=> false, 'error'=>'SQL error!', 'messages'=>'Transaction failed!'));
                    }
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Employee::where('id', '=', $id)->with('user')->get());
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
        $validator = Validator::make($request->all(),[
            'edit_firstname' => 'required',
            'edit_lastname' => 'required',
            'edit_middlename' => 'required',
            'edit_dateofbirth' => 'required',
            'edit_gender' => 'required',
            'edit_contact' => 'required',
            'edit_email' => 'required',
            'edit_employee_code' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{

            $email_exist = User::where('email', '=', $request['edit_email'])->first();
            $contact_exist = User::where('contact_number', '=', $request['edit_contact'])->first();

            if($email_exist){
                return response()->json(array('success'=> false, 'messages' => 'Email address already Exist!'));
            }else{
                if($contact_exist){
                    return response()->json(array('success'=> false, 'messages' => 'Contact Number already Used!'));
                }else{
                    try {
                        DB::beginTransaction();

                        $employee = Employee::findOrFail($id);
                        $employee->employee_code = strtoupper($request['edit_employee_code']); 
                        $employee->lastname = $request['edit_lastname'];
                        $employee->firstname = $request['edit_firstname'];
                        $employee->middlename = $request['edit_middlename'];
                        $employee->suffix = $request['edit_suffix'];
                        $employee->date_of_birth = $request['edit_dateofbirth'];
                        $employee->gender = $request['edit_gender'];
                        $employee->address = $request['edit_address'];
                        $employee->civil_status = $request['edit_civil_status'];
                        $employee->save();
            
                        $user = User::where('employee_id', '=', $id)->first();
                        $user->email = $request['edit_email'];
                        $user->contact_number = $request['edit_contact'];
                        $user->save();
                        
                        DB::commit();

                        return response()->json(array('success'=> true, 'messages' => 'Record Successfully updated'));
                    } catch (\PDOException $e) {
                        DB::rollBack();
                        return response()->json(array('success'=> false, 'error'=>'SQL error!', 'messages'=>'Transaction failed!'));
                    }
                }
            }
           
        }
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
    
    public function togglestatus($id){

        $active_account = User::where('employee_id', '=', $id)->first();

        $account = User::findOrFail($active_account['id']);
        $message ='';

        if($account->status == '1'){
            $message = 'Record deleted successfully!';
            $account->status = '0';
        }else{
            $message = 'Record retrieve successfully!';
            $account->status ='1';
        }
        $account->save();

        return response::json(array('success'=>true, 'messages'=>$message));
    }

    public function health_status(){
        return view('employee.employee_health_status');
    }

    public function verifyPassword(Request $request){
        if (Hash::check($request['password'], Auth::user()->password)) {
            return response()->json(array('success' => true));
        }

        return response()->json(array('success' => false));
    }

    public function getEmployeeHealthStatus(){
        $results = User::join('employees', 'employees.id', 'users.id')->select('users.id as user_id', 'employees.id as employee_id', 'users.*', 'employees.*')
                        ->where('users.status', '=', '1')->get();

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $ctr = 0;

                $max_identifier = DB::table('employee_monitorings')->where('user_id', '=', $result->user_id)->max('identifier');
                $latest_health = DB::table('employee_monitorings')->where('identifier', '=', $max_identifier)->where('user_id', '=', $result->user_id)->first();
                 
                if(!empty($latest_health)){
                    ($latest_health->fever == 'YES')? $ctr++ : false;
                    ($latest_health->cough == 'YES')? $ctr++ : false;
                    ($latest_health->shortness_of_breathing == 'YES')? $ctr++ : false;
                    ($latest_health->sore_throat == 'YES')? $ctr++ : false;
                    ($latest_health->headache == 'YES')? $ctr++ : false;
                    ($latest_health->body_pain == 'YES')? $ctr++ : false;
                    ($latest_health->household_member_positive == 'YES')? $ctr++ : false;
                    ($latest_health->person_diagnosed_positive == 'YES')? $ctr++ : false;
                    ($latest_health->person_monitor == 'YES')? $ctr++ : false;
                    ($latest_health->living_with_frontliners == 'YES')? $ctr++ : false;
                    ($latest_health->relative_arrived_overseas == 'YES')? $ctr++ : false;

                    if(EmployeeCovidStatus::where('user_id', '=', $result->user_id)->where('status', '=', '1')->first()){
                        
                        $buttons = '<button disabled class= "btn btn-danger btn-sm"><i class="fa fa-user-plus"></i> POSITIVE</button> <button disabled class= "btn btn-warning btn-sm"><i class="fa fa-user-plus"></i> SUSPECTED</button>';
                        $risk = '<span class="badge bg-primary">COVID CASE MONITORING</span>';
                    }else{
                        $buttons = '<button onclick="positive('. $result->user_id .')" class= "btn btn-danger btn-sm"><i class="fa fa-user-plus"></i> POSITIVE</button> <button onclick="suspected('. $result->user_id .')" class= "btn btn-warning btn-sm"><i class="fa fa-user-plus"></i> SUSPECTED</button>';
                        $risk = ($ctr > 5)?'<span class="badge bg-danger">HISH RISK</span>':'<span class="badge bg-warning">LOW RISK</span>';
                    }
                }else{
                    $buttons = '<button disabled class= "btn btn-danger btn-sm"><i class="fa fa-user-plus"></i> POSITIVE</button> <button disabled class= "btn btn-warning btn-sm"><i class="fa fa-user-plus"></i> SUSPECTED</button>';
                    $risk = '<span class="badge bg-primary">NO HISTORY OF TRANSACTION</span>';
                }

                $nestedData['id'] = $result->id;
                $nestedData['employee_code'] =  $result->employee_code ;
                $nestedData['contact'] =  $result->contact_number;
                $nestedData['fullname'] =  strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename);
                $nestedData['risk'] =  $risk;
                $nestedData['actions'] = $buttons;
                $data[] = $nestedData;
            }
        }

        echo json_encode(array( "data" => $data));
    }

    public function employeeActiveCase(Request $request){
        $active = new EmployeeCovidStatus;
        $active->user_id = $request['user_id'];
        $active->health_status_remarks = $request['type'];
        $active->final_remarks = '';
        $active->date = $request['date_confirmed'];
        $active->fulldetailed_reports = '';
        $active->status = 1;
        $active->save();

        
        return response::json(array('success'=>true, 'messages'=>'Record Successfully Saved!'));
    }
}
