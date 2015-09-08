define(
	["jquery"],

	/**
	*	Performs AJAX request to the backend
	*	When response is succeed than calls a callback that appends menu to the DOM
	*/
	function($) {
		$.ajax({
			url: 'menu/get',
			method: "POST",
			dataType: "json",
			cache: false,
			error: function() { console.log('Error with AJAX request')},
			success: function(data){
				if (isJSON(data)){
					function setMenu(){
						$(".menu").html(data.html);
						$(".menu").fadeTo('fast',0).fadeTo('fast',1).fadeTo('fast',0).fadeTo('fast',1);
					}

					setMenu();

				} else {
					console.log("Response from server is not a correct JSON format")
					
					return false;
				}	
			}
		});
		
		/**
		*	Verifying if response has JSON format notation
		*/
		function isJSON(str){
			try {
				var MyJSON = JSON.stringify(str);
				var json = JSON.parse(MyJSON);
				if(_.isString(str))
					if(str.length == 0){
						
						return false;
					}
				return true;

			}
			catch(e){
				
				$('.menu').text('Error loading menu.' +  e.name + ' ' + e.message);
				// return false;
			}

		};

	/**
	*	Appends menu to the DOM and makes some animation
	*/
	function setMenu(obj){
		$(".menu").html(obj.html);
		$(".menu").fadeTo('fast',0).fadeTo('fast',1).fadeTo('fast',0).fadeTo('fast',1);
	};
});



