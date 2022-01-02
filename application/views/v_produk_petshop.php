<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" type="">

  <title> Orthoc </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo base_url()?>assets/css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Orthoc
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('Home/home_petshop')?>">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('Produk/produk_petshop')?>"> Produk</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-user"></i>
									</a>
									<?php if($this->session->userdata('logged_in') == TRUE){?>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="#">
											<?php echo $this->session->userdata('nama_petshop') ?>
										</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url()?>Login/logout">Logout</a>
									</div>
									<?php } 
									else { 
									?>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="<?php echo base_url()?>Login/index">Login</a>
									</div>
									<?php } ?>
								</li>
								<form class="form-inline">
									<button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>
								</form>
							</ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- product section -->

	<section class="products">
	<div class="container">
	<?php if($this->session->flashdata('pesan')!=null): ?>
						<div class= "alert alert-success alert-dismissible fade show" role="alert"><?= $this->session->flashdata('pesan');?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button></div>
					<?php endif?>
					<?php if($this->session->flashdata('gagal')!=null): ?>
						<div class= "alert alert-danger alert-dismissible fade show" role="alert"><?= $this->session->flashdata('gagal');?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button></div>
					<?php endif?>
					
	<h2>Produk Anda </h2>
	<hr class="style1">
	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Tambahkan Produk
  </button>

	<div class="row" style="margin-top:20px;">
        <?php foreach($list as $isi):?>
        <div class="col-lg-4 col-md-6">
            <div class="card product-card">
            <img src="<?php echo base_url('uploads/products/'.$isi->gambar_produk);?>" alt="..." class="card-img-top" style="height: 220px; object-fit: cover">
                <div class="card-body" >
                    <h1 class="card-title"><?php echo $isi->nama_produk ?></h1>
                    <p class="card-text">
                        Harga : <?php echo $isi->harga_produk?> <br>
                        Stok  : <?php echo $isi->stok?>
                    </p>
                </div>
                <div class="card-footer">
                <div class="btn-prod">
                        <a href="#edit" onclick="tm_detail('<?php echo ($isi->id_produk)?>')"  data-toggle="modal"> <i class="fas fa-edit"></i></a> 
                        <a href="<?php echo base_url().'Produk/hapus_produk/'.$isi->id_produk?>" onclick="return confirm('Anda yakin akan menghapus produk ini?');"> <i class="fas fa-trash-alt"></i> </a>
                </div>
                </div>
            </div>
        </div>
            <?php endforeach; ?>
    </div>

  <!-- Modal add-->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambahkan Produk</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
				<form action="<?php echo base_url()?>index.php/Produk/add_produk" method="post" enctype="multipart/form-data">
						<p>
						<label for="">Nama Produk</label>
						<input type="text" placeholder="Nama Produk" class="form-control" name="nama_produk">
						</p>

						<p>
						<label for="">Harga</label>
						<input type="number" name="harga_produk" class="form-control" required>
						</p>

						<p>
						<label for="">Stok</label>
						<input type="number" name="stok" class="form-control" min="0" required >
						</p>

						<p>
						<label for="">Gambar Produk</label>
						<input type="file" name="gambar_produk" class="form-control" required>
						</p>
						<br>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
					<input type="submit" class="btn btn-block btn-primary" value="Tambahkan">
					</form>	
        </div>
        
      </div>
    </div>
  </div>

	<!-- Modal edit -->
	<div class="modal fade" id="edit" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('Produk/update_produk')?>" method="post">
                                <input type="hidden" id="id_produk" name="id_produk"> 
                                
                                Nama Produk
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                                
                                Gambar Produk
                                <input type="file" class="form-control" name="gambar_produk" id="gambar_produk">
                                
                                Harga
                                <input type="number" class="form-control" name="harga_produk" id="harga_produk">

                                Stok
                                <input type="number" class="form-control" name="stok" id="stok" min="0">

                                <div class="modal-footer">
                                    <a href=""><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></a>
                                </div>
                            </form>
                            <!-- <button type="button" class="btn btn-info" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>
	




	</section>

  <!-- end product section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="footer_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
              Beatae provident nobis mollitia magnam voluptatum, unde dicta facilis minima veniam corporis laudantium alias tenetur eveniet illum reprehenderit fugit a delectus officiis blanditiis ea.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto footer_col">
          <div class="footer_link_box">
            <h4>
              Links
            </h4>
            <div class="footer_links">
              <a class="" href="index.html">
                Home
              </a>
              <a class="active" href="about.html">
                About
              </a>
              <a class="" href="departments.html">
                Departments
              </a>
              <a class="" href="doctors.html">
                Doctors
              </a>
              <a class="" href="contact.html">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col ">
          <h4>
            Newsletter
          </h4>
          <form action="#">
            <input type="email" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates<br><br></a>
            &copy; <span id="displayYear"></span> Distributed By
            <a href="https://themewagon.com/">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

	<script>
  function tm_detail(id_produk) {
					$.getJSON("<?=base_url()?>Produk/get_detail_produk/"+id_produk,function(data){
          console.log(data);
          $("#id_produk").val(data['id_produk']);
          $("#nama_produk").val(data['nama_produk']);
					$("#harga_produk").val(data['harga_produk']);
          $("#stok").val(data['stok']);
          $("#gambar_produk").val(data['gambar_produk']);
          
                });
            }
</script>

  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  
	<script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>


