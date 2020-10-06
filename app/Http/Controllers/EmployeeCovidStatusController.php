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

    public function findall(Request $request)
    {
        $results = EmployeeCovidStatus::where('status', '=', '1')->get();

        // join('users', 'users.id', 'employee_covid_statuses.id')
        //         ->join('employees', 'employees.id', 'users.id')
        //         ->select('users.id as user_id', 'employees.id as employee_id', 'users.*', 'employees.*', 'users.*', 'employee_covid_statuses.*')
        //         ->where('employee_covid_statuses.status', '=', '1')->get();
        // dd($results);
        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $user = User::findOrFail($result->user_id);
                $employee = Employee::findOrFail($user->employee_id);

                $buttons = '<button onclick="positive('. $result->user_id .')" class= "btn btn-success btn-sm"><i class="fa fa-user-plus"></i> RECOVERED</button> <button onclick="suspected('. $result->user_id .')" style="background-color:gray" class= "btn btn-sm"><i class="fa fa-user-plus"></i> DECEASED</button>';
                $status = ($result->health_status_remarks == 'POSITIVE')?'<span class="badge bg-danger">POSITIVE</span>':'<span class="badge bg-warning">SUSPECTED</span>';
                //  dd($result->health_status_remarks);
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
     * @param  \App\EmployeeCovidStatus  $employeeCovidStatus
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeCovidStatus $employeeCovidStatus)
    {
        //
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
