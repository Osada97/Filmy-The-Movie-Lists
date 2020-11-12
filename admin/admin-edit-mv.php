<?php session_start(); ?>
<?php include_once("../inc/connection.php"); ?>

<?php  

	//initialize variables

	$movie_name="";
	$relese_date="";
	$director_name="";
	$imdb_rating="";
	$movie_country="";
	$movie_language="";
	$genre="";
	$produnction_cost="";
	$trailer_link="";
	$m_720b="";
	$m_1080b="";
	$m_2160b="";
	$m_720w="";
	$m_1080w="";
	$story_line="";

	$error = array();

	$pr_img_up_cr="";//for get previously added movie cover
	$pr_img_up_po="";//for get previously added movie poster

	if (!isset($_GET['m_id'])) {
		header('Location:admin-index.php?error=no_m_id');
	}
	else{

		/*getting movie id from URL*/
		$movie_id = $_GET['m_id'];

		

		//getting movie Details
		$de_query = "SELECT * FROM movie_details WHERE movie_id = {$movie_id} LIMIT 1";
		$result_de_query = mysqli_query($connection ,$de_query);

		if($result_de_query){
			if (mysqli_num_rows($result_de_query)==1) {
				$details_movie = mysqli_fetch_assoc($result_de_query);

				$movie_name = $details_movie['movie_name'];
				$relese_date = $details_movie['release_date'];
				$director_name = $details_movie['director_name'];
				$imdb_rating = $details_movie['imdb_ratings'];
				$movie_country = $details_movie['movie_country'];
				$movie_language =$details_movie['movie_language'];
				$genre =$details_movie['genre'];
				$produnction_cost =$details_movie['production_cost'];
				$trailer_link = $details_movie['trailer_url'];
				$m_720b =$details_movie['720b'];
				$m_1080b =$details_movie['1080b'];
				$m_2160b =$details_movie['2160b'];
				$m_720w =$details_movie['720w'];
				$m_1080w =$details_movie['1080w'];
			}	
		}

		//getting story line
		$st_query = "SELECT story_line FROM story_line WHERE movie_id = {$movie_id} LIMIT 1";
		$st_result = mysqli_query($connection , $st_query);

		if ($st_result) {
			if(mysqli_num_rows($st_result)){
				$storyline_movie = mysqli_fetch_assoc($st_result);

				$story_line = $storyline_movie['story_line'];
			}
		}

	}

	//When PRess Update and Save button
	if (isset($_POST['update_movie'])) {



				//getting movie cover and poster

				//Movie poster
				$file_name_poster = $_POST['file_name'];
				$file_poster =$_POST['cropped_img_v'];

				$poster_file_upload ="../img/uploaded_new_file/movie_poster/";

				if ($file_poster != null) {

					$upload_poster_img = explode(',',$file_poster);

					$upload_poster = base64_decode($upload_poster_img[1]);

					$is_upload = file_put_contents($poster_file_upload . $file_name_poster, $upload_poster);


				}



				//movie cover
				$file_name_cover = $_POST['file_name_cr'];
				$file_cover = $_POST['cropped_img_cr'];

				$cover_file_upload = "../img/uploaded_new_file/movie_cover/";

				if ($file_cover != null) {
					
					$upload_cover_img = explode(',', $file_cover);

					$upload_cover = base64_decode($upload_cover_img[1]);

					$is_upload_cr = file_put_contents($cover_file_upload . $file_name_cover, $upload_cover);

				}



		$cover_poster_query = "SELECT * FROM movie_cover_poster WHERE movie_id = {$movie_id} LIMIT 1";
		$cover_poter_result = mysqli_query($connection,$cover_poster_query);

		if ($cover_poter_result) {//check Cover And Poster Is Uploaded?
			if(mysqli_num_rows($cover_poter_result) == 1){
				$cover_n_poster = mysqli_fetch_assoc($cover_poter_result);

				//checking movie poster is Already uploaded or not
				if($cover_n_poster['movie_poster'] == 0 OR $cover_n_poster['movie_poster'] == 1){
					//update
					if(isset($is_upload)){
						$up_movie_poster_query = "UPDATE movie_cover_poster SET movie_poster = 1,movie_poster_name = '{$file_name_poster}' WHERE movie_id ={$movie_id}";
						$up_movie_poster_result = mysqli_query($connection,$up_movie_poster_query);

						if($up_movie_poster_result){
							echo "<script>";
								echo "alert('Movie Poster Is Updated!!')";
							echo "</script>";
						}
						else{
							echo "<script>";
								echo "alert('Something Is Wrong Please Try Again!!')";
							echo "</script>";
						}
					}
				}
				if($cover_n_poster['movie_cover']==0 OR $cover_n_poster['movie_cover']==1){
					//update
					if(isset($is_upload_cr)){
						$up_movie_cover_query = "UPDATE movie_cover_poster SET movie_cover = 1,movie_cover_name = '{$file_name_cover}' WHERE movie_id ={$movie_id}";
						$up_movie_cover_result = mysqli_query($connection,$up_movie_cover_query);

						if($up_movie_cover_result){
							echo "<script>";
								echo "alert('Movie Cover Is Updated!!')";
							echo "</script>";
						}
						else{
							echo "<script>";
								echo "alert('Something Is Wrong Please Try Again!!')";
							echo "</script>";
						}
					}
				}
				
			}
			else{
				//checking movie cover and poster is set?
				if (isset($is_upload_cr) && isset($is_upload)) {

					$in_poster_cover_query = "INSERT INTO movie_cover_poster(movie_id,movie_cover,movie_cover_name,movie_poster,movie_poster_name) VALUES({$movie_id},1,'{$file_name_cover}',1,'{$file_name_poster}')";
					$in_cover_result = mysqli_query($connection,$in_poster_cover_query);

						if($in_cover_result){
							echo "<script>";
								echo "alert('Movie Cover And Movie Poster Is Uploaded!!')";
							echo "</script>";
						}
						else{
							echo "<script>";
								echo "alert('Something Is Wrong!!')";
							echo "</script>";
						}

				}
				//checking movie cover is set?
				else if(isset($is_upload_cr)){
					//insert movie poster and cover jpgs
					$in_cover_query = "INSERT INTO movie_cover_poster(movie_id,movie_cover,movie_cover_name,movie_poster) VALUES({$movie_id},1,'{$file_name_cover}',0)";
					$in_cover_result = mysqli_query($connection,$in_cover_query);

						if($in_cover_result){
							echo "<script>";
								echo "alert('Movie Cover Is Uploaded!!')";
							echo "</script>";
						}
						else{
							echo "<script>";
								echo "alert('Something Is Wrong!!')";
							echo "</script>";
							print_r(mysqli_error($connection));
						}

				}
				//checking movie poster is set?
				else if(isset($is_upload)){
					//insert movie poster and cover jpgs
					$in_cover_poster = "INSERT INTO movie_cover_poster(movie_id,movie_cover,movie_poster,movie_poster_name) VALUES({$movie_id},0,1,'{$file_name_poster}')";
					$in_poster_result = mysqli_query($connection,$in_cover_poster);

						if($in_poster_result){
							echo "<script>";
								echo "alert('Movie Cover Is Uploaded!!')";
							echo "</script>";
						}
						else{
							echo "<script>";
								echo "alert('Something Is Wrong!!')";
							echo "</script>";
						}

				}

			}
		}

		//initialize movie details From db
		$movie_name=$_POST['movie_name'];
		$relese_date=$_POST['relese_date'];
		$director_name=$_POST['director'];
		$imdb_rating=$_POST['imdb_rating'];
		$movie_country=$_POST['country'];
		$movie_language=$_POST['language'];

		if (isset($_POST['genre'])) {
			$genre=implode(',',$_POST['genre']);
		}
		else{
			$error[] = "Please Select Movie Genre";
		}

		$produnction_cost=mysqli_real_escape_string($connection,$_POST['produc_co']);
		$trailer_link=mysqli_real_escape_string($connection,$_POST['trailer_link']);
		$m_720b=mysqli_real_escape_string($connection,$_POST['720b']);
		$m_1080b=mysqli_real_escape_string($connection,$_POST['1080b']);
		$m_2160b=mysqli_real_escape_string($connection,$_POST['2160b']);
		$m_720w=mysqli_real_escape_string($connection,$_POST['720w']);
		$m_1080w=mysqli_real_escape_string($connection,$_POST['1080w']);
		$story_line=($_POST['storyline']);

		//error Checking
		if(empty(trim($relese_date))){
			$error[] = "Please Enter A Movie Name";
		}
		if (empty($m_720b)) {
			$m_720b = "";
		}

		if (empty($error)) {

			$update_d_query = "UPDATE movie_details SET  movie_name='{$movie_name}',release_date = '{$relese_date}',director_name='{$director_name}', imdb_ratings ='{$imdb_rating}',movie_country ='{$movie_country}',movie_language='{$movie_language}',genre = '{$genre}',production_cost ='{$produnction_cost}',trailer_url ='{$trailer_link}',720b = '{$m_720b}',1080b = '{$m_1080b}',2160b = '{$m_2160b}',720w ='{$m_720w}',1080w ='{$m_1080w}' WHERE movie_id ={$movie_id}";
			$result_d_update =mysqli_query($connection,$update_d_query);

			if($result_d_update){

			}
			else{
				echo "<script>";
					echo "alert('Something Wrong!!')";
				echo "</script>";

			}

			//update storyLine
			$upadte_s_query = "UPDATE story_line SET story_line = '{$story_line}' WHERE movie_id = {$movie_id}";
			$result_s_update = mysqli_query($connection ,$upadte_s_query);

			if($result_s_update){

			}
			else{
				echo "<script>";
					echo "alert('Something Wrong!!')";
				echo "</script>";
			}
		}

		//getting movie cover and movie poster previously uploaded

		//query for check movie cover and poster is uploaded or not
		$pr_query = "SELECT * FROM movie_cover_poster WHERE movie_id ={$movie_id}";
		$pr_result_set = mysqli_query($connection,$pr_query);

		if ($pr_result_set) {
			$pr_result = mysqli_fetch_assoc($pr_result_set);

			if ($pr_result['movie_cover']==1) {//checking movie cover is uploaded?
				if($pr_result['movie_cover_name']!=null){//checking movie cover has a name or not
					$pr_img_up_cr = "<img src='../img/uploaded_new_file/movie_cover/" .$pr_result['movie_cover_name'] . "'>";
				}
				else{
					//if movie cover has not uploaded,
					$pr_img_up_cr = "<p>No Movie Cover Is Uploaded..Please Upload Movie Cover</p>";
				}	
			}
			else{
					//if movie cover has not uploaded,
					$pr_img_up_cr = "<p>No Movie Cover Is Uploaded..Please Upload Movie Cover</p>";
			}

			if($pr_result['movie_poster']==1){//checking movie poster is uploaded 
				if($pr_result['movie_poster']!=null){//checking movie poster is uploaded or not
					$pr_img_up_po= "<img src='../img/uploaded_new_file/movie_poster/" .$pr_result['movie_poster_name'] . "'>";
				}
				else{
					//if movie poster has not uploaded
					$pr_img_up_po ="<p>No Movie Poster Is Uploaded..Please Upload Movie Poster</p>";
				}
			}
			else{
				//if movie poster has not uploaded
				$pr_img_up_po ="<p>No Movie Poster Is Uploaded..Please Upload Movie Poster</p>";
			}
		}


	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filmy-Admins</title>
	<link rel="stylesheet" href="../css/admin/admin-index.css">
	<link rel="stylesheet" href="../css/admin/admin-add.css">
	<link rel="stylesheet" href="../js/multi-chooser/chosen.min.css">
	<link rel="stylesheet" href="../css/admin/admin-edit-mv.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css">

	<script src="https://kit.fontawesome.com/4f6c585cf2.js" crossorigin="anonymous"></script>
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
					<li><a href="admin-index.php">View</a></li>
					<li><a href="admin-add.php">Add</a></li>
				</ul>
			</div>
		</div>
		<div class="header_column">
			<div class="heder_admin">
				<h2>Welcome <span><?php echo $_SESSION['admin_name']; ?></span></h2>
			</div>
		</div>
	</header>
	<section class="top">
		<div class="top_main_row">
			<h1>Add</h1>
		</div><!--top_main_row-->
	</section>

	<section class="add_movie">

		<form action="admin-edit-mv.php?m_id=<?php echo($movie_id) ?>" method="POST">

			<div class="uploaded_row">

				<div class="movie_poster">

						<label for="movie_poster" id="c_movie_poster">Update Movie Poster</label>
						<input type="file" name="movie_poster" id="movie_poster">

						<div class="pic_ar">
							<div class="cropper_img">
								<canvas id="canvas"></canvas>
							</div>

							<div class="cropped_img" id="cropped_img">
								
							</div>

							<button type="button" id="crop" class="crop"><i class="fas fa-crop"></i>Crop</button>				

						</div>

				</div>
				<div class="movie_cover">

						<label for="movie_cover" id="c_movie_cover">Update Movie Cover</label>
						<input type="file" name="movie_cover" id="movie_cover">
						
						<div class="pic_cr">
							<div class="cropper_cr_img">
								<canvas id="canvas_cr"></canvas>
							</div>

							<div class="cropped_cr_img" id="cropped_cr_img">
								
							</div>

							<button type="button" id="crop_cr" class="crop"><i class="fas fa-crop"></i>Crop</button>

						</div>
				</div>

				<!-- section for display previously upload movie -->
				<div class="pre_up">
					<div class="column_poster">
						<?php 
							echo $pr_img_up_po;
						 ?>
						<!-- <img src="../img/film_cover/pop1.jpg" alt=""> -->
						
					</div>
					<div class="column_cover">
						<?php 
							echo $pr_img_up_cr;
						 ?>
						<!-- <img src="../img/film_cover/scoob!ps.jpg" alt=""> -->
					</div>
				</div><!-- pre_up -->

					
			</div>

			<div class="add_movie_column">
			
				<?php 

					if (!empty($error)) {
						$x=0;

						echo "<div class='errors' id='errors'>";
							
							foreach ($error as $value) {
								echo "<div class='error_row' id='error_row'>";
									echo "<button type = 'button' id='error_but' onclick='hideerror({$x})'> <i class='fas fa-times'></i> </button>";
									echo "<p>" . $value . "</p>";
								echo "</div>";
								$x++;
							}

						echo "</div>";

						}

				?>
				
				<div class="add_details_form">
					<h3>Add Movie Details</h3>

						<p>
							<label for="movie_name">Movie Name</label>
							<input type="text" name="movie_name" id="movie_name" value="<?php echo($movie_name) ?>">
						</p>
						<p>
							<label for="relese_date">Release Date</label>
							<input type="Date" name="relese_date" id="relese_date" value="<?php echo($relese_date) ?>">
						</p>
						<p>
							<label for="director">Director Name</label>
							<input type="text" name="director" id="director" value="<?php echo($director_name) ?>">
						</p>
						<p>
							<label for="imdb_rating">IMDB Rating</label>
							<input type="number" max="10" min="0" step="0.1" name="imdb_rating" id="imdb_rating" value="<?php echo($imdb_rating) ?>">
						</p>
						<p>
							<label for="country">Movie Country</label>
							<input type="text" name="country" id="country" value="<?php echo($movie_country) ?>">
						</p>
						<p>
							<label for="language">Movie Language</label>
							<input type="text" name="language" id="language" value="<?php echo($movie_language) ?>">
						</p>
						<p>
							<label for="genre">Genre</label>
							<select name="genre[]" id="genre" data-placeholder ="<?php echo($genre) ?>" multiple>
								<option value="">Select Genre</option>
								<option value="adventure">Adventure</option>
								<option value="animation">Animation</option>
								<option value="biography">Biography</option>
								<option value="comedy">Comedy</option>
								<option value="crime">Crime</option>
								<option value="documentary">Documentary</option>
								<option value="drama">Drama</option>
								<option value="family">Family</option>
								<option value="fantasy">Fantasy</option>
								<option value="film-Noir">Film-Noir</option>
								<option value="game-Show">Game-Show</option>
								<option value="history">History</option>
								<option value="horror">Horror</option>
								<option value="Music">Music</option>
								<option value="musical">Musical</option>
								<option value="mystery">Mystery</option>
								<option value="news">News</option>
								<option value="reality">Reality-TV</option>
								<option value="romance">Romance</option>
								<option value="sci-fi">Sci-Fi</option>
								<option value="sport">Sport</option>
								<option value="talk">Talk-Show</option>
								<option value="thriller">Thriller</option>
								<option value="war">War</option>
								<option value="wester">Wester</option>
							</select>
						</p>	
						<p>
							<label for="produc_co">Production Cost</label>
							<input type="text" name="produc_co" id="produc_co" value="<?php echo($produnction_cost) ?>">
						</p>
						<p>
							<label for="trailer_link">Trailer Link</label>
							<input type="text" name="trailer_link" id="trailer_link" placeholder="Please Add Trailer Embeded URL" value="<?php echo($trailer_link) ?>">
						</p>
						
						<div class="download_path">

							<label>Download Links</label>

							<p>
									<input readonly type="url" class="disur" placeholder="720p.BlueRay" name="720b" value="<?php echo $m_720b ?>">
									<input type="checkbox" class="active_links" onclick="atfunc(0);">
								
							</p>
							<p>
									<input readonly type="url" class="disur" placeholder="1080p.BlueRay" name="1080b" value="<?php echo $m_1080b ?>">
									<input type="checkbox" class="active_links" onclick="atfunc(1);">
								
							</p>
							<p>
									<input readonly type="url" class="disur" placeholder="2160.BlueRay" name="2160b" value="<?php echo $m_2160b ?>">
									<input type="checkbox" class="active_links" onclick="atfunc(2);">
								
							</p>
							<p>
									<input readonly type="url" class="disur" placeholder="720p.WEB" name="720w" value="<?php echo $m_720w ?>">
									<input type="checkbox" class="active_links" onclick="atfunc(3);">
								
							</p>
							<p>
									<input readonly type="url" class="disur" placeholder="1080p.WEB" name="1080w" value="<?php echo $m_1080w ?>">
									<input type="checkbox" class="active_links" onclick="atfunc(4);">
								
							</p>
						</div>

				</div><!--add_details_form-->
				<div class="add_story_line">

					<h3>Add Story Line</h3>
					
						<p>
							<textarea name="storyline" placeholder="Add StoryLine" id="storyline"><?php echo $story_line; ?></textarea>
						</p>
						
				</div>
			</div><!--add_movie_column-->

			
			<!--Save  in Data Base-->
			<div class="pic_upload_sec" id="pic_upload_sec">

				<!--movie poster -->
				<input type="hidden" name="file_name" id="file_name">
				<input type="hidden" name="cropped_img_v" id="cropped_img_v">

				<!--movie cover -->
				<input type="hidden" name="file_name_cr" id="file_name_cr">
				<input type="hidden" name="cropped_img_cr" id="cropped_img_cr">

				<!--for movie poster and cover upload -->
				<button type="submit" id="upload_poster_cr" name="update_movie">Update And Save Movie</button>		
							
			</div>


		</form>
	</section><!--add_movie-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><!--jquery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
	<script src="../js/multi-chooser/chosen.jquery.min.js"></script><!--multi chooser-->
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	
	<script>
        $(document).ready(function(){

            $('#genre').chosen();

        });
     </script>

	<script>
		CKEDITOR.replace('storyline', {
			height: "383px",
			width: '100%',
		});
	</script>

	<script>
		$(document).ready(function(){

			var $canvas = $('#canvas');
			 	context = $canvas.get(0).getContext('2d');

			 $('#c_movie_poster').on('click' ,function(){

				$('.pic_ar').toggle(900);
			 });

			$('#movie_poster').on('change', function(){


			 	if (this.files && this.files[0]) {

			 		$('#file_name').attr('value' ,this.files[0].name);

			 		if (this.files[0].type.match(/^image\//)) {

			 			//process The Image
			 			var reader = new FileReader();

				 		reader.onload = function(e){
				 			var img = new Image();

				 			img.onload =function(){
				 				context.canvas.width = img.width;
				 				context.canvas.height = img.height;
				 				context.drawImage(img,0,0);

				 				//instantiate cropper
				 				var cropper = $canvas.cropper({
				 					aspectRatio: 2/3
				 				});
				 			};

				 			img.src = e.target.result;
				 		};

				 		$('#crop').click(function(){
				 			$('#cropped_img').show(300);
				 			$('.cropper_img').hide(300);
				 			$('#pic_upload_sec').show(300);
				 			$('#crop').hide(300);

				 			var croppedImage = $canvas.cropper('getCroppedCanvas').toDataURL('image/jpg');
				 			$('#cropped_img').append($('<img>').attr('src', croppedImage));
				 			$('#cropped_img_v').attr('value', croppedImage);

				 		});

				 		reader.readAsDataURL(this.files[0]);
			 		}
			 		else{
			 			alert("invalid File Type");
			 		}

			 		
			 	}
			 	else{
			 		alert("Please Select A File");
			 	}
			});
		});
	</script>
	<script>
		$(document).ready(function(){

			var $canvas_cr = $('#canvas_cr');
			 	context_cr = $canvas_cr.get(0).getContext('2d');

			 $('#c_movie_cover').on('click' ,function(){

				$('.pic_cr').toggle(900);
			 });

			$('#movie_cover').on('change', function(){


			 	if (this.files && this.files[0]) {

			 		$('#file_name_cr').attr('value' ,this.files[0].name);

			 		if (this.files[0].type.match(/^image\//)) {

			 			//process The Image
			 			var reader = new FileReader();

				 		reader.onload = function(e){
				 			var img = new Image();

				 			img.onload =function(){
				 				context_cr.canvas.width = img.width;
				 				context_cr.canvas.height = img.height;
				 				context_cr.drawImage(img,0,0);

				 				//instantiate cropper
				 				var cropper = $canvas_cr.cropper({
				 					aspectRatio: 16/9
				 				});
				 			};

				 			img.src = e.target.result;
				 		};

				 		$('#crop_cr').click(function(){
				 			$('#cropped_cr_img').show(300);
				 			$('.cropper_cr_img').hide(300);
				 			$('#pic_upload_sec').show(300);
				 			$('#crop_cr').hide(300);

				 			var croppedImage_cr = $canvas_cr.cropper('getCroppedCanvas').toDataURL('image/jpg');
				 			$('#cropped_cr_img').append($('<img>').attr('src', croppedImage_cr));
				 			$('#cropped_img_cr').attr('value', croppedImage_cr);

				 		});

				 		reader.readAsDataURL(this.files[0]);
			 		}
			 		else{
			 			alert("invalid File Type");
			 		}

			 		
			 	}
			 	else{
			 		alert("Please Select A File");
			 	}
			});
		});
	</script>


	<script src="../js/admin-js/links-active.js"></script>
	<script src="../js/admin-js/error_but.js"></script>

	<script>
		$(document).ready(function(){
			$('#c_movie_poster').click(function(){
				$('.column_poster img').toggle();
			});
			$('#c_movie_cover').click(function(){
				$('.column_cover img').toggle();
			});
		});
	</script>

</body>
<?php mysqli_close($connection); ?>
</html>