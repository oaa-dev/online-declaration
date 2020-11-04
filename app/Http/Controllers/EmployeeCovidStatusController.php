<?php

namespace App\Http\Controllers;

use App\EmployeeCovidStatus;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
use DB;
use Validator;

class EmployeeCovidStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('covid_patient_status.index');
    }

    public function positive(){
        return view('reports.positive');
    }

    public function suspected(){
        return view('reports.suspected');
    }
    
    public function recovered(){
        return view('reports.recovered');
    }
    
    public function deceased(){
        return view('reports.deceased');
    }

    public function findall(Request $request)
    {
        $results = EmployeeCovidStatus::where('status', '=', '1')->get();

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $user = User::findOrFail($result->user_id);
                $employee = Employee::findOrFail($user->employee_id);

                if($result->health_status_remarks == 'POSITIVE'){
                    $buttons = '<button onclick="recovered('. $result->id .')" class= "btn btn-success btn-sm"><i class="fa fa-user-plus"></i> RECOVERED</button> <button onclick="deceased('. $result->id .')" style="background-color:gray" class= "btn btn-sm"><i class="fa fa-user-plus"></i> DECEASED</button>';
                }else{
                    $buttons = '<button onclick="get_better('. $result->id .')" class= "btn btn-info btn-sm"><i class="fa fa-user-plus"></i> GET BETTER </button> <button onclick="positive('. $result->id .')" class= "btn btn-sm btn-danger"><i class="fa fa-user-plus"></i> POSITIVE</button>';
                }

                $status = ($result->health_status_remarks == 'POSITIVE')?'<span class="badge bg-danger">POSITIVE</span>':'<span class="badge bg-warning">SUSPECTED</span>';
                
                $nestedData['id'] = $result->id;
                $nestedData['employee_code'] =  $employee->employee_code ;
                $nestedData['contact'] =  $user->contact_number;
                $nestedData['fullname'] =  strtoupper($employee->lastname .', '. $employee->firstname .' '. $employee->middlename);
                $nestedData['status'] =  $status;
                $nestedData['actions'] = $buttons;
                $data[] = $nestedData;

            }
        }
        echo json_encode(array( "data" => $data));
    }

    public function find_all_by_status(Request $request){

        if($request['status'] == 'POSITIVE'){
            $results = EmployeeCovidStatus::where('status', '=', '1')->where('health_status_remarks', '=', 'POSITIVE')->get();
        }else if($request['status'] == 'SUSPECTED'){
            $results = EmployeeCovidStatus::where('status', '=', '1')->where('health_status_remarks', '=', 'SUSPECTED')->get();
        }else if($request['status'] == 'RECOVERED'){
            $results = EmployeeCovidStatus::where('final_remarks', '=', 'RECOVERED')->get();
        }else if($request['status'] == 'DECEASED'){
            $results = EmployeeCovidStatus::where('final_remarks', '=', 'DECEASED')->get();
        }

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $user = User::findOrFail($result->user_id);
                $employee = Employee::findOrFail($user->employee_id);

                $status = ($result->health_status_remarks == 'POSITIVE')?'<span class="badge bg-danger">POSITIVE</span>':'<span class="badge bg-warning">SUSPECTED</span>';
                
                $nestedData['id'] = $result->id;
                $nestedData['employee_code'] =  $employee->employee_code ;
                $nestedData['code'] =  $result->patient_code ;
                $nestedData['contact'] =  $user->contact_number;
                $nestedData['address'] =  $employee->address;
                $nestedData['remarks'] =  $result->fulldetailed_reports;
                $nestedData['fullname'] =  strtoupper($employee->lastname .', '. $employee->firstname .' '. $employee->middlename);
                $nestedData['status'] =  $status;

                if($request['status'] == 'RECOVERED'){
                    $result = EmployeeCovidStatus::where('user_id', '=', $result->user_id)->where('status', '=', '1')->count();

                    if(empty($result)){
                        $data[] = $nestedData;
                    }
                }else{
                    $data[] = $nestedData;
                }

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
        $covid = EmployeeCovidStatus::findOrFail($request['covid_id']);
        $covid->final_remarks = $request['type'];
        $covid->status = '0';
        $covid->save();

        if($request['type'] == 'POSITIVE'){
            $active = new EmployeeCovidStatus;
            $active->patient_code = $covid->patient_code;
            $active->user_id = $covid->user_id;
            $active->health_status_remarks = $request['type'];
            $active->final_remarks = 'MONITORING';
            $active->date = $request['date_confirmed'];
            $active->fulldetailed_reports =  $covid->fulldetailed_reports;
            $active->status = 1;
            $active->save();
        }


        return response()->json(array('success' => true, 'messages'=>'Record Successfully Saved!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeCovidStatus  $employeeCovidStatus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(EmployeeCovidStatus::where('user_id', '=', $id)->where('status', '=', '1')->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeCovidStatus  $employeeCovidStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeCovidStatus $employeeCovidStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeCovidStatus  $employeeCovidStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeCovidStatus $employeeCovidStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeCovidStatus  $employeeCovidStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeCovidStatus $employeeCovidStatus)
    {
        //
    }
}
