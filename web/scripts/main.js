requirejs.config({
    
    baseUrl: 'scripts/lib',

    paths: {
        jquery: 'jquery-2.1.4.min',
        underscore: 'underscore',
        jqueryui: 'jquery-ui.min',
        bootstrap: 'bootstrap',
        lightbox: 'lightbox',
        app: '../app'
    }
});

requirejs(['jquery', 'underscore', 'jqueryui', 'bootstrap', 'lightbox', 'app/menu'],
    function   ($, _, jqueryui, bootstrap, lightbox, menu) {
});