<?php 
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $myArray = array();
    if ($result = $koneksi->query("SELECT * FROM v_log")) {

        while($row = $result->fetch_array(MYSQL_ASSOC)) {
                $myArray[] = $row;
        }
        $myArray = array('data' => $myArray);
        echo strip_tags(json_encode($myArray));
    }
} else {
    echo '<script>window.location="404.html"</script>';
}
?>