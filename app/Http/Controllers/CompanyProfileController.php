<?php

namespace App\Http\Controllers;

use App\CompanyProfile;
use Illuminate\Http\Request;
use Validator;
use DB;
use Response;
use Image;

class CompanyProfileController extends Controller
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
        $company = CompanyProfile::first();
        return view('company_profile.index', ['company' => $company ]);
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
            'company' => 'required',
            'contact' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('success'=> false, 'messages' => 'Please fill up all the required fields!'));
        }else{
            try {
                DB::beginTransaction();
                $company_ctr = CompanyProfile::count();

                if($company_ctr >= 1){
                    $company = CompanyProfile::findOrFail(1);
                    $action = "update";
                }else{
                    $company = new CompanyProfile;
                    $action = "create";
                }

                $company->company_name = strtoupper($request['company']); 
                $company->contact_number = $request['contact'];
                $company->email = $request['email'];
                $company->description =  strtoupper($request['description']);
                $company->address =  strtoupper($request['address']);
                $company->mission =  strtoupper($request['mission']);
                $company->vision =  strtoupper($request['vision']);

                if($request->hasFile('logo')) {
                    $filename= strtoupper($request['company']) .'.'. $request['logo']->getClientOriginalExtension();
                    $path=public_path('images/'. $filename);
                    Image::make($request['logo']->getRealPath())->resize(200, 200)->save($path);
                }

                $company->logo = !empty($filename)?$filename : 'default-logo.png';
                $company->status = 1;
                $company->save();

                DB::commit();

                actionLogs('company mngt', $action .' : '. $company->id);

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
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CompanyProfile::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }
}
