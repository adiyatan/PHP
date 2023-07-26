var keyword = document.getElementById('keyword');
var cari = document.getElementById('tombol-cari');
var tabel = document.getElementById('tabel');

keyword.addEventListener('keyup', function() {

	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if( xhr.readyState == 4 && xhr.status == 200) {
			tabel.innerHTML = xhr.responseText;
		}
	}


	xhr.open('GET', 'ajax/showroom.php?keyword=' + keyword.value, true);
	xhr.send();

});