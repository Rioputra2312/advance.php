<?php 
session_start();

if(isset($_POST['Login'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$conn = mysqli_connect("localhost", "root", "", "lat7");

	//cek koneksi
	if($conn) {
		$result = mysqli_query($conn, "select * from user where `username` = '".$user."'");

		//cek apakah ada username
		if(mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user'] = $user;

			//cek apakah password sama
			if($pass == $row['password']) {
				header("Location: sukses.php");
			}else{
				die("username/password salah");
			}
		}else{
			die("username/password salah");
		}
	}else{
		die("Database tidak Terhubung");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Here </title>
</head>
<body>
	<FORM METHOD="POST" NAME="input"> 
	<h2>Login Here... </h2>
	username : <input type="text" name="username"><br> 
	password : <input type="password" name="password"><br> 
	<input type="submit" name="Login" value="Login">
	<input type="reset" name="Reset" value="Reset">
	</FORM>

</body>
</html>