<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
  <html ng-app="face">
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../public/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- font Awesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
      <!-- Link to file CSS -->
      <link rel="stylesheet" href="../public/css/style.css">
      <!-- Link to AngularJS file -->
      <!-- CDN Angular-Material -->
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
      <!-- Bootstrap -->
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   -->
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	  <script src="../assets/angular/angular.min.js"></script>
      <script src="../assets/angular/angular-route.js"></script>
    </head>
    <body class="grey lighten-3">
		 <!-- start loader-->
		<div class=" col s6 offset-s5 loader" ng-controller="index" ng-model="loader" ng-show="loader" style="margin-top:180px; margin-left:650px;">
			 <div class="preloader-wrapper big active">
				 <div class="spinner-layer spinner-green-only">
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
	<div  ng-controller="index" ng-model="menu" ng-show="menu">
        <ul id="dr1" class="dropdown-content">
            <li><a href="" class="black-text"><i class="material-icons left">account_box</i>Account</a></li>
            <div class="divider"></div>
            <li><a href="" class="black-text"><i class="material-icons left">settings</i>Settings</a></li>
		      	<li><a href="logout.php" class="black-text"><i class="material-icons left">exit_to_app</i>Sign Out</a></li>
        </ul>

        <ul id="dr2" class="dropdown-content content-notifications">
            <h6 class="black-text center-align">Notification</h6>
            <li class="divider"></li>
            <li><a href=""><img src="../public/img/users/user.png" alt="" class="circle left" width="60px" height="60px" >
                <div class="notif-header">
                    Belum Absen
                </div>
                <div class="info">
                    Silahkan absen atau melakukan permintaan izin atau cuti.
                </div>
                <div class="dateNotifications right-align">
                    Kamis, 10-03-2018
                </div>
            </a></li>
            <li class="divider"></li>
            <li><a href=""><img src="../public/img/users/user.png" alt="" class="circle left" width="60px" height="60px" >
                <div class="notif-header">
                   Pemotongan Gaji
                </div>
                <div class="info">
                    keterlambatan melebihi batas yang ditentukan.
                </div>
                <div class="dateNotifications right-align">
                    Kamis, 10-03-2018
                </div>
            </a></li>
            <li class="divider"></li>
            <li><a href="">
                <div class="show-all center-align">
                    show all notifications
                </div>
            </a></li>
        </ul>
        <ul id="dr3" class="dropdown-content content-notifications">
            <h6 class="black-text center-align">Messages</h6>
            <li class="divider"></li>
            <li><a href="" class="black-text"><i class="large material-icons left">mail</i>
                <div class="notif-header">
                    Ridho Pangestu
                </div>
                <div class="dateNotifications right-align">
                    Kamis, 10-03-2018
                </div>
            </a></li>
            <li class="divider"></li>
            <li><a href="" class="black-text"><i class="large material-icons left">mail</i>
                <div class="notif-header">
                    Admin
                </div>
                <div class="dateNotifications right-align">
                    Kamis, 10-03-2018
                </div>
            </a></li>
            <li class="divider"></li>
            <li><a href="">
                <div class="show-all center-align">
                    show all messages
                </div>
            </a></li>
        </ul>

        <nav class="blue darken-4">
            <div class="nav-wrapper">
                <a href="" class="brand-logo"><img src="../public/img/AngularJS-Shield.svg"  class="left" width="60px" height="60px">AngularJS</a>
                <ul class="right hide-on-med-and-down navbar-user">
                    <!-- <li><a href="" class="dropdown-button" data-activates="dr3"><i class="material-icons left">mail</i><span class="new badge red darken-4">2</span></a></li> -->
                    <li><a href="" class="dropdown-button" data-activates="dr2"><i class="material-icons left">notifications</i><span class="new badge red darken-4">8</span></span></a></li>
                    <li><a href="" class="dropdown-button" data-activates="dr1"><b><?php echo  $_SESSION['username'];?></b><img src="../public/img/users/ridho.jpg" alt="" class="user-photo left circle"></a></li>
                </ul>
            </div>
        </nav>

        <div class="row row-sideNav fixed">
            <div class="col s2 menu">
                <aside>
                  <ul class="collapsible" data-collapsible="accordion">
                      <li>
                          <div class="collapsible-header"><a href="#!/" class="white-text"><i class="material-icons left">home</i>Home</a></div>
                      </li>
                      <li>
                          <div class="collapsible-header white-text"><i class="material-icons left">camera_alt</i>Presensi <i class="material-icons right">arrow_drop_down</i></div>
                          <div class="collapsible-body menu-nav">
                              <div class="collection">
                                 <a href="#!/presensiMasuk" class="collection-item link white-text">Presensi Masuk</a>
                              </div>
                          </div>
                          <div class="collapsible-body">
                                <div class="collection">
                                   <a href="#!/presensiKeluar" class="collection-item link white-text">Presensi Keluar</a>
                                </div>
                          </div>
                          <div class="collapsible-body">
                                <div class="collection">
                                   <a href="" class="collection-item link white-text">Lembur</a>
                                </div>
                          </div>
                      </li>
                      <li>
                          <div class="collapsible-header white-text"><i class="material-icons left">account_box</i>Karyawan</div>
                          <div class="collapsible-body">
                            <a href="#!/daftarKaryawan" class="collection-item link white-text">Daftar Karyawan</a>
                          </div>
                          <div class="collapsible-body">
                            <a href="#!/tambahKaryawan" class="collection-item link white-text">Tambah Karyawan</a>
                          </div>
                       </li>
                       <li>
                          <div class="collapsible-header"><a href="" class="white-text"><i class="material-icons left">money</i>Gaji</a></div>
                       </li>
                       <li>
                           <div class="collapsible-header"><a href="#!/rekapKehadiran" class="white-text"><i class="material-icons left">assignment</i>Rekap Presensi</a></div>
                       </li>
											 <li>
												 <div class="collapsible-header" ng-model="surat" ><a href="#!/cuti" class="white-text"><i class="material-icons left">mail</i>Surat Cuti <span class="new badge" ng-if="surat > 0">{{data.jumlah}}</span> </a></div>
											 </li>

                  </ul>
                </aside>
                <li class="divider"></li>
                <div class="contact-us">
                    <p class="center-align white-text">contact us</p>
                    <p class="white-text"><i class="material-icons  left">phone</i> 082-333-555-353</p>
                    <p class="white-text"><i class="material-icons left">mail</i>riidho.lfc@gmail.com</p>
                </div>
                <li class="divider"></li>
            </div>
            <div class="col s10">
                <div ng-view></div>
            </div>
        </div>

        <footer class="center-align">
            &copy; copyright - 2018
        </footer>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../public/js/materialize.min.js"></script>
      <!-- Link to Controller AngularJS  -->
      <script src="../app/myController.js"></script>
      </script>
	  </div>
    </body>
    <script>
        $('document').ready(function(){
            $('.modal').modal();
            $('.dropdown-button').dropdown({
                inDuration: 300,
                outDuration: 225,
                constrainWidth: false, // Does not change width of dropdown to that of the activator
            }
            );
        });
    </script>
  </html>
