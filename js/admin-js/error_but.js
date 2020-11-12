		//error button

		var error_but = document.getElementsByClassName('error_but');
		var error_row =document.getElementsByClassName('error_row');

		var len = error_row.length;

		function hideerror(x){

			error_row[x].style.display = 'none';

			len--;

			if (len==0) {
				document.getElementById('errors').style.display = 'none';
				console.log('osada');
			}
		}