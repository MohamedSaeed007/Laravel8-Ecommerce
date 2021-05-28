<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $title = 'manage permissions';
        return view('admin.permissions.index')->with('permissions',Permission::all())->with('title',$title);
    }

    public function store(Request $request)
    {
        Permission::updateOrCreate(['id'=>$request->id],['guard_name'=>'admin','name'=>$request->name]);
        if(empty($request->id))
			$msg = __('site.Data Created successfully');
		else
			$msg = __('site.Data Updated successfully');
        $toastr = array(
            'message' => $msg,
            'alert-type' => 'success'
        ); 
        return redirect()->route('admin.permissions.index')->with($toastr);

    }

    public function edit($id)
    {
		$permission = Permission::find($id);
		return Response::json($permission);
    }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        $toastr = array(
            'message' => __('site.Data Deleted successfully'),
            'alert-type' => 'success'
        ); 
        return redirect()->route('admin.permissions.index')->with($toastr);
    }
}
