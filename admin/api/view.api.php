<?php
include '../../config/database.php';
session_start();
$bln=date('Y-m');

$func = $_GET['func'];

if ($func=='editpeserta') {

    $id = $_POST['id'];
    $query = "SELECT * from peserta where peserta_id='$id'";

} elseif ($func=='edituser') {

	$id = $_POST['id'];
	$query = "SELECT * from users where id='$id'";

}


$result = mysqli_query($con,$query);
$array_data = array();

while($baris = mysqli_fetch_assoc($result))
{
  $array_data[]=$baris;
}


echo json_encode($array_data);

?>


