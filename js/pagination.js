	var pagination = document.querySelectorAll('.pagination_row ul li');

	function pagi(x){
		var show = document.getElementsByClassName('show_at')[0];
			
		show.classList.remove('show_at');
		pagination[x].classList.add('show_at');
	}