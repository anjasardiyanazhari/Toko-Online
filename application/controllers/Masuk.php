<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('pelanggan_model');
		
	}

	public function index()
	{
		//validasi
		$valid=$this->form_validation;

		$valid->set_rules('email','Email/username','required', 
			array('required'     => '%s harus di isi'));

		$valid->set_rules('password','Password','required', 
			array('required'     => '%s harus di isi'));

	

		//cek validasi
		if ($valid->run()) {
			$email  	  = $this->input->post('email');
			$password  	  = $this->input->post('password');
			//compare dengan database
			 $this->simple_pelanggan->login($email, $password);
		}
			 //end validasi
		$data = array( 'title'  => 'Login Pelanggan',

					'isi'  => 'masuk/login'
		 );

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//logout
	public function logout(){
		$this->simple_pelanggan->logout();
	}
}


