(function ($, window, document) {
    'use strict';

    /* PRELOADER */
    const preloader = () => {
        if ($('.preloader-wrap').length) {
            $('.preloader-wrap').fadeOut(600);
        }
    };

    /* INITIALIZE FUNCTIONS ON WINDOW LOAD */
    $(window).on('load', function () {
        preloader();
    });

    /* INITIALIZE FUNCTIONS ON WINDOW RESIZE */
    $(window).on('resize', function () {

    });

})(jQuery, window, document);