(function ($, window, document) {
	'use strict';

	const root = document.documentElement;

	/* PRELOADER */
	const preloader = () => {
		if ($('.preloader-wrap').length) {
			$('.preloader-wrap').fadeOut(600);
		}
	};

	const calcHeaderOffset = () => {
		if ($('#wpadminbar')) {
			root.style.setProperty('--admin-bar-height', $('#wpadminbar').outerHeight() + 'px');
		}
	};

	$('.js-menu-burger').on('click', function (e) {
		e.preventDefault();

		$(this).toggleClass('is-opened');
		$('.hr-header').toggleClass('is-opened');
	});

	$('.js-menu-close').on('click', function (e) {
		e.preventDefault();

		$('.js-menu-burger').removeClass('is-opened');
		$('.hr-header').removeClass('is-opened');
	})

	/* INITIALIZE FUNCTIONS ON WINDOW LOAD */
	$(window).on('load', function () {
		preloader();
		calcHeaderOffset();
	});

	/* INITIALIZE FUNCTIONS ON WINDOW RESIZE */
	$(window).on('resize', function () {
		calcHeaderOffset();
	});

})(jQuery, window, document);