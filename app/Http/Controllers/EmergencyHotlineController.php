<?php

namespace App\Http\Controllers;

use App\EmergencyHotline;
use Illuminate\Http\Request;
use Validator;
use DB;
use Response;

class EmergencyHotlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emergency_hotline.index');
    }

    public function findall(request $request)
    {
        $results = EmergencyHotline::all();

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {

                $buttons = '<button onclick="edit('. $result->id .')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> UPDATE</button> ';
                $buttons .= ($result->status == 1)?'<button onclick="del('. $result->id .')" class= "btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>':'<button onclick="del('. $result->id .')" class= "btn btn-warning btn-sm"><i class="fa fa-recycle"></i> RESTORE</button>';

                $status = ($result->status == 1)?'<span class="badge bg-primary">ACTIVE</span>':'<span class="badge bg-danger">IN-ACTIVE</span>';

                $nestedData['id'] = $result->id;
                $nestedData['name'] =  $result->name;
                $nestedData['contact'] =  $result->contact_number;
                $nestedData['email'] =  strtoupper($result->email_address);
                $nestedData['description'] =  strtoupper($result->description);
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
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{
            try {
                DB::beginTransaction();

                $hotline = new EmergencyHotline;
                $hotline->name = strtoupper($request['name']); 
                $hotline->contact_number = $request['contact'];
                $hotline->email_address = $request['email'];
                $hotline->description =  strtoupper($request['description']);
                $hotline->status = 1;
                $hotline->save();

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
     * @param  \App\EmergencyHotline  $emergencyHotline
     * @return \Illuminate\Http\Response
     */
    public function show(EmergencyHotline $emergencyHotline)
    {
        return response()->json($emergencyHotline);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmergencyHotline  $emergencyHotline
     * @return \Illuminate\Http\Response
     */
    public function edit(EmergencyHotline $emergencyHotline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmergencyHotline  $emergencyHotline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'edit_name' => 'required',
            'edit_contact' => 'required',
            'edit_email' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{
            try {
                DB::beginTransaction();

                $emergencyHotline = EmergencyHotline::findOrFail($id);
                $emergencyHotline->name = strtoupper($request['edit_name']); 
                $emergencyHotline->contact_number = $request['edit_contact'];
                $emergencyHotline->email_address = $request['edit_email'];
                $emergencyHotline->description =  strtoupper($request['edit_description']);
                $emergencyHotline->save();

                DB::commit();

                return response()->json(array('success'=> true, 'messages' => 'Record Successfully saved'));
            } catch (\PDOException $e) {
                DB::rollBack();
                return response()->json(array('success'=> false, 'error'=>'SQL error!', 'messages'=>'Transaction failed!'));
            }
        }

        // dd('here');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmergencyHotline  $emergencyHotline
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmergencyHotline $emergencyHotline)
    {
        //
    }

    public function togglestatus($id){


        $result = EmergencyHotline::findOrFail($id);
        $message ='';

        if($result->status == '1'){
            $message = 'Record deleted successfully!';
            $result->status = '0';
        }else{
            $message = 'Record retrieve successfully!';
            $result->status ='1';
        }
        $result->save();

        return response::json(array('success'=>true, 'messages'=>$message));
    }
}
