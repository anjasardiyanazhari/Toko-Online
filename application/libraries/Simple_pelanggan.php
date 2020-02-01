<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan {

        protected $CI;

        
        public function __construct()
        {
                
                $this->CI =& get_instance();
                $this->CI->load->model('pelanggan_model');
        }

        //fungsi login
        public function login($email,$password){
        	$check = $this->CI->pelanggan_model->login($email,$password);
        	//jika ada data user, maka buat session login
        	if($check){
        		$id_pelanggan   = $check->id_pelanggan;
        		$nama_pelanggan   = $check->nama_pelanggan;
        		
        		//buat session
        		$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
        		$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
        		$this->CI->session->set_userdata('email',$email);
        		
        		//redirect ke halaman admin
        		redirect(base_url('dashbor'),'refresh');
        	}else{
        		//jika tidak ada suruh login lagi (salah username dan password)
        		$this->CI->session->set_flashdata('warning','username dan password salah');
        		redirect(base_url('masuk'),'refresh');
        	}
        }

       public function cek_login(){

		if($this->CI->session->userdata('email')   =="" ) {

			$this->CI->session->set_flashdata('warning', 'Anda Belum Login');

			redirect(base_url('masuk'), 'refresh');
			}
		}

        public function logout(){
        	//membuang semua session
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
		
		

		//setelah session dibuang redirect ke login
		$this->CI->session->set_flashdata('sukses', 'anda berhasil logout');

		redirect(base_url('masuk'),'refresh');

	}

}



