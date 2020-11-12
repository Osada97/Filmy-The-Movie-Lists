<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php  

	if (!isset($_GET['admin'])==true) {
		
		if (!isset($_GET['m-id'])) {
			header('Location:index.html');
		}
		else{
			//header('Location:index.html');
			$movie_id = $_GET['m-id'];

			$movie_pi_cr="";//for get movie cover
			$movie_pi_ps="";//for get movie poster
			$movie_de="";//For get movie Details
			$movie_sl="";//for get Story Line


			//getting movie poster and cover 
			$gt_movie_cover = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movie_id} LIMIT 1";
			$ge_result = mysqli_query($connection,$gt_movie_cover);

			if ($ge_result) {
				$gt_ft = mysqli_fetch_assoc($ge_result);


				//getting movie poster 
				if($gt_ft['movie_poster']==1){
					if($gt_ft['movie_poster_name'] !=null){
						$movie_pi_ps = "<img src =img/uploaded_new_file/movie_poster/" . $gt_ft['movie_poster_name'] . ">";
						$mobile_movie_pi_ps = "img/uploaded_new_file/movie_poster/" . $gt_ft['movie_poster_name'];
					}
					else{
						$movie_pi_ps = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
						$mobile_movie_pi_ps ="img/uploaded_new_file/d_cover.jpg";
					}
				}
				else{
					$movie_pi_ps = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
					$mobile_movie_pi_ps ="img/uploaded_new_file/d_cover.jpg";
				}

				//getting movie cover
				if($gt_ft['movie_cover']==1){
					if($gt_ft['movie_cover_name'] !=null){
						$movie_pi_cr = "<img src =img/uploaded_new_file/movie_cover/" . $gt_ft['movie_cover_name'] . ">";
					}
					else{
						$movie_pi_cr = "";
					}
				}
				else{
					$movie_pi_cr = "";
				}
			}
			else{
				$movie_pi_cr = "";
			}

			//getting movie details
			$get_de_query = "SELECT * FROM movie_details WHERE movie_id = {$movie_id} LIMIT 1";
			$get_de_result_set = mysqli_query($connection,$get_de_query);

			if($get_de_result_set){
				if (mysqli_num_rows($get_de_result_set)==1) {
					$movie_de = mysqli_fetch_assoc($get_de_result_set);

				}
				else{
					header('Location:index.html');
				}
			}
			else{
				
				print_r(mysqlI_error($connection));
			}

			//getting Story Line
			$get_sl_query = "SELECT story_line FROM story_line WHERE movie_id = {$movie_id} LIMIT 1";
			$get_sl_result = mysqli_query($connection, $get_sl_query);

			if($get_sl_result){
					$movie_sl_f = mysqli_fetch_assoc($get_sl_result);
					$movie_sl = $movie_sl_f['story_line'];
			}
			else{
				$movie_sl = "";
				print_r(mysqlI_error($connection));
			}
		}

	}
	else{

		if (!isset($_GET['m-id'])) {
			header('Location:index.html');
		}
		else{

			$movie_id = $_GET['m-id'];

			$movie_pi_cr="";//for get movie cover
			$movie_pi_ps="";//for get movie poster
			$movie_de="";//For get movie Details
			$movie_sl="";//for get Story Line


			//getting movie poster and cover 
			$gt_movie_cover = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movie_id} LIMIT 1";
			$ge_result = mysqli_query($connection,$gt_movie_cover);

			if ($ge_result) {
				$gt_ft = mysqli_fetch_assoc($ge_result);


				//getting movie poster 
				if($gt_ft['movie_poster']==1){
					if($gt_ft['movie_poster_name'] !=null){
						$movie_pi_ps = "<img src =img/uploaded_new_file/movie_poster/" . $gt_ft['movie_poster_name'] . ">";
						$mobile_movie_pi_ps = "img/uploaded_new_file/movie_poster/" . $gt_ft['movie_poster_name'];
					}
					else{
						$movie_pi_ps = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
						$mobile_movie_pi_ps ="img/uploaded_new_file/d_cover.jpg";
					}
				}
				else{
					$movie_pi_ps = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
					$mobile_movie_pi_ps ="img/uploaded_new_file/d_cover.jpg";
				}

				//getting movie cover
				if($gt_ft['movie_cover']==1){
					if($gt_ft['movie_cover_name'] !=null){
						$movie_pi_cr = "<img src =img/uploaded_new_file/movie_cover/" . $gt_ft['movie_cover_name'] . ">";
					}
					else{
						$movie_pi_cr = "";
					}
				}
				else{
					$movie_pi_cr = "";
				}
			}
			else{
				$movie_pi_cr = "";
			}

			//getting movie details
			$get_de_query = "SELECT * FROM movie_details WHERE movie_id = {$movie_id} LIMIT 1";
			$get_de_result_set = mysqli_query($connection,$get_de_query);

			if($get_de_result_set){
				if (mysqli_num_rows($get_de_result_set)==1) {
					$movie_de = mysqli_fetch_assoc($get_de_result_set);

				}
				else{
					header('Location:index.html');
				}
			}
			else{
				
				print_r(mysqlI_error($connection));
			}

			//getting Story Line
			$get_sl_query = "SELECT story_line FROM story_line WHERE movie_id = {$movie_id} LIMIT 1";
			$get_sl_result = mysqli_query($connection, $get_sl_query);

			if($get_sl_result){
					$movie_sl_f = mysqli_fetch_assoc($get_sl_result);
					$movie_sl = $movie_sl_f['story_line'];
			}
			else{
				$movie_sl = "";
				print_r(mysqlI_error($connection));
			}

		}


	}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filmy</title>
	<link rel="stylesheet" href="css/view-filmy.css">
	<link rel="stylesheet" href="css/media-css/view-filmy-media.css"><!-- meadia query -->
	<script src="https://kit.fontawesome.com/4f6c585cf2.js" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>
