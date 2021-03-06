<?php 
//ambil data menu dari konfigurasi
$nav_produk  = $this->konfigurasi_model->nav_produk();
$nav_produk_mobile = $this->konfigurasi_model->nav_produk();

 ?>

<div class="wrap_header">
<!-- Logo -->
<a href="<?php echo base_url('login') ?>" class="logo"> 
	<img src="<?php echo base_url('assets/upload/img/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
</a>

<!-- Menu -->
<div class="wrap_menu">
	<nav class="menu">
		<ul class="main_menu">
			<!-- menu home -->
			<li>
				<a href="<?php echo base_url() ?>">Beranda</a>
			</li>
			<!-- menu produk -->
			<li>
				<a href="<?php echo base_url('produk') ?>">Produk &amp; Belanja</a>
				<ul class="sub_menu">
					<?php foreach ($nav_produk as $nav_produk ) { ?>
					<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>"><?php echo $nav_produk->nama_kategori ?></a></li>
					<?php } ?>
				</ul>
			</li>

		</ul>
	</nav>
</div>

<!-- Header Icon -->
<div class="header-icons">
	<?php 
		if ($this->session->userdata('email')) {
			?>
			<a href="<?php echo base_url('dashbor') ?>" class="header-wrapicon1 dis-block">
		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> <?php echo $this->session->userdata('nama_pelanggan'); ?>
			</a>



		<?php }else{ ?>

			<a href="<?php echo base_url('registrasi') ?>" class="header-wrapicon1 dis-block">
		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>
	<?php } ?>
	
	<span class="linedivide1"></span>

	<div class="header-wrapicon2">
		<?php 
			//cek data belanja ada atau tidak
			$keranjang = $this->cart->contents();

		 ?> 
		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
		<span class="header-icons-noti"><?php echo count($keranjang) ?></span>

		<!-- Header cart noti -->
		<div class="header-cart header-dropdown">
			<ul class="header-cart-wrapitem">
			<?php  
			//jika tidak ada data belanja
			if(empty($keranjang)){ 
			?>
			<li class="header-cart-item">
					<p class="alert alert-warning"> Keranjang Belanja Kosong
			</li>
			<?php 
			//jika ada

			}else{

				//total belanja
				$total_belanja = 'RP '. number_format($this->cart->total(),'0',',','.');
				//tampilkan data belanja
				foreach ($keranjang as $keranjang) {
				$id_produk = $keranjang['id'];
				//ambil data produk
				$produknya= $this->produk_model->detail($id_produk);

			?>	
			
				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="<?php echo base_url('assets/upload/img/thumbs/'.$produknya->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
					</div>

					<div class="header-cart-item-txt">
						<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>" class="header-cart-item-name">
							<?php echo $keranjang['name'] ?>
						</a>

						<span class="header-cart-item-info">
							<?php echo $keranjang['qty'] ?> x RP <?php echo number_format($keranjang['price'],'0',',','.') ?>       <br>
							    subtotal = Rp <?php echo number_format($keranjang['subtotal'],'0',',','.') ?>
						</span>
					</div>
				</li>
			<?php
				}//tutup foreach keranjang
				}//tutup if
			 ?>

			 <div class="header-cart-total">
				Total: <?php if (!empty($keranjang)) { echo $total_belanja; } ?> 
			</div>

				
			</ul>
			<div class="header-cart-buttons">
				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						View Cart
					</a>
				</div>

				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
<!-- Logo moblie -->
<a href="index.html" class="logo-mobile">
<img src="<?php echo base_url() ?>assets/template/images/icons/logo.png" alt="IMG-LOGO">
</a>

<!-- Button show menu -->
<div class="btn-show-menu">
<!-- Header Icon mobile -->
<div class="header-icons-mobile">
	<a href="#" class="header-wrapicon1 dis-block">
		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
	</a>

	<span class="linedivide2"></span>

	<div class="header-wrapicon2">

		<?php 
			//cek data belanja ada atau tidak
			$keranjang_mobile = $this->cart->contents();

		 ?> 

		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
		<span class="header-icons-noti"><?php echo count($keranjang_mobile) ?></span>

		<!-- Header cart noti -->
		<div class="header-cart header-dropdown">
			<ul class="header-cart-wrapitem">

				<?php  
			//jika tidak ada data belanja
			if(empty($keranjang_mobile)){ 
			?>
			<li class="header-cart-item">
					<p class="alert alert-warning"> Keranjang Belanja Kosong
			</li>
			<?php 
			//jika ada

			}else{

				//total belanja
				$total_belanja = 'RP '. number_format($this->cart->total(),'0',',','.');
				//tampilkan data belanja
				foreach ($keranjang_mobile as $keranjang_mobile) {
				$id_produk_mobile=$keranjang_mobile['id'];
				$produk_mobile=$this->produk_model->detail($id_produk_mobile);
			?>	
				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="<?php echo base_url('assets/upload/img/thumbs/'.$produk_mobile->gambar) ?>" alt="<?php echo $keranjang_mobile['name'] ?>">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							<?php echo $keranjang_mobile['name'] ?>
						</a>

						<span class="header-cart-item-info">
							<?php echo $keranjang_mobile['qty'] ?> x RP <?php echo number_format($keranjang_mobile['price'],'0',',','.') ?>       <br>
							    subtotal = Rp <?php echo number_format($keranjang_mobile['subtotal'],'0',',','.') ?>
						</span>
					</div>
				</li>
			<?php 
				}
				}

			 ?>
				
			</ul>

			<div class="header-cart-total">
				Total: <?php echo $total_belanja ?>
			</div>

			<div class="header-cart-buttons">
				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						View Cart
					</a>
				</div>

				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
	<span class="hamburger-box">
		<span class="hamburger-inner"></span>
	</span>
</div>
</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
<nav class="side-menu">
<ul class="main-menu">
	<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
		<span class="topbar-child1">
			<?php echo $site->alamat ?>
		</span>
	</li>

	<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
		<div class="topbar-child2-mobile">
			<span class="topbar-email">
				<?php echo $site->email ?>
			</span>

			<div class="topbar-language rs1-select2">
				<select class="selection-1" name="time">
					<option><?php echo $site->telepon ?></option>
					<option><?php echo $site->email ?></option>
				</select>
			</div>
		</div>
	</li>

	<li class="item-topbar-mobile p-l-10">
		<div class="topbar-social-mobile">
			<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
			<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
			
		</div>
	</li>

<!-- menu mobile homepage -->
	<li class="item-menu-mobile">
		<a href="<?php echo base_url() ?>">Beranda</a>
	</li>

	<!-- menu mobile produk -->
	<li class="item-menu-mobile">
		<a href="<?php echo base_url('produk') ?>">Produk &amp; Belanja</a>
				<ul class="sub_menu">
					<?php foreach ($nav_produk_mobile as $nav_produk_mobile ) { ?>
					<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk_mobile->slug_kategori) ?>"><?php echo $nav_produk_mobile->nama_kategori ?></a></li>
					<?php } ?>
				</ul>
	</li>

</ul>
</nav>
</div>
</header>
