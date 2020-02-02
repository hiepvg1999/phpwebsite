function save () {
	let username = document.getElementById('user').value;
	let email = document.getElementById('email').value;
	let mobile = document.getElementById('mobile').value;
	let comment = document.getElementById('comment').value;
	l
	if(_.isEmpty(username)){
		document.getElementById('user').innerHTML = 'Vui long nhap day du ho va ten';

	} else if(username.trim().length<=2){
		document.getElementById('user').innerHTML = 'Khong duoc nhap duoi 2 ki tu';
	} else {
		document.getElementById('user').innerHTML = '';
	}
}