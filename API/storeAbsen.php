<?php 
include('../config/database.php');

$data = json_decode(file_get_contents("php://input"));

$nama   = $data->nama;
$waktu  = $data->waktu;

// setData
$dayIn = array(
    "Sunday"    => "Minggu",
    "Monday"    =>"Senin",
    "Tuesday"   =>"Selasa",
    "Wednesday" =>"Rabu",
    "Thursday"  =>"Kamis",                
    "Friday"    =>"Jumat",
    "Saturday"  =>"Sabtu", 
);

$monthIn = array(
    "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Junis",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
);

$hari    = $dayIn[date('l')];
$bulan   = $monthIn[date('m')]; 
$tanggal = date('Y-m-d');
$w   = strtotime("21:22:12");
echo $w;
// mencari id yang sesuai dengan nama
$result 	= mysqli_query($con, "select id from karyawan where nama='$nama'");
if(mysqli_num_rows($result) > 0){
    while($id = mysqli_fetch_assoc($result)){
        // echo $id['id'];
		$selectID = $id['id'];
		$validasi 	= mysqli_query($con, "select * from daftarKehadiran where id=$selectID AND tanggal='$tanggal'");
		if(mysqli_num_rows($validasi) > 0){
			echo "sudah ABSEN";
		}
		else{
		$query = "insert into daftarKehadiran (id,hari,tanggal,waktuMasuk, keterangan, status) values ('$selectID','$hari', '$tanggal', '$waktu', 'Hadir','Terlambat')";
        if(mysqli_query($con, $query)){
            echo "sukses";
    	    }
		}
	}
}

?>
