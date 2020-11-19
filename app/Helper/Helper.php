<?php
namespace App\Helper;

use App\RolePermission;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Auth;

class Helper
{

    public static function getUserPermission($permissionName = 0)
    {
        if (Auth::user()->user_type == "superadmin") {
            return true;
        } else {
            $user = Auth::user();

            $role = RolePermission::with('permission')
            ->where('role_id', '=', $user->role_id)
            ->get();

            $user_permission=[];
            foreach ($role as $key => $value) {
                foreach ($value->permission as $perm) {
                    if (in_array($perm->permission, $permissionName)) {
                        $user_permission[]=$perm;
                    }
                }
            }

            if (empty($user_permission)) {
                return false;
            } else {
                return true;
            }
        }
        return false;
    }
}
