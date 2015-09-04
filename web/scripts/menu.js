define(
	["jquery"],

	function($) {
		$.ajax({
			url: 'menu/get',
			method: "POST",
			dataType: "json",
			async: false,
			cache: false,
			success: function(data){
				result = data;
			},
			error: function() {
            	console.log('Error with AJAX request');
        	}
  		});

  		return result;	
});