<?php 
include('../config/database.php');
$data  = json_decode(file_get_contents("php://input"));
$nama  = $data->nama; 
$waktuPulang = $data->waktu;
$tanggal = date('Y-m-d');
$result = mysqli_query($con, "select id from karyawan where nama='$nama'");

if(mysqli_num_rows($result) > 0){
    while($id = mysqli_fetch_assoc($result)){
        $selectID = $id['id'];
        $query = "update daftarKehadiran set waktuPulang='$waktuPulang' where id='$selectID' AND waktuPulang=null";
        if(mysqli_query($con, $query)===TRUE){
            mysqli_query($con, "update daftarKehadiran set jumlahJamKerja=TIMEDIFF(waktuPulang, waktuMasuk) where id='$selectID' AND tanggal='$tanggal'"); //update data (Jumlah Jam Kerja)
            $cariTanggal = mysqli_query($con, "SELECT date_add(tanggal, interval 30 day) as batas from daftarKehadiran"); // Menentukan Batas Tanggal Gaji
            $batasTanggal = mysqli_fetch_assoc($cariTanggal);
			$valid = mysqli_query($con, "SELECT * from rekapKehadiran where id='$selectID' and batasTanggal='$batasTanggal[batas]'");
			$result2	   = mysqli_query($con, "SELECT * from daftarKehadiran where id='$selectID' AND tanggal='$tanggal'");
			$total   	   = mysqli_fetch_assoc($result2);
			$totalJamKerja = $total['jumlahJamKerja'];	
			if(mysqli_num_rows($valid) > 0 ){
				mysqli_query($con, "UPDATE rekapKehadiran SET jumlahKehadiran=jumlahKehadiran+1,totalJamKerja=ADDTIME(totalJamKerja, '$totalJamKerja') where id='$selectID'");	
			}
			else {
				
				
				mysqli_query($con, "INSERT INTO rekapKehadiran (id, jumlahKehadiran, totalJamKerja, Bulan, Tahun, batasTanggal) values($selectID, 1, '$totalJamKerja','Maret', '2018', '$batasTanggal[batas]')");
				}
			}	
		}
    }
?>
