define(
	["jquery"],

	function($) {

		function ajax(){
			return $.ajax({
				url: 'menu/get',
				method: "POST",
				dataType: "json",
				// async: false,
				cache: false,
				error: function() { console.log('Error with AJAX request')},
				success: function(data){
					if (isJSON(data)){
						return data;
					} else {
						console.log("Response from server is not a correct JSON format")
						return false;
					}	
				}
			})
		};

		$.when(ajax()).done(function(result) {
			return {'result':result};
		});

		
		function isJSON(str){
			try {
				var MyJSON = JSON.stringify(str);
				var json = JSON.parse(MyJSON);
				if(typeof(str) == 'string')
					if(str.length == 0)
						return false;
			}
			catch(e){
				return false;
			}

			return true;
		};
});