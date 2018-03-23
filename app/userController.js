var app = angular.module("user",[]);

app.controller('user', function($scope, $http){
	$scope.menuAbsen = true;
  var date = new Date();
    // Variabel Waktu
    var jam   = date.getHours();
    var menit = date.getMinutes();
    var detik = date.getSeconds();
    var waktu = jam + ":" + menit + ":" + detik;
    // variabel tanggal
    var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','sabtu'];	
	
	// $http.get("../../API/daftarKehadiran.php").then(function(response){
	// 	$scope.data = response.data;
	// });

	$scope.masuk = function() {
	   $scope.menuAbsen = false;	
	   $scope.webcam =true;
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
          $scope.absen = function() {
            $scope.webcam = false;
            $scope.loader = true;
            var img   = document.createElement('img');
            var context;
            var send    = document.getElementById("send");
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
            alert(img.src);
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
                     console.log(response.data.images[0]);
                    if(response.data.images[0].transaction.status == "success"){
                        // alert("wajah ditemukan");
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
                                '../../API/storeAbsen.php',
                                {
                                    'nama'  : response.data.images[0].transaction.subject_id,
                                    'waktu' : waktu
                                }
                            ).then(function(){
                                $scope.menu = true;
                                $scope.detail = false;
                            });
                        }
                    }else{
                        alert("ooopss... failed");
                    }
                    $scope.data = response.data;
                    // console.log(body);
                  })
      	}

  	$scope.back = function() {
  		$scope.menuAbsen = true;
  		$scope.webcam = false;
  	}     
	}
});

app.controller('daftar', function($scope, $http){
      $http.get('../../API/daftarKehadiran.php').then(function(response){
            $scope.data = response.data;
      });
});