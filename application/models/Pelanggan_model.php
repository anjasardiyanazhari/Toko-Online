<?php 
/**
* 
*/
class Pelanggan_model extends CI_Model{
	//load database
	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	
	//listing pelanggan
	public function listing(){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan','desc');

		$query=$this->db->get();
		return $query->result();
	}

	//Login pelanggan
	public function login($email, $password){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array('email'=> $email,
						'password' => SHA1($password)
						));
		$this->db->order_by('id_pelanggan','desc');

		$query=$this->db->get();
		return $query->row();
	}

	//suddah Login 
	public function sudah_login($email, $nama_pelanggan){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array('email'=> $email,
						'nama_pelanggan' => $nama_pelanggan
						));
		$this->db->order_by('id_pelanggan','desc');

		$query=$this->db->get();
		return $query->row();
	}

	//detail pelanggan
	public function detail($id_pelanggan){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan','desc');

		$query=$this->db->get();
		return $query->row();
	}

	//pelanggan aktif

	

   //tambah data
	public function tambah($data){
		$this->db->insert('pelanggan',$data);
	}

	//edit
	public function edit($data){
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('pelanggan',$data);
	}
	//hapus
	public function delete($data){
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->delete('pelanggan',$data);
	}
}

 ?>