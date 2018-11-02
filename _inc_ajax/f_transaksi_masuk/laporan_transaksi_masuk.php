<?php
$nama_dokumen='Transaksi Masuk Keuangan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../../dist/mpdf57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
ob_start(); 
?>
<?php 

include '../../_inc_config/koneksi.php'; 

$tgl_awalSource = $_GET['tgl_awal'];
$tgl_akhirSource = $_GET['tgl_akhir'];
if(($tgl_awalSource=='') or ($tgl_akhirSource=='')){
	$title="Laporan Keuangan Transaksi Masuk";
    $source = $koneksi->query("SELECT * FROM ku_transaksi where jenis_transaksi='M'");
}else{
	$title="Laporan Keuangan Transaksi Masuk dari ".$tgl_awalSource." sampai ".$tgl_akhirSource;
    $useTglAwal = $tgl_awalSource;
    $useTglAkhir = $tgl_akhirSource;

	$tgl_awal = $useTglAwal;
	$tgl_akhir = $useTglAkhir." 23:59:59";

    $source = $koneksi->query("SELECT * FROM ku_transaksi where jenis_transaksi='M' and tgl_add_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir'");
}

?>
<h2 align="center"><?=$title;?></h2>
<table border="1" style="border-collapse:collapse;font-size:12px;">
<tr>
	<th style="padding: 5px;">ID</th>
	<th style="padding: 5px;">Nama Transaksi</th>
	<th style="padding: 5px;">Jenis Transaksi</th>
	<th style="padding: 5px;">Nominal</th>
	<th style="padding: 5px;">Ket</th>
	<th style="padding: 5px;">Tanggal</th>
</tr>
<?php 

if ($result = $source) {
    while($row = $result->fetch_array(MYSQL_ASSOC)) {
		echo '<tr>
		<td style="padding: 5px;">'.$row[id_transaksi].'</td>
		<td style="padding: 5px;">'.$row[nama].'</td>
		<td style="padding: 5px;"><span style="text-align:left">Rp</span> <span style="float:right">'.number_format($row[nominal],0,",",".").'</span></td>
		<td style="padding: 5px;"> Transaksi Masuk </td>
		<td style="padding: 5px;">'.$row[keterangan].'</td>
		<td style="padding: 5px;"><i>Transaksi dibuat pada tgl '.$row[tgl_add_transaksi].'<br> di Update pada tgl : '.$row[tgl_update_transaksi].'<i></td>
		</tr>';
	}
}
?>
</table>
<!--CONTOH Code END-->
 
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>