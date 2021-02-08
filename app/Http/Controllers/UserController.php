<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Role $role, Permission $permission, User $user)
    {
        $this->role = $role;
        $this->roles = $role;
        $this->user = $user;
        $this->permissions = $permission;
        $this->middleware(["auth", 'role:managers']);
    }
    public function index()
    {
        $users = User::latest()->get();
        $users->transform(function($user){
            $user->role = $user->getRoleNames()->first();
            $user->userPermissions = $user->getPermissionNames();
            return $user;
        });

        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::select('SELECT * FROM roles');
        return view('user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required',
            'password' => 'required|alpha_num|min:6',
            'role' => 'required',
            'email' => 'required|email|unique:users'
        ]);

       // dd($request->all());

         $user = new User();

         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->password = bcrypt($request->password);

         $user->assignRole($request->role);

        // if($request->has('permissions')){
        //     $user->givePermissionTo($request->permissions);
        // }

         $user->save();

         return redirect('user')->with('success','user was successful.');

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
             $user= user::find($id);
            $roles = $user->getRoleNames()->first();
            $allRoles = $this->roles::all();

           return view('user.edit')->with([
               'user'=> $user,
               'roles' =>  $roles,
               'allRoles' =>  $allRoles

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
        $user = user::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
     //   $user->removeRole($user->roles);
        if($request->has("role")){

            $this->reassignRole($id,$request->role);
        }
       // $user->assignRole($request->role);
        $user -> save();
        return redirect('user')->with(['success','Update was successful.' ]);

    }

    private function reassignRole($id,$new_role)
    {
        $user = $this->user->find($id);
        $role = $user->roles->first();
        if($role){
            $user->removeRole($role);
        }

        $status = $user->assignRole($new_role);

        if($status){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user = User::find($id);
        if (!$this->user->removable) {
           return redirect('user')->with('success','user can be  deleted.');
        }

        $this->user->delete();

        return redirect('user')->with('success','user deleted.');
    }


    public function profile(){
        return view("profile.index");
    }
}



