var main_topi = document.querySelectorAll('.search_main_row h1');
		var shoh=0;
		var shw=1;

		if (main_topi.length > 1) {
			for(var x=1; x<main_topi.length; x++){
				main_topi[x].style.display ="none";
			}
			setInterval(show,4000);
		}


		function show(){
			if (shoh<main_topi.length) {
				main_topi[shoh].style.display ="none";
				shoh++;

				if (shw<main_topi.length) {
					main_topi[shw].style.display ="block";
					shw++;
				}
				else{
					shw=1;
					shoh=0;
					main_topi[0].style.display ="block";
				}
				
			}
		}