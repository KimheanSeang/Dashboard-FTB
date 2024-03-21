<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class UserCheck extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'user_check';

    protected $fillable = [
        'username', 'name', 'email', 'email_verified_at', 'photo', 'phone', 'address', 'created_by', 'created_date', 'password', 'role', 'status'
    ];

    // Specify the guard to use when checking for roles or permissions
    protected $guard_name = 'web';

    public static function getPermissionGroup()
    {
        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    }

    public static function getPermissionByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name, 'web')) {
                $hasPermission = false;
            }
            return $hasPermission;
        }
    }
}
