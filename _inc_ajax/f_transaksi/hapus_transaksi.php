<?php 
session_start();
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $id_transaksi=$_POST['id_transaksi'];
    $sql = "DELETE FROM ku_transaksi where id_transaksi='$id_transaksi'";

    // Log Execute
    date_default_timezone_set('Asia/Jakarta');
    $dateLog=date('Y-m-d H:i:s');
    $id_user=$_SESSION['id_admin'];
    $log='MENGHAPUS TRANSAKSI DENGAN ID TRANSAKSI :'.$id_transaksi;
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