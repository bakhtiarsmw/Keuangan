<?php 
session_start();
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $id=$_POST['id_transaksi'];
    $nama=$_POST['nama'];
    $jenis_transaksi=$_POST['jenis_transaksi'];
    $ket=$_POST['keterangan'];
    $nominal=str_replace(".", "", $_POST['nominal']);
    $sql = "UPDATE ku_transaksi set nama='$nama', nominal='$nominal', jenis_transaksi='$jenis_transaksi', keterangan='$ket' where id_transaksi='$id'";

    // Log Execute
    date_default_timezone_set('Asia/Jakarta');
    $dateLog=date('Y-m-d H:i:s');
    $id_user=$_SESSION['id_admin'];
    $log='MENGUBAH TRANSAKSI DENGAN NAMA TRANSAKSI :'.$nama;
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