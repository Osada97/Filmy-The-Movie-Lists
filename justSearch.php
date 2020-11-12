
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AjsxSearch</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
	.main_container{
		position: relative;
		width: 100%;
		height: 100vh;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;

	}
	.main_search{
		position: relative;
		width: 1000px;
		height: 500px;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}
	input{
		padding: 8px;
		width: 500px;
		border-radius: 5px;
		border: 1px solid #777;
	}
	button{
		padding: 5px;
		width: 100px;
		font-family: sans-serif;
		display: block;
	}
	p{
		display: inline-block;
	}
	.result{
		background-color: #eee;
		width: 52%;
		height: auto;
		position: absolute;
		top: 276px;
		left: 188px;
		overflow: auto;
		z-index: 100;
	}
	.result .row{
		width: 100%;
		padding: 10px;
		border-bottom: 2px solid #aaa;
		display: flex;
		box-sizing: border-box;
	}
	.result .row .Sposter_pic{
		width: 16%;
		overflow: hidden;
	}
	.result .row .Sposter_pic img{
		width: 100%;
	}
	.result .row .Sposter_details{
		font-family: sans-serif;
		padding-left: 25px;
	}
	.result .row .Sposter_details h2{
		font-size: 15px;
	}
	.result a{
		text-decoration: none;
		color: #000;
	}
</style>
<body>
	
	<div class="main_container">
		
		<div class="main_search">
			<div class="mian">
				<p>
					<input type="text" name="search" id="search" autofocus>
				</p>
				<p>
					<button>submit</button>
				</p>
			</div>
			<div class="result">
				
			</div>
		</div>


	</div>
	
</body>

	<script>
		$(document).ready(function(){
			$('#search').keyup(function(){
				var search = $('#search').val();
				$.post('Search.php',{
					searchre: search
				}, function(data,status){
					$('.result').html(data);
				});
			});
		});
	</script>

</html>