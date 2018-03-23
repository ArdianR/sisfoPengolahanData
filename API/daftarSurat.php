<?php
    include '../config/database.php';

    $result = mysqli_query($con, "SELECT karyawan.nama, karyawan.alamat, suratCuti.alasanCuti,suratCuti.idSurat, suratCuti.jumlahCuti,suratCuti.tanggal, suratCuti.waktu, suratCuti.isi, suratCuti.status FROM suratCuti inner join karyawan on suratCuti.id = karyawan.id");

    $data = array();
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
    }
    echo json_encode($data);
 ?>
