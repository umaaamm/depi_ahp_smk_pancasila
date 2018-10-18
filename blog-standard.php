<?php
Include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html  lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Website Pengaduan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Google Font -->
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Allerta+Stencil:400,700,900:normal" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="assetberanda/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Plugins CSS -->
    <link href="assetberanda/assets/css/normalize.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/iline-icons.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/animate.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/owl.carousel.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/owl.theme.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/owl.transitions.css" type="text/css" rel="stylesheet" />
    <!-- Main CSS -->
    <link href="assetberanda/assets/css/style.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/responsive.css" type="text/css" rel="stylesheet" />
    <!-- Shortcut icon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
  </head>
  <body>
    <!-- NAVIGATION START -->
    <header class="fallone-navbar" data-id="default-navbar">
      <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a  href="blog-standard.php">Home</a></li>
              <li><a  href="regis.php">Registrasi</a></li>
              <li><a  href="login-anggota.php">Login</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!-- NAVIGATION END -->
    <!-- MAIN CONTAINER -->
    <div class="main-content">
      <!-- HEADER TREE -->
      <section class="header-tree" data-speed="8" data-type="background">
        <h2 class="hidden">Header tree</h2>
        <!-- parallax background -->
        <div class="cover-1" data-type="sprite" data-offsetY="-700" data-Xposition="50%" data-speed="-2"></div>
        <!-- .container -->
        <div class="container">
          <!-- .row -->
          <div class="row">
            <!-- .col-md-12 -->
            <div class="col-md-12">
              <ul class="breadcrumb clearfix mar-top-3x">
                <li><a class="link" href="#">List Pengaduan Masyarakat</a></li>
              </ul>
            </div>
            <!-- /.col-md-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- HEADER TREE END -->
      <!-- BLOG POST BODY SECTION -->


       <?php
    $query = $koneksi->query("SELECT tbl_anggota.*,tbl_pengaduan.* FROM tbl_pengaduan,tbl_anggota where tbl_anggota.nik = tbl_pengaduan.nik order by tanggal DESC limit 10");
    ?>
      <section class="pattern-3 no-padding-right">
        <h2 class="hidden">Pengaduan Post</h2>
        <!-- .container -->
        <div class="container">
          <!-- .row -->
          <div class="row">
            <!-- .col-md-12 -->
            <div class="col-md-12">
              <!-- All blog posts -->
              <div class="mar-top-lg row">
                <div class="col-md-8 col-md-offset-2 blog-main">
                   <?php
                      while ($tampil = $query->fetch_assoc()) {
                    ?> 
                  <section  class="blog-post-list no-padding">
                    <h2 class="hidden">Pengaduan Terakhir</h2>
                    <!-- .blog-post -->
                    <article class="blog-post wow fadeInUp" data-wow-duration="1s">
                      <div class="blog-body">
                        <h4 class="text-success text-center text-uppercase mar-top-sm"><?=$tampil['nama']?></h4>
                        <h6 class="text-center text-uppercase mar-top-sm"><?=$tampil['tanggal']?></h6>
                        <p>
                          <?php
                            echo substr($tampil['isi'],0,200);
                          ?>
                         
                        </p>
                        <a class="btn btn-primary text-uppercase" href="blog-post.php?id_post=<?= $tampil['kode_pengaduan'] ?>" role="button"> Read more</a>
                      </div>
                    </article>
                  
                  </section>
                  <?php
                    }
                  ?>
                
              </div>
              <!-- /.row -->
            </div>
            <!-- /.col-md-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- BLOG POST BODY SECTION END -->
      <!-- BEGIN FOOTER -->
      <footer class="page-footer">
        <!-- FOOTER CONTENT -->
        <div class="container">
          <!-- .row -->
          <div class="row">
            <!-- .col-md-12 -->
            <div class="col-md-12">
              <!-- .row -->
              <div class="row">
                <aside class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <!-- Copyright Informations -->
                  <h3  class="uppercase">Copyright | Zeny 2018</h3>
                </aside>
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-12 text-center mar-top-sm">
                  <!-- .social -->
                  <ul class="social">
                    <li><a href="#" class="icon-xl iline3-be"></a></li>
                    <li><a href="#" class="icon-xl iline3-facebook27"></a></li>
                    <li><a href="#" class="icon-xl iline3-instagram4"></a></li>
                    <li><a href="#" class="icon-xl iline3-twitter19"></a></li>
                    <li><a href="#" class="icon-xl iline3-vimeo11"></a></li>
                  </ul>
                  <!-- /.social -->
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- FOOTER CONTENT -->
      </footer>
      <!-- FOOTER END -->
    </div>
    <!-- MAIN CONTAINER END -->
    <!-- Back to top -->
    <div id="back-to-top" class="back-to-top">
      <a href="#" class="icon iline2-thin16 no-margin"></a>
    </div>
    <!-- Back to top end -->


    <!-- Include js plugin -->
    <script src="assetberanda/assets/js/libs/jquery-1.11.2.min.js"></script>
    <script src="assetberanda/assets/js/libs/jqBootstrapValidation.js"></script>
    <script src="assetberanda/assets/js/libs/imagesloaded.pkgd.min.js"></script>
    <script src="assetberanda/assets/js/libs/imagesloaded.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.magnific-popup.min.js"></script>
    <script src="assetberanda/bootstrap/js/bootstrap.min.js"></script>
    <script src="assetberanda/assets/js/libs/isotope.pkgd.min.js"></script>
    <script src="assetberanda/assets/js/libs/ParallaxScrolling.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.mailchimp.js"></script>
    <script src="assetberanda/assets/js/libs/wow.min.js"></script>
    <script src="assetberanda/assets/js/libs/owl.carousel.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.fittext.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.lettering.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.textillate.js"></script>

    <!-- Main JS -->
    <script src="assetberanda/assets/js/main.js"></script>
  </body>
</html>
