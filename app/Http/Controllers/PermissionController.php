<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Traits\Authorizable;
use Illuminate\Http\Request;
use App\DataTables\PermissionDataTable;


class PermissionController extends Controller
{
    // use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionDataTable $dataTable)
    {
        return $dataTable->render('pages.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.permission.add.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:permissions']);
        $permissions = [
            'view_' . $request->name,
            'add_' . $request->name,
            'edit_' . $request->name,
            'delete_' . $request->name
        ];
        foreach ($permissions as $perms) {
            $result = Permission::firstOrCreate(['name' => $perms]);
            $result->assignRole('Admin');
        }
        return redirect()->back()->with('success', 'Record save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        dd('Pending for implementation.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
    */
    public function edit(Permission $permission)
    {
        $permission = Permission::findOrFail($permission->id);
        return view('pages.permission.edit_permission', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {

        // if($permission = Permission::findOrFail($permission->id)) {
        //     // admin role has everything
        //     if($role->name === 'Admin') {
        //         $role->syncPermissions(Permission::all());
        //         return redirect()->route('roles.index');
        //     }

        //     $permissions = $request->get('permissions', []);
        //     $role->syncPermissions($permissions);
        //     flash( $role->name . ' permissions has been updated.');
        // } else {
        //     flash()->error( 'Role with id '. $role->id .' note found.');
        // }

        dd('Pending for implementation.');
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        return Permission::findOrFail($permission->id)->delete();
    }
}
