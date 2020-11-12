
<?php  

	if(isset($_POST['upload_img'])){

		$file_name = $_POST['file_name'];
		$base64_file = $_POST['croped_img'];

		$p_upload = explode(',',$base64_file);

		$file_path = "../img/uploaded_new_file/movie_cover/";

		$upload_img = base64_decode($p_upload[1]);

		file_put_contents($file_path . $file_name,$upload_img);
		
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cropper</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css">
</head>
<style>
	.container{
		width: 700px;
		margin: 0 auto;
	}
	.prev{
		/*display: none;*/
	}
	#canvas{
		width: 700px;
		height: 400px;
		border: 1px solid #000;
		background: none;
		cursor: default;
	}
	img{
		max-width: 100%;
		/*min-width: 100%;*/
	}
	#result{
		width: 700px;
		height: 400px;
		border:1px solid #000;
		display: none;
		margin-top: 20px;
		display: none;
		text-align: center;
		justify-content: center;
		align-items: center;
	}
	#result img{
		max-width: 100%;
		max-height: 100%;
	}
</style>
<body>

	<div class="container">
		<div class="from">
			<form action="cropper.js">
				<input type="file" name="img_file" id="img_file">
				<input type="button" name="crop" id="crop" value="crop">
			</form>
		</div>

		<div class="prev">
			<canvas id="canvas">
				Your Browser Does Not Support HTML 5
			</canvas>
		</div>

		<div id="result">
			
		</div>

		<form action="cropper.php" method="POST">
			<input type="hidden" name="file_name" id="file_name">
			<input type="hidden" name="croped_img" id="croped_img">
			<button type="submit" name="upload_img" id="upload_img" disabled>Upload Image</button>
		</form>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>

	<script>
		$(document).ready(function(){

			var $canvas = $('#canvas');
			var context = $canvas.get(0).getContext('2d');


			$('#img_file').on('change',function(){

				//$('.prev').show(600);

				if(this.files && this.files[0]){

					if(this.files[0].type.match(/^image\//)){

						$('#file_name').attr('value',this.files[0].name);
	
						var reader = new FileReader();

						reader.onload = function(e){
							var img = new Image();

							img.onload = function(){
								context.canvas.width = img.width;
								context.canvas.height = img.height;
								context.drawImage(img,0,0);

								var cropper = $canvas.cropper({});
							};
							img.src = e.target.result;


						};

							$('#crop').click(function(){
								$('#result').show(600);
								$('#canvas').hide(600);
								var cropedimage = $canvas.cropper('getCroppedCanvas').toDataURL('image/jpg');
								$('#result').append($('<img>').attr('src',cropedimage));

								$('#croped_img').attr('value',cropedimage);

								$("#upload_img").removeAttr('disabled');
							});


						reader.readAsDataURL(this.files[0]);

					}
					else{
						alert("Invalied File Type");
					}
				}
				else{
					alert("please Select A File");
				}
			});
		});

	</script>
	
</body>
</html>