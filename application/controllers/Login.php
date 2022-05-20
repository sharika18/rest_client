<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/Email.php");

class Login extends Email{

  public $success = "Data Berhasil";
  public $error = "Data Gagal";
  public function __construct()
  {
    include "construct.php";
    $this->load->library('form_validation');
  }
  
  public function login()
  {
    $this->form_validation->set_rules('emailEmail', 'Email', 'trim|required');
    $this->form_validation->set_rules('passwordPassword', 'Password', 'trim|required');

    if($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('error', validation_errors());
      redirect('Welcome');  
    }
    else{
      $userEmail = $this->input->post('emailEmail');
      $userPassword = $this->input->post('passwordPassword');

      $data = array(
        'AR-KEY'       => $this->key,
        'email'    => $userEmail,
        'password' => $userPassword
      );
      $login = json_decode($this -> curl -> simple_get ($this->API.'/User/getUserByEmailPassword/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
      if($login > 0)
      {
        print_r($login['data'][0]['userId']);
        $sessionArray = array (
          'id' => $login['data'][0]['userId'],
          'userEmail' => $login['data'][0]['email'],
          'userName'  => $login['data'][0]['userName']
        );
        $this->session->set_userdata('loggedIn', $sessionArray);
        redirect('media?modul=home');
      }
      else
      {
        $this->session->set_flashdata('error','email or password is incorect');
        redirect('Welcome'); 
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('Welcome'); 
  }

  public function forgotPassword()
  {
    $this->load->view('Pages/Auth/AuthForgotPassword');
  }

  public function createTokens($userId = "", $tokenCreated = "")
  {
    $now = date('Y-m-d H:i:s');
    $token = $tokenCreated;
    $data = [
        'token'         => $token,
        'userId'        => $userId,
        'CreatedBy'     => "DEPRA", 
        'CreatedDate'   => $now,
        'ModifiedBy'    => "Depra",
        'ModifiedDate'  => $now,
        'AR-KEY'        => $this->key,
    ];
    $insert = $this->curl->simple_post($this->API.'/Tokens/createTokens/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    /*if($insert)
    {
        $this->session->set_flashdata('success',$this->successPost);
    }else
    {
        $this->session->set_flashdata('error',$this->errorPost);
    }*/
    //redirect('biaya?modul=masterBiaya&act=Tambah');
  }

  public function checkEmail()
  {
    $userEmail = $this->input->post('emailEmail');
    $data = array(
      'AR-KEY'       => $this->key,
      'email'    => $userEmail
    );
    $user = json_decode($this -> curl -> simple_get ($this->API.'/User/getUserByEmail/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
    if($user)
    {
      $userId = $user['data'][0]['userId'];
      $token  = substr(sha1(rand()), 0, 30);
      $this->createTokens($userId, $token);
      $qstring = base64_encode($token.$userId);
      $url = site_url() . '/Login/resetPassword/token/' . $qstring;
      $link = '<a href="' . $url . '">' . $url . '</a>';

      $message = '';
      $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
            password anda.</strong><br>';
      $message .= '<strong>Silakan klik link ini:</strong> ' . $link;
      $this->sendMail($userEmail, "", "Arrisalah WebApp Reset Password", $message);
      //echo $link;
      
      $this->session->set_flashdata('success','Check your email.');
      redirect('Login/forgotPassword');
    }
    else {
      $this->session->set_flashdata('error','email is incorect');
      redirect('Login/forgotPassword');
    }
  }

  public function isTokenValid($tokenDecoded)
  {
      $token = substr($tokenDecoded, 0, 30);
      $userId = substr($tokenDecoded, 30);

        $data = array(
          'AR-KEY'  => $this->key,
          'token'   => $token,
          'userId'  => $userId
        );
        $tokens = json_decode($this -> curl -> simple_get ($this->API.'/Tokens/getTokensByTokenUserId/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
        if($tokens)
        {

          $createdDate = date('Y-m-d', strtotime($tokens['data'][0]['createdDate']));
          $createdTS = strtotime($createdDate);
          $today = date('Y-m-d');
          $todayTS = strtotime($today);
          if ($createdTS != $todayTS) {
            
            echo $createdTS." : ".$todayTS;
            return false;
          }


          $dataUser = array(
            'AR-KEY'  => $this->key,
            'userId'  => $userId
          );
          $userData = json_decode($this -> curl -> simple_get ($this->API.'/User/getUserByUserId/', $dataUser, array(CURLOPT_BUFFERSIZE => 10)),true);
          return $userData;
        }
        else{
          return false;
        }
  }

  public function resetPassword()
  {
    $token = base64_decode($this->uri->segment(4));
    $cleanToken = $this->security->xss_clean($token);
    
    $userInfo = $this->isTokenValid($cleanToken);
    if (!$userInfo) {
      $this->session->set_flashdata('error', 'Token tidak valid atau kadaluarsa');
      redirect('Welcome');
    }
    $data['userInfo'] = $userInfo['data'];

    $this->load->view('Pages/Auth/AuthRecoverPassword', $data);
    //print_r($userInfo['data']);
  }

  public function updatePassword()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
        'AR-KEY'          => $this->key,
        'id'              => $this->input-> post ('txtID'),
        'Password'        => $this->input-> post ('passwordPassword'),
        'CreatedBy'       => $this->input-> post ('CreatedBy'),
        'CreatedDate'     => $this->input-> post ('CreatedDate'),
        'ModifiedBy'      => "DEPRA",
        'ModifiedDate'    => $now
    );
    $update = $this->curl->simple_put($this->API.'/User/updateUserById/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    if($update)
    {
        $this->session->set_flashdata('success',$this->successPut);
    }else
    {
        $this->session->set_flashdata('error',$this->errorPut);
    }
    redirect('Welcome'); 
  }

  
}
