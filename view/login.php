<?php 
session_start();
include ('../config/database.php');
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query  = "SELECT * FROM users where username='$username' AND password='$password'";
		$result = mysqli_query($con, $query);
		if($row = mysqli_num_rows($result) !=  0){
			$_SESSION["username"] = "admin" ;
			header('Location: /MyTemplateAdmin/view');	
		}else{
			$_SESSION['message'] = "Username dan password tidak valid";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
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

</head>
<body id="latar">
		 <?php 
		 	if(isset($_SESSION['message'])){ 
				echo "<h4> ". $_SESSION['message'] . " </h4>";	
			}?>
		<img  src="../public/img/AngularJS-Shield.svg " alt="" style="height:70px; width:70px;" class="logo">
		</div>
	</div>
	<div class="row">
			<div class="col s4 offset-s4 login white" style="padding-top: 40px;">
			<form action="login.php" method="POST">
				<div class="row">
					<div class="input-field col s10 offset-s1">
						<i class="material-icons prefix">account_circle</i>
						<input id="username" name="username" type="text" class="validate">
						<label for="username">username</label>
					</div>
				</div>	
				<div class="row">
					<div class="input-field col s10 offset-s1">
						<i class="material-icons prefix">lock</i>
						<input id="password" class="validate" type="password" name="password">
						<label for="password">Password</label>
					</div>		
				</div>
				<div class="row">
					<br>					
					<div class="col s8 offset-s3">
						<input type="submit" name="submit" class="btn blue darken-3 right" value="login">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col s12 center-align" style="padding-top: 30px;">
						<span><b><a href="">Lupa password?</a></b></span> |
						<span><b><a href="">Register</a></b></span>
					</div>
				</div>
			</form>	
			</div>
	</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="../public/js/materialize.min.js"></script>

</body>
</html>
