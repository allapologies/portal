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
		domReady: 'domReady',
		text: '../text',
	   
	}
});

require(['domReady'], function (domReady) {
	domReady(function(){
		
		//Menu loading module
		require(
			['menu', 'jquery', 'underscore'],
			function( menu, $, _ ){}
		)

		//Text module loading
		require(
			['text', 'jquery'],
			function( text, $ ){
				
				$("h4").on('click', function(){
					var texter = new text($(this).text());
					texter.setToUpperCase();
					$(this).text(texter.getStr())
				})
			}
		)
	});
});

// requirejs(['jquery', 'underscore', 'jqueryui', 'bootstrap', 'lightbox', 'menu'],
// 	 function   ($, _, jqueryui, bootstrap, lightbox, menu) {
// });