<!-- start loader-->
		<div class=" col s6 offset-s5 loader" ng-model="loader" ng-show="loader" style="margin-top:280px;">
			 <div class="preloader-wrapper big active">
				 <div class="spinner-layer spinner-blue-only">
				 	<div class="circle-clipper left">
						<div class="cirlce"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				 </div>
			 </div>
		</div>
	<!--End loader -->
<div ng-model="menu" ng-show="menu">
<br>
<div class="basic-container white" onload="waktu()">
    <div class="row">
		<div class="col s10 offset-s1">
			<br>
	    <h5><i class="material-icons left">assignment</i><b>Daftar Kehadiran</b></h5><br>
        <div class="card-panel white ">
        <table class="col s4 right">
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td> <b><div id="tanggal"></div></b></td>
            </tr>
            <tr>
                 <td>Waktu</td>
                 <td>:</td>
                 <td><b><div id="jam" class="time"></div>:<div id="menit"  class="time"></div>:<div id="detik"  class="time"></div></b></td>
            </tr>
        </table>
        <br><br>
        <input type="text" ng-model="hasil" class="col s5" placeholder="Search by">
            <div class="waktu" style="displya:inline">
            <div class="row"></div>
        </div>
            <!-- Menu Toggle  -->
                <i class="material-icons">print</i>
                <i class="material-icons">file_download</i>
            <!-- End Toggle -->
            <table class="striped">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jam Masuk</th>
                    <th>Jam pulang</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
                <tr ng-repeat="d in data | filter : hasil">
                    <td>{{d.id}}</td>
                    <td><a href="#!/detail/{{d.id}}">{{d.nama}}</a></td>
                    <td>{{d.waktuMasuk}}</td>
                    <td>{{d.waktuPulang}}</td>
                    <td>{{d.tanggal}}</td>
                    <td>{{d.keterangan}}</td>
                    <td>{{d.status}}</td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</div>
</div>
