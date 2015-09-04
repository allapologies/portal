define(
	"menu",
	["jquery"],
	function($) {
		function getMenu(){

			var request = $.ajax({
				url: 'menu/get',
				method: "POST",
				dataType: "json",
				cache: false,
				success: function(html){
					return html;
	  			}
	  		});
		}
		return getMenu();
	}
);