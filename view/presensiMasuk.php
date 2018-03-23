<?php 
    // session_start();

    // if ($_SESSION["levelUser"] == 'admin') {
        // header('Location : #!/');
        // header('Location: login.php');
    // }
 ?>
<br>
<div class="basic-container white">
    <div class="row">
        <div class="col s12 center-align">
             <div class="blue lighten-3 left-align white-text" style="border-radius: 10px; padding-left:15px">
                <h4><i class="material-icons">info</i>Info :</h4>
                <ol>
                    <li>Arahkan wajah ke posisi webcam secara tegak tanpa, menutupi bagian wajah.</li>
                    <li>Klik button dangan icon kamera.</li>
                    <li>pilih save, jika hasil yang di tampilkan sesuai</li>
                </ol>
             </div>
             <!-- webcam  -->
             <div ng-model="webcam" ng-show="webcam">
                <video autoplay="true" id="video-webcam">
                    Browsermu tidak mendukung bro, upgrade donk!
                </video>
                <br>
                <button class="btn blue darken-4" ng-click="rec()" class="" ng-model="loader"><i class="material-icons">camera_alt</i></button>
              </div>
             <!-- End Webcam  -->
             <!-- loader -->
            <div ng-show="loader" class="loader">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="cirlce-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div><br>
                please wait ...
            </div>
             <!-- endloader -->
             <!-- Detail  -->
             <div ng-model="detail" ng-show="detail" style="margin-top:10px">
                <br>
                <h4><i class="material-icons">info</i>Informasi</h4>
                <div class="col s6 offset-s3">
                <br>
                <table class="striped">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td id="nama" ng-model="nama"></td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td>:</td>
                        <td id="waktu" ng-model="waktu"></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td id="tanggal" ng-model="tanggal"></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td id="keterangan" ng-model="keterangan"></td>
                    </tr>
                </table>
                <button type="button" ng-click="save()" class="btn blue-darken-4 right">save</button>
                </div>
              </div>  
             <!-- end Detail -->
        </div>
        </div>
    </div>       
