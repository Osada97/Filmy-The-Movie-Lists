<?php  
	require_once("../inc/connection.php");
	session_start();

	if(!isset($_SESSION['admin_name'])){
		header("location:admin-index.php");
	}

	if(!isset($_GET["m_id"]) && $_GET['admins']!=true){
		header('Location:admin-index.php?error');
	}
	else{

		$movie_id = $_GET['m_id'];

		$delte_de_query = "DELETE FROM movie_details WHERE movie_id ={$movie_id}";
		$delte_4to_result = mysqli_query($connection, $delte_de_query);
		


		if($delte_de_query){

			//query for delte 4to 
			$delte_4to_query = "DELETE FROM movie_cover_poster WHERE movie_id ={$movie_id}";
			$delte_4to_result = mysqli_query($connection, $delte_4to_query);

			//query for delte story line
			$delte_sl_query ="DELETE FROm story_line WHERE movie_id={$movie_id}";
			$delte_4to_result = mysqli_query($connection, $delte_sl_query);

			header('location:admin-index.php?delete=true');

		}
		else{
			print_r(mysqli_error($connection));
		}
	}

mysqli_close($connection);
?>