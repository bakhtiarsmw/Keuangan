<?php 
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $id=$_POST['id_transaksi'];
    $myArray = array();
    if ($result = $koneksi->query("SELECT * FROM ku_transaksi where id_transaksi = '$id'")) {

        while($row = $result->fetch_array(MYSQL_ASSOC)) {
                $myArray['id_transaksi'] = $row['id_transaksi'];
                $myArray['nama'] = $row['nama'];
                $myArray['nominal'] = $row['nominal'];
                $myArray['jenis_transaksi'] = $row['jenis_transaksi'];
                $myArray['keterangan'] = $row['keterangan'];
        }
        echo json_encode($myArray);
    }
} else {
    echo '<script>window.location="404.html"</script>';
}
?>