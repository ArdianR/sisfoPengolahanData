<!-- daftarSurat -->
<br>
<div ng-model="daftarSurat" ng-show="daftarSurat">
  <div class="basic-container white">
    <br><br>
    <div class="row">
      <div class="col s10 offset-s1">
        <h5> <i class="material-icons left">mail</i> <b>Surat Masuk</b> </h5>
        <table class="striped">
          <tr ng-repeat="d in data">
            <!-- <td><span class="new badge"></span></td> -->
            <td><a href="" ng-click="readMsg(d.idSurat)">{{d.nama}}</a></td>
            <td>{{d.isi}}</td>
            <td>{{d.tanggal}} : {{d.waktu}}</td>
            <!-- <td>{{d.status}}</td> -->
            <td ng-if="d.status=='terkirim'" ><span class="new badge left"></span></td>
            <td ng-if="d.status!='terkirim'" ><span>{{d.status}}</span></span></td>
            <td><a href="" class="btn red"><i class="material-icons">delete</i></a></td>
          </div>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End daftarSurat -->

<!-- Pesan -->
<br>
<div ng-model="pesan" ng-show="pesan">
  <div class="basic-container">
    <br><br>
    <div class="row" ng-repeat="d in data">
      <div class="col s10 offset-s1">
        <i class="material-icons">mail</i>
        <div class="row">
          <div class="col s6 right">
            Makassar, {{d.tanggal}}
          </div>
        </div>
        <div class="row"> 
          <div class="col s4">
            Yth. Bapak Ridho Pangestu
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Pesan -->