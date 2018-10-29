<?php 
session_start();
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../_inc_config/koneksi.php';

    $encrypt1=md5(base64_encode('mkb#'));
    $encrypt2=md5(base64_encode('30011997'));

	// menangkap data yang dikirim dari form
	$username = $_POST['username'];
	$password = $encrypt1.base64_encode($_POST['password']).$encrypt2;

	// menyeleksi data admin dengan username dan password yang sesuai
	$data = mysqli_query($koneksi,"select * from ku_admin where username='$username' and password='$password'");

	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);
	$row=mysqli_fetch_array($data);

	if (($username == $row['username'])&&($password==$row['password'])) {
		if($username == $row['username']){
			if($password==$row['password']){
				if ($cek>0) {
					$_SESSION['username'] = $username;
					$_SESSION['id_admin'] = $row['id_admin'];
					$_SESSION['nama'] = $row['nama'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['status'] = "login";
					echo "success";
				}else{
					echo "failed";
				}
				
			}else{
				echo "pass_failed";
			}
			
		}else{
			echo "username_failed";
		}
	}
	else{
		echo "failed_login";
	}
	

	
}