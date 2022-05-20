<?php 
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   include_once (dirname(__FILE__) . "/Finance/PaymentSlips.php");
   include('assets/phpmailer/src/Exception.php');
   include('assets/phpmailer/src/PHPMailer.php');
   include('assets/phpmailer/src/SMTP.php');
   //include_once (dirname(__FILE__) . "/Payroll.php");
   class Email extends CI_Controller { 
      
      function __construct() { 
         include "construct.php"; 
         $this->load->library('session'); 
         $this->load->library('Pdf');
         $this->load->helper('form'); 
      } 
		
      public function index() { 
	
         $this->load->helper('form'); 
         //$this->load->view('email');
      } 
      
      public function sendMaill($toEmail = "", $dirAttachment = "", $subject = "", $message = "") { 
         //from
         $from_email = "payroll@arrisalahlubuklinggau.com"; 
         $to_email = $this->input->post('email'); 
   
         $mail = new PHPMailer(true);
         //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
         $mail->isSMTP();
         // $mail->Host = 'mail.arrisalahlubuklinggau.com';
         // $mail->Username = 'payroll@arrisalahlubuklinggau.com';
         // $mail->Password = 'arrisalah123';
         $mail->Host = gethostbyname('smtp.googlemail.com');
         $mail->Username = 'rodhiyatumm@gmail.com';
         $mail->Password = 'Fullhouse18!';
         $mail->SMTPSecure = PHPMAILER::ENCRYPTION_SMTPS;
         $mail->Port = 465;
         $mail->SMTPOptions = array('ssl' => array('verify_peer_name' => false));
         $mail->SMTPAuth = TRUE;
         $mail->SMTPSecure = 'ssl';
         $mail->SMTPDebug = 2;

         $mail->setFrom('rodhiyatumm@gmail.com', 'Payroll Arrisalah');
         $mail->addAddress('derianpratama@gmail.com');
         $mail->isHTML(true);
         $mail->addAttachment($dirAttachment);
         $mail->Subject = $subject;
         $mail->Body = $message;

         $send = $mail->send();
         if($send) 
         {
            $this->session->set_flashdata('success','Email berhasil dikirimkan');
            echo "TERKIRIM";
         }
         else 
         {
            $this->session->set_flashdata('error','Email gagal dikirimkan');
            echo "TIDAK TERKIRIM";
            //show_error($this->email->print_debugger());
         }
         $mail->ClearAllRecipients(); 
         $mail->ClearAttachments(); 
      } 

      public function sendMail($toEmail = "", $dirAttachment = "", $subject = "", $message = "") { 
         //from
         $from_email = "bmaarrisalah01@gmail.com"; 
         
         $this->load->library('email');
         // $config = array();
         // $config['protocol']  = 'smtp';
         // $config['smtp_host'] = 'ssl://mail.arrisalahlubuklinggau.com';
         // $config['smtp_user'] = 'payroll@arrisalahlubuklinggau.com';
         // $config['smtp_pass'] = 'arrisalah123';
         // $config['smtp_port'] = 465;
         // $config['charset']   = 'iso-8859-1';
         // $config['wordwrap']   = TRUE;
         // $config['mailtype']  = 'html';
         // $config['newline']   = "\r\n"; 

         $config = array();
         $config['protocol']  = 'smtp';
         $config['smtp_host'] = 'ssl://smtp.googlemail.com';
         $config['smtp_user'] = $from_email;
         $config['smtp_pass'] = 'jaurcokzebpfaiyj';//'iso11115';
         $config['smtp_port'] = 465;
         $config['charset']   = 'iso-8859-1';
         $config['wordwrap']   = TRUE;
         $config['mailtype']  = 'html';
         $config['newline']   = "\r\n";
         $this->email->initialize($config);
         
         //sender
         $this->email->from($from_email, 'Payroll Arrisalah'); 
         $this->email->to($toEmail);
         $this->email->subject($subject); 
         $this->email->message($message); 
         //$this->email->cc('bmaarrisalah01@gmail.com'); 
         if($dirAttachment != "")
         {
            //echo "attachment tidak kosong";
            $this->email->attach($dirAttachment);
         }else{
            //echo "attachment kosong";
         }
        
   
         //Send mail 
         if($this->email->send()) 
         {
            $this->session->set_flashdata('success','Email berhasil dikirimkan');
            //print_r("TERKIMIR : ".$toEmail);
         }
         else 
         {
            $this->session->set_flashdata('error','Email gagal dikirimkan');
            show_error($this->email->print_debugger());
            //print_r(" GAGAL : ".$toEmail);
         }
         
         $this->email->clear(TRUE);
      } 
   } 
?>
