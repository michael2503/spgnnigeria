<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'biz_name',
        'site_name',
        'site_title',
        'site_description',
        'site_url',
        'biz_email',
        'biz_email_2',
        'favicon_url',
        'logo_url',
        'biz_addr',
        'biz_city',
        'biz_state',
        'biz_country',
        'biz_phone',
        'biz_phone_2',
        'updated_by',
        'last_modified',
    ];
}
