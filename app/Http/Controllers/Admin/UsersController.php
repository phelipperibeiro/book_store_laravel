<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index()
    {
        $this->authorize('user_list');
        
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('user_add');
        
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->authorize('user_add');
        
        User::create($this->prepareFields($request));
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $this->authorize('user_edit');
        
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('user_edit');
        
        User::find($id)->update($this->prepareFields($request));
        return redirect()->route('admin.users.index');
    }


    public function destroy($id)
    {
        $this->authorize('user_destroy');
        
        User::find($id)->delete();
        return redirect()->route('admin.users.index');
    }
    
    public function roles($id)
    {
        $this->authorize('user_view_roles');
        
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.roles', compact('user', 'roles'));
    }

    public function storeRole(Request $request, $id)
    {
        $this->authorize('user_add_role');
        
        $user = User::find($id);
        $roles = Role::findOrFail($request->all()['role_id']);
        
        $user->addRole($roles);
        return redirect()->back();
    }
    
    public function revokeRole($id, $role_id)
    {
        $this->authorize('user_revoke_role');
        
        $user = User::find($id);
        $roles = Role::findOrFail($role_id);
        
        $user->revokeRole($roles);
        return redirect()->back();
    }
    
    public function prepareFields(Request $request)
    {
        $input = $request->all();
        if (isset($input['password'])) {
            $input['password'] = bcrypt($input['password']);
            return $input;
        }
        return $input;
    }

}
