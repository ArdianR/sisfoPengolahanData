<?php 
include('../config/database.php');

$tanggal = date('Y-m-d');
$query = "select daftarKehadiran.id, karyawan.nama, daftarKehadiran.hari, daftarKehadiran.tanggal, daftarKehadiran.waktuMasuk, daftarKehadiran.waktuPulang, daftarKehadiran.keterangan, daftarKehadiran.status from daftarKehadiran inner join karyawan on daftarKehadiran.id = karyawan.id where daftarKehadiran.tanggal='$tanggal'";

$result = mysqli_query($con, $query);

$data = array();

if(mysqli_num_rows($result) > 0 ){
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
}
echo json_encode($data);
?>