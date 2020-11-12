<?php session_start();?>
<?php require_once("../inc/connection.php"); ?>
<?php 
	
	if(!isset($_SESSION['admin_name'])){
		if(!isset($_COOKIE['username'])){
			header("Location:filmy-admins-login.php?err=login_err");
		}
	}

	if(isset($_SESSION['admin_name'])){
		$admin_name = $_SESSION['admin_name'];
	}
	else if(isset($_COOKIE['username'])){
		$admin_name = $_COOKIE['username'];
	}

	$movie_details_table= "";
	$movie_id;
	$movie_name;
	$relese_date;
	$director_name;
	$imdb;
	$movie_country;
	$movie_language;
	$genre;


	if (!isset($_GET['search'])) {

		//pagination
		$pagi_query ="SELECT count(movie_id) AS movie_id FROM movie_details";
		$pagi = mysqli_query($connection ,$pagi_query);

		$of = mysqli_fetch_assoc($pagi);

		$total_number_of = $of['movie_id'];

		$rows_per_page = 5;


		if (isset($_GET['p'])) {
			$page_number=$_GET['p'];
		}
		else{
			$page_number = 1;
		}

		$start = ($page_number-1)*$rows_per_page;

		$first = "<a href='admin-index.php?p=1'>First</a>";

		$last_page = ceil($total_number_of/$rows_per_page);
		$last = "<a href ='admin-index.php?p={$last_page}'>Last</a>";

		if ($page_number>=$last_page) {
			$last = "<a>Last</a>";
			$next = "<a>Next</a>";
		}
		else{
			$next_page = $page_number+1;
			$next ="<a href = 'admin-index.php?p={$next_page}'>Next</a>";
		}

		if($page_number==1){
			$first = "<a>First</a>";
			$previous = "<a>Previous</a>";
		}
		else{
			$previous_page =$page_number-1;
			$previous = "<a href = 'admin-index.php?p={$previous_page}'>Previous</a>";
		}

		//assign page number to list

	 		$page_nav = "<ul>";
		 	$page_nav .= "<li>" . $first . "</li>";
		 	$page_nav .= "<li>" . $previous . "</li>";
		 	$page_nav .="<li>" . $page_number . " Of " . $last_page . "</li>";
		 	$page_nav .= "<li>" . $next . "</li>";
		 	$page_nav .= "<li>" . $last . "</li>";
		 	$page_nav .= "</ul>";

		
		//getting a movie movie details 
		$query = "SELECT * FROM movie_details ORDER BY movie_id DESC LIMIT {$start},{$rows_per_page}";
		$result_set = mysqli_query($connection,$query);

		if ($result_set) {

				$movie_details_table .= '<table border="1">';
				$movie_details_table . '<thead>';
				$movie_details_table .= '<tr>';
				$movie_details_table .= '<th>Movie Poster</th> <th>Movie Details</th> <th>Story Line</th> <th>Action</th>';
				$movie_details_table .= '</tr> </thead> <tbody>';	

			while($result_mv = mysqli_fetch_assoc($result_set)){
				$movie_id = $result_mv['movie_id'];
				$movie_name = $result_mv['movie_name'];
				$relese_date= $result_mv['release_date'];
				$director_name= $result_mv['director_name'];
				$imdb= $result_mv['imdb_ratings'];
				$movie_country= $result_mv['movie_country'];
				$movie_language= $result_mv['movie_language'];
				$genre = $result_mv['genre'];

				//Get Movie Poster
				$quuer_4to = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movie_id}";
				$result_4to = mysqli_query($connection, $quuer_4to);

				$movie_details_table .= "<tr>";

				if($result_4to){
					$movie_pos = mysqli_fetch_assoc($result_4to);
					if ($movie_pos['movie_poster'] == 1) {

						//echo $movie_pos['movie_poster_name'];
						if($movie_pos["movie_poster_name"] != null){
							$movie_details_table .= "<td><img src='../img/uploaded_new_file/movie_poster/" .$movie_pos["movie_poster_name"] . "'></td>";
						}
						else{
							$movie_details_table .= "<td><img src='../img/uploaded_new_file/d_cover.jpg'></td>";
						}
					}
					else{
						$movie_details_table .= "<td><img src='../img/uploaded_new_file/d_cover.jpg'></td>";
					}
				}
				else{
					echo "<script>";
						echo "alert('Something Wrong!! Please Try Again.')";
					echo "</script>";
				}
				
				$movie_details_table .= "<td>";
				$movie_details_table .= "<h1>" .  $movie_name . "</h1>";
				$movie_details_table .= "<h2>" . $relese_date . "</h2>";
				$movie_details_table .= "<h2>" . $director_name . "</h2>";
				$movie_details_table .= "<h2>" . $imdb . "</h2>";
				$movie_details_table .= "<h2>" . $movie_country . "</h2>";
				$movie_details_table .= "<h4>" . $genre . "</h4>";
				$movie_details_table .= "</td>";
				
				//Get Movie Story Line
				$query_story = "SELECT story_line FROM story_line WHERE movie_id = {$movie_id}";
				$story_result = mysqli_query($connection , $query_story);

				if ($story_result) {
					$movie_st = mysqli_fetch_assoc($story_result);

					if ($movie_st['story_line'] !=null) {
						$movie_details_table .= "<td><p>" . substr($movie_st['story_line'],0, 200) . "</p></td>";
					}
					else{
						$movie_details_table .= "<td><p style = 'color:#a09999;'>No Any Story Line</p></td>";
					}
				}

				//add Button to the table
				$movie_details_table .= "<td>";
				$movie_details_table .= "<button><a href=../view-filmy.php?m-id=" . $movie_id . "&admin=true><i class='fas fa-eye'></a></i></button>";
				$movie_details_table .= "<button><a href=admin-edit-mv.php?m_id=" . $movie_id . "><i class='fas fa-pencil-alt'></a></i></button>";
				$movie_details_table .= "<button><a href=admin-delete.php?m_id=" . $movie_id . "&admin=true><i class='far fa-trash-alt'></a></i></button>";

				$movie_details_table .="</td>";
				$movie_details_table .="</tr>";
			}
		}
	}

	if (isset($_GET['search'])) {

		$search = $_GET['search'];

		//pagination
		$pagi_query ="SELECT count(movie_id) AS movie_id FROM movie_details WHERE movie_name LIKE '%{$search}%' OR genre LIKE '%{$search}'";

		$pagi = mysqli_query($connection ,$pagi_query);

		$of = mysqli_fetch_assoc($pagi);

		$total_number_of = $of['movie_id'];

		$rows_per_page = 5;


		if (isset($_GET['p'])) {
			$page_number=$_GET['p'];
		}
		else{
			$page_number = 1;
		}

		$start = ($page_number-1)*$rows_per_page;

		$first = "<a href='admin-index.php?search={$search}&p=1'>First</a>";

		$last_page = ceil($total_number_of/$rows_per_page);
		$last = "<a href ='admin-index.php?search={$search}&p={$last_page}'>Last</a>";

		if ($page_number>=$last_page) {
			$last = "<a>Last</a>";
			$next = "<a>Next</a>";
		}
		else{
			$next_page = $page_number+1;
			$next ="<a href = 'admin-index.php?search={$search}&p={$next_page}'>Next</a>";
		}

		if($page_number==1){
			$first = "<a>First</a>";
			$previous = "<a>Previous</a>";
		}
		else{
			$previous_page =$page_number-1;
			$previous = "<a href = 'admin-index.php?search={$search}&p={$previous_page}'>Previous</a>";
		}

		//asign page number to list

 		$page_nav = "<ul>";
	 	$page_nav .= "<li>" . $first . "</li>";
	 	$page_nav .= "<li>" . $previous . "</li>";
	 	$page_nav .="<li>" . $page_number . " Of " . $last_page . "</li>";
	 	$page_nav .= "<li>" . $next . "</li>";
	 	$page_nav .= "<li>" . $last . "</li>";
	 	$page_nav .= "</ul>";



		

		$search_query = "SELECT * FROM movie_details WHERE movie_name LIKE '%{$search}%'  OR genre LIKE '%{$search}%' ORDER BY movie_id DESC LIMIT {$start},{$rows_per_page}";
		$result_search = mysqli_query($connection ,$search_query);

		if ($result_search) {

			//cecking num of rows
			if(mysqli_num_rows($result_search)>=1){

				$movie_details_table .= '<table border="1">';
				$movie_details_table . '<thead>';
				$movie_details_table .= '<tr>';
				$movie_details_table .= '<th>Movie Poster</th> <th>Movie Details</th> <th>Story Line</th> <th>Action</th>';
				$movie_details_table .= '</tr> </thead> <tbody>';	


				//getting movie details
				while($search_it = mysqli_fetch_assoc($result_search)){

					$movie_details_table .= "<tr>";

					$movie_id = $search_it['movie_id'];
					$movie_name = $search_it['movie_name'];
					$relese_date= $search_it['release_date'];
					$director_name= $search_it['director_name'];
					$imdb= $search_it['imdb_ratings'];
					$movie_country= $search_it['movie_country'];
					$movie_language= $search_it['movie_language'];
					$genre = $search_it['genre'];


					//getting Movie Poster
					$search_poster_query = "SELECT * FROM movie_cover_poster WHERE movie_id = '{$movie_id}'";
					$result_search_poster = mysqli_query($connection,$search_poster_query);

					if ($result_search_poster) {
						$search_poster = mysqli_fetch_assoc($result_search_poster);

							if ($search_poster['movie_poster'] == 1) {

								if($search_poster['movie_poster_name'] != null){

									$movie_details_table .= "<td><img src='../img/uploaded_new_file/movie_poster/" .$search_poster["movie_poster_name"] . "'></td>";
								}
								else{
									$movie_details_table .= "<td><img src='../img/uploaded_new_file/d_cover.jpg'></td>";
								}
							}
							else{
								$movie_details_table .= "<td><img src='../img/uploaded_new_file/d_cover.jpg'></td>";
							}
					}
					else{
						$movie_details_table .= "<td><img src='../img/uploaded_new_file/d_cover.jpg'></td>";
					}

					$movie_details_table .= "<td>";
					$movie_details_table .= "<h1>" .  $movie_name . "</h1>";
					$movie_details_table .= "<h2>" . $relese_date . "</h2>";
					$movie_details_table .= "<h2>" . $director_name . "</h2>";
					$movie_details_table .= "<h2>" . $imdb . "</h2>";
					$movie_details_table .= "<h2>" . $movie_country . "</h2>";
					$movie_details_table .= "<h4>" . $genre . "</h4>";
					$movie_details_table .= "</td>";

					//getting StoryLine
					$search_story_line = "SELECT * FROM story_line WHERE movie_id = {$movie_id}";
					$result_Story_line = mysqli_query($connection, $search_story_line);

					if ($result_Story_line) {
						$search_story = mysqli_fetch_assoc($result_Story_line);

						if($search_story['story_line'] != null){
							$movie_details_table .= "<td><p>" . substr($search_story['story_line'],0, 200) . "</p></td>";
						}
						else{
							$movie_details_table .= "<td><p style = 'color:#a09999;'>No Any Story Line</p></td>";
						}
					}

					//Action Button
					$movie_details_table .= "<td>";
					$movie_details_table .= "<button><a href=../view-filmy.php?m-id=" . $movie_id . "&admin=true><i class='fas fa-eye'></a></i></button>";
					$movie_details_table .= "<button><a href=admin-edit-mv.php?m_id=" . $movie_id . "><i class='fas fa-pencil-alt'></a></i></button>";
					$movie_details_table .= "<button><a href=admin-delete.php?m_id=" . $movie_id . "&admin=true><i class='far fa-trash-alt'></a></i></button>";

					$movie_details_table .="</td>";
					$movie_details_table .="</tr>";
				}
			}
			else{
				$empty = true;
				$movie_details_table .= "<h1>Result Not Found </h1>";
			}
		}
		else{
			echo "<script>";
				echo "alert('Something Is Wrong!! Please Try Again.')";
			echo "</script>";
		}
	}

	//for alert 
	if(isset($_GET['delete'])==true){
		echo "<script>";
			echo "alert('Movie Successfully Deleted!!')";
		echo "</script>";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filmy-Admins</title>
	<link rel="stylesheet" href="../css/admin/admin-index.css">
	<link rel="stylesheet" href="../css/media-css/admin-media/admin-index-media.css"><!-- media query -->
	<script src="https://kit.fontawesome.com/4f6c585cf2.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

	<header>
		<div class="header_column">
			<div class="header_logo">
				<h1>Filmy</h1>
			</div>
		</div>
		<div class="header_column">
			<div class="header_navi">
				<ul>
					<li class="active"><a href="admin-index.php">View</a></li>
					<li><a href="admin-add.php">Add</a></li>
					<li><a href="admin-logout.php">Log Out</a></li>
				</ul>
			</div>
		</div>
		<div class="header_column">
			<div class="heder_admin">
				<h2>Welcome <span><?php echo $admin_name; ?></span></h2>
			</div>
		</div>

		<!-- mobile navigation -->
		<div class="mob_nav">
			<button id="mob_but" ><i class="fas fa-bars"></i></button>
			<ul>
				<li class="active"><a href="admin-index.php">View</a></li>
				<li><a href="admin-add.php">Add</a></li>
				<li><a href="admin-logout.php">Log Out</a></li>
			</ul>
		</div>

	</header>
	<section class="top">
		<div class="top_main_row">
			<h1>View</h1>
		</div><!--top_main_row-->
	</section>


	<section class="main_view">

		<div class="filter_search">
			<form action="admin-index.php" method="GET">
				<input type="search" name="search" placeholder="search Movie Name">
				<button type="submit"><i class='fas fa-search'></i></button>
			</form>	
		</div><!-- filter_search -->

		<div class="movie_main_table">
			
						
						<!-- table data -->				
						<?php echo $movie_details_table; 

							if (isset($empty)==true) {
								echo "<div class = 'empty_svg'>";
								$movie_details_table .= require_once('../img/svg/empty.svg');
								echo "</div>";
							}
						?>

					<!-- <tr>
						<td><img src="../img/uploaded_new_file/movie_poster/pop3.jpg" alt=""></td>
						<td>
							<h1>Movie name</h1>
							<h2>Rlease Date</h2>
							<h2>Director name</h2>
							<h2>IMDB rating</h2>
							<h2>Movie Country</h2>
							<h4>genre,,,genre,,,genre,,,genre,,,</h4>
						</td>
						<td><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati officiis ipsum tempore placeat laudantium, inventore nam, delectus saepe, fuga voluptates voluptate ducimus recusandae,</p></td>
						<td>
							<button><a href="#"><i class="fas fa-eye"></a></i></button>
							<button><a href="#"><i class="fas fa-pencil-alt"></a></i></button>
							<button><a href="#"><i class="far fa-trash-alt"></i></a></button>
						</td>
					</tr> -->
				</tbody>
			</table>
		</div><!-- movie_main_table -->
		
	</section><!-- main_view -->

	<Section class="pagination">
		
			<?php if($total_number_of > 1){
				echo '<div class="main_pgi_col">';
				echo $page_nav;
				echo '</div>';
			} ?>
		
	</Section>
	
	<script src="../js/mobile-nav.js"></script>
</body>
</html>