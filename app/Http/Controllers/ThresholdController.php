<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Threshold;
use DB;
use Response;
use Validator;
use PDF; // at the top of the file

class ThresholdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threshold_all = Threshold::where('id', '=', '1')->first();
        // dd($threshold_all);

        if(!empty($threshold_all)){
            return view('threshold.index', ['level' => $threshold_all['level']]);
        }else{
            return view('threshold.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $company = \App\CompanyProfile::findOrFail(1);
        $tbl = '<table style="font-size:12px" border="1" cellpadding="2" cellspacing="2" align="center">
         <tr>
            <th>Employee Code</th>
            <th>Patient Code</th>
            <th>Employee Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Email</th>
            <th>Status</th>
         </tr>
         <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
         </tr>
        </table>';
        
        // $pdf->writeHTML($tbl, true, false, false, false, '');
        
 
        PDF::SetTitle('Sample PDF');
        PDF::SetFont('times');
        PDF::AddPage('L');
        PDF::writeHTML($tbl, true, false, true, false, '');
 
        PDF::Output(uniqid().'_SamplePDF.pdf', 'I');
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
        return response()->json(Threshold::findOrFail($id));
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
        try {
            DB::beginTransaction();

            $threshold_all = Threshold::where('id', '=', '1')->first();
            // dd($threshold_all);

            if(!empty($threshold_all)){
                $threshold = Threshold::findOrFail($id);
                $threshold->level = $request['threshold'];
                $threshold->save();
            }else{
                $threshold_create = new Threshold;
                $threshold_create->level = $request['threshold'];
                $threshold_create->status = '1';
                $threshold_create->save();
            }
             

            DB::commit();

            return response()->json(array('success'=> true, 'messages' => 'Record Successfully saved'));
        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(array('success'=> false, 'error'=>'SQL error!', 'messages'=>'Transaction failed!'));
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
