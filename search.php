<?php  
	
	require_once('inc/connection.php');

	if(isset($_POST['searchre'])){
		//echo $_POST['searchre'];

		$searchitems ="";/*for get search items*/
		$search = $_POST['searchre'];

		if(!empty($search)){
			$query_search = "SELECT * FROM movie_details WHERE movie_name LIKE '%{$search}%' OR movie_language LIKE '%{$search}%' ORDER BY movie_id DESC LIMIT 5";
			$query_result = mysqli_query($connection,$query_search);

			if($query_result){
				/*echo "string";*/
				if(mysqli_num_rows($query_result)>=1){
					while($result_search = mysqli_fetch_assoc($query_result)){

						$searchitems .= "<a href='view-filmy.php?m-id={$result_search['movie_id']}'";
						$searchitems .= "<div class ='row'>";

							$query4pic = "SELECT * FROm movie_cover_poster WHERE movie_id= {$result_search['movie_id']} LIMIT 1";
							$result4pic = mysqli_query($connection,$query4pic);

							if($result4pic){
								$movie_pic = mysqli_fetch_assoc($result4pic);

								$searchitems .= "<div class='Sposter_pic'>";

								if($movie_pic['movie_poster']==1){
									if($movie_pic['movie_poster_name']!=null){
										$searchitems .= "<img src='img/uploaded_new_file/movie_poster/{$movie_pic['movie_poster_name']}'>";
									}
									else{
										$searchitems .= "<img src='img/uploaded_new_file/d_cover.jpg'>";
									}
								}
								else{
									$searchitems .= "<img src='img/uploaded_new_file/d_cover.jpg'>";
								}

								$searchitems .="</div>";
							}
							else{
								print_r(mysqli_error($connection));
							}

							$searchitems .= "<div class='Sposter_details'>";
							$searchitems .= "<h2>" . $result_search['movie_name'] . "</h2>";
							$searchitems .= "<h2>" . substr($result_search['release_date'], 0,4) . "</h2>";
							$searchitems .="</div>";

						$searchitems .= "</div>";
						$searchitems .= "</a>";
						}
				}
				else{
					$searchitems .= "<h1>No Result Found </h1>";
				}
			}
			else{
				print_r(mysqli_eroor($connection));
			}
		}
	}

	echo $searchitems;

?>