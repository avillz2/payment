<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Role $role, Permission $permission )
    {
        $this->role = $role;
        $this->permissions = $permission;
        $this->middleware(["auth", 'role:managers']);
    }
    public function index()
    {
        $roles = $this->role::all();
      //  dd($roles->load('permissions'));
        return view("role.index", ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $permissions = $this->permissions::all();
    //$permissions = DB::select('SELECT * FROM permissions');
        return view("role.create", ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|unique:roles',
        //     'permissions' => 'nullable'
        // ]);

        $role = $this->role->create([
            'name' => str_replace(' ', '-', strtolower($request->name))
        ]);

        if($request->has("permissions")){
            $role->syncPermissions($request->permissions);
        }

        return redirect('role')->with('success','role was successful.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $role= role::find($id);
        //$permissions = $this->permissions::all();
       //$permissions = DB::select('SELECT * FROM permissions');
       // return view('role.show')->with(['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role= role::find($id);
        $allPermissions = $this->permissions::all();
        $permissions = $role->getPermissionNames();
       // $permissions = $this->permissions::all();
       //$permissions = DB::select('SELECT * FROM permissions');
        return view('role.edit')->with([
            'role' => $role,
            'allPermissions' => $allPermissions,
            'permissions' => $permissions,
        ]);
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
       //dd($request);
        $role = role::find($id);

        if($request->has("permissions")){
            $role->syncPermissions($request->permissions);
        }

        return redirect('role')->with('success','role was successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $this->role = Role::find($id);
       if (!$this->role->removable) {
            return redirect('role')->with('success','role can be  deleted.');
        }

        $this->role->delete();

        return redirect('role')->with('success','user deleted.');
    }
}
