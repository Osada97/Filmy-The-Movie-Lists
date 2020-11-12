
		
		var fname = document.getElementById('name');
		var lname = document.getElementById('lname');
		var uname = document.getElementById('uname');
		var email = document.getElementById('email');
		var password = document.getElementById('pw');
		var cpasseord = document.getElementById('cpasseord');
		var error = document.getElementsByClassName('error')[0];
		var re = false;

		function sign_up_vali(){

			if(fname.value.trim() == ''){
				error.innerHTML = "<p>Please Enter Your Firse Name</p>";
				return false;
				re =true;
			}
			if(fname.value.trim().length >= 20){
				error.innerHTML ="<p>First Name Field Must Be Less Than 20 Characters</p>";
				return false;
				re =true;
			}

			if(lname.value.trim() == ''){
				error.innerHTML = "<p>Please Enter Your Last Name</p>";
				return false;
				re =true;
			}
			if(lname.value.trim().length >= 30){
				error.innerHTML ="<p>Last Name Field Must Be Less Than 30 Characters</p>";
				return false;
				re =true;
			}

			if(uname.value.trim() == ''){
				error.innerHTML = "<p>Please Enter User Name</p>";
				return false;
				re =true;
			}
			if(uname.value.trim().length >= 15){
				error.innerHTML ="<p>User Name Field Must Be Less Than 15 Characters</p>";
				return false;
				re =true;
			}


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
			if(cpasseord.value == ''){
				error.innerHTML ="<p>Please Enter Confirm Password</p>";
				return false;
				re =true;
			}

			if(cpasseord.value.length >= 10){
				error.innerHTML ="<p>Confirm Password Field Must Be Less Than 10 Characters</p>";
				return false;
				re =true;
			}

			if (password.value != cpasseord.value) {
				error.innerHTML ="<p>Password Does Not Match. Please Enter Again.</p>";
				password.value = "";
				cpasseord.value = "";
				return false;
				re =true;
			}

			if (re==false) {
				alert("Successfully Sign Up To The Filmy");
				return true;
			}
		}