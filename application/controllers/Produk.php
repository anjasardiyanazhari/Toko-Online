
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//load model
	public function __construct(){
		parent:: __construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		
		//proteksi halaman
		// $this->simple_login->cek_login();
	}

	//Data Produk
	public function index()
	{
		
		$site= $this->konfigurasi_model->listing();
		$listing_kategori = $this->produk_model->listing_kategori();
		//ambil data total
		$total=$this->produk_model->total_produk();
		//paginasi start
		$this->load->library('pagination');
		$config['base_url'] =base_url().'produk/index/';
		$config['total_rows'] =$total->total;
		$config['use_page_numbers'] =TRUE;
		$config['per_page'] =9;
		$config['uri_segment'] =3;
		$config['num_links'] =5;
		$config['full_tag_open'] ='<ul class="pagination">';
		$config['full_tag_close'] ='</ul>';
		$config['first_link'] ='first';
		$config['fisrt_tag_open'] ='<li>';
		$config['fisrt_tag_close'] ='</li>';
		$config['last_link'] ='last';
		$config['last_tag_open'] ='<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] ='<span class="sr-only"></a></li></li>';
		$config['next_link'] ='&gt';
		$config['next_tag_open'] ='<div>';
		$config['next_tag_close'] ='</div>';
		$config['prev_link'] ='&lt';
		$config['prev_tag_open'] ='<div>';
		$config['prev_tag_close'] ='</div>';
		$config['cur_tag_open'] ='<b>';
		$config['cur_tag_close'] ='</b>';
		$config['first_url'] = base_url().'/produk/';

		$this->pagination->initialize($config);

		$page=($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$produk = $this->produk_model->produk($config['per_page'], $page);

		$data =array( 'title'  => $site->namaweb,
			'site'  => $site,
			'listing_kategori'  => $listing_kategori,
			'produk' => $produk,
			'pagin'  => $this->pagination->create_links(),
		'isi'  => 'produk/list' );

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//kategori produk listing

	public function kategori($slug_kategori)
	{
		//buat data kategori 
		$kategori = $this->kategori_model->read($slug_kategori);
		$id_kategori = $kategori->id_kategori;
		//data global
		$site= $this->konfigurasi_model->listing();
		$listing_kategori = $this->produk_model->listing_kategori();
		//ambil data total
		$total=$this->produk_model->total_kategori($id_kategori);
		//paginasi start
		$this->load->library('pagination');
		$config['base_url'] =base_url().'produk/kategori/'.$slug_kategori.'/index/';
		$config['total_rows'] =$total->total;
		$config['use_page_numbers'] =TRUE;
		$config['per_page'] =6;
		$config['uri_segment'] =5;
		$config['num_links'] =5;
		$config['full_tag_open'] ='<ul class="pagination">';
		$config['full_tag_close'] ='</ul>';
		$config['first_link'] ='first';
		$config['fisrt_tag_open'] ='<li>';
		$config['fisrt_tag_close'] ='</li>';
		$config['last_link'] ='last';
		$config['last_tag_open'] ='<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] ='<span class="sr-only"></a></li></li>';
		$config['next_link'] ='&gt';
		$config['next_tag_open'] ='<div>';
		$config['next_tag_close'] ='</div>';
		$config['prev_link'] ='&lt';
		$config['prev_tag_open'] ='<div>';
		$config['prev_tag_close'] ='</div>';
		$config['cur_tag_open'] ='<b>';
		$config['cur_tag_close'] ='</b>';
		$config['first_url'] = base_url().'/produk/kategori/'.$slug_kategori;

		$this->pagination->initialize($config);

		$page=($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$produk = $this->produk_model->kategori($id_kategori, $config['per_page'], $page);

		$data =array( 'title'  => $kategori->nama_kategori,
			'site'  => $site,
			'listing_kategori'  => $listing_kategori,
			'produk' => $produk,
			'pagin'  => $this->pagination->create_links(),
		'isi'  => 'produk/list' );

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//detail
	public function detail($slug_produk){
		$site = $this->konfigurasi_model->listing();
		$produk = $this->produk_model->read($slug_produk);
		$id_produk = $produk->id_produk;
		$gambar = $this->produk_model->gambar($id_produk);
		$produk_related = $this->produk_model->home();

		$data =array( 'title'  => $produk->nama_produk,
			'site'  => $site,
			
			'produk' => $produk,
			'produk_related' => $produk_related,
			'gambar'  => $gambar,
		'isi'  => 'produk/detail' );

		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
