<?php

namespace App\Http\Controllers;

use App\AnnualMedicalReport;
use Illuminate\Http\Request;
use Validator;
use DB;

class AnnualMedicalReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('annual_medical_reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function findall(request $request)
    {
        $results = AnnualMedicalReport::all();

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $buttons = '<button onclick="edit('. $result->id .')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> UPDATE</button> ';
                $buttons .= ($result->status == 1)?'<button onclick="del('. $result->id .')" class= "btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>':'<button onclick="del('. $result->id .')" class= "btn btn-warning btn-sm"><i class="fa fa-recycle"></i> RESTORE</button>';

                $status = ($result->status == 1)?'<span class="badge bg-primary">ACTIVE</span>':'<span class="badge bg-danger">IN-ACTIVE</span>';

                $nestedData['id'] = $result->id;
                $nestedData['diagnosis'] =  $result->diagnosis;
                $nestedData['weight'] =  $result->weight;
                $nestedData['height'] =  $result->height;
                $nestedData['temperature'] =  $result->temperature;
                $nestedData['physical_description'] =  $result->general_physical_description;
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
        $validator = Validator::make($request->all(),[
            'temperature' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'diagnosis' => 'required',
            'physical_description' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{
            try {
                DB::beginTransaction();

                $reports = new AnnualMedicalReport;
                $reports->diagnosis = $request['diagnosis']; 
                $reports->general_physical_description = $request['physical_description'];
                $reports->temperature = $request['temperature']; 
                $reports->height = $request['height'];
                $reports->weight = $request['weight'];
                $reports->user_id = 1;
                $reports->save();

                DB::commit();

                return response()->json(array('success'=> true, 'messages' => 'Record Successfully saved'));
            } catch (\PDOException $e) {
                DB::rollBack();
                return response()->json(array('success'=> false, 'error'=>'SQL error!', 'messages'=>'Transaction failed!'));
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
