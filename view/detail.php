<br>
<div class="basic-container white">
  <div class="row">
    <div class="col s11 offset-s1">
        <h5><i class="material-icons left">info</i>Rekap Kehadiran Pegawai</h5>
        <div ng-repeat="d in data">
          <br>
          <b>Periode : {{d.Bulan}} - {{d.Tahun}}</b>
          <br><br>
          <div class="row">
            <div class="col s6 offset-s1">
                <table class="striped">
                  <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td>{{d.id}}</td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{d.nama}}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Kehadiran</td>
                    <td>:</td>
                    <td>{{d.jumlahKehadiran}}</td>
                  </tr>
                  <tr>
                    <td>Tidak hadir</td>
                    <td>:</td>
                    <td>{{d.jumlahKetidakhadiran}}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Cuti/Izin</td>
                    <td>:</td>
                    <td>{{d.jumlahCuti}}</td>
                  </tr>
                  <tr>
                    <td>Total Jam Kerja</td>
                    <td>:</td>
                    <td>{{d.totalJamKerja}}</td>
                  </tr>
                  <tr>
                    <td>Total Jam Lembur</td>
                    <td>:</td>
                    <td>{{d.totalJamLembur}}</td>
                  </tr>
                </table>
            </div>
            <div class="col s5">
              <img src="../public/img/users/{{d.photo}}" alt="" height="300px" width="200px">
            </div>
        </div>
  </div>
  <div class="fixed-action-btn horizontal click-to-toggle">
      <a href="#!/" class="btn-floating btn-large red">
          <i class="material-icons">arrow_back</i>
      </a>
  </div>
</div>
