<?php

namespace App\Http\Controllers;

use App\CovidPatientMonitoring;
use Illuminate\Http\Request;
use App\EmployeeCovidStatus;
use Validator;

class CovidPatientMonitoringController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $health_status = EmployeeCovidStatus::where('user_id', '=', \Auth::user()->id)->where('status', '=', '1')->first();
        // dd($health_status);
        if(!empty($health_status)){
            return view('covid_monitoring.index', ['health_status' => $health_status['health_status_remarks']]);
        }else{
            return view('home');
        }
    }

    public function findall(Request $request)
    {
        $results = CovidPatientMonitoring::where('patient_code', '=', $request['patient_code'])->get();

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                // $user = User::findOrFail($result->user_id);
                // $employee = Employee::findOrFail($user->employee_id);

                // $buttons .= '  <button onclick="reports(\''. $result->patient_code .'\')" class= "btn btn-info btn-sm"><i class="fa fa-list"></i> DAILY REPORTS</button>';

                // $status = ($result->health_status_remarks == 'POSITIVE')?'<span class="badge bg-danger">POSITIVE</span>':'<span class="badge bg-warning">SUSPECTED</span>';
                
                $nestedData['id'] = $result->id;
                $nestedData['temperature'] =  $result->temperature;
                $nestedData['fever'] =  ($result->fever == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['cough'] =  ($result->cough == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['shortness_of_breathing'] =  ($result->shortness_of_breathing == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['sore_throat'] =  ($result->sore_throat == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['headache'] =  ($result->headache == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['body_pain'] =  ($result->body_pain == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['colds'] =  ($result->colds == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['vomiting'] =  ($result->vomiting == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['diarrhea'] =  ($result->diarrhea == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['fatigue_chill'] =  ($result->fatigue_chill == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['joint_pains'] =  ($result->joint_pains == 'YES')?'<label class="label label-danger">YES</label>':'<label class="label label-primary">NO</label>';
                $nestedData['other_symptoms'] =  $result->other_symptoms;
                $nestedData['health_condition'] =  $result->health_condition;
                $nestedData['date'] = explode(' ', $result->created_at)[0];
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
            // 'temperature' => 'required',
            'colds' => 'required',
            'vomiting' => 'required',
            'diarrhea' => 'required',
            'fatigue' => 'required',
            'joint_pains' => 'required',
            'condition' => 'required',
            'date_confirmed' => 'required',
            'informant' => 'required',
            'relationship' => 'required',
            'contact' => 'required',
        ];

        $validator = Validator::make($request->all(),$validate);

        if($validator->fails()){
            return response()->json(array('success' => false, 'messages'=>'Please fill up required data!'));
        }else{

            $last_data = CovidPatientMonitoring::where('user_id', '=', \Auth::user()->id)->where('status', '=', '1')->first();

            if(!empty($last_data)){
                $last_data->status = '0';
                $last_data->save();

                
                $monitoring = new CovidPatientMonitoring;
                $monitoring->user_id = \Auth::user()->id;
                $monitoring->patient_code = EmployeeCovidStatus::where('user_id', '=', \Auth::user()->id)->where('status', '=', '1')->first()['patient_code'];
                $monitoring->temperature = $request['temperature'];
                $monitoring->fever = $request['fever'];
                $monitoring->cough = $request['cough'];
                $monitoring->shortness_of_breathing = $request['breath'];
                $monitoring->sore_throat = $request['sore_throat'];
                $monitoring->headache = $request['headache'];
                $monitoring->body_pain = $request['body_pain'];
                $monitoring->colds = $request['colds'];
                $monitoring->vomiting = $request['vomiting'];
                $monitoring->diarrhea = $request['diarrhea'];
                $monitoring->fatigue_chill = $request['fatigue'];
                $monitoring->joint_pains = $request['joint_pains'];
                $monitoring->other_symptoms = !empty($request['other_symptoms'])?$request['other_symptoms']:"NONE";
                $monitoring->health_condition = $request['condition'];
                $monitoring->informant = $request['informant'];
                $monitoring->relationship = $request['relationship'];
                $monitoring->contact_number = $request['contact'];
                $monitoring->status = '1';
                $monitoring->save();

            }else{
                $monitoring = new CovidPatientMonitoring;
                $monitoring->user_id = \Auth::user()->id;
                $monitoring->patient_code = EmployeeCovidStatus::where('user_id', '=', \Auth::user()->id)->where('status', '=', '1')->first()['patient_code'];
                $monitoring->temperature = $request['temperature'];
                $monitoring->fever = $request['fever'];
                $monitoring->cough = $request['cough'];
                $monitoring->shortness_of_breathing = $request['breath'];
                $monitoring->sore_throat = $request['sore_throat'];
                $monitoring->headache = $request['headache'];
                $monitoring->body_pain = $request['body_pain'];
                $monitoring->colds = $request['colds'];
                $monitoring->vomiting = $request['vomiting'];
                $monitoring->diarrhea = $request['diarrhea'];
                $monitoring->fatigue_chill = $request['fatigue'];
                $monitoring->joint_pains = $request['joint_pains'];
                $monitoring->other_symptoms = !empty($request['other_symptoms'])?$request['other_symptoms']:"NONE";
                $monitoring->health_condition = $request['condition'];
                $monitoring->informant = $request['informant'];
                $monitoring->relationship = $request['relationship'];
                $monitoring->contact_number = $request['contact'];
                $monitoring->status = '1';
                $monitoring->save();
            }

            
            $last_data = EmployeeCovidStatus::where('user_id', '=', \Auth::user()->id)->where('status', '=', '1')->first();
            if($request['condition'] == 'POSITIVE'){
                $last_data->final_remarks = 'POSITIVE';
                $last_data->status = '0';
                $last_data->save();

                $active = new EmployeeCovidStatus;
                $active->patient_code = $last_data->patient_code;
                $active->user_id = $last_data->user_id;
                $active->health_status_remarks = $request['type'];
                $active->final_remarks = 'MONITORING';
                $active->date = $request['date_confirmed'];
                $active->fulldetailed_reports =  $last_data->fulldetailed_reports;
                $active->status = 1;
                $active->save();

            }else if($request['condition'] == 'RECOVERED'){
                $last_data->final_remarks = 'RECOVERED';
                $last_data->status = '0';
                $last_data->save();
            }else if($request['condition'] == 'GET BETTER'){
                $last_data->final_remarks = 'GET BETTER';
                $last_data->status = '0';
                $last_data->save();
            }else if($request['condition'] == 'DECEASED'){
                $last_data->final_remarks = 'DECEASED';
                $last_data->status = '0';
                $last_data->save();
            }
            
            return response()->json(array('success' => true, 'messages'=>'Record Successfully Saved!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CovidPatientMonitoring  $covidPatientMonitoring
     * @return \Illuminate\Http\Response
     */
    public function show(CovidPatientMonitoring $covidPatientMonitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CovidPatientMonitoring  $covidPatientMonitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(CovidPatientMonitoring $covidPatientMonitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CovidPatientMonitoring  $covidPatientMonitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CovidPatientMonitoring $covidPatientMonitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CovidPatientMonitoring  $covidPatientMonitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(CovidPatientMonitoring $covidPatientMonitoring)
    {
        //
    }
}
