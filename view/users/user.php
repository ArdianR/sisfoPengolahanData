<!DOCTYPE html>
<html ng-app="user">
<head>
	<title>Alterga Computer</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/materialize.min.css">
	<script type="text/javascript" src="../../assets/angular/angular.min.js"></script>
	<script type="text/javascript" src="../../assets/angular/angular-route.js"></script>
</head>
<body ng-controller="user">
	<nav class="grey darken-3">
		
	</nav>
	<br><br>
	<!-- Controller -->
	<div ng-controller="user">
	<!-- Menu Absen -->
		<div ng-model="menuAbsen" ng-show="menuAbsen">
			<div class="row">
				<div class="col s4 center-align">
					<a href="" ng-click="masuk()">
						<div class="card">
							<img src="../../public/img/face.png" width="200">
							<h4>Presensi Masuk</h4>
						</div>
					</a>
				</div>
				<div class="col s4 center-align">
					<a href="">
						<div class="card">
							<img src="../../public/img/face.png" width="200">
							<h4>Presensi Pulang</h4>
						</div>
					</a>
				</div>
				<div class="col s4 center-align">
					<a href="">
						<div class="card">
							<img src="../../public/img/face.png" width="200">
							<h4>Jam Lembur</h4>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- End Menu Absen -->
		<!-- Webcam -->
		<div ng-model="webcam" ng-show="webcam">
		<div class="col s12 center-align">
	         <video autoplay="true" id="video-webcam">
	               Browsermu tidak mendukung bro, upgrade donk!
	         </video>
	         <br>
	         <button class="btn blue darken-4" ng-click="back()" class="">Menu</button>
	         <button class="btn blue darken-4" ng-click="absen()" class="" ng-model="loader">Take</button>
	    </div>
	    </div>
		<!-- End WebCam -->
		<!-- Loader -->
		<div class="col s12 center-align">
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
	    </div>
		<!-- END Loader -->
		<!-- detail -->
		<div ng-model="detail" ng-show="detail" style="margin-top:10px">
	        <br>
	        <h5>Informasi</h5>
	        <div class="col s12">
		        <br>
		        <table class="striped col s6">
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
	<!-- end detail -->
	</div>
	<!-- End Controller -->

	<!-- controller daftarKehadiran -->
		<div class="row" ng-controller="daftar">
			<div class="col s12">
				<table class="striped">
					<tr>
						<td>No</td>
						<td>Nama</td>
						<td>Jam Masuk</td>
						<td>Jam Pulang</td>
						<td>Status</td>
					</tr>
					<tr ng-repeat="d in data" ng-init="x=0">
						<td>{{x+1}}</td>
						<td>{{d.nama}}</td>
						<td>{{d.waktuMasuk}}</td>
						<td>{{d.waktuPulang}}</td>
						<td>{{d.status}}</td>
					</tr>				
				</table>
			</div>
		</div>
	<!-- ENd Controller -->
	<script type="text/javascript" src="../../app/userController.js"></script>	
</body>
</html>