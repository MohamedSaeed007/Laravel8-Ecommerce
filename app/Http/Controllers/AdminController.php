<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        $toastr = array(
            'message' => 'Logged out Successfully',
            'alert-type' => 'success'
        ); 
        return redirect()->route('admin.login')->with($toastr);
    }
}
