<?php

namespace App\Classes;

use App\Models\WebsiteSetting;
use App\Models\WebsiteSettings;

class Config
{

	/**
	 * Build success response
	 * @param string/array $data
	 * @param int  $code
	 * @return Illuminate\Http\JsonResponse
	*/

	public static function project(){
		//Return TRUE on production
		//or return FALSE on development
		return false;
	}

	public static function project_name(){
		return	WebsiteSetting::single()->biz_name;
	}

	public  static function siteEmail(){
		return WebsiteSetting::single()->site_email;
	}

	public static function siteName(){
		return	WebsiteSetting::single()->site_name;
	}



	public static function serverName(){
		if(self::project()){
			return	str_replace('https://', '', str_replace('http://', '', str_replace('www.', '', WebsiteSetting::single()->site_url)));
		}
		else{
			return	$_SERVER['HTTP_HOST'];
		}
	}


	public  static function host(){
		if(self::isSecure() == 'on'){
			$serverHost = "https://".self::serverName();
		}
		else{
			$serverHost = "http://".self::serverName();
		}

		return	$serverHost;
	}

    public static function uploadHost(){
		if(self::isSecure() == 'on'){
			$serverHost = "https://".self::serverName();
		}
		else{
			$serverHost = "http://".self::serverName();
		}

		return	$serverHost;
    }

	public static function isSecure() {
        if((isset($_SERVER['HTTPS']) AND $_SERVER['HTTPS'] == "on")) {
            return 'on';
        }
        else{
            return 'off';
        }
    }


}
