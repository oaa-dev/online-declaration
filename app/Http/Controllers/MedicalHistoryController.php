<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                    $buttons = '<button onclick="select('. $result->user_id .',\''. strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename) .'\',\''. $result->contact_number .'\')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> SELECT</button>';
                }else{
                    $buttons = '<button onclick="edit('. $result->employee_id .')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> UPDATE</button> ';

                    $buttons .= ($result->status == 1)?'<button onclick="del('. $result->employee_id .')" class= "btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>':'<button onclick="del('. $result->employee_id .')" class= "btn btn-warning btn-sm"><i class="fa fa-recycle"></i> RESTORE</button> ';
                }

                $status = ($result->status == 1)?'<span class="badge bg-primary">ACTIVE</span>':'<span class="badge bg-danger">IN-ACTIVE</span>';
                $qrcode = new Generator;
                $nestedData['id'] = $result->employee_id;
                $nestedData['qrcode'] = '<img src="data:image/svg+xml;base64,'. base64_encode($qrcode->size(50)->generate($result->employee_code)) .' ">'; 
                $nestedData['employee_code'] =  $result->employee_code;
                $nestedData['fullname'] =  strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename);
                $nestedData['address'] =  strtoupper($result->address);
                $nestedData['contact'] =  $result->contact_number;
                $nestedData['status'] =  $status;
                $nestedData['actions'] = $buttons;

                if($request['module'] == 'modal'){
                    $exist = EmployeeCovidStatus::where('user_id', '=', $result->user_id)->where('status', '=', '1')->first();
                    if(!$exist){
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