<body>
	
	<div class="main-container">
		<section class="cover">
			<picture>
				<source media='(max-width:413px)' srcset='<?php echo($mobile_movie_pi_ps) ?>'>
				<?php 

					echo $movie_pi_cr;

				?>
			</picture>
		</section><!--cover-->

		<header>
			<div class="column">
				<h1>Filmy</h1>
			</div><!--column-->
			<div class="column">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="movies.php">Movies</a></li>
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
	
		<div class="movie_main_row">
			<div class="movie_main_column">
				<div class="movie_poster">
					<?php  

						echo $movie_pi_ps;

					?>
				</div>
			</div><!-- movie_main_column -->
			<div class="movie_main_column">
				<div class="movie_discrip">
					<h1><?php echo $movie_de['movie_name'] ?> <span><?php echo substr($movie_de['release_date'],0,4) ?></span></h1>
					<ul class="dis">
						
						<?php  
							//getting genre and convert to an array
							$genre_at = explode(',', $movie_de['genre']);

							foreach ($genre_at as $value) {
								echo "<li><a href='movies.php?msg={$value}'>" .  $value . "</a></li>";
							}

						?>
						<li><a><?php echo $movie_de['release_date']; ?></a></li>
						<li><a href="movies.php?msg=<?php echo($movie_de['movie_language']) ?>"><?php echo $movie_de['movie_language']; ?></a></li>
					</ul>
					<h3><i class="fab fa-imdb"></i><?php echo $movie_de['imdb_ratings']; ?>/10</h3>
				</div>
				<div class="download_button">

					<?php  

						if ($movie_de['720b'] != null) {
							echo "<a href = " . $movie_de['720b'] . "><button>720p BlueRay</button></a>";
						}

						if ($movie_de['1080b'] != null) {
							echo "<a href = " . $movie_de['720b'] . "><button>1080p BlueRay</button></a>";
						}

						if ($movie_de['2160b'] != null) {
							echo "<a href = " . $movie_de['2160b'] . "><button>2160p BlueRay</button></a>";
						}

						if ($movie_de['720w'] != null) {
							echo "<a href = " . $movie_de['720w'] . "><button>720p WEB</button></a>";
						}

						if ($movie_de['1080w'] != null) {
							echo "<a href = " . $movie_de['1080w'] . "><button>1080p WEB</button></a>";
						}



					?>
				</div>

			</div><!-- movie_main_column -->
		</div><!-- movie_main_row -->

	</div>

	<div class="main_section_container">
		<div class="main_de_column">
			<div class="de_row1">
				<h2>Story Line</h2>
				<p><?php echo $movie_sl; ?></p>
			</div>
			<div class="de_row2">
				
			</div>
		</div>
		<div class="main_de_column">
			<div class="details_sec">
				<h3>Details</h3>
				<h4>Release Date:<span><?php echo $movie_de['release_date']; ?></span></h4>
				<h4>Director:<span><?php echo $movie_de['director_name']; ?></span></h4>
				<h4>imdb Ratings:<span><?php echo $movie_de['imdb_ratings']; ?></span></h4>
				<h4>Country:<span><?php echo $movie_de['movie_country']; ?></span></h4>
				<h4>Language:<span><?php echo $movie_de['movie_language']; ?></span></h4>
				<h4>Production Co:<span><?php echo $movie_de['production_cost']; ?></span></h4>
				<h4>Genre:<span><ul>
						<?php  

							foreach ($genre_at as $value) {
								echo "<li><a href='#'>" .  $value . "</a></li>";
							}

						?>
				</ul></span></h4>
			</div><!-- details_sec -->
		</div>
	</div><!-- main_section_container -->

	<!-- Movie Trailer Link -->
	<?php  

		if ($movie_de['trailer_url'] !=null) {

			echo '<div class="movie_trailer_container">';
				echo '<div class="trailer_column">';
					echo $movie_de['trailer_url'];
				echo '</div><!-- trailer_column -->';
			echo '</div><!-- movie_trailer_container -->';

		}
	?>

		
	<section class="like">
		<div class="like_main_row">
			<div class="popular_row1">
				
				<h2>You May Also Like..</h2>
				<button>View All<i class="fas fa-angle-double-right"></i></button>

			</div><!--popular_row1-->
			<div class="popular_row2">

				<?php  

					$u_L_movies="";//initialize for get movies
					$u_l_poster="";//initialize for get posters 

					$u_query = "SELECT * FROM movie_details WHERE  movie_name  LIKE '%{$movie_de['movie_name']}%' OR genre LIKE '%{$movie_de['genre']}%' OR movie_country LIKE '%{movie_de[\"movie_country\"]}%' OR movie_language LIKE '%{$movie_de['movie_language']}%' ORDER BY movie_id DESC LIMIT 4";
					$U_result = mysqli_query($connection,$u_query);

					if($U_result){
						while ($movies_u = mysqli_fetch_assoc($U_result)) {
							//getting movie posters
							$u_pos_query = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movies_u['movie_id']}";
							$u_pos_result = mysqli_query($connection,$u_pos_query);

							if($u_pos_result){
								$u_poter = mysqli_fetch_assoc($u_pos_result);
								if($u_poter['movie_poster'] == 1){
									if($u_poter['movie_poster_name'] != null){
										$u_l_poster = "<img src =img/uploaded_new_file/movie_poster/" . $u_poter['movie_poster_name'] . ">";
									}
									else{
										$u_l_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
									}
								}
								else{
										$u_l_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
								}
							}
							else{
										$u_l_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
							}

							//movie columns

							//checking we are in admin panel
							if(isset($_GET['admin']) == true){
								$is_admin = "&admin=true";
							}
							else{
								$is_admin = "";
							}

							echo '<div class="popular_column">';
								echo '<a href = view-filmy.php?m-id=' . $movies_u['movie_id'] . $is_admin . '>';
									echo '<div class="film_cover">';
										echo $u_l_poster;
									echo '</div><!--film_cover-->';
									echo '<div class="ranto">';
										echo '<div class="star_ratings">';
											echo '<h4>' . $movies_u["imdb_ratings"] . '/10</h4>';
										echo '</div><!--star_ratings-->';
										echo '<div class="film_des">';
											echo '<h3>' . $movies_u["movie_name"] .'</h3>';
											echo '<h4>' . substr($movies_u['release_date'], 0,4) . '</h4>';
										echo "</div><!--film_des-->";
									echo "</div><!--ranto-->";
								echo '</a>';
							echo '</div>';

						}
						
					}
					else{
						print_r(mysqlI_error($connection));
					}

				?>

			</div><!--popular_row2-->
		</div><!--like_main_row-->
	</section><!--like-->
	
	<script src="js/mobile-nav.js"></script>

</body>
</html>