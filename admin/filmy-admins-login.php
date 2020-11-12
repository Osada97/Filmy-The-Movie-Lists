<?php  require_once("../inc/connection.php")?>
<?php session_start(); ?>
<?php  

	$real_user_name ="osada";
	$real_password  ="ofsada";
	$error = array();


	if (isset($_POST['submit'])) {

		
		if (empty(trim($_POST['username']))) {
			$error[] = "Please Enter A User Name";
		}
		if (empty(trim($_POST['password']))) {
			$error[] = "Please Enter A Password";
		}

		if (empty($error)) {

			$username = mysqli_real_escape_string($connection,$_POST['username']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			
			if ($real_user_name == $username && $real_password == $password) {
				header("location:admin-index.php");
				$_SESSION["admin_name"] = $username;

				//setcookie
				//setcookie(name ,value,  expiration)
				setcookie('username' ,$username, time()+ 60*60*24*7*4);
			}
			else{
				$error[] = "User Name And Password Is Invalid Please Try Again";
			}
		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filmy Admins Login</title>
	<link rel="stylesheet" href="../css/admin/filmy-admins-login.css">
	<link rel="stylesheet" href="../css/media-css/admin-media/admin-login-media.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

	<div class="main_container">
		<h1>Filmy</h1>

		<div class="login_form">
			<h2>Filmy Admins Login</h2>
			
			<div class="error">
				<?php  
					if (!empty($error)) {
						foreach ($error as  $value) {
							echo "<p>{$value}</p>";
						}
					}
				?>
			</div>

			<form action="filmy-admins-login.php" method="POST">
				<p>
					<label for="username">User Name:</label>
					<input type="text" name="username" id="username" placeholder="Enter Admin name Here">
				</p>
				<p>
					<label for="password">Admin Password:</label>
					<input type="password" name="password" id="password" placeholder="Enter Admin Password Here">
				</p>
				<p>
					<input type="submit" value="Login" name="submit" title="Login Filmy">
				</p>
			</form>
		</div><!--login_form-->
	</div><!--main_container-->

	
</body>
</html>
<?php mysqli_close($connection); ?>