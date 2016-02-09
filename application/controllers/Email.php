<?php


class Email extends CI_Controller{
    public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
        //$this->load->model('Reminder');
     }
 

public function send(){
require_once('PHPMailer/class.phpmailer.php');
    $table = $this->input->post('table');
    $today = date("Y-m-d");
    $subject = "Eod";
    $body .= 'Dear Pankaj,<br /><br />';
    $body .=  "Please find EOD as below.";
    $body .=  "<br /><br /><br />";
    $body .=  $table;
    $body .=  "<br /><br />";
    $body .= "With Regards<br />Amrit Sharma";
    
    $mail  = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->addAddress('amrit.sharma@capitalvia.com', 'Pankaj Jain');
    //$mail->addCC('amrit.sharma@capitalvia.com', 'Amrit Sharma');
    $mail->setFrom('amrit.sharma@capitalvia.com', 'Amrit Sharma');
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    if($mail->Send()) {
         echo "email sent";
     }else{
         echo "mail failed ".$mail->ErrorInfo;
     }
     

}
}