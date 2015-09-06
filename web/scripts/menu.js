define(
	["jquery"],

	function($) {
		$.ajax({
			url: 'menu/get',
			method: "POST",
			dataType: "json",
			cache: false,
			error: function() { console.log('Error with AJAX request')},
			success: function(data){
				if (isJSON(data)){
					setMenu(data);
				} else {
					console.log("Response from server is not a correct JSON format")
					
					return false;
				}	
			}
		});
		

		function isJSON(str){
			try {
				var MyJSON = JSON.stringify(str);
				var json = JSON.parse(MyJSON);
				if(typeof(str) == 'string')
					if(str.length == 0){
						
						return false;
					}
			}
			catch(e){
				
				return false;
			}

			return true;
		};

		function setMenu(obj){
			$(".menu").html(obj.html);
			$(".menu").fadeTo('fast',0).fadeTo('fast',1).fadeTo('fast',0).fadeTo('fast',1);
		};
});