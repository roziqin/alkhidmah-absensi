<?php
include '../../config/database.php';
$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
$limit = $_POST['length']; // Ambil data limit per page
$start = $_POST['start']; // Ambil data start

if ($_GET['ket']=='peserta') {

	$sql = mysqli_query($con, "SELECT peserta_id FROM peserta"); // Query untuk menghitung seluruh data siswa
	$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql
	$query = "SELECT * FROM peserta where (peserta_nama LIKE '%".$search."%' OR peserta_barcode LIKE '%".$search."%')";

} elseif ($_GET['ket']=='user') {

	$sql = mysqli_query($con, "SELECT id FROM users, roles where role=roles_id"); // Query untuk menghitung seluruh data siswa
	$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql
	$query = "SELECT * FROM users, roles where role=roles_id and (name LIKE '%".$search."%')";
	
} elseif ($_GET['ket']=='absensi') {

	$sql = mysqli_query($con, "SELECT absensi_id FROM absensi, peserta WHERE absensi_peserta=peserta_id"); // Query untuk menghitung seluruh data siswa
	$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql
	$query = "SELECT * FROM  absensi, peserta WHERE absensi_peserta=peserta_id and (peserta_nama LIKE '%".$search."%' OR peserta_barcode LIKE '%".$search."%')";

}

$order_field = $_POST['order'][0]['column']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
$order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;
$sql_data = mysqli_query($con, $query.$order." LIMIT ".$limit." OFFSET ".$start); // Query untuk data yang akan di tampilkan
$sql_filter = mysqli_query($con, $query); // Query untuk count jumlah data sesuai dengan filter pada textbox pencarian
$sql_filter_count = mysqli_num_rows($sql_filter); // Hitung data yg ada pada query $sql_filter

$data = mysqli_fetch_all($sql_data, MYSQLI_ASSOC); // Untuk mengambil data hasil query menjadi array


$callback = array(
    'draw'=>$_POST['draw'], // Ini dari datatablenya
    'recordsTotal'=>$sql_count,
    'recordsFiltered'=>$sql_filter_count,
    'data'=>$data
);
header('Content-Type: application/json');
echo json_encode($callback); // Convert array $callback ke j