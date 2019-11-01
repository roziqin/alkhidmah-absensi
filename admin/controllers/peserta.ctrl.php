<?php 
session_start();
include '../../config/database.php';
date_default_timezone_set('Asia/jakarta');
$tgl=date('Y-m-j');

if($_GET['ket']=='submit-peserta'){

	$nama = $_POST['ip-nama'];
	$alamat = $_POST['ip-alamat'];
	$barcode = $_POST['ip-barcode'];
	
	$sql = "INSERT into peserta(peserta_nama,peserta_alamat,peserta_barcode)values('$nama','$alamat','$barcode')";

	mysqli_query($con,$sql);
	
} elseif($_GET['ket']=='update-peserta'){


	$id = $_POST['ip-id'];
	$nama = $_POST['ip-nama'];
	$alamat = $_POST['ip-alamat'];
	$barcode = $_POST['ip-barcode'];

	$sql="UPDATE peserta set peserta_nama='$nama',peserta_alamat='$alamat', peserta_barcode='$barcode' where peserta_id='$id'";
	mysqli_query($con,$sql);
	
} elseif($_GET['ket']=='remove-peserta'){
	$array_datas = array();
	
	$id = $_POST['id'];
	$sql="DELETE from peserta where peserta_id='$id'";
	if (!mysqli_query($con,$sql)) {
		$array_datas[] = ["gagal"];
	}else{
		$array_datas[] = ["ok"];
	}
	echo json_encode($array_datas);
	
}

?>  