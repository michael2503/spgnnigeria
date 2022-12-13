<?php

namespace App\Classes;

use Carbon\Carbon;
use Illuminate\Http\Response;

class CustomDateTime
{

	/**
	 * Build success response
	 * @param string/array $data
	 * @param int  $code
	 * @return Illuminate\Http\JsonResponse
	*/

    public static function addDate($dateTime){
		return date('Y-m-d H:i:s', strtotime("$dateTime", strtotime(self::currentTime())));
	}

    public static function addDateNoTimeZone($dateTime){
		return date('Y-m-d H:i:s', strtotime("$dateTime", strtotime(self::currentTimeNotimeZone())));
	}

    public static function currentDate(){
        date_default_timezone_set("Africa/Lagos");
        return date("Y-m-d");
    }

    public static function currentTime(){
        date_default_timezone_set("Africa/Lagos");
        return date("Y-m-d H:i:s");
    }

    public static function currentTimeNotimeZone(){
        return date("Y-m-d H:i:s");
    }

    public static function dateFrmatAlt($cDate, $alt=null){
        return Carbon::createFromFormat('Y-m-d H:i:s', $cDate)->format('M d, Y');
    }

    public static function dateHandler($existDate, $string) {
        return Date('Y-m-d H:i:s', strtotime($existDate ."+".$string));
    }


    public static function getMonthWord($num){
        $result = array(
            '',
            'January',
            'Febuary',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        );

        if($num <= 12){
            return $result[$num];
        }
        return [];
    }


}
