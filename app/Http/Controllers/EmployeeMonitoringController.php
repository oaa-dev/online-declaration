<?php

namespace App\Http\Controllers;

use App\EmployeeMonitoring;
use App\Employee;
use App\ShiftingSchedule;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Reponse;
use DB;
use App\EmployeeCovidStatus;
use Hash;
use Auth;
use App\Threshold;
use App\CompanyProfile;
use PDF;

class EmployeeMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function health_history(){
        return view('health_history.index');
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
    public function health_status(){
        return view('health_monitoring.employee_health_status');
    }

    public function getAllHighRisk(Request $request)
    {
        $results = User::join('employees', 'employees.id', 'users.id')->select('users.id as user_id', 'employees.id as employee_id', 'users.*', 'employees.*')
                ->where('users.status', '=', '1')->get();

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $ctr = 0;

                $max_identifier = DB::table('employee_monitorings')->where('user_id', '=', $result->user_id)->max('identifier');
                $latest_health = DB::table('employee_monitorings')->where('identifier', '=', $max_identifier)->where('user_id', '=', $result->user_id)->orderBy('created_at', 'DESC')->first();
                
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

                    $threshold = Threshold::findOrFail('1')['level'];

                    if($ctr >= $threshold){
                        $nestedData['fullname'] =  strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename);
                        $nestedData['risk'] =  'HIGH RISK';
                        $nestedData['date'] =  explode(' ', $result['created_at'])[0];
                        $data[] = $nestedData;
                    }
                }

                // $nestedData['id'] = $result->id;
                // $nestedData['employee_code'] =  $result->employee_code ;
                // $nestedData['contact'] =  $result->contact_number;

                
                // $nestedData['actions'] = $buttons;

                //  $recovered = EmployeeCovidStatus::where('user_id', '=', $result->user_id)->where('status', '=', '1')->count();
                // if($recovered == 0){
                //     $data[] = $nestedData;
                // }
                
            }
        }

        return $data;
    }

    public function employee_health_condition(Request $request)
    {
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

                    // if(EmployeeCovidStatus::where('user_id', '=', $result->user_id)->where('status', '=', '1')->first()){
                        
                    //     $buttons = '<button class= "btn btn-success btn-sm"><i class="fa fa-user-plus"></i> RECOVERED</button> <button style="background-color:gray" class="btn btn-sm"><i class="fa fa-user-plus"></i> DECEASED</button>';
                    //     $risk = '<span class="badge bg-primary">COVID CASE MONITORING</span>';
                    // }else{
                        $buttons = '<button onclick="positive('. $result->user_id .')" class= "btn btn-danger btn-sm"><i class="fa fa-user-plus"></i> POSITIVE</button> <button onclick="suspected('. $result->user_id .')" class= "btn btn-warning btn-sm"><i class="fa fa-user-plus"></i> SUSPECTED</button>';
                        
                        $threshold = Threshold::findOrFail('1')['level'];
                        $risk = ($ctr >= (!empty($threshold)? $threshold: 5) )?'<span class="badge bg-danger">HISH RISK</span>':'<span class="badge bg-warning">LOW RISK</span>';
                    // }
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

                // $deceased = EmployeeCovidStatus::where('user_id', '=', $result->user_id)->where('status', '=', '0')->where('final_remarks', '=', 'DECEASED')->first();
                // if(empty($deceased)){
                    $recovered = EmployeeCovidStatus::where('user_id', '=', $result->user_id)->where('status', '=', '1')->count();
                    if($recovered == 0){
                        $data[] = $nestedData;
                    }
                // }

            }
        }
        echo json_encode(array( "data" => $data));
    }
    
    public function encoding()
    {
        if(\Auth::user()->access != '1'){
            $active = EmployeeCovidStatus::where('user_id', '=', \Auth::user()->id)->where('status', '=', '1')->first();
            if(!empty($active)){
                return view('layouts.error', ['messages' => 'YOU BEEN MARK AS '.$active['health_status_remarks'], 'description' => 'Please update your daily health status on Patient Health Monitoring in your Navigation. And wait for the futher announcement of the Health Officials. Thank you' ]);
            }else{
                return view('health_encoding.index');
            }
        }else{
            return view('health_encoding.index');
        }
    }

    public function findall(request $request)
    {

        if(\Auth::user()->access == '1'){
            $results = EmployeeMonitoring::all();
        }else{
            $results = EmployeeMonitoring::where('user_id', '=', \Auth::user()->id)->get();
        }

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $user = User::where('id', '=', $result->user_id)->with('employee')->first();
                $schedule = ShiftingSchedule::findOrFail($result->shifting_schedule_id);

                $buttons = '<button onclick="edit('. $result->id .')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> UPDATE</button> <button onclick="del('. $result->id .')" class= "btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>';
                $status = ($result->status == 1)?'<span class="badge bg-primary">ACTIVE</span>':'<span class="badge bg-danger">IN-ACTIVE</span>';
                
                $nestedData['id'] = $result->id;
                $nestedData['temperature'] =  $result->temperature .' °C';
                $nestedData['fever'] =  ($result->fever == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['cough'] =  ($result->cough == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['shortness_of_breathing'] =  ($result->shortness_of_breathing == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['sore_throat'] =  ($result->sore_throat == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['headache'] =  ($result->headache == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['body_pain'] =  ($result->body_pain == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['household_member_positive'] =  ($result->household_member_positive == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['person_diagnosed_positive'] =  ($result->person_diagnosed_positive == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['living_with_frontliners'] =  ($result->living_with_frontliners == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['relative_arrived_overseas'] =  ($result->relative_arrived_overseas == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['person_monitor'] =  ($result->person_monitor == 'YES')?'<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>';
                $nestedData['date'] =  explode(' ', $result->created_at)[0];
                $nestedData['time'] =  date('h:i:s a', strtotime(explode(' ', $result->created_at)[1]));
                $nestedData['employee_code'] =  $user->employee['employee_code'];
                $nestedData['schedule'] = $schedule->description;
                $nestedData['fullname'] =  strtoupper($user->employee['lastname'].', '.$user->employee['firstname'].' '.$user->employee['middlename']);
                $nestedData['status'] =  $status;
                $nestedData['actions'] = $buttons;
                $data[] = $nestedData;
            }
        }
        echo json_encode(array( "data" => $data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'cough' => 'required',
            'fever' => 'required',
            'breath' => 'required',
            'sore_throat' => 'required',
            'headache' => 'required',
            'body_pain' => 'required',
            'household_with_symptoms' => 'required',
            'person_with_disease' => 'required',
            'person_monitor' => 'required',
            'living_frontliners' => 'required',
            'relative_overseas' => 'required',
            // 'temperature' => 'required',
            'shifting_list' => 'required',
        ];
        if(\Auth::user()->access == '1'){
            $validate = array_merge($validate, ['user_id' => 'required']);
        }

        $validator = Validator::make($request->all(),$validate);

        if($validator->fails()){
            return response()->json(array('success' => false, 'messages'=>'Please fill up required data!'));
        }else{
            $max_identifier = DB::table('employee_monitorings')->where('user_id', '=', $request['user_id'])->max('identifier');

            $monitoring = new EmployeeMonitoring;
            $monitoring->user_id = (\Auth::user()->access == '1')? $request['user_id']:\Auth::user()->id;
            $monitoring->shifting_schedule_id = $request['shifting_list'];
            $monitoring->temperature = !empty($request['temperature'])? $request['temperature']: 'NONE';
            $monitoring->fever = $request['fever'];
            $monitoring->cough = $request['cough'];
            $monitoring->shortness_of_breathing = $request['breath'];
            $monitoring->sore_throat = $request['sore_throat'];
            $monitoring->headache = $request['headache'];
            $monitoring->body_pain = $request['body_pain'];
            $monitoring->household_member_positive = $request['household_with_symptoms'];
            $monitoring->person_diagnosed_positive = $request['person_with_disease'];
            $monitoring->living_with_frontliners = $request['living_frontliners'];
            $monitoring->relative_arrived_overseas = $request['relative_overseas'];
            $monitoring->person_monitor = $request['person_monitor'];
            $monitoring->status = '1';
            if(!empty($max_identifier)){
                $monitoring->identifier = ($max_identifier + 1);
            }else{
                $monitoring->identifier = 1;
            }
            $monitoring->save();

            
            return response()->json(array('success' => true, 'messages'=>'Record Successfully Saved!'));
        }
    }

    public function employeeActiveCase(Request $request){

        $active = new EmployeeCovidStatus;
        $active->patient_code = '';
        $active->user_id = $request['user_id'];
        $active->health_status_remarks = $request['type'];
        $active->final_remarks = 'MONITORING';
        $active->date = $request['date_confirmed'];
        $active->fulldetailed_reports =  strtoupper($request['reports']);
        $active->status = 1;
        $active->save();

        $active->patient_code = 'CP-' .str_pad($active->id,5,"0", STR_PAD_LEFT);
        $active->save();

        if(!empty($request['user_id_list'])){
            foreach ($request['user_id_list'] as $value) {
                $suspected = new EmployeeCovidStatus;
                $suspected->patient_code = '';
                $suspected->user_id = $value;
                $suspected->health_status_remarks = 'SUSPECTED';
                $suspected->final_remarks = 'MONITORING';
                $suspected->date = $request['date_confirmed'];
                $suspected->fulldetailed_reports = 'Contacted with patient:' . $active->patient_code;
                $suspected->status = 1;
                $suspected->save();   

                $suspected->patient_code = 'CP-' .str_pad($suspected->id,5,"0", STR_PAD_LEFT);
                $suspected->save();
            }
        }
        
        return response()->json(array('success' => true, 'messages'=>'Record Successfully Saved!'));
    }

    public function verifyPassword(Request $request){
        if (Hash::check($request['password'], Auth::user()->password)) {
            return response()->json(array('success' => true));
        }

        return response()->json(array('success' => false));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeMonitoring  $employeeMonitoring
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeMonitoring  $employeeMonitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeMonitoring $employeeMonitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeMonitoring  $employeeMonitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeMonitoring $employeeMonitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeMonitoring  $employeeMonitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeMonitoring $employeeMonitoring)
    {
        //
    }
}
