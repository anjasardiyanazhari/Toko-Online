<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashbor extends CI_Controller {

	//load model
	public function __construct(){
		parent:: __construct();
		// $this->load->model('user_model');

		//proteksi halaman
		// $this->simple_login->cek_login();
	}

	//halaman Admin
	public function index()
	{

		$data =array( 'title'  => 'Halaman Administrator',
		'isi'  => 'admin/dasbor/list' );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
