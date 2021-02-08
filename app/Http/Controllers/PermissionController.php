<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware(['auth', 'role:managers']);
    }
    public function index()
    {
        $permissions = $this->permission::all();

        return view("permission.index", ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->permission->create([
            'name' => str_replace(' ', '-', strtolower($request->name))
        ]);
        return redirect('permission')->with('success','Permission was successful.');
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
        $permission= permission::find($id);

       // $permissions = $this->permissions::all();
       //$permissions = DB::select('SELECT * FROM permissions');
        return view('permission.edit')->with([

            'permission' => $permission,
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
      // Reset cached roles and permissions
      app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

      $permission = Permission::find($id);


      $this->validate($request, [
          'name' => 'required|string|min:4|unique:permissions,name,'.$permission->id,
      ]);

      $permission->name = str_replace(' ', '-', strtolower($request->name));

      // Logging activity for created role
     // activity()->performedOn($permission)->withProperties(['name'=>$permission->name,'by'=>Auth::user()->username])->causedBy(Auth::user())->log('Permission was updated');

      $permission->save();

      return redirect('permission')->with('success','Permission was successful.');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permission = Permission::find($id);
        if (!$this->permission->removable) {
            return redirect('permission')->with('success','Permission can not be  deleted.');
        }

        $this->permission->delete();

        return redirect('permission')->with('success','Permission deleted.');
    }
}
