<?php 
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $id=$_POST['id_admin'];
    $myArray = array();
    if ($result = $koneksi->query("SELECT * FROM ku_admin where id_admin = '$id'")) {

        while($row = $result->fetch_array(MYSQL_ASSOC)) {
                $myArray['id_admin'] = $row['id_admin'];
                $myArray['nama'] = $row['nama'];
                $myArray['email'] = $row['email'];
                $myArray['username'] = $row['username'];
                $myArray['password'] = $row['password'];
        }
        echo json_encode($myArray);
    }
} else {
    echo '<script>window.location="404.html"</script>';
}
?>