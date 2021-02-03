<?php

namespace App\Http\Controllers;

use App\MedicalHistory;
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
        return view('medical_history.index');
    }

    public function findall(request $request)
    {

        $results = MedicalHistory::join('users', 'users.id', 'medical_histories.user_id')
            ->join('employees', 'employees.id', 'users.employee_id')
            ->select('employees.id as employee_id', 'employees.*', 'medical_histories.*','medical_histories.id as medical_id',)
            ->get();
    
        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $buttons = '<button onclick="edit('. $result->employee_id .')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> UPDATE</button> ';

                $nestedData['id'] = $result->employee_id;
                $nestedData['employee_code'] =  $result->employee_code;
                $nestedData['fullname'] =  strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename);
                $nestedData['date'] =  explode(' ', $result->created_at)[0];
                $nestedData['status'] =  $result->nature_of_visit;
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
