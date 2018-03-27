var app = angular.module("face",["ngRoute"]);

app.controller('getKaryawan', function($scope, $http){
    $http.get('../API/getDataKaryawan.php').then(function(res){
        $scope.data = res.data;
    });
});

app.controller('getProfile', function($routeParams, $scope, $http){
    $http.post(
        "../API/getProfile.php",
        {
            "id" : $routeParams.id
        }
        ).then(function(res){
        $scope.getData = res.data;
    });
});

app.controller('insertData', function($scope, $http, $window){
    $scope.add = function() {
        $http.post(
            '../API/insertKaryawan.php',
            {
                'id'            : $scope.id,
                'nama'          : $scope.nama,
                'jenis_kelamin' : $scope.jk,
                'tempatLahir'   : $scope.tempatLahir,
                'tanggalLahir'  : $scope.tanggalLahir,
                'alamat'        : $scope.alamat,
                'email'         : $scope.email,
                'noTelp'        : $scope.telp,
                'idGaji'        : $scope.idGaji
            }
        ).then(function(data){
            $window.location.href = '#!/createAbsen';
            // $window.location.href = '../controller/insertKaryawan.php'
        });
    }
});

app.controller('hapusKaryawan', function($window,$routeParams, $http){
    $http.post(
        "../API/hapusKaryawan.php",
        {
            "id" : $routeParams.id
        }
    ).then(function(){
        // $window.location.href = '#!/daftarKaryawan'
    })
});

app.controller('presensiMasuk', function($scope, $http, $window){
    var nama = "edhodev";
    var date = new Date();
    // Variabel Waktu
    var jam   = date.getHours();
    var menit = date.getMinutes();
    var detik = date.getSeconds();
    var waktu = jam + ":" + menit + ":" + detik;
    // variabel tanggal
    var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','sabtu'];
    $scope.webcam = true;
    var video = document.querySelector("#video-webcam");

    // minta izin user
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    // jika user memberikan izin
    if (navigator.getUserMedia) {
    // jalankan fungsi handleVideo, dan videoError jika izin ditolak
    navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

    // fungsi ini akan dieksekusi jika  izin telah diberikan
    function handleVideo(stream) {
         video.srcObject = stream;
    }

    // fungsi ini akan dieksekusi kalau user menolak izin
    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk absen!")
    }

    $scope.rec = function(){
      $scope.webcam = false;
      $scope.loader = true;
      var img 	= document.createElement('img');
      var context;
      var send 	= document.getElementById("send");
      // ambil ukuran video
      // alert(date.getFullYear());
      var width = video.offsetWidth
              , height = video.offsetHeight;
      // buat elemen canvas
      canvas = document.createElement('canvas');
      canvas.width = width;
      canvas.height = height;
      // ambil gambar dari video dan masukan
      // ke dalam canvas
      context = canvas.getContext('2d');
      context.drawImage(video, 0, 0, width, height);
      // render hasil dari canvas ke elemen img
      img.src = canvas.toDataURL('image/png');
    //   alert(img.src);
    //   document.getElementById('tampil').innerHTML = img.src;
      $http({
        method : "POST",
        url    : "https://api.kairos.com/recognize", //endpoints
        headers: {
            'Content-Type' : 'application/json',
            'app_id'       : '9ddfb293',
            'app_key'      : '543409066e9d2ec2694b6f93f68e31ba'
        },
        data   : {
            "image" : img.src,
            "gallery_name": "tugasakhir"
        }
      }).then(function(response){
        if(response.data.images[0].transaction.status == "success"){
            // alert("wajah ditemukan");
            console.log(response.data);
            document.getElementById("waktu").innerHTML = jam + ":" + menit + ":" + detik;
            document.getElementById("nama").innerHTML = response.data.images[0].transaction.subject_id;
            document.getElementById("tanggal").innerHTML = hari[date.getDay()] + ", "  + date.getMonth() + ":" + date.getDate()  + ":" + date.getFullYear();
            document.getElementById("keterangan").innerHTML = "Terlambat";
            $scope.loader = false;
            $scope.detail = true;
            // if click button save
            $scope.save = function(){
                // alert(waktu);
                $http.post(
                    '../API/storeAbsen.php',
                    {
                        'nama'  : response.data.images[0].transaction.subject_id,
                        'waktu' : waktu
                    }
                ).then(function(){
                    $window.location.href = '#!/'
                });
            }
        }else{
            alert("ooopss... failed");
        }
        $scope.data = response.data;
        // console.log(body);
      })
    }
});

