<?php 
session_start();
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $id=$_POST['id_anggota'];
    $nama=$_POST['nama'];
    $jk=$_POST['jk'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $sql = "UPDATE ku_anggota set nama='$nama', telp='$telp', jk='$jk', alamat='$alamat' where id_anggota='$id'";

    // Log Execute
    date_default_timezone_set('Asia/Jakarta');
    $dateLog=date('Y-m-d H:i:s');
    $id_user=$_SESSION['id_admin'];
    $log='MENGUBAH ANGGOTA DENGAN NAMA ANGGOTA :'.$nama;
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