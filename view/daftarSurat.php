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
<br><br>
<div ng-model="pesan" ng-show="pesan">
  <div class="basic-container white">
    <br><br>
    <!-- <i class="material-icons">mail</i> -->
    <div class="row">
      <div class="col s10 offset-s1">        
        <div class="row">
          <div class="col s6 right">
            Makassar, {{data[0].tanggal}}
          </div>
        </div>
        <div class="row"> 
          <div class="col s12 white">
            <p>Yth</p>
            <p>Kepala Bagian Personalia</p>
            <p>ALterga Komputer</p>
            <p> Jl. Tamalate I Blk. 15 No.6A, Bonto Makkio, Makassar, Kota Makassar, Sulawesi Selatan 90221</p> 
            <p>Dengan Hormat</p>
            <p>Saya yang bertanda tangan di bawah ini</p>
            <div class="col s10 offset-s1">             
              <p>Nama   : {{data[0].nama}}</p>
              <p>Alamat : {{data[0].alamat}}</p>             
            </div>
             <p>bermaksud untuk mengajukan izin kerja selama {{data[0].jumlahCuti}} hari kerja dikarenakan {{data[0].alasanCuti}}</p>
              <p>Demikian surat izin ini saya sampaikan, atas kebijakannya saya ucapkan terima kasih.</p>
              <p>Hormat Saya</p>
              <br>
              <p>{{data[0].nama}}</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Pesan