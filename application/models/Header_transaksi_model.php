<?php 
/**
* 
*/
class Header_transaksi_model extends CI_Model{
	//load database
	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	
	//listing header_transaksi
	public function listing(){
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->order_by('id_header_transaksi','desc');

		$query=$this->db->get();
		return $query->result();
	}

	//listing pelanggan
	public function pelanggan($id_pelanggan){
		$this->db->select('header_transaksi.*,SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
		$this->db->join('transaksi','transaksi.kode_transaksi = header_transaksi.kode_transaksi','left');
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi','desc');

		$query=$this->db->get();
		return $query->result();
	}

	//detail
	public function detail($id_header_transaksi){
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('id_header_transaksi', $id_header_transaksi);
		$this->db->order_by('id_header_transaksi','desc');

		$query=$this->db->get();
		return $query->row();
	}

	//kode transaksi
	public function kode_transaksi($kode_transaksi){
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_header_transaksi','desc');

		$query=$this->db->get();
		return $query->row();
	}

	
   //tambah data
	public function tambah($data){
		$this->db->insert('header_transaksi',$data);
	}

	//edit
	public function edit($data){
		$this->db->where('id_header_transaksi',$data['id_header_transaksi']);
		$this->db->update('header_transaksi',$data);
	}
	//hapus
	public function delete($data){
		$this->db->where('id_header_transaksi',$data['id_header_transaksi']);
		$this->db->delete('header_transaksi',$data);
	}
}

 ?>