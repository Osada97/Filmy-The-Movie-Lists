	var numbers = document.getElementsByClassName('counter_numbers');
	var values1 = numbers[0].getAttribute('data-target');
	var values2 = numbers[1].getAttribute('data-target');
	var values3 = numbers[2].getAttribute('data-target');
	var speed = 10;
	var x=0;
	var y=0;
	var z=0;

	setInterval(count,speed);

	function count(){
		if (y<=values1) {
			numbers[0].innerText = y;
			y++;
		}
		if (x<=values2) {
			numbers[1].innerText = x;
			x++;
		}
		if (z<=values3) {
			numbers[2].innerText = z;
			z++;
		}	
	}