<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{


    // permission control
    public function AllPermission()
    {
        // $permissions = Permission::all();
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }
    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    }
    public function StorePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission create Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request)
    {
        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Update Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.permission')->with($notification);
    }
    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function ImportPermission()
    {
        return view('backend.pages.permission.import_permission');
    }

    public function Export()
    {
        return Excel::download(new PermissionExport, 'Permission.xlsx');
    }

    public function Import(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message' => 'Permission Import Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // end Permission control








    // Role control
    public function AllRoles()
    {
        $roles = Role::all();
        return view('backend.pages.role.all_role', compact('roles'));
    }
    public function AddRoles()
    {
        return view('backend.pages.role.add_role');
    }
    public function StoreRoles(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role create Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRoles($id)
    {
        $roles = Role::findOrFail($id);
        return view('backend.pages.role.edit_role', compact('roles'));
    }

    public function UpdateRoles(Request $request)
    {
        $role_id = $request->id;
        Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role Update Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id)
    {
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }
    // end role control






    // add Permission to Role
    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('backend.pages.rolesetup.add_role_permission', compact('roles', 'permissions', 'permission_groups'));
    }


    // Store Permission to Role
    public function RolePermissionStore(Request $request)
    {
        $permissions = (array) $request->permission;

        foreach ($permissions as $permissionId) {
            DB::table('role_has_permissions')->insert([
                'role_id' => $request->role_id,
                'permission_id' => $permissionId,
            ]);
        }

        $notification = [
            'message' => 'Role Permissions added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }

    // Show all Role and Permission
    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));
    }

    // Edit Permission in Roles
    public function AdminEditRoles($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('backend.pages.rolesetup.edit_role_permission', compact('role', 'permissions', 'permission_groups'));
    }

    // Update permission in Role
    public function AdminRolesUpdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        $notification = [
            'message' => 'Role Permissions Update successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }
    // delete role and permission
    public function AdmiNDeleteRoles($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }
        $notification = [
            'message' => 'Role Permissions Delete successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
    // end


}