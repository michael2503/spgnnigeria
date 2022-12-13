<?php

namespace App\Models;

use App\Classes\CustomDateTime;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email_code',
        'code_time',
        'email_verify',
        'phone_code',
        'phone_verify',
        'phone_code_time'
    ];

    protected $hidden = [
        'email_code'
    ];


    public static function createUpdate($userID, $code){
        $check = self::where('user_id', $userID)->exists();
        if($check){
            $action = self::where('user_id', $userID)->update([
                'email_code' => $code,
                'code_time' => CustomDateTime::addDate(30 .' minutes'),
                'email_verify' => 0
            ]);
        } else {
            $action = self::create([
                'user_id' => $userID,
                'email_code' => $code,
                'code_time' => CustomDateTime::addDate(30 .' minutes'),
                'email_verify' => 0
            ]);
        }
        return $action;
    }



    public static function createUpdatePhone($userID, $code){
        $check = self::where('user_id', $userID)->exists();
        if($check){
            $action = self::where('user_id', $userID)->update([
                'phone_code' => $code,
                'phone_code_time' => CustomDateTime::addDate(30 .' minutes'),
                'phone_verify' => 0
            ]);
        } else {
            $action = self::create([
                'user_id' => $userID,
                'phone_code' => $code,
                'phone_code_time' => Carbon::now()->addMinutes(30)
            ]);
        }
        return $action;
    }


    public static function verifyEmail($userID, $code){
        $check = self::where('user_id', $userID)->first();
        if($check && $check->email_code == $code){
            if($check->code_time >= CustomDateTime::currentTime()){
                $update = self::where('user_id', $userID)->update([
                    'email_verify' => 1
                ]);
                if($update){
                    User::where('id', $userID)->update([
                        'email_verify' => 1,
                        'status' => "Active"
                    ]);
                }
            } else {
                return 'codeExpire';
            }
        } else {
            return 'notMatched';
        }
    }


    public static function verifyPhone($userID, $code){
        $check = self::where('user_id', $userID)->first();
        if($check && $check->phone_code == $code){
            if($check->phone_code_time >= CustomDateTime::currentTime()){
                $update = self::where('user_id', $userID)->update([
                    'phone_verify' => 1
                ]);
                if($update){
                    User::where('id', $userID)->update([
                        'phone_verify' => 1,
                    ]);
                }
            } else {
                return 'codeExpire';
            }
        } else {
            return 'notMatched';
        }
    }
}
