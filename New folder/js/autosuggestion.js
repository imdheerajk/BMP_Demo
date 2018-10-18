$(document).ready(function(){
	$('.abhijitscript').keyup(function(){
		var query_string = $.trim($(this).val());
		//alert(query_string.length);
		if(query_string != ''){
			$.ajax({
			type: "POST",
			url: "search_1.php",
			data: { name:query_string },
			success: function(data)
			{
				$('.suggestresult').html(data);
				$('.suggestresult li').click(function(){
					var return_value = $(this).text();
					$('.abhijitscript').attr('value', return_value); 
					$('.abhijitscript').val(return_value);
					$('.suggestresult').html('');
				});
			}
		});
		}
	});
});