<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["roles"] = Role::all();
        return view("backend.role.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["permissions"] = Permission::all();
        return view("backend.role.create",$data);
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
        'name' => 'required|string',
        'display_name' => 'required',
        'description' => 'required',
        ]);

        if($validator->fails()){
             return redirect()->back()->withErrors($validator);
          }
        
        $dataExist = Role::where('name',$request->name)->first();

        if($dataExist){

        Session::flash('type','danger');
        Session::flash('message','Role already exists');
        return redirect()->route('role.create');
 
       }
        
        $role = Role::create([
          'name' => str_slug($request->name),
         'display_name' => $request->display_name,
        'description' => $request->description,
        ]);
        
        $role->attachPermissions($request->permissions);
     
        
        Session::flash('type','success');
        Session::flash('message','Role Successfully Created');
        
        return redirect()->route('role.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $data["role"] = $role;
        return view("backend.role.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data["role"] = $role;
        $data["permissions"] = Permission::all();
        return view("backend.role.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validation = $request->validate([
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required'
        ]);

        

    $role->update([
        'name' => str_slug($request->name),
        'display_name' => $request->display_name,
        'description' => $request->description,
    ]);

    $role->syncPermissions($request->permissions);
        
        session()->flash('type','success');
        session()->flash('message','Role Successfully Updated');
        return redirect()->route('role.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('type','success');
        session()->flash('message','Role Deleted Successfully');
        return redirect()->route('role.index');

    }

}
