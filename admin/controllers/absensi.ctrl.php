<?php 
session_start();
include '../../config/database.php';
date_default_timezone_set('Asia/jakarta');
$tgl=date('Y-m-j');
$wkt=date('H:i:s');
$array_datas = array();

if($_GET['ket']=='cek-peserta'){

	$barcode = $_POST['barcode'];

	$sql="SELECT * from peserta where peserta_barcode='$barcode'";
	$query=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($query);
	$id = $data["peserta_id"];
	$nama = $data["peserta_nama"];
	$alamat = $data["peserta_alamat"];

	if($data!=null) {
		$sql = "INSERT into absensi(absensi_peserta,absensi_tgl,absensi_waktu)values('$id','$tgl','$wkt')";
		mysqli_query($con,$sql);
		$array_datas["status"] = "ok";
		$array_datas["nama"] = $nama;
		$array_datas["alamat"] = $alamat;
	} else {
		$array_datas["status"] = "gagal";

	}

	
	echo json_encode($array_datas);
}

?>  