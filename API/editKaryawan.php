<?php 
include('../config/database.php');

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$query =  "select * from karyawan where id=$id";
$result = mysqli_query($con, $query);
$resData = array();

if(mysqli_num_rows($result) != 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $resData[] = $row;
  }
 }
echo json_encode($resData);
?>