
	$('.aref').click(function(){
		var page = $(this).attr('href');
		$('#contentArea').load(page);
		return false;
	});