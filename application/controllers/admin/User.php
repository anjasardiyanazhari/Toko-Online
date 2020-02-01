<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//load model
	public function __construct(){
		parent:: __construct();
		$this->load->model('user_model');

		//proteksi halaman
		$this->simple_login->cek_login();
	}

	//Data User
	public function index()
	{
		
		$user= $this->user_model->listing();
		$data =array( 'title'  => 'Data Pengguna',
			'user' => $user,
		'isi'  => 'admin/user/list' );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah User
	public function tambah()
	{
		
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('nama','Nama Lengkap','required',
				array('required' => '%s harus di isi'));

		$valid->set_rules('email','Email','required|valid_email',
				array('required' => '%s harus di isi',
						'valid_email' =>'%s Tidak Valid'));

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
				array(	
						'min_length' =>'%s Minimal 6 Karakter',
						'max_length' =>'%s Minimal 32 Karakter',
						'is_unique' =>'%s Sudah ada Cari username baru'));

		if($valid->run()===FALSE){
			//end Validasi
		$data =array( 'title'  => 'Tambah Pengguna',
		'isi'  => 'admin/user/tambah' );

		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//masuk ke database
	}else{
		$i = $this->input;
		$data= array( 	'nama' 		    => $i->post('nama'),
						'email' 	    => $i->post('email'),
						'username'	    => $i->post('username'),
						'password'  	=> sha1($i->post('password')),
						'akses_level'   => $i->post('akses_level')
				);

		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses','Data telah di tambah');
		redirect(base_url('admin/user'),'refresh');
	}
	//end masuk database

	}

	//Edit User
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);		
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('nama','Nama Lengkap','required',
				array('required' => '%s harus di isi'));


		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]',
				array(	
						'min_length' =>'%s Minimal 6 Karakter',
						'max_length' =>'%s Minimal 32 Karakter'));

		if($valid->run()===FALSE){
			//end Validasi
		$data =array( 'title'  => 'Edit Pengguna',
			'user'   => $user,
		'isi'  => 'admin/user/edit' );

		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//masuk ke database
	}else{
		$i = $this->input;
		$data= array( 	'id_user'		=>$id_user,
						'nama' 		    => $i->post('nama'),
						'email' 	    => $i->post('email'),
						'username'	    => $i->post('username'),
						'password'  	=> sha1($i->post('password')),
						'akses_level'   => $i->post('akses_level')
				);

		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses','Data telah di Edit');
		redirect(base_url('admin/user'),'refresh');
	}
	//end masuk database

	}

	//delete User
	public function delete($id_user){
		$data=array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah di Hapus');
		redirect(base_url('admin/user'),'refresh');
	}
}
