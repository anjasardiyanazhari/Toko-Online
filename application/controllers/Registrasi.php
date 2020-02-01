<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	//load model
	public function __construct(){
		parent:: __construct();
		$this->load->model('pelanggan_model');
		;
		
	}
	//halaman registrasi
	public function index()
	{

		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('nama_pelanggan','Nama Pelanggan','required',
				array('required' => '%s harus di isi'));

		$valid->set_rules('email','Email','required|valid_email|is_unique[pelanggan.email]',
				array('required' => '%s harus di isi',
						'valid_email' =>'%s Tidak Valid',
						'is_unique' => '%s Sudah terdaftar'
					));


		if($valid->run()===FALSE){
			//end Validasi

		$data = array( 'title' => 'Registrasi Pelanggan',
			'isi'  => 'registrasi/list'
		);

		$this->load->view('layout/wrapper', $data, FALSE);

		//masuk ke database
	}else{
		$i = $this->input;
		$data= array( 	'status_pelanggan' => 'pending',
						'nama_pelanggan' 		    => $i->post('nama_pelanggan'),
						'email' 	    => $i->post('email'),
						
						'password'  	=> sha1($i->post('password')),
						'telepon'   => $i->post('telepon'),
						'alamat'   => $i->post('alamat'),
						'tanggal_daftar'   => date('Y-m-d H:i:s')
				);

		$this->pelanggan_model->tambah($data);
		//session login pelanggan
		$this->session->set_userdata('email', $i->post('email'));
		$this->session->set_userdata('nama_pelanggan', $i->post('nama_pelanggan'));

		$this->session->set_flashdata('sukses','Registrasi berhasil');
		redirect(base_url('registrasi/sukses'),'refresh');
	}
	//end masuk database
	}

	//sukses
	public function sukses(){
		$data = array( 'title'  => 'Registrasi Berhasil',
						'isi'  => 'registrasi/sukses' );

		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
