<?php 

session_start();

include '../koneksi/konek.php';

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi,"select * from tb_user where user_username='$username' and user_password='$password'");

$cek = mysqli_num_rows($login);


if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	
	
	if($data['user_status_akun']=="Member"){

		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['nama'] = $data['user_nama'];
		$_SESSION['contact'] = $data['user_nohp'];
		$_SESSION['alamat'] = $data['user_alamat'];
		$_SESSION['poin'] = $data['user_poin'];
		$_SESSION['poin_akum'] = $data['user_poin_akumulatif'];
		$_SESSION['foto'] = $data['user_foto'];
		$_SESSION['user_username'] = $data['user_username'];
		$_SESSION['user_status_akun'] = "Member";
		
		header("location:../detail-member.php");

	
	}else{

		
		header("location:../bukan_member.php?pesan=gagal");
	}	
}else{
	header("location:../no_data.php?pesan=gagal");
}

?>