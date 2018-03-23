<?php 
include('../config/database.php');

$data = json_decode(file_get_contents("php://input"));
$id   = $data->id;

mysqli_query($con, "delete from karyawan where id=$id");
?>