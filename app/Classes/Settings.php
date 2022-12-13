<?php

namespace App\Classes;

use App\Models\WebsiteSetting;
use App\Models\WebsiteSettings;

class Settings
{

	/**
	 * Build success response
	 * @param string/array $data
	 * @param int  $code
	 * @return Illuminate\Http\JsonResponse
	*/



    public static function randomNums($length){
		$chars = "1234567890";
		$clen   = strlen($chars)-1;
		$randmStr  = '';

		for ($i = 0; $i < $length; $i++) {
		      $randmStr .= $chars[mt_rand(0,$clen)];
		}
		return strtoupper($randmStr);
	}

    public static function randomStrgs($length){
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		// $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$clen   = strlen($chars)-1;
		$randmStr  = '';

		for ($i = 0; $i < $length; $i++) {
		      $randmStr .= $chars[mt_rand(0,$clen)];
		}
		return strtoupper($randmStr);
	}

    public static function numberEncrypt($code){
        if(strlen($code) < 91){
            $parts = str_split($code, 2);
            $allCode = '';
            foreach ($parts as $value) {
                $allCode .= self::randomStrgs(40).$value;
            }
            // return $allCode;
            $search  = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
            $replace = array('K', 'X', 'O', 'A', 'D', 'Q', 'T', 'E', 'J', 'V');
            $result = str_replace($search, $replace, $allCode);

            return $result;
        }

    }


    public static function numberDecrypt($code){
		$search = array('K', 'X', 'O', 'A', 'D', 'Q', 'T', 'E', 'J', 'V');
        $replace  = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
        $result = str_replace($search, $replace, $code);
        $parts = str_split($result, 42);

        $newStr = '';
        foreach ($parts as $value) {
            $newStr .= substr($value, -2);
        }
        $divideCode = strlen($code) / 2;
        if(strpos($divideCode, ".") !== false){
            return substr($newStr, 0, -2).substr($newStr, -1);
        } else {
            return $newStr;
        }
    }


}
