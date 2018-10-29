<?php 
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $id=$_POST['id_anggota'];
    $myArray = array();
    if ($result = $koneksi->query("SELECT * FROM ku_anggota where id_anggota = '$id'")) {

        while($row = $result->fetch_array(MYSQL_ASSOC)) {
                $myArray['id_anggota'] = $row['id_anggota'];
                $myArray['nama'] = $row['nama'];
                $myArray['telp'] = $row['telp'];
                $myArray['jk'] = $row['jk'];
                $myArray['alamat'] = $row['alamat'];
        }
        echo json_encode($myArray);
    }
} else {
    echo '<script>window.location="404.html"</script>';
}
?>