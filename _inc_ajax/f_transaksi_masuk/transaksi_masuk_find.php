<?php 
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../../_inc_config/koneksi.php';
    $tgl_awalSource = $_GET['tgl_awal'];
    $tgl_akhirSource = $_GET['tgl_akhir'];
    if(($tgl_awalSource=='') or ($tgl_akhirSource=='')){
        $useTglAwal = '0000-00-00';
        $useTglAkhir = '0000-00-00';
    }else{
        $useTglAwal = $tgl_awalSource;
        $useTglAkhir = $tgl_akhirSource;
    }
    $tgl_awal = $useTglAwal;
    $tgl_akhir = $useTglAkhir." 23:59:59";

    $myArray = array();
    if ($result = $koneksi->query("SELECT * FROM ku_transaksi where jenis_transaksi='M' and tgl_add_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir'")) {

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