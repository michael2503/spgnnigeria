<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'service',
        'address',
        'city',
        'state',
        'gender',
        'occupation',
        'schedule_date',
        'marital_status',
        'message',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
