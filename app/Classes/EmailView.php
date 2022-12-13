<?php

namespace App\Classes;



use App\Classes\Config;
use App\Classes\PHPMailer;
use App\Classes\CustomDateTime;
use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use App\Models\User;
use App\Models\WebsiteSetting;

class EmailView
{

	/**
	 * Build success response
	 * @param string/array $data
	 * @param int  $code
	 * @return Illuminate\Http\JsonResponse
	*/


	public function __construct(){
	}



    public static function indexView($mssaBody){
        $webSeting = WebsiteSetting::first();
        return  '
        <!DOCTYPE html>
        <html lang="en">

			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Mail title | Bluescrow</title>
			</head>
			<body style="background:#f8f8f8; width: 100%; padding: 0;margin: 0;overflow-x: hidden; font-family:calibri; font-weight: 400px; font-size: 16px">
                <section style="background: #fff; max-width:650px; margin: auto; margin-top: 40px; padding: 10px">
					<div style="background: #000; height:92px; text-align: center">
                        <img src="https://res.cloudinary.com/djnzfol2x/image/upload/v1668553407/mainassets/mlcjklwtdyibgity2nvt.png" style="width: 220px; padding-top: 7px"/>
                    </div>

                    <div style="border: 1px solid #dfdfdf !important; padding: 30px; margin-top: 30px; border-radius: 5px">

                        '.$mssaBody.'

                        <div style="border-top: 1px solid #dfdfdf; margin-top: 70px; text-align: center">
                            <p style="margin-bottom: 0px; padding-top: 15px">You can reach us on '.$webSeting->biz_email.' or call <br> '.$webSeting->biz_phone.', '.$webSeting->biz_phone_2.' </p>
                        </div>
                    </div>
                </section>
                <div style="margin-top: 20px; text-align: center; margin-bottom: 50px">
                    <p>© SPGN Nigeria '.date('Y').', All rights reserved</p>
                </div>
            </body>
        </html>
        ';
    }





}
