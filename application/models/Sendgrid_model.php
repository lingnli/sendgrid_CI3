<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
class Sendgrid_model extends CI_Model {

  //sendgrid api key
  private $sendgrid_apikey = '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';
  //sendgrid sender mail
  private $sender_mail = 'wmdlifecoba@hotmail.com';  
  //sendgrid sender name
  private $sender_name = 'lingnili';

	function __construct(){
		parent::__construct ();
		date_default_timezone_set("Asia/Taipei");
	}

  public function send($subject =FALSE,$receiver =FALSE,$content=FALSE){
    //content可為html或字串

    //test
    $subject = 'test';
    $receiver = 'wmdlifecoba@gmail.com';
    $content ='測試1102';
    

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($this->sender_mail,$this->sender_name);
    $email->setSubject($subject);
    $email->addTo($receiver);    
    $email->addContent('text/html',$content);
    

    $sendgrid = new \SendGrid($this->sendgrid_apikey);

    try{
      $response = $sendgrid->send($email);      

      print_r($response);exit;

    }catch(Exception $e){

      echo "error:" . $e->getMessage() . "\n";

    }

  }

}