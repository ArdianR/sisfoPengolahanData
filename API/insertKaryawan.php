<?php 
include('../config/database.php');
$data = json_decode(file_get_contents("php://input"));

$id             = $data->id;
$nama           = $data->nama;
$jk             = $data->jenis_kelamin;
$tempatLahir    = $data->tempatLahir;
$tanggalLahir   = $data->tanggalLahir;
$alamat         = $data->alamat;
$email          = $data->email;
$noTelp         = $data->noTelp;
// $idGaji         = $data->idGaji; 
$query = "insert into karyawan (id, nama, jenis_kelamin,  tempatLahir, tanggalLahir, alamat, email, noTelp, idGaji) values ('$id', '$nama','$jk','$tempatLahir','$tanggalLahir','$alamat','$email','$noTelp',1)";

if(mysqli_query($con, $query)){
    echo "sukses";
}
?>