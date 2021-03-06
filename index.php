<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="shortcut icon" href="assets/image/logo_opportunitea.png">
    <link rel="stylesheet" href="assets/sass/main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="body-login">
    <div class="background-induk">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-12">
          <div class="banner">
            <div class="container">
              <img src="assets/image/logo_opportunitea.png" class="img-logo" alt="" />
              <div class="row">
                <div class="col-md-7 col-12">
                  <div class="banner-judul">
                    <h1>
                      Opportunitea adalah <br />
                      minuman dengan <br />
                      aneka varian rasa <br />
                      dan topping pilihan.
                    </h1>
                    <p>
                      Kami menyediakan banyak pilihan rasa yang bisa kamu
                      <br />
                      mix sesuai dengan ketentuan dari kami. Kami juga punya
                      <br />
                      aplikasi yang memudahkan kamu untuk order minuman <br />
                      opportunitea dan mendapat banyak promo menarik.
                    </p>
                  </div>
                </div>
                <div class="col-md-5 col-12 justify-content-center">
                  <center>
                    <img src="assets/image/img_apl.jpg" class="img-apl" alt="" />
                  </center>
                </div>
              </div>
              <div class="row row-category">
                 <?php 
                        include 'koneksi/konek.php';
                        $no = 1;
                        $data = mysqli_query($koneksi, "select * from tb_promo ORDER BY promo_id DESC LIMIT 3 ");
                        while($item = mysqli_fetch_array($data)){
                      ?>
                <div class="col-lg-2 col-4">
                  <div class="category-tea">
                    <a href="#" class="category-product">
                      <div class="product-text"><?php echo $item['promo_judul'] ?></div>
                      <center>
                        <div class="img-figura">
                          <img
                            src="https://opportuniteaindonesia.com/opportunitea/imagePromo/<?php echo $item['promo_gambar']; ?>"
                            alt=""
                            class="img-category"
                          />
                        </div>
                      </center>
                    </a>
                  </div>
                </div>

                <?php } ?>

                
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-12">
          <div class="section-login">
            <h2 class="text-center">Login</h2>
            <div class="container">
              <div class="panel-login">
                <form action="aksi/cek_login.php" method="POST" class="form-login">
                  <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input
                      type="text"
                      name="username"
                      class="form-control"
                      placeholder="Username"
                    />
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input
                      type="password"
                      name="password"
                      id="inputPassword"
                      class="form-control"
                      placeholder="Password"
                    />
                  </div>

                  <div class="mb-3 form-check">
                    <input
                      type="checkbox"
                      onclick="myFunction()"
                      id="show-password"
                      class="form-check-input"
                    />
                    <label for="show-password" class="form-check-label"
                      >Show Password</label
                    >
                  </div>

                  <div class="d-grid gap-2">
                    <!-- <a href="/detail-user.html" class="btn btn-login btn-block"
                      >Login</a
                    > -->
                    <button type="submit" class="btn btn-block btn-login">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-1">
              <div class="pic-icon">
                <a href="#">
                  <img
                    src="assets/image/600px-Instagram_icon.png"
                    alt=""
                    class="img-ico"
                  />
                </a>
              </div>
            </div>

            <div class="col-1">
              <div class="pic-icon">
                <a href="#">
                  <img
                    src="assets/image/1280px-Gmail_icon_(2020).svg.png"
                    alt=""
                    class="img-ico"
                  />
                </a>
              </div>
            </div>

            <div class="col-1">
              <div class="pic-icon">
                <a href="#">
                  <img
                    src="assets/image/WhatsApp-icon-PNG.png"
                    alt=""
                    class="img-ico"
                  />
                </a>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="card card-qr">
              <h4 class="text-center">Verifikasi</h4>
              <div class="container">
                <div class="row">
                  <div class="col-3">
                    <center>
                      <img src="assets/image/qr_ver.JPG" class="img-qr" alt="" />
                    </center>
                  </div>

                  <div class="col-9">
                    <div class="qr-judul">Silahkan Scan QR ini !!</div>
                    <p>
                      Login melalui aplikasi Opportunitea > Masuk ke profil
                      <br />
                      Pilih tanda Scanner dipojok kanan atas > Arahkan kamera
                      <br />
                      ke QR Code ini.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>
    <script>
      function myFunction() {
        var x = document.getElementById("inputPassword");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
  </body>
</html>
