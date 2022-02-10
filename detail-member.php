<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <link rel="shortcut icon" href="assets/image/logo_opportunitea.png">
    <link rel="stylesheet" href="assets/sass/main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
</head>
<body>
  
  <?php 
	session_start();
 
	
	if($_SESSION['user_status_akun']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>

    <div class="kotak-1" style="background-image: url('assets/image/kotak_1.png');"></div>
    <div class="kotak-2" style="background-image: url('assets/image/kotak_2.png');"></div>
    <div class="kotak-3" style="background-image: url('assets/image/kotak_3.png');"></div>

    <div class="container">
      <div class="detail-judul">
        <h2 class="text-center">Opportunitea</h2>
      </div>

      <div class="row">
        <div class="col-lg-5 col-md-5 col-12">
          <div class="card card-profile">
            <div class="frime-profile">
              <img src="https://opportuniteaindonesia.com/opportunitea/imageAkun/<?php echo $_SESSION['foto']; ?> " class="img-profile" alt="" />
            </div>
            <h4 class="text-center"><?php echo $_SESSION['nama']; ?></h4>

            <div class="container">
              <div class="px-5">
                <table class="table-profile">
                <tr>
                  <td width="70%">Username</td>
                  <td width="70%" class="text-end"><?php echo $_SESSION['user_username']; ?></td>
                </tr>
                <tr>
                  <td width="70%">Contact</td>
                  <td width="70%" class="text-end"><?php echo $_SESSION['contact']; ?></td>
                </tr>
                <tr>
                  <td width="70%">Address</td>
                  <td width="70%" class="text-end"><?php echo $_SESSION['alamat']; ?></td>
                </tr>
              </table>
              </div>

              <div class="point">
                <h4 class="text-center">Your Point</h4>

                <div class="row justify-content-center">
                  <div class="col-6">
                    <div class="detail-point text-center">
                      <h5><?php echo $_SESSION['poin']; ?></h5>
                      Point
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="detail-point text-center">
                      <h5><?php echo $_SESSION['poin_akum']; ?></h5>
                      Acum. Point
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <a href="aksi/logout.php" class="btn btn-info btn-block btn-sm text-white my-3 px-5">Logout</a>
          </div>
        </div>
        <div class="col-lg-7 col-md-7 col-12">
          <div class="card card-order-history">
            <div class="order-history">
              <h2 class="text-center">Order History</h2>
              <div class="table-responsive">
                <table class="table table-hover table-order">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Tanggal</th>
                      <th>Status Pesanan</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                        include 'koneksi/konek.php';
                        $user_id = $_SESSION['user_id'];
                        $no = 1;
                        $data = mysqli_query($koneksi, "select * from tb_penjualan where user_id='$user_id'");
                        while($item = mysqli_fetch_array($data)){
                      ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><a href="detail-member.php?id=<?php echo $item['jual_id']; ?>"><?php echo $item['jual_kode_order']; ?></a></td>
                      
                      <td><?php echo $item['jual_tgl']; ?></td>
                      
                      <td class="status" align="center">
                          <?php
                            if($item['jual_status_bayar'] == 'Diterima'){
                                ?><div class="status-aktif"></div><?php
                            }elseif($item['jual_status_bayar'] == 'Selesai'){
                                ?><div class="success"></div><?php
                            }elseif($item['jual_status_bayar'] == 'Proses'){
                                ?><div class="proses"></div><?php
                            }else{
                                ?><div class="status-tidak-aktif"></div><?php
                            }
                          ?>
                        
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card card-qr-code">
            <div class="qr-code">
              <h2 class="text-center">QR Code</h2>
              <div class="row justify-content-center">
                <div class="col-4">
                  <?php
                    include "phpqrcode/qrlib.php"; 

                    $temp = "assets/image/img-qr-code-user/";

                    if (!file_exists($temp)) //Buat folder bername temp
                    { mkdir($temp); }

                    $qr_user = $_SESSION['user_username'];
                    $namaFile = $_SESSION['user_username'].".png";
                    $level=QR_ECLEVEL_H;
                    $UkuranPixel=50;
                    $UkuranFrame=4;

                    QRcode::png($qr_user, $temp.$namaFile, $level, $UkuranPixel, $UkuranFrame);
                  ?>
                   <img src="<?php echo $temp.$namaFile ?>" class="w-100" alt="" />
                </div>
                <div class="col-4">
                  <center>
                    <img
                      src="assets/image/logo_opportunitea.png"
                      width="80%"
                      alt=""
                    />
                  </center>
                </div>
                <div class="col-4">
                  <?php
                    if(!isset($_GET['id'])){
                      $id = '';
                    }else{
                      $id = $_GET['id'];
                    }
                    $query = mysqli_query($koneksi,"select * from tb_penjualan where jual_id='$id'");

                    $data = mysqli_fetch_array($query);

                    $tempat = "assets/image/img-qr-code-order/";

                    if (!file_exists($tempat)) //Buat folder bername temp
                    { mkdir($tempat); }

                    if (!isset($data['jual_kode_order'])){
                      $qr_order = 'kosong';
                    }else{
                      $qr_order = $data['jual_kode_order'];
                    }

                    if (!isset($data['jual_kode_order'])){
                      $fileNama = "kosong".".png";
                    }else{
                      $fileNama = $data['jual_kode_order'].".png";
                    }
                    
                    $lvl=QR_ECLEVEL_H;
                    $pixelUkuran=50;
                    $frameUkuran=4;

                    QRcode::png($qr_order, $tempat.$fileNama, $lvl, $pixelUkuran, $frameUkuran);
                  ?>
                  <img src="<?php echo $tempat.$fileNama ?>" class="w-100" alt="" />
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

	
</body>
</html>