<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class AdminController extends Controller
{
    public function role()
    {
        $role = Role::all();
        $menu = Menu::all('id', 'name');
        return view('admin.role', compact('role', 'menu'));
    }

    public function addRole(Request $request)
    {
        Role::create(['name' => $request->name]);
        return back();
    }

    public function user()
    {
        $user = User::get(['id', 'name', 'email']);
        $role = Role::all();
        return view('admin.user', compact(['user', 'role']));
    }

    public function giveRole(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user->roles) {
            $user->syncRoles([]);
            $user->assignRole($request->role_id);
        } else {
            $user->assignRole($request->role_id);
        }
    }

    public function giveRoleMenu(Request $request)
    {
        return DB::table('role_has_menu')->insert(['role_id' => $request->role_id, 'menu_id' => $request->menu_id]);
    }

    public function getActiveRole(Request $request)
    {
        $userRole = optional(User::find($request->user_id)->roles->first())->id;
        $role = Role::all();
        return view('admin.showrole', compact(['role', 'userRole']));
    }

    public function getActiveMenu(Request $request)
    {
        $role = new Role;
        $data = [];
        foreach ($role->showMenu($request->role_id) as $key => $va) {
            array_push($data, $va->id);
        }
        return $data;
    }
}