app.controller('presensiKeluar', function($scope, $http, $window){
    var date = new Date();
    // Variabel Waktu
    var jam   = date.getHours();
    var menit = date.getMinutes();
    var detik = date.getSeconds();
    var waktu = jam + ":" + menit + ":" + detik;
    // variabel tanggal
    var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','sabtu'];
    $scope.webcam = true;
    var video = document.querySelector("#video-webcam");

    // minta izin user
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    // jika user memberikan izin
    if (navigator.getUserMedia) {
    // jalankan fungsi handleVideo, dan videoError jika izin ditolak
    navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

    // fungsi ini akan dieksekusi jika  izin telah diberikan
    function handleVideo(stream) {
         video.srcObject = stream;
    }

    // fungsi ini akan dieksekusi kalau user menolak izin
    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk absen!")
    }

    $scope.rec = function(){
      $scope.webcam = false;
      $scope.loader = true;
      var img 	= document.createElement('img');
      var send 	= document.getElementById("send");
      // ambil ukuran video
      // alert(date.getFullYear());
      var width = video.offsetWidth
              , height = video.offsetHeight;
      // buat elemen canvas
      canvas = document.createElement('canvas');
      canvas.width = width;
      canvas.height = height;
      // ambil gambar dari video dan masukan
      // ke dalam canvas
      context = canvas.getContext('2d');
      context.drawImage(video, 0, 0, width, height);
      // render hasil dari canvas ke elemen img
      img.src = canvas.toDataURL('image/png');
    //   alert(img.src);
    //   document.getElementById('tampil').innerHTML = img.src;
      $http({
        method : "POST",
        url    : "https://api.kairos.com/recognize",
        headers: {
            'Content-Type' : 'application/json',
            'app_id'       : '9ddfb293',
            'app_key'      : '543409066e9d2ec2694b6f93f68e31ba'
        },
        data   : {
            "image" : img.src,
            "gallery_name": "tugasakhir"
        }
      }).then(function(response){
        if(response.data.images[0].transaction.status == "success"){
            console.log(response.data);
            document.getElementById("waktu").innerHTML = jam + ":" + menit + ":" + detik;
            document.getElementById("nama").innerHTML = response.data.images[0].transaction.subject_id;
            document.getElementById("tanggal").innerHTML = hari[date.getDay()] + ", "  + date.getMonth() + ":" + date.getDate()  + ":" + date.getFullYear();
            $scope.loader = false;
            $scope.detail = true;
            // if click button save
            $scope.save = function(){
                // alert(waktu);
                $http.post(
                    '../API/presensiKeluar.php',
                    {
                        'nama'  : response.data.images[0].transaction.subject_id,
                        'waktu' : waktu
                    }
                ).then(function(){
                    $window.location.href = '#!/'
                });
            }
        }else{
            alert("ooopss... failed");
        }
        $scope.data = response.data;
        // console.log(body);
      })
    }
});

app.controller('daftarKehadiran', function($scope, $http, $window, $timeout ){
    $scope.menu   = false;
	  $scope.loader = true;
     $timeout(function () {
         $scope.loader = false;
		 $scope.menu   = true;
   }, 1000);
    var date = new Date();
    waktu();
    var month = date.getMonth() + 1;
    var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','sabtu'];
    document.getElementById('tanggal').innerHTML = date.getDate() + "/" + month + "/" + date.getFullYear();
    $scope.webcam = true;
    $http.get('../API/daftarKehadiran.php').then(function(response){
        $scope.data = response.data;
    })
});

app.controller('editKaryawan', function($scope, $window, $http, $routeParams){
    $http.post(
        '../API/editKaryawan.php',
        {
            'id': $routeParams.id
        }
    ).then(function(response){
       $scope.data = response.data
    })

    $scope.edit = function() {
        $http.post(
            '../API/simpanEdit.php',
            {
                'id'     : document.getElementById('id').value,
                'nama'   : document.getElementById('nama').value,
                'alamat' : document.getElementById('alamat').value,
                'noTelp' : document.getElementById('noTelp').value,
                'email'  : document.getElementById('email').value
            }
        ).then(function(){
            $window.location.href = '#!/daftarKaryawan';
        })
    }
});

