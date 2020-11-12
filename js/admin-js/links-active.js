var inputs = document.getElementsByClassName('disur');
var checkbox = document.getElementsByClassName('active_links');

		function atfunc(x){

			if (checkbox[x].checked == true) {

			inputs[x].removeAttribute('readonly');

		}
		else{
	inputs[x].value = "";
	inputs[x].setAttribute('readonly' , 'readonly');
}
}