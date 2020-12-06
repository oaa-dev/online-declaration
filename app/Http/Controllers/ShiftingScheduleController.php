<?php

namespace App\Http\Controllers;

use App\ShiftingSchedule;
use Illuminate\Http\Request;
use DB;
use Validator;
use Response;

class ShiftingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shifting_schedule.index');
    }

    public function findall(request $request)
    {
        $results = ShiftingSchedule::all();

        $data = array();
        if(!empty($results))
        {
            foreach ($results as $result)
            {
                $buttons = '<button onclick="edit('. $result->id .')" class= "btn btn-success btn-sm"><i class="fa fa-edit"></i> UPDATE</button> ';
                $buttons .= ($result->status == 1)?'<button onclick="del('. $result->id .')" class= "btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>':'<button onclick="del('. $result->id .')" class= "btn btn-warning btn-sm"><i class="fa fa-recycle"></i> RESTORE</button>';

                $status = ($result->status == 1)?'<span class="badge bg-primary">ACTIVE</span>':'<span class="badge bg-danger">IN-ACTIVE</span>';

                $nestedData['id'] = $result->id;
                $nestedData['description'] =  $result->description;
                $nestedData['time_in'] =  strtoupper(date('h:i:s a', strtotime($result->in)));
                $nestedData['time_out'] =  strtoupper(date('h:i:s a', strtotime($result->out)));
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
            'description' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{
            try {
                DB::beginTransaction();

                $schedules = new ShiftingSchedule;
                $schedules->description = strtoupper($request['description']); 
                $schedules->in = $request['time_in'];
                $schedules->out = $request['time_out'];
                $schedules->status = 1;
                $schedules->save();

                DB::commit();

                return response()->json(array('success'=> true, 'messages' => 'Record Successfully saved'));
            } catch (\PDOException $e) {
                DB::rollBack();
                return response()->json(array('success'=> false, 'error'=>'SQL error!', 'messages'=>'Transaction failed!'));
            }
        }
    }

    public function findall2(){
        return response()->json(ShiftingSchedule::where('status', '=', 1)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShiftingSchedule  $shiftingSchedule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(ShiftingSchedule::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShiftingSchedule  $shiftingSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ShiftingSchedule $shiftingSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShiftingSchedule  $shiftingSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'edit_description' => 'required',
            'edit_time_in' => 'required',
            'edit_time_out' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{
            try {
                DB::beginTransaction();

                $shiftingSchedule = ShiftingSchedule::findOrFail($id);
                $shiftingSchedule->description = strtoupper($request['edit_description']);
                $shiftingSchedule->in = $request['edit_time_in'];
                $shiftingSchedule->out = $request['edit_time_out'];
                $shiftingSchedule->save();

                DB::commit();

                return response()->json(array('success'=> true, 'messages' => 'Record Successfully saved'));
            } catch (\PDOException $e) {
                DB::rollBack();
                return response()->json(array('success'=> false, 'error'=>'SQL error!', 'messages'=>'Transaction failed!'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShiftingSchedule  $shiftingSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShiftingSchedule $shiftingSchedule)
    {
        //
    }

    public function togglestatus($id){


        $result = ShiftingSchedule::findOrFail($id);
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
