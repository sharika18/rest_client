<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Uploader extends CI_Controller 
{
    public function __construct()
	{
		include "construct.php";
	}

    public function index()
    {
        $this->load->view('Pages/Registrasi/CobaUpload', array('error' => ' ' ));
    }

    public function Upload($filePath='') 
    {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('cobaUpload')) 
        {
            $message = array('error' => $this->upload->display_errors());
            $this->load->view('Pages/Registrasi/CobaUpload', $message);
        } 
        else 
        {
            //$data = array('image_metadata' => $this->upload->data());
            $message = array('success' => "File Berhasil Diupload");
            $this->load->view('Pages/Registrasi/CobaUpload', $message);
        }
    }
}
?>