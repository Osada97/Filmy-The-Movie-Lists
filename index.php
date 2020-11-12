<?php require_once('inc/connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filmy</title>
	<script src="https://kit.fontawesome.com/4f6c585cf2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/media-css/media-index.css"><!-- css media queries -->

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

	<!-- preloder -->	
	<div class="loader">
		<!-- //svg -->
			<svg width="512" height="512" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g id="film-reel-svgrepo-com 1">
				<g id="wheel3">
				<path id="Vector" d="M256 432.552C353.507 432.552 432.552 353.507 432.552 256C432.552 158.493 353.507 79.448 256 79.448C158.493 79.448 79.448 158.493 79.448 256C79.448 353.507 158.493 432.552 256 432.552Z" fill="#5B5D6E"/>
				<path id="Vector_2" d="M256 414.897C343.756 414.897 414.897 343.756 414.897 256C414.897 168.244 343.756 97.103 256 97.103C168.244 97.103 97.103 168.244 97.103 256C97.103 343.756 168.244 414.897 256 414.897Z" fill="#464655"/>
				</g>
				<g id="wheel2">
				<path id="Vector_3" d="M256 0C114.615 0 0 114.615 0 256C0 397.385 114.615 512 256 512C397.385 512 512 397.385 512 256C512 114.615 397.385 0 256 0ZM256 35.31C295.003 35.31 326.621 66.928 326.621 105.931C326.621 144.934 295.003 176.552 256 176.552C216.997 176.552 185.379 144.934 185.379 105.931C185.379 66.928 216.998 35.31 256 35.31ZM114.759 326.621C75.757 326.621 44.138 295.003 44.138 256C44.138 216.997 75.756 185.379 114.759 185.379C153.762 185.379 185.38 216.997 185.38 256C185.38 295.003 153.761 326.621 114.759 326.621ZM256 467.862C216.998 467.862 185.379 436.244 185.379 397.241C185.379 358.238 216.997 326.62 256 326.62C295.003 326.62 326.621 358.238 326.621 397.241C326.621 436.244 295.003 467.862 256 467.862ZM397.241 326.621C358.239 326.621 326.62 295.003 326.62 256C326.62 216.997 358.238 185.379 397.241 185.379C436.244 185.379 467.862 216.997 467.862 256C467.862 295.003 436.244 326.621 397.241 326.621Z" fill="#9352B3"/>
				</g>
				<g id="wheel1">
				<path id="Vector_4" d="M256 291.31C275.501 291.31 291.31 275.501 291.31 256C291.31 236.499 275.501 220.69 256 220.69C236.499 220.69 220.69 236.499 220.69 256C220.69 275.501 236.499 291.31 256 291.31Z" fill="#C7CFE2"/>
				<path id="Vector_5" d="M256 273.655C265.751 273.655 273.655 265.751 273.655 256C273.655 246.249 265.751 238.345 256 238.345C246.249 238.345 238.345 246.249 238.345 256C238.345 265.751 246.249 273.655 256 273.655Z" fill="#5B5D6E"/>
				<g id="Group">
				<path id="Vector_6" d="M202.758 220.587C200.499 220.587 198.24 219.725 196.517 218.001L90.586 112.07C87.138 108.622 87.138 103.035 90.586 99.587C94.034 96.139 99.621 96.139 103.069 99.587L209 205.518C212.448 208.966 212.448 214.553 209 218.001C207.276 219.725 205.017 220.587 202.758 220.587Z" fill="#C7CFE2"/>
				<path id="Vector_7" d="M414.621 432.449C412.362 432.449 410.103 431.587 408.38 429.863L302.448 323.932C299 320.484 299 314.897 302.448 311.449C305.896 308.001 311.483 308.001 314.931 311.449L420.862 417.38C424.31 420.828 424.31 426.415 420.862 429.863C419.138 431.587 416.879 432.449 414.621 432.449Z" fill="#C7CFE2"/>
				<path id="Vector_8" d="M308.69 220.587C306.431 220.587 304.172 219.725 302.449 218.001C299.001 214.553 299.001 208.966 302.449 205.518L408.379 99.586C411.827 96.138 417.414 96.138 420.862 99.586C424.31 103.034 424.31 108.621 420.862 112.069L314.932 218.001C313.207 219.725 310.948 220.587 308.69 220.587Z" fill="#C7CFE2"/>
				<path id="Vector_9" d="M96.827 432.449C94.568 432.449 92.309 431.587 90.586 429.863C87.138 426.415 87.138 420.828 90.586 417.38L196.517 311.449C199.965 308.001 205.552 308.001 209 311.449C212.448 314.897 212.448 320.484 209 323.932L103.07 429.863C101.345 431.587 99.086 432.449 96.827 432.449Z" fill="#C7CFE2"/>
				</g>
				</g>
				</g>
			</svg>


	</div>
	<!-- //////////////// -->

	<section class="cover">
		<picture>
			<source media="(max-width:464px)" srcset="img/mobcover2.jpg">
			<img src="img/cover2.jpg" alt="">
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

	<section class="search">
		<div class="search_main_row">
			<h1>Ultra HD Resolution</h1>
			<h1>Latest Movies</h1>
			<h1>Free Subtitles</h1>
			<div class="search_bar">
				<input type="text" name="search" id="search" placeholder="Enter movies Title">
				<button><i class="fas fa-search"></i></button>
				<div class="searchResult">
					
				</div>
			</div>
		</div>
	</section><!--search-->

	<section class="film_testiminal">
		<div class="film_testiminal_main_row">
			<div class="testi_row1">
				
				<h2>Latest Movies</h2>
				<a href="movies.php"><button>View All<i class="fas fa-angle-double-right"></i></button></a>

			</div><!--testi_row1-->
			<div class="testi_row2">
				
				<?php 

					$l_poster="";//initialize for get posters 

					$l_query = "SELECT * FROM movie_details ORDER BY movie_id DESC LIMIT 4";
					$l_result = mysqli_query($connection,$l_query);

					if($l_result){
						while ($movies_l = mysqli_fetch_assoc($l_result)) {
							//getting movie posters
							$l_pos_query = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movies_l['movie_id']}";
							$l_pos_result = mysqli_query($connection,$l_pos_query);

							if($l_pos_result){
								$u_l_poter = mysqli_fetch_assoc($l_pos_result);
								if($u_l_poter['movie_poster'] == 1){
									if($u_l_poter['movie_poster_name'] != null){
										$l_poster = "<img src =img/uploaded_new_file/movie_poster/" . $u_l_poter['movie_poster_name'] . ">";
									}
									else{
										$l_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
									}
								}
								else{
										$l_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
								}
							}
							else{
										$l_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
							}

							//movie columns

						echo '<div class="testi_column">';
							echo '<div class="film_cover">';
								echo '<a href = view-filmy.php?m-id=' . $movies_l['movie_id'] . '>';
									echo '<div class="film_cover">';
										echo $l_poster;
									echo '</div><!--film_cover-->';
									echo '<div class="ranto">';
										echo '<div class="star_ratings">';
											echo '<h4>' . $movies_l["imdb_ratings"] . '/10</h4>';
										echo '</div><!--star_ratings-->';
										echo '<div class="film_des">';
											echo '<h3>' . $movies_l["movie_name"] .'</h3>';
											echo '<h4>' . substr($movies_l['release_date'], 0,4) . '</h4>';
										echo "</div><!--film_des-->";
									echo "</div><!--ranto-->";
								echo '</a>';
							echo '</div>';
						echo '</div>';

						}
						
					}
					else{
						//print_r(mysqlI_error($connection));
					}

				?>

			</div><!--testi_row2-->
		</div><!--film_testiminal_main_row-->
	</section><!--film_testiminal-->

	<section class="upcoming_vd">
		<div class="upcoming_main_row">
			<div class="upcoming_sub_row1">
				<h2>Upcoming Movies</h2>
			</div>
			<div class="upcoming_sub_row2">
				<div class="upcoming_column">
					<iframe src="https://www.youtube.com/embed/-XOuu1vd_fk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					<div class="upcoming_des">
						<h3>SpongeBob</h3>
					</div>

				</div>
				<div class="upcoming_column">
					<div class="upcoming_column_row1">
						<iframe src="https://www.youtube.com/embed/e82JHkkPw54" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

						<div class="upcoming_des">
							<h3>The King's Man</h3>
						</div>
						
					</div>
					<div class="upcoming_column_row2">
						<iframe src="https://www.youtube.com/embed/sTSA2bHZjeE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

						<div class="upcoming_des">
							<h3>I am Vengeance</h3>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section><!--upcoming_vd-->

	<section class="hiw">
		<div class="hiw_main_row">
			<div class="hiw_row1">
				<h2>How It Works?</h2>
			</div>
			<div class="hiw_column">
				<div class="hiw_icon">
					<i class="fas fa-sign-in-alt"></i>
				</div>
				<div class="hiw_topic">
					<h3>Register</h3>
				</div>
				<div class="hiw_des">
					 <p>Register to <span>Filmy</span> For Get Subtitles Or Get Latest Movies.</p>
				</div>			
			</div>
			<div class="hiw_column">
				<div class="hiw_icon">
					<i class="fas fa-layer-group"></i>
				</div>
				<div class="hiw_topic">
					<h3>Choose Plan</h3>
				</div>
				<div class="hiw_des">
					 <p>Choose Our Premium Plan For Get Latest Movies.</p>
				</div>			
			</div>
			<div class="hiw_column">
				<div class="hiw_icon">
					<i class="far fa-smile-wink"></i>
				</div>
				<div class="hiw_topic">
					<h3>Enjoy Filmy</h3>
				</div>
				<div class="hiw_des">
					<p>And Enjoy Movies Or Get Subtitles Free.Enjoy <span>Filmy</span></p>
				</div>			
			</div>
		</div><!--hiw_main_row-->
	</section><!--how_its_works-->

	<section class="most_popular">
		<div class="most_popular_main_row">
			<div class="popular_row1">
				
				<h2>Most Popular Movies</h2>
				<a href="movies.php"><button>View All<i class="fas fa-angle-double-right"></i></button></a>

			</div><!--popular_row1-->
			<div class="popular_row2">
				
				
				<?php 

					$m_poster="";//initialize for get posters 

					$m_query = "SELECT * FROM movie_details ORDER BY imdb_ratings DESC LIMIT 4";
					$m_result = mysqli_query($connection,$m_query);

					if($m_result){
						while ($movies_m = mysqli_fetch_assoc($m_result)) {
							//getting movie posters
							$m_pos_query = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movies_m['movie_id']}";
							$m_pos_result = mysqli_query($connection,$m_pos_query);

							if($m_pos_result){
								$m_l_poter = mysqli_fetch_assoc($m_pos_result);
								if($m_l_poter['movie_poster'] == 1){
									if($m_l_poter['movie_poster_name'] != null){
										$m_poster = "<img src =img/uploaded_new_file/movie_poster/" . $m_l_poter['movie_poster_name'] . ">";
									}
									else{
										$m_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
									}
								}
								else{
										$m_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
								}
							}
							else{
										$m_poster = "<img src =\"img/uploaded_new_file/d_cover.jpg\" >";
							}

							//movie columns

						echo '<div class="popular_column">';
							echo '<div class="film_cover">';
								echo '<a href = view-filmy.php?m-id=' . $movies_m['movie_id'] . '>';
									echo '<div class="film_cover">';
										echo $m_poster;
									echo '</div><!--film_cover-->';
									echo '<div class="ranto">';
										echo '<div class="star_ratings">';
											echo '<h4>' . $movies_m["imdb_ratings"] . '/10</h4>';
										echo '</div><!--star_ratings-->';
										echo '<div class="film_des">';
											echo '<h3>' . $movies_m["movie_name"] .'</h3>';
											echo '<h4>' . substr($movies_m['release_date'], 0,4) . '</h4>';
										echo "</div><!--film_des-->";
									echo "</div><!--ranto-->";
								echo '</a>';
							echo '</div>';
						echo '</div>';

						}
						
					}
					else{
						//print_r(mysqlI_error($connection));
					}

				?>

			</div><!--popular_row2-->
		</div><!--most_popular_main_row-->
	</section><!--most_popular-->

	<section class="counter">
		<div class="counter_main_row">
			<div class="counter_column">
				<div class="counter_numbers" data-target="4500">0</div>
				<div class="counter_content">
					<h4>Movies</h4>
				</div>
			</div>
			<div class="counter_column">
				<div class="counter_numbers" data-target="5798">0</div>
				<div class="counter_content">
					<h4>SubTitles</h4>
				</div>
			</div>
			<div class="counter_column">
				<div class="counter_numbers" data-target="3125">0</div>
				<div class="counter_content">
					<h4>Users</h4>
				</div>
			</div>
		</div><!--counter_main_row-->
	</section><!--counter-->

	<section class ="join">
		<div class="join_main_row">
			<div class="join_con">
				<h4>Join <span>Filmy</span> Now!!!</h4>
				<p>Subscribe <span>Filmy</span> For Get Notification About All New Films And Subtitles.</p>
			</div><!--join_con-->
			<div class="join_form">
				<form>
					<input type="email" name="email" placeholder="Your Email Address">
					<button>Subscribe</button>
				</form>
			</div>
		</div><!--join_main_row-->
	</section><!--join-->

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
				<h5>© Copyright 2020 Osada Manohara All Rights Reserved</h5>
			</div>		
		</div><!--sub_footer-->
	</footer>

	<script src="js/counter.js"></script>
	<script src="js/autoh1.js"></script>
	<script src="js/mobile-nav.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><!-- jquery CDN -->


	<script>
		window.addEventListener('load' , function(){
			document.querySelector('.loader').classList.add("hidden");
		});
	</script>

	<script>
		$(document).ready(function(){

			$('#search').keyup(function(){
				var search = $('#search').val();
				$.post('inc/ajaxSearch.php', {
					filmysearch: search
				},function(data,status){
					$('.searchResult').html(data);
				});
			});
		});
	</script>
	
</body>
</html>