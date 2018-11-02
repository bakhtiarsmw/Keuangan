<?php 
session_start();
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $nama=$_POST['nama'];
    $jenis=$_POST['jenis_transaksi'];
    $nominal=str_replace(".", "", $_POST['nominal']);
    $ket=$_POST['keterangan'];
    date_default_timezone_set('Asia/Jakarta');
    $tgl=date('Y-m-d H:i:s');
    $sql = "INSERT INTO ku_transaksi VALUES ('', '$nama','$nominal','$jenis','$ket','$tgl','')";


    // Log Execute
    date_default_timezone_set('Asia/Jakarta');
    $dateLog=date('Y-m-d H:i:s');
    $id_user=$_SESSION['id_admin'];
    $log='MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :'.$nama;
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