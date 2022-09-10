$('#print_result').click(function(){
	var restorepage = document.body.innerHTML;
	var printcontent = $('#Result_data').innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
});