<?php require_once("inc/connection.php"); ?>

<?php  
	
	$movie_col="";

	//pagination

	$pagination ="";

	$pagi_query = "SELECT count(movie_id) As movie_id FROM movie_details";
	$pagi_result = mysqli_query($connection,$pagi_query);

	$page_of = mysqli_fetch_assoc($pagi_result);

	$total_number_of = $page_of["movie_id"];

	$movies_per_page = 12;


		if(isset($_GET["p"])){
			$page_number = $_GET['p'];
		}
		else{
			$page_number = 1;
		}

	$start = ($page_number-1)*$movies_per_page;

	$first = "<a href=movies.php?p=1>First</a>";

	$last_page_number = ceil($total_number_of/$movies_per_page);
	$last = "<a href=movies.php?p=" . $last_page_number . ">Last</a>";

	if($page_number<=1){
		$first = "<a>First</a>";
		$previous = "<a>Previous</a>";
	}
	else{
		$first_page_number = $page_number-1;
		$previous = "<a href=movies.php?p={$first_page_number}>Previous</a>";
	}

	if($page_number >= $last_page_number){
		$last ="<a>Last</a>";
		$next = "<a>Next</a>";
	}
	else{
		$next_page_number = $page_number+1;
		$next = "<a href=movies.php?p={$next_page_number}>Next</a>";
	}


		$pagination = "<ul>";
		$pagination .= "<li>" . $first . "</li>";
		$pagination .= "<li>" . $previous . "</li>";
		$pagination .="<li>" . $page_number . " Of " . $last_page_number . "</li>";
		$pagination .= "<li>" . $next . "</li>";
		$pagination .= "<li>" . $last . "</li>";
		$pagination .= "</ul>";

	////////////
	?>
	<?php

	if(!isset($_GET['msg'])){

		//showing movie lists
		$query_list_m = "SELECT * FROM movie_details ORDER BY movie_id DESC LIMIT {$start},{$movies_per_page}";
		$result_list_m = mysqli_query($connection,$query_list_m);

		if($result_list_m){

			while($movie_one = mysqli_fetch_assoc($result_list_m)){

				$movie_col .= '<div class="movie_grid_column">';
				$movie_col .= '<a href=view-filmy.php?m-id=' . $movie_one["movie_id"] . '>'; 
				$movie_col .='<div class="movie_cover">';

				//checking movie poster is avalable or not 
				$l_pos_query = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movie_one['movie_id']}";
					$l_pos_result = mysqli_query($connection,$l_pos_query);

					if($l_pos_result){
						$u_l_poter = mysqli_fetch_assoc($l_pos_result);
						if($u_l_poter['movie_poster'] == 1){
							if($u_l_poter['movie_poster_name'] != null){
								$movie_col .= "<img src =img/uploaded_new_file/movie_poster/" . $u_l_poter['movie_poster_name'] . ">";
							}
							else{
								$movie_col .= "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
							}
						}
						else{
							$movie_col .= "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
						}
					}
					else{
						$movie_col .= "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
					}

				$movie_col .='</div>';
				$movie_col .= '<div class="movie_des">';
				$movie_col .='<div class="des_star">';
				$movie_col .='<h4>' . $movie_one['imdb_ratings'] . '/10</h4>';
				$movie_col .= '</div>';
				$movie_col .= '<div class="movie_play">';
				$movie_col .= '<i class="fas fa-play"></i>';
				$movie_col .= '</div><!--movie_play-->';
				$movie_col .='<div class="movie_name">';
				$movie_col .= '<h3>' . $movie_one['movie_name'] . '</h3>';
				$movie_col .= '<h5>' . substr($movie_one["release_date"], 0,4) . '</h5>';
				$movie_col .= '</div>';
				$movie_col .= '</div><!--movie_des-->';
				$movie_col .= '</a>';
				$movie_col .= '</div>';

			} 

		}

	}
	else{
		$msg = $_GET['msg'];

		//showing movie lists
		$query_list_m = "SELECT * FROM movie_details WHERE genre LIKE '%{$msg}%' OR movie_language LIKE '%{$msg}%' ORDER BY movie_id DESC LIMIT {$start},{$movies_per_page}";
		$result_list_m = mysqli_query($connection,$query_list_m);

		if($result_list_m){

			while($movie_one = mysqli_fetch_assoc($result_list_m)){

				$movie_col .= '<div class="movie_grid_column">';
				$movie_col .= '<a href=view-filmy.php?m-id=' . $movie_one["movie_id"] . '>'; 
				$movie_col .='<div class="movie_cover">';

				//checking movie poster is avalable or not 
				$l_pos_query = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movie_one['movie_id']}";
					$l_pos_result = mysqli_query($connection,$l_pos_query);

					if($l_pos_result){
						$u_l_poter = mysqli_fetch_assoc($l_pos_result);
						if($u_l_poter['movie_poster'] == 1){
							if($u_l_poter['movie_poster_name'] != null){
								$movie_col .= "<img src =img/uploaded_new_file/movie_poster/" . $u_l_poter['movie_poster_name'] . ">";
							}
							else{
								$movie_col .= "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
							}
						}
						else{
							$movie_col .= "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
						}
					}
					else{
						$movie_col .= "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
					}

				$movie_col .='</div>';
				$movie_col .= '<div class="movie_des">';
				$movie_col .='<div class="des_star">';
				$movie_col .='<h4>' . $movie_one['imdb_ratings'] . '/10</h4>';
				$movie_col .= '</div>';
				$movie_col .= '<div class="movie_play">';
				$movie_col .= '<i class="fas fa-play"></i>';
				$movie_col .= '</div><!--movie_play-->';
				$movie_col .='<div class="movie_name">';
				$movie_col .= '<h3>' . $movie_one['movie_name'] . '</h3>';
				$movie_col .= '<h5>' . substr($movie_one["release_date"], 0,4) . '</h5>';
				$movie_col .= '</div>';
				$movie_col .= '</div><!--movie_des-->';
				$movie_col .= '</a>';
				$movie_col .= '</div>';

			} 

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filmy</title>
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/movies.css">
	<link rel="stylesheet" href="css/media-css/media-movies.css">
	<script src="https://kit.fontawesome.com/4f6c585cf2.js" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>
<body>

	<header>
		<div class="column">
			<h1>Filmy</h1>
		</div><!--column-->
		<div class="column">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="movies.php">Movies</a></li>
				<li><a href="contact.html">Contact Us</a></li>
				<li><a href="about.html">About Us</a></li>
			</ul>
		</div><!--column-->
		<div class="column">
			<div class="lg_but">
				<a href="signin.html"><button>Sign In</button></a>
				<a href="signup.html"><button>Sign Up</button></a>
			</div><!--lg_but-->
		</div><!--column-->

		<!-- for mobile devises -->
		<div class="mob_nav">
			<button id="mob_but" ><i class="fas fa-bars"></i></button>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="movies.php">Movies</a></li>
				<li><a href="contact.html">Contact Us</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="signin.html">Sign In</a></li>
				<li><a href="signup.html">Sign Up</a></li>
			</ul>
		</div>

	</header><!--header-->


	<section class="top">
		<div class="top_main_row">
			<?php  
				if(isset($_GET['msg'])){
					echo '<h1>' . $_GET['msg'] . '</h1>';
				}
				else{
					echo '<h1>Movies</h1>';
				}
			?>
		</div><!--top_main_row-->
	</section>


	<section class="movie_grid">
		<div class="movie_grid_main_column">
			<div class="movie_grid_row">
				<?php echo $movie_col; ?>

			<!-- 
				<div class="movie_grid_column">
					<div class="movie_cover">
						<img src="img/film_cover/cover3.jpg">
					</div>
					<div class="movie_des">
						<div class="des_star">
							<ul>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
							</ul>
						</div>
						<div class="movie_play">
							<a href="#"><i class="fas fa-play"></i></a>
						</div>movie_play
						<div class="movie_name">
							<h3>Black Widow</h3>
							<h5>2020</h5>
						</div>
					</div>movie_des
				</div>
				</div> -->
			</div><!--movie_grid_row-->
		</div><!--movie_grid_main_column-->
	</section><!--movie_grid-->

	<section class="pagination">
		<div class="pagination_row">
			<?php
				if($last_page_number!=1){
					echo $pagination;
				}
			?>
		</div><!--pagination_row-->
	</section><!--pagination-->


	<footer>
		<div class="main_footer">
			<div class="main_footer_column">
				<h4>Filmy</h4>
				<p>Filmy Is Provide Best Quality Movies And Filmy Has Largest Data Base About Movies And We Provide Free Subtitles. <span>Filmy</span> Is Your Movie Theater.</p>
			</div>
			<div class="main_footer_column">
				<h4>Social Links</h4>
				<ul>
					<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					<li><a href="#"><i class="fab fa-youtube"></i></a></li>
				</ul>
				<div class="google_play">
					<i class="fab fa-google-play"></i>
					<p>Download It From Google Play</p>
				</div>
				<div class="apple_store">
					<i class="fab fa-apple"></i>
					<p>Download It From Apple Store</p>
				</div>
			</div>
			<div class="main_footer_column">
				<h4>Useful Links</h4>

				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="movies.html">Movies</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="signin.html">Sign In</a></li>
					<li><a href="signup.html">Sign Up</a></li>
				</ul>
			</div>
		</div><!--main_footer-->
		<div class="sub_footer">
			<div class="sub_footer_column">
				<h5>© Copyright 2020 <span>Osada Manohara</span> All Rights Reserved</h5>
			</div>		
		</div><!--sub_footer-->
	</footer>

	<script src="js/pagination.js"></script>
	<script src="js/mobile-nav.js"></script>
	
</body>
<?php mysqli_close($connection); ?>
</html>