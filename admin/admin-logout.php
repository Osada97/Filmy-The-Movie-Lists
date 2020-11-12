<?php  

	session_start();

	//clear session
	$_SESSION = array();

	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-86400,'/');
	}

	session_destroy();

	//clear cookie
	setcookie('username','',time()-86400);

	header('location:filmy-admins-login.php?logout=true');

?>