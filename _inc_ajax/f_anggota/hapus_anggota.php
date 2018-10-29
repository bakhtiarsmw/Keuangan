<?php 
session_start();
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $id_anggota=$_POST['id_anggota'];
    $sql = "DELETE FROM ku_anggota where id_anggota='$id_anggota'";

    // Log Execute
    date_default_timezone_set('Asia/Jakarta');
    $dateLog=date('Y-m-d H:i:s');
    $id_user=$_SESSION['id_admin'];
    $log='MENGHAPUS ANGGOTA DENGAN ID ANGGOTA :'.$id_anggota;
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