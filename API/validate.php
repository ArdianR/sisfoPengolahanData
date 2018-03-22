<?php 
include ('../config/database.php');
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = "edho";
		$pass = "1234";
//		$query  = ("SELECT * FROM users where username=$username AND password=$password");
//		$result = mysqli_query($con, $query);

	//	if($result){
	//		header('Location :/#!/');	
	//	}
		if($username == $user AND $password== $pass){
		$_SESSION = $username;
		session.save_path(['../view/index.php'])
			header('location: ../view/index.php');
		}else {
			echo "kombinasi salah";
		}
	}
?>

