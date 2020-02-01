<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//halaman Login
class Login extends CI_Controller {

	
	public function index()
	{

		//validasi
		$valid=$this->form_validation;

		$valid->set_rules('username','Username','required', 
			array('required'     => '%s harus di isi'));

		$valid->set_rules('password','Password','required', 
			array('required'     => '%s harus di isi'));

	

		//cek validasi
		if ($valid->run()) {
			$username  	  = $this->input->post('username');
			$password  	  = $this->input->post('password');
			//compare dengan database
			 $this->simple_login->login($username, $password);

			 //end validasi

			//kalau ada data yang cocok maka create session. session ada 4 (id_user, username,  akses_level dan nama)
			// if(count($chek_login) == 1){

			// 	$this->session->set_userdata('id_user', $chek_login->id_user);
			// 	$this->session->set_userdata('username', $chek_login->username);
			// 	$this->session->set_userdata('akses_level', $chek_login->akses_level);
			// 	$this->session->set_userdata('nama', $chek_login->nama);


			// 	$this->session->set_flashdata('sukses', 'anda berhasil login');

			// 	redirect(base_url('admin/dashbor'),'refresh');

			// }else{
			// 	//kalau tidak cocok kembali  ke halaman login
			// 	$this->session->set_flashdata('sukses', 'Username atau password salah');

			// 	redirect(base_url('login'),'refresh');

			// }
		}
		$data=array('title' => 'Login Administrator'
					

					);
		$this->load->view('login/list', $data, FALSE);
	}

	//fungsi logout
	public function logout(){
		//ambil fungsi logout dari simple login
		$this->simple_login->logout();
	}
	
}
