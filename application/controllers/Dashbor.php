<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashbor extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		//proteksi
		$this->simple_pelanggan->cek_login();
		
	}
	public function index()
	{

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi =$this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array('title' => 'Halaman Dashboard Pelanggan',
			'header_transaksi' => $header_transaksi,
			'isi'  => 'dasbor/list'

		);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function belanja()
	{

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi =$this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array('title' => 'Riwayat Belanja',
			'header_transaksi' => $header_transaksi,
			'isi'  => 'dasbor/belanja'

		);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//detail
	public function detail($kode_transaksi){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi =$this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

		//pastikan bahwa pelanggan hanya mengakses transaksinya
		if ($header_transaksi->id_pelanggan != $id_pelanggan) {
			$this->session->set_flashdata('warning','Anda mencoba mengakses transaksi orang lain');
			redirect(base_url('masuk'));
		}
		$data = array('title' => 'Riwayat Belanja',
			'header_transaksi' => $header_transaksi,
			'transaksi' => $transaksi,
			'isi'  => 'dasbor/detail'

		);

		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//profil
	public function profil(){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$pelanggan = $this->pelanggan_model->detail($id_pelanggan);

		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('nama_pelanggan','Nama Pelanggan','required',
				array('required' => '%s harus di isi'));

		$valid->set_rules('alamat','Alamat Pelanggan','required',
				array('required' => '%s harus di isi'));

		$valid->set_rules('telepon','No Telepon','required',
				array('required' => '%s harus di isi'));


		if($valid->run()===FALSE){
			//end Validasi

		$data = array('title' => 'Profil Saya',
			'pelanggan' => $pelanggan,
			
			'isi'  => 'dasbor/profil'

		);

		$this->load->view('layout/wrapper', $data, FALSE);

		//masuk ke database
	}else{
		$i = $this->input;

		if (strlen($i->post('password')) >= 6) {
		
		$data= array( 	'id_pelanggan' => $id_pelanggan,
						'nama_pelanggan' 		    => $i->post('nama_pelanggan'),
						'password'  	=> sha1($i->post('password')),
						'telepon'   => $i->post('telepon'),
						'alamat'   => $i->post('alamat')
				
				);
		}else{
			$data= array( 	'id_pelanggan' => $id_pelanggan,
						'nama_pelanggan' 		    => $i->post('nama_pelanggan'),
					
						'telepon'   => $i->post('telepon'),
						'alamat'   => $i->post('alamat')
						
				);

		}

		$this->pelanggan_model->edit($data);
		
		$this->session->set_flashdata('sukses','Update Profil berhasil');
		redirect(base_url('dashbor/profil'),'refresh');
	}
	//end masuk database
	}
}
