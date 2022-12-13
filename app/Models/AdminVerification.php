<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminVerification extends Model
{
    protected $fillable =
    [
        'admin_id',
        'email_code',
        'code_time',
        'email_verify',
        'phone_code',
        'phone_verify',
        'phone_code_time'
    ];

    use HasFactory;

    protected $hidden = [
        'email_code'
    ];



    public static function createUpdate($userID, $code){
        $check = self::where('admin_id', $userID)->exists();
        if($check){
            $action = self::where('admin_id', $userID)->update([
                'email_code' => $code,
                'code_time' => now()->addMinutes(30),
                'email_verify' => 0
            ]);
        } else {
            $action = self::create([
                'admin_id' => $userID,
                'email_code' => $code,
                'code_time' => now()->addMinutes(30),
                'email_verify' => 0
            ]);
        }
        return $action;
    }



    public static function verifyEmail($userID, $code){
        $check = self::where('admin_id', $userID)->first();
        if($check && $check->email_code == $code){
            if($check->code_time >= now()){
                self::where('admin_id', $userID)->update([
                    'email_verify' => 1
                ]);
            } else {
                return 'codeExpire';
            }
        } else {
            return 'notMatched';
        }
    }


}
