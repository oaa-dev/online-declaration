<?php

namespace App\Http\Controllers;

use App\AnnualMedicalReport;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Employee;

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
        $results = Employee::join('users', 'users.employee_id', 'employees.id')
            ->select('employees.id as employee_id','users.id as user_id', 'employees.*','users.*')
            ->where('users.status', '=', '1')
            ->get();

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $flag = false;
                $history = AnnualMedicalReport::where('user_id', '=', $result->user_id)->get();
                
                foreach($history as $hist){
                    $date = explode(' ', $hist->created_at)[0];
                    $year = explode('-', $date)[0];
                    if($year == date('Y')){
                        $flag = true;
                    }
                }

                $buttons = (!$flag)?'<button onclick="select('. $result->user_id .',\''. strtoupper($result->lastname .', '. $result->firstname .' '. $result->middlename) .'\',\''. $result->gender .'\')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> EXAMINE</button> ':'<button class= "btn btn-success btn-sm" disabled><i class="fa fa-edit"></i> EXAMINE</button> ';
                
                $buttons .= '<button onclick="select('. $result->user_id .')" class= "btn btn-info btn-sm"><i class="fa fa-edit"></i> VIEW HISTORY</button> ';
                
                $status = (!$flag)?'<span class="badge bg-danger">NOT EXAMINE</span>':'<span class="badge bg-primary">EXAMINE</span>';

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'temperature' => 'required',
            // 'weight' => 'required',
            // 'height' => 'required',
            // 'diagnosis' => 'required',
            // 'physical_description' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{
            try {
                DB::beginTransaction();

                $reports = new AnnualMedicalReport;
                $reports->user_id = $request['user_id']; 
                $reports->diagnosis = $request['diagnosis']; 
                $reports->general_physical_description = $request['general_physical_desc']; 
                $reports->known_allergies = $request['known_allergies']; 
                $reports->temperature = $request['temperature']; 
                $reports->height = $request['height']; 
                $reports->weight = $request['weight']; 
                $reports->blood_pressure = $request['blood_pressure']; 
                $reports->pulse = $request['pulse']; 
                $reports->respiration = $request['respiration']; 
                $reports->cholesterol = $request['cholesterol'];
                $reports->eyes = $request['eyes']; 
                $reports->throat = $request['throat'];
                $reports->nose = $request['nose'];
                $reports->ears = $request['ears'];
                $reports->chest = $request['chest'];
                $reports->lungs = $request['lungs'];
                $reports->heart = $request['heart'];
                $reports->prostate_specific_antigen = $request['male_prostate_antigen'];
                $reports->male_genital_development = $request['male_genital'];
                $reports->pap_smear = $request['pap_smear'];
                $reports->breast_exam = $request['breast_exam'];
                $reports->mammography = $request['mammography'];
                $reports->female_genital_development = $request['female_genital'];
                $reports->vision = $request['vision'];
                $reports->hearing = $request['hearing'];
                $reports->dental = $request['dental'];
                $reports->urinalysis = $request['urinalysis'];
                $reports->sigmoidoscopy = $request['sigmoidoscopy'];
                $reports->stool_occult_blood = $request['stool_occult'];
                $reports->colonoscopy = $request['colonoscopy'];
                $reports->extremities = $request['extremities'];
                $reports->abdomen = $request['abdomen'];
                $reports->date = date('Y');
                $reports->remarks = '';
                $reports->status = '1';
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
