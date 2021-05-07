<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $url_api = 'http://localhost/rest_ci2/mahasiswa';
		
		// $get_api = json_decode($this -> curl -> simple_get ($url_api),true) ;

		# contoh bisa ambil status...
		//$data['mahasiswa'] = $get_api['status'];
		// $data['mahasiswa'] = $get_api['data'];
		//print_r($data);

		// $this->load->view('welcome_message', $data);
		
		// $data['datamahasiswa'] = json_decode($this->curl->simple_get($this->API.'/mahasiswa'));
        // $this->load->view('mahasiswa/list',$data);
		$this->load->view('welcome_message');
	}
}
