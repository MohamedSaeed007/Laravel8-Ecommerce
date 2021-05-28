<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //dd(Role::all());
        $title = 'manage roles';
        return view('admin.roles.index')->with('roles',Role::all())->with('title',$title);
    }

    public function store(Request $request)
    {
        Role::updateOrCreate(['id'=>$request->id],['guard_name'=>'admin','name'=>$request->name]);
        if(empty($request->id))
			$msg = __('site.Data Created successfully');
		else
			$msg = __('site.Data Updated successfully');
        $toastr = array(
            'message' => $msg,
            'alert-type' => 'success'
        ); 
        return redirect()->route('admin.roles.index')->with($toastr);

    }

    public function edit($id)
    {
		$role = Role::find($id);
		return Response::json($role);
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        $toastr = array(
            'message' => __('site.Data Deleted successfully'),
            'alert-type' => 'success'
        ); 
        return redirect()->route('admin.roles.index')->with($toastr);
    }

    public function assignPermissions($id){
        $title = 'assign permissions';
        $role = Role::findById($id);
        $permissions = Permission::all();
        
        return view('admin.roles.assign')->with('role',$role)->with('permissions',$permissions)->with('title',$title);
    }

    public function assignPermissionsPost(Request $request,$id){
        $role = Role::findById($id);
        $role->syncPermissions($request->permissions);
        $toastr = array(
            'message' => __('site.Permissions Assigned successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('admin.roles.index')->with($toastr);
    }
}
