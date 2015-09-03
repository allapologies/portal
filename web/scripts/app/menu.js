define(["jquery"], function($) {
        
    var request = $.ajax({
	
		url: 'menu/get',
		method: "POST",
		dataType: "json",
		success: function(data){
			return( data );
			}
		});
    }
);