app.controller('index', function($scope, $timeout, $http){
//	$scope.menu = false;
	$scope.loader = true;
	$timeout(function(){
		$scope.menu = true;
		$scope.loader = false;
	},5000);

	$scope.logout = function(){
		$scope.loader = true;
		$scope.menu = false;
		$timeout(function(){
		//	$scope.menu   = false;
//			$scope.loader   = true;
		},3000);
	}
  $http.get('../API/countSurat.php').then(function(response){
    $scope.surat = response.data['jumlah'];
    $scope.data = response.data;

    // alert(response.data['jumlah']);
  });
});

app.controller('detail', function($scope, $routeParams, $http){
	 $http.post(
		'../API/detail.php',
		{
	 		"id" : $routeParams.id
	 	}
	 ).then(function(response){
	 	$scope.data = response.data;
	 })
});

app.controller('daftarSurat', function($scope, $http, $routeParams){
  $scope.daftarSurat = true ;
  
  $http.get('../API/daftarSurat.php').then(function(response){
    $scope.data = response.data;
  });

  $scope.readMsg = function(pesan) {
    $http.post(
      '../API/updateStatusSurat.php', 
      {
        'idSurat' : pesan
      }
    ).then(function(response){
        // alert(pesan);
        $scope.daftarSurat = false;
        $scope.pesan = true;
    });
  }
});

app.controller('rekapitulasiKehadiran', function($scope, $http){
  $http.get('../API/rekapitulasiPresensi.php').then(function(response){
    $scope.data = response.data;
  });
});

app.controller('gaji', function($scope, $http){
  $http.get('../API/gaji.php').then(function(response){
    $scope.data = response.data;
    // ubah double ke currency
    var reverseGaji = response.data[0]['gajiPokok'].toString().split('').reverse().join('');
    $scope.gaji = reverseGaji.match(/\d{1,3}/g);
    $scope.gaji = $scope.gaji.join('.').split('').reverse().join('');

    var reverseLembur = response.data[0]['lembur'].toString().split('').reverse().join('');
    $scope.lembur = reverseLembur.match(/\d{1,3}/g);
    $scope.lembur = $scope.lembur.join('.').split('').reverse().join('');
  
    var reversePotongan = response.data[0]['potongan'].toString().split('').reverse().join('');
    $scope.potongan = reversePotongan.match(/\d{1,3}/g);
    $scope.potongan = $scope.potongan.join('.').split('').reverse().join('');
  });
});

// route Single Page Application
app.config(function($routeProvider){
    $routeProvider
     .when('/',{
       templateUrl : 'home.php',
       controller  : 'daftarKehadiran'
     })
     .when('/daftarKaryawan', {
       templateUrl : 'daftarKaryawan.php',
       controller  : 'getKaryawan',
     })
     .when('/profile/:id', {
         templateUrl : 'profileKaryawan.php',
         controller  : 'getProfile'
     })
     .when('/tambahKaryawan', {
        templateUrl : 'tambahKaryawan.php',
        controller  : 'insertData'
     })
     .when('/createAbsen', {
         templateUrl : 'createAbsen.php',
     })
     .when('/hapusKaryawan/:id',{
         templateUrl : 'hapusKaryawan.php',
         controller : 'hapusKaryawan'
     })
     .when('/presensiMasuk',{
         templateUrl : 'presensiMasuk.php',
         controller  : 'presensiMasuk'
     })
     .when('/presensiKeluar',{
         templateUrl : 'presensiKeluar.php',
         controller  : 'presensiKeluar'
     })
     .when('/editKaryawan/:id', {
         templateUrl : 'editKaryawan.php',
         controller  : 'editKaryawan'
     })
  	 .when('/detail/:id', {
    		 templateUrl : 'detail.php',
    		 controller  : 'detail'
  	 })
     .when('/cuti', {
         templateUrl : 'daftarSurat.php',
         controller  : 'daftarSurat'
     })
     .when('/rekapKehadiran', {
         templateUrl : 'rekapitulasiKehadiran.php',
         controller  : 'rekapitulasiKehadiran'
     })
     .when('/gaji', {
        templateUrl : 'gaji.php',
        controller  : 'gaji' 
     })
     .when('/slipGaji', {
        templateUrl : 'slipGaji.php',
        controller  : 'slipGaji'
     })
     .otherwise({redirectTo: '/'});
});
// end Route

function waktu() {
	var date = new Date();

	setTimeout("waktu()",1000);

	document.getElementById('jam').innerHTML	= date.getHours();
	document.getElementById('menit').innerHTML 	= date.getMinutes();
	document.getElementById('detik').innerHTML	= date.getSeconds();
}
