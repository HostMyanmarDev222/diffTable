<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $redirectTo = '/employee/home';
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login.employee');
    }
    public function username()
    {
        return 'employee_id';
    }
    protected function guard()
    {
        return Auth::guard('employee');
    }
    public function login(Request $request){
        $input = $request->all();
   
        $this->validate($request, [
            'employee_id' => 'required',
            'password' => 'required',
        ]); 

        if (Auth::guard('employee')->attempt(['employee_id' => $request->employee_id, 'password' => 
        $request->password])) {
        return view('test');//Auth::guard('employee')->user()->test()
        }
        return 'fail';
    }

    public function logout(){
        // Session::flush();
        
        Auth::guard('employee')->logout();

        return redirect('employee/login');
    }
}
