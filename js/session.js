$('#session_change').click(function(){
		var session = $('#session').val();
		$.ajax({
			url: 'session_change.php',
			method: 'POST',
			data: {session: session},
			dataType: 'text',
			success: function(data){
				$('#ses').html(data+' ACADEMIC SESSION');
			}
		});
});