requirejs.config({
	
	baseUrl: 'scripts/lib',

	shim : {
		"bootstrap" : { "deps" :['jquery'] }
	},

	paths: {
		jquery: 'jquery-2.1.4.min',
		underscore: 'underscore',
		bootstrap: 'bootstrap',
		lightbox: 'lightbox',
		menu: '../menu',
		domReady: 'domReady'
	   
	}
});

//This function is called once the DOM is ready.

require(['domReady'], function (domReady) {
	domReady(function(){
		
		//Menu loading

		require(
			['menu', 'jquery'],
			function( menu, $ ){
				// $(".menu").html(menu.html);
				// $(".menu").fadeTo('fast',0).fadeTo('fast',1).fadeTo('fast',0).fadeTo('fast',1);
			}
		)

	});
});

// requirejs(['jquery', 'underscore', 'jqueryui', 'bootstrap', 'lightbox', 'menu'],
// 	 function   ($, _, jqueryui, bootstrap, lightbox, menu) {
// });
