<?php
 //Beri nama file PDF hasil.
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
	$nama_dokumen='Transaksi Rugi Laba Keuangan';
	$title="Laporan Keuangan Transaksi Rugi Laba";
    $source = $koneksi->query("SELECT nama, nominal FROM ku_transaksi where jenis_transaksi='M' order by nominal desc");
    $sourceTotal = $koneksi->query("SELECT sum(nominal) as pendapatan FROM ku_transaksi where jenis_transaksi='M'");

    $sourcePeng = $koneksi->query("SELECT nama, nominal FROM ku_transaksi where jenis_transaksi='K' order by nominal desc");
    $sourceTotalPeng = $koneksi->query("SELECT sum(nominal) as pendapatan FROM ku_transaksi where jenis_transaksi='K'");
}else{
	$title="Laporan Keuangan Transaksi Rugi Laba dari ".date('d M Y', strtotime($tgl_awalSource))." sampai ".date('d M Y', strtotime($tgl_akhirSource));
	$nama_dokumen="Laporan Keuangan Transaksi Rugi Laba dari ".date('d M Y', strtotime($tgl_awalSource))." sampai ".date('d M Y', strtotime($tgl_akhirSource));
    $useTglAwal = $tgl_awalSource;
    $useTglAkhir = $tgl_akhirSource;

	$tgl_awal = $useTglAwal;
	$tgl_akhir = $useTglAkhir." 23:59:59";

    $source = $koneksi->query("SELECT nama, nominal FROM ku_transaksi where jenis_transaksi='M' and tgl_add_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir' order by nominal desc");

    $sourceTotal = $koneksi->query("SELECT sum(nominal) as pendapatan FROM ku_transaksi where jenis_transaksi='M' and tgl_add_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir'");

    $sourcePeng = $koneksi->query("SELECT nama, nominal FROM ku_transaksi where jenis_transaksi='K' and tgl_add_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir' order by nominal desc");

    $sourceTotalPeng = $koneksi->query("SELECT sum(nominal) as pendapatan FROM ku_transaksi where jenis_transaksi='K' and tgl_add_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir'");
}

?>
<h2 align="center"><?=$title;?></h2>
<table border="1" style="border-collapse:collapse;font-size:12px;width:100%;">
<tr>
	<th width="20px">No</th>
	<th style="padding: 5px;" align="left"><b><u>Pemasukan</u></b></th>
	<th style="padding: 5px;"></th>
	<th style="padding: 5px;"></th>
</tr>
<?php 

if ($result = $source) {
	$no=1;
    while($row = $result->fetch_array(MYSQL_ASSOC)) {
    	if ($no==1) { $rupiah='Rp '; }else{ $rupiah='';}
		echo '<tr>
		<td>'.$no++.'</td>
		<td style="padding: 5px;">'.$row[nama].'</td>
		<td style="padding: 5px;" align="right">'.$rupiah.number_format($row[nominal],0,",",".").'</td>
		<td></td>
		</tr>';
	}
}
if ($resultTotal = $sourceTotal) {
	$rowTotal = $resultTotal->fetch_array(MYSQL_ASSOC);
	echo "<tr>
		<td></td>
		<td align='center'><b>Total Pemasukan</b></td>
		<td></td>
		<td style='padding:5px;text-align:right'>Rp ".number_format($rowTotal[pendapatan],0,',','.')."</span></td>
	</tr>";
}
?>
<tr>
	<th width="20px">No</th>
	<th style="padding: 5px;" align="left"><b><u>Pengeluaran</u></b></th>
	<th style="padding: 5px;"></th>
	<th style="padding: 5px;"></th>
</tr>
<?php 

if ($resultPeng = $sourcePeng) {
	$noPeng=1;
    while($rowPeng = $resultPeng->fetch_array(MYSQL_ASSOC)) {
    	if ($noPeng==1) { $rupiah='Rp '; }else{ $rupiah='';}
		echo '<tr>
		<td>'.$noPeng++.'</td>
		<td style="padding: 5px;">'.$rowPeng[nama].'</td>
		<td style="padding: 5px;" align="right">'.$rupiah.number_format($rowPeng[nominal],0,",",".").'</td>
		<td></td>
		</tr>';
	}
}
if ($resultTotalPeng = $sourceTotalPeng) {
	$rowTotalPeng = $resultTotalPeng->fetch_array(MYSQL_ASSOC);
	echo "<tr>
		<td></td>
		<td align='center'><b>Total Pengeluaran</b></td>
		<td></td>
		<td style='padding:5px;text-align:right'>Rp ".number_format($rowTotalPeng[pendapatan],0,',','.')."</span></td>
	</tr>";
}
?>
<tr>
	<td></td>
	<td align="center"><b>Sisa Nominal Uang</b></td>
	<td></td>
	<td align="right">Rp <?=number_format($rowTotal[pendapatan] - $rowTotalPeng[pendapatan],0,',','.')?></td>
</tr>
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