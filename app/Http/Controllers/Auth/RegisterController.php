<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Employee;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'employee_code' => ['required', 'string', 'max:255', 'unique:employees'],
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try{
            DB::beginTransaction();
 
            $employee = new Employee;
            $employee->employee_code = strtoupper($data['employee_code']);
            $employee->lastname = strtoupper($data['lastname']);
            $employee->firstname = strtoupper($data['firstname']);
            $employee->middlename = strtoupper($data['middlename']);
            $employee->save();

            
            $user = new User;
            $user->employee_id = $employee->id;
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->contact_number = $data['contact_number'];
            $user->status = '1';
            $user->access = '2';
            $user->save();
            DB::commit();

            return $user;
        }catch(\PDOException $e){
            DB::rollback();
        }
    }
}
