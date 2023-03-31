<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\DataTables\UsersDataTable;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\Admin\UsersEmailRequest;
use App\Http\Requests\Admin\UsersInfoRequest;
use App\Http\Requests\Admin\UsersPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Traits\Authorizable;


class UsersController extends Controller
{
    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('pages.admin.add.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'bail|required|min:2|max:255',
            'last_name' => 'bail|required|min:2|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);
        // hash password
        $request->merge(['password' => Hash::make($request->input('password'))]);
        // Create the user
        if ($user = User::create($request->except('roles', 'permissions'))) {
            $this->syncPermissions($request, $user);
            return redirect()->route('users.index')->with('success', 'User has been created.');
        } else {
            return redirect()->route('users.index')->with('error', 'Unable to create user.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = theme()->getOption('page');

        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $config = theme()->getOption('page', 'edit');
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');
        return view('pages.admin.edit.settings', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'bail|required|min:2|max:255',
            'last_name' => 'bail|required|min:2|max:255',
            'roles' => 'required|min:1'
        ]);
        $user = User::findOrFail($id);
        $user->fill($request->except('roles', 'permissions', 'password'));
        $this->syncPermissions($request, $user);
        $user->save();  
        return redirect()->intended('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, User $userData) {
        return $userData->find($id)->delete();
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }

     /**
     * Function to accept request for change email
     *
     * @param  UsersEmailRequest  $request
     */
    public function changeEmail(UsersEmailRequest $request)
    {
        // prevent change email for demo account
        if ($request->input('current_email') === 'demo@demo.com') {
            return redirect()->intended('account/settings');
        }
        $user = User::findOrFail($request->user_id);
        $user->update(['email' => $request->input('email')]);
        if ($request->expectsJson()) {
            return response()->json($request->all());
        }

        return redirect()->intended('users');
    }

    /**
     * Function to accept request for change password
     *
     * @param  UsersPasswordRequest  $request
     */
    public function changePassword(UsersPasswordRequest $request)
    {
        if ($request->input('current_email') === 'demo@demo.com') {
            return redirect()->intended('account/settings');
        }
        $user = User::findOrFail($request->user_id);
        $user->update(['password' => Hash::make($request->input('password'))]);
        if ($request->expectsJson()) {
            return response()->json($request->all());
        }
        return redirect()->intended('users');
    }
    
}
