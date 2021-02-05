<?php

namespace App\Http\Controllers;

use App\MedicalHistory;
use Illuminate\Http\Request;
use Validator;

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
                $buttons = '<button onclick="edit('. $result->medical_id .',false)" class= "btn btn-success btn-sm"><i class="fa fa-eye"></i> VIEW</button> <button onclick="edit('. $result->medical_id .', true)" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> UPDATE</button> ';

                $nestedData['id'] = $result->employee_id;
                $nestedData['employee_code'] =  $result->employee_code;
                $nestedData['fullname'] =  strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename);
                $nestedData['date'] =  explode(' ', $result->created_at)[0];
                $nestedData['status'] =  unserialize($result->nature_of_visit);
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
            'user_id' => 'required',
            'nature_of_visit' => 'required',
            'reason_for_visit' => 'required',
            'treatment' => 'required',
            'temperature' => 'required',
            'blood_pressure' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success' => false, 'messages'=>'Please fill up required data!'));
        }else{
            $monitoring = new MedicalHistory;
            $monitoring->user_id = $request['user_id'];
            $monitoring->nature_of_visit = serialize($request['nature_of_visit']);
            $monitoring->reason_for_visit = serialize($request['reason_for_visit']);
            $monitoring->temperature = $request['temperature'];
            $monitoring->blood_pressure = $request['blood_pressure'];
            $monitoring->additional_information = $request['observation'];
            $monitoring->instructions = $request['instruction'];
            $monitoring->treatment = serialize($request['treatment']);
            $monitoring->remarks = '';
            $monitoring->status = '1';
            $monitoring->save();

            
            return response()->json(array('success' => true, 'messages'=>'Record Successfully Saved!'));
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
        $history = MedicalHistory::findOrFail($id);
        $history['nature_of_visit'] = unserialize($history['nature_of_visit']);
        $history['reason_for_visit'] = unserialize($history['reason_for_visit']);
        $history['treatment'] = unserialize($history['treatment']);

        return $history;
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
            'nature_of_visit' => 'required',
            'reason_for_visit' => 'required',
            'treatment' => 'required',
            'temperature' => 'required',
            'blood_pressure' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success' => false, 'messages'=>'Please fill up required data!'));
        }else{
            $monitoring = MedicalHistory::findOrFail($id);
            $monitoring->nature_of_visit = serialize($request['nature_of_visit']);
            $monitoring->reason_for_visit = serialize($request['reason_for_visit']);
            $monitoring->temperature = $request['temperature'];
            $monitoring->blood_pressure = $request['blood_pressure'];
            $monitoring->additional_information = $request['observation'];
            $monitoring->instructions = $request['instruction'];
            $monitoring->treatment = serialize($request['treatment']);
            $monitoring->save();

            
            return response()->json(array('success' => true, 'messages'=>'Record Successfully Saved!'));
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
}
