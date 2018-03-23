<br>
<div class="basic-container white">
  <br>
  <div class="row">
    <div class="col s12">
      <h4>Rekapitulasi Kehadiran</h4>
      <div class="input-field col s5">
        <input type="text" name="" value="" ng-model="hasil" placeholder="Filter By">
      </div>
      <div class="col s5 right" style="padding-top: 40px;">
        <i class="material-icons right">print</i>
        <i class="material-icons right">file_download</i>
      </div>
      <table class="striped">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Jumlah Kehadiran</th>
          <th>Tidak Hadir</th>
          <th>Jumlah Cuti</th>
          <th>Total Jam Kerja</th>
          <th>Total Jam Lembur</th>
        </tr>
        <tr ng-repeat = "d in data | filter: hasil">
          <td>{{d.id}}</td>
          <td>{{d.nama}}</td>
          <td>{{d.jumlahKehadiran}}</td>
          <td>{{d.jumlahKetidakhadiran}}</td>
          <td>{{d.jumlahCuti}}</td>
          <td>{{d.totalJamKerja}}</td>
          <td>{{d.totalJamLembur}}</td>
        </tr>
      </table>
    </div>
  </div>
</div>
