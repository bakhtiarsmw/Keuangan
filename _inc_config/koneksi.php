<?php
 $chost = "localhost";
 $cuser = "root";
 $cpass = "";
 $cdb = "beta_money";

 $koneksi = mysqli_connect($chost, $cuser, $cpass, $cdb);
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{
	//echo 'Koneksi berhasil';
}

?>