<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLoginActivity extends Model
{
    protected $fillable =
    [
        'admin',
        'ip',
        'browser',
        'os',
        'last_access',
    ];
    use HasFactory;


    public static function loginActivity(){
        return self::select('admin_login_activities.*', 'admins.first_name', 'admins.last_name')
            ->join('admins', 'admins.id', '=', 'admin_login_activities.admin')->orderBy('admin_login_activities.id', 'DESC')->get();
    }
}
