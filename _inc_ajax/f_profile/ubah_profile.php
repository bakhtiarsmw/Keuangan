<?php 
session_start();
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $id=$_POST['id_admin'];
    $nama=$_POST['nama'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    if($_POST['password']==''){
        $sql = "UPDATE ku_admin set nama='$nama', email='$email', username='$username' where id_admin='$id'";
    }else{
        $encrypt1=md5(base64_encode('mkb#'));
        $encrypt2=md5(base64_encode('30011997'));
        $password = $encrypt1.base64_encode($_POST['password']).$encrypt2;
        $sql = "UPDATE ku_admin set nama='$nama', email='$email', username='$username', password='$password' where id_admin='$id'";
    }

    // Log Execute
    date_default_timezone_set('Asia/Jakarta');
    $dateLog=date('Y-m-d H:i:s');
    $id_user=$_SESSION['id_admin'];
    $log='MENGUBAH PROFIL DENGAN NAMA USER :'.$nama;
    $insertLog = "INSERT INTO ku_log VALUES ('', '$log','$dateLog','$id_user')";
    $koneksi->query($insertLog);
    // End Log


    if ($koneksi->query($sql) === TRUE) {
    echo "success";
    } else {
    echo "failed";
    }
} else {
    echo '<script>window.location="404.html"</script>';
}
?>