var email = document.getElementById('email');
		var password = document.getElementById('pw');
		var error = document.getElementsByClassName('error')[0];
		var re = false;

		function login_vali(){

			if(email.value.trim() == ''){
				error.innerHTML = "<p>Please Enter Your Email Address</p>";
				return false;
				re =true;
			}

			if(email.value.trim().length >= 40){
				error.innerHTML ="<p>Email Field Must Be Less Than 40 Characters</p>";
				return false;
				re =true;
			}

			if(password.value == ''){
				error.innerHTML ="<p>Please Enter Password</p>";
				return false;
				re =true;
			}

			if(password.value.length >= 10){
				error.innerHTML ="<p>Password Field Must Be Less Than 10 Characters</p>";
				return false;
				re =true;
			}

			if (re==false) {
				alert("Successfully Log In To The Filmy");
				return true;
			}
		}