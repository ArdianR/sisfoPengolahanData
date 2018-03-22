<?php 
include('../config/database.php');
$data = json_decode(file_get_contents("php://input"));

$id      = $data->id;
$nama    = $data->nama;
$alamat  = $data->alamat;
$noTelp  = $data->noTelp;
$email   = $data->email;

$result = mysqli_query($con, "UPDATE karyawan SET nama='$nama', alamat='$alamat', noTelp='$noTelp', email='$email' where id=$id");
if($result){
    echo "sukses";
}
?>