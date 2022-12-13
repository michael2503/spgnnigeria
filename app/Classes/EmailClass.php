<?php

namespace App\Classes;



use App\Classes\Config;
use App\Classes\PHPMailer;
use App\Classes\CustomDateTime;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\EmailTemplate;
use App\Models\WebsiteSettings;
use App\Models\User;
use Exception;

class EmailClass
{

	/**
	 * Build success response
	 * @param string/array $data
	 * @param int  $code
	 * @return Illuminate\Http\JsonResponse
	*/


	public function __construct(){
	}


	// EMAIL VERIFICATION EMAIL
	public static function companyMail($userInfo) {
		$emailContent = EmailTemplate::where('id', 1)->first();

        $searchSub = array('{NAME}');
		$replaceSub = array(ucwords($userInfo['name']));
		$subject = str_replace($searchSub, $replaceSub, $emailContent->title);

		$search = array('{NAME}', '{EMAIL}', '{PHONE}', '{MESSAGE}');
		$replace = array(ucwords($userInfo['name']), $userInfo['email'], $userInfo['phone_number'], $userInfo['customermessage']);
		$message = str_replace($search, $replace, $emailContent->content);

		$body = EmailView::indexView($message);
        // superiorperformanceng@gmail.com

        $check = self::sendMailer($userInfo['name'], 'superiorperformanceng@gmail.com', $subject, $body);
        return $check;
	}


    public static function resetPassword($adminInfo, $emailCode) {
		$emailContent = EmailTemplate::where('id', 3)->first();

        $search = array('{NAME}', '{EMAIL_CODE}');
		$replace = array(ucwords($adminInfo->full_name), $emailCode);
		$message = str_replace($search, $replace, $emailContent->content);
		$subject = $emailContent->title;

		$body = EmailView::indexView($message);

        $check = self::sendMailer($adminInfo->full_name, $adminInfo->email, $subject, $body);
        return $check;
	}

    public static function resetPasswordUser($userInfo, $emailCode) {
		$emailContent = EmailTemplate::where('id', 3)->first();

        $search = array('{NAME}', '{CODE}');
		$replace = array(ucwords($userInfo->first_name.' '.$userInfo->last_name), $emailCode);
		$message = str_replace($search, $replace, $emailContent->content);
		$subject = $emailContent->title;

		$body = EmailView::indexView($message);

        $check = self::sendMailer(ucwords($userInfo->first_name.' '.$userInfo->last_name), $userInfo->email, $subject, $body);
        return $check;
	}


    // EMAIL VERIFICATION EMAIL
	public static function senderMail($userInfo) {
		$emailContent = EmailTemplate::where('id', 2)->first();

		$subject = $emailContent->title;

		$search = array('{NAME}');
		$replace = array(ucwords($userInfo['name']));
		$message = str_replace($search, $replace, $emailContent->content);

		$body = EmailView::indexView($message);

        $check = self::sendMailer($userInfo['name'], $userInfo['email'], $subject, $body);
        return $check;
	}


    public static function appointmentEmailSender($info){
        $emailContent = EmailTemplate::where('id', 4)->first();

		$subject = $emailContent->title;
        $fullName = ucwords($info['first_name']).' '.ucwords($info['last_name']);

		$search = array('{FULLNAME}');
		$replace = array($fullName);
		$message = str_replace($search, $replace, $emailContent->content);

		$body = EmailView::indexView($message);

        $check = self::sendMailer($fullName, $info['email'], $subject, $body);
        return $check;
    }


    public static function appointmentEmailReceiver($info, $email){
        $emailContent = EmailTemplate::where('id', 5)->first();

		$subject = $emailContent->title;
        $fullName = ucwords($info['first_name']).' '.ucwords($info['last_name']);

		$search = array('{NAME}', '{DATE}', '{FIRSTNAME}', '{LASTNAME}', '{EMAIL}', '{PHONE}', '{DOB}', '{SERVICE}', '{OCCUPATION}', '{GENDER}', '{MARITAL}', '{ADDRESS}', '{CITY}', '{STATE}', '{MESSAGE}');
		$replace = array($fullName, ucwords($info['schedule_date']), ucwords($info['first_name']), ucwords($info['last_name']), $info['email'], $info['phone'], $info['dob'], ucwords($info['service']), ucwords($info['occupation']), ucwords($info['gender']), ucwords($info['marital_status']), $info['address'], ucwords($info['city']), ucwords($info['state']), $info['message'] );
		$message = str_replace($search, $replace, $emailContent->content);

		$body = EmailView::indexView($message);

        $check = self::sendMailer('SPGN', $email, $subject, $body);
        return $check;
    }



    public function sendMailer($fullName, $email, $title, $content){
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
        // try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'superiorperformanceng@gmail.com';
            //live server
            // $mail->Password = 'wmuuvabwjqymprlr';
            //localhost server
            $mail->Password = 'qlkoxgdsjvlejovc'; /* ghfmilvxmlfofdpf */
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('info@spgnnigeria.org', 'SPGN');
            $mail->addAddress($email, $fullName);
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->msgHTML($content);
            if($mail->send()) {
                return 'success';
            } else {
                return 'failed';
            }
        // } catch (Exception $e) {
        //     return 'Message could not be send';
        // }
    }



}
