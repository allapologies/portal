requirejs.config({
	
	baseUrl: 'scripts',

	shim : {
		"bootstrap" : { "deps" :['jquery'] }
	},

	paths: {
		jquery: 'jquery-2.1.4.min',
		underscore: 'underscore',
		jqueryui: 'jquery-ui.min',
		bootstrap: 'bootstrap',
		lightbox: 'lightbox',
		menu: 'menu'
	   
	}
});

requirejs(['jquery', 'underscore', 'jqueryui', 'bootstrap', 'lightbox', 'menu'],
	 function   ($, _, jqueryui, bootstrap, lightbox, menu) {
});

require(
	['menu', 'jquery'],
	function( menu, $ ){
		$(".menu").html(menu);
		$(".menu").fadeTo('fast',0).fadeTo('fast',1).fadeTo('fast',0).fadeTo('fast',1);

	}
)