<?php

namespace App\Http\Controllers;

use App\ShiftingSchedule;
use Illuminate\Http\Request;
use DB;

class ShiftingScheduleController extends Controller
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

    public function findall2(){
        return response()->json(ShiftingSchedule::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShiftingSchedule  $shiftingSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ShiftingSchedule $shiftingSchedule)
    {
        //
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
    public function update(Request $request, ShiftingSchedule $shiftingSchedule)
    {
        //
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
}
