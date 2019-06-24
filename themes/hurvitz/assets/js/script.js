(function ($, window, document) {
	'use strict';

	/* ------------------- */
	/* ---- VARIABLES ---- */
	/* ------------------- */
	const root = document.documentElement;
	const swipers       = [];

	// /* PRELOADER */
	// const preloader = () => {
	// 	if ($('.preloader-wrap').length) {
	// 		$('.preloader-wrap').fadeOut(600);
	// 	}
	// };

	/* ------------------- */
	/* ---- FUNCTION ---- */
	/* ------------------- */
	const calcHeaderOffset = () => {
		const wpAdminBarHeight = $('#wpadminbar').outerHeight() || 0;
		root.style.setProperty('--admin-bar-height', wpAdminBarHeight + 'px');
	};

	/*=================================*/
	/* ADD IMAGE ON BACKGROUND */

	/*=================================*/
	function wpc_add_img_bg(img_sel, parent_sel) {
		if (!img_sel) {
			return false;
		}

		var $parent, $imgDataHidden, _this;
		$(img_sel).not('.is-complete').each(function () {
			_this          = $(this);
			$imgDataHidden = _this.data('s-hidden');
			$parent        = _this.closest(parent_sel);
			$parent        = $parent.length ? $parent : _this.parent();
			$parent.css('background-image', 'url(' + this.src + ')').addClass('s-back-switch');
			if ($imgDataHidden) {
				_this.css('visibility', 'hidden');
				_this.show();
			}
			else {
				_this.hide();
			}
			_this.addClass('is-complete');
		});
	}


	/*=================================*/
	/* IS TOUCH DEVICE */
	/*=================================*/
	const isTouchDevice = () => 'ontouchstart' in document.documentElement;

	/*=================================*/
	/* SWIPER SLIDER */
	/*=================================*/
	const initSwiper    = () => {
		$('.swiper-container:not(.initialized)').each(function (i) {
			const $t = $(this);

			const index = 'swiper-id-' + i;
			$t.addClass(index + ' initialized').attr('id', index);
			$t.parent().parent().find('.swiper-pagination').addClass('swiper-pagination-' + index);
			$t.parent().parent().find('.swiper-button-next').addClass('swiper-button-next-' + index);
			$t.parent().parent().find('.swiper-button-prev').addClass('swiper-button-prev-' + index);

			if (isTouchDevice() && $t.data('mode') == 'vertical') {
				$t.data('noswiping', 1);
				$(this).find('.swiper-slide').addClass('swiper-no-swiping');
			}

			// string variables
			const paginationType = $t.data('pagination-type') || 'bullets';
			const direction      = $t.data('mode') || 'horizontal';
			const effect         = $t.data('effect') || 'slide';

			// bool variables
			const noSwiping           = $t.data('noswiping') ? !!$t.data('noswiping') : true;
			const responsive          = $t.data('responsive') ? !!$t.data('responsive') : false;
			const grabCursor          = $t.data('grab-cursor') ? !!$t.data('grab-cursor') : false;
			const loop                = $t.data('loop') ? !!$t.data('loop') : false;
			const mousewheel          = $t.data('mouse') ? !!$t.data('mouse') : false;
			const centeredSlides      = $t.data('center') ? !!$t.data('center') : false;
			const slideToClickedSlide = $t.data('slide-to-clicked') ? !!$t.data('slide-to-clicked') : false;
			const heightVar           = $t.data('height') ? !!$t.data('height') : false;
			let lazyVar               = $t.data('lazy') ? !!$t.data('lazy') : false;

			// number variables
			const autoPlayVar     = +$t.data('autoplay') || 0;
			const initialSlide    = +$t.data('init-slide') || 0;
			const spaceBetween    = +$t.data('space') || 0;
			const speed           = +$t.data('speed') || 1500;
			const slidesPerColumn = +$t.data('slidespercolumn') || 1;
			const lazyAmountVar   = +$t.data('lazy-amount') || 3;
			const slidesPerView   = +$t.data('slidesperview') || 'auto';

			// object variables
			let breakpoints = {};

			if (lazyVar) {
				lazyVar = {
					loadPrevNext: false,
					loadPrevNextAmount: lazyAmountVar,
				};
			}

			let autoPlayObject = false;
			if (autoPlayVar) {
				autoPlayObject = {
					delay: autoPlayVar,
					waitForTransition: false,
					disableOnInteraction: false
				};
			}

			if (responsive) {
				const lg = $t.attr('data-lg-slides') ? $t.attr('data-lg-slides') : slidesPerView;
				const md = $t.attr('data-md-slides') ? $t.attr('data-md-slides') : lg;
				const sm = $t.attr('data-sm-slides') ? $t.attr('data-sm-slides') : md;
				const xs = $t.attr('data-xs-slides') ? $t.attr('data-xs-slides') : sm;

				const lg_col = $t.attr('data-lg-column') ? $t.attr('data-lg-column') : slidesPerColumn;
				const md_col = $t.attr('data-md-column') ? $t.attr('data-md-column') : lg_col;
				const sm_col = $t.attr('data-sm-column') ? $t.attr('data-sm-column') : md_col;
				const xs_col = $t.attr('data-xs-column') ? $t.attr('data-xs-column') : sm_col;

				const spaceLg = $t.attr('data-lg-space') ? $t.attr('data-lg-space') : spaceBetween;
				const spaceMd = $t.attr('data-md-space') ? $t.attr('data-md-space') : spaceLg;
				const spaceSm = $t.attr('data-sm-space') ? $t.attr('data-sm-space') : spaceMd;
				const spaceXs = $t.attr('data-xs-space') ? $t.attr('data-xs-space') : spaceSm;

				breakpoints = {
					767: {
						slidesPerView: parseInt(xs, 10),
						slidesPerColumn: parseInt(xs_col, 10),
						spaceBetween: parseInt(spaceXs, 10)
					},
					991: {
						slidesPerView: parseInt(sm, 10),
						slidesPerColumn: parseInt(sm_col, 10),
						spaceBetween: parseInt(spaceSm, 10)
					},
					1200: {
						slidesPerView: parseInt(md, 10),
						slidesPerColumn: parseInt(md_col, 10),
						spaceBetween: parseInt(spaceMd, 10)
					},
					1440: {
						slidesPerView: parseInt(lg, 10),
						slidesPerColumn: parseInt(lg_col, 10),
						spaceBetween: parseInt(spaceLg, 10)
					}
				};
			}

			swipers[index] = new Swiper('.' + index, {
				effect,
				grabCursor,
				noSwiping,
				initialSlide,
				spaceBetween,
				loop,
				mousewheel,
				speed,
				direction,
				centeredSlides,
				breakpoints,
				slidesPerView,
				slidesPerColumn,
				slideToClickedSlide,
				// ...
				pagination: {
					el: '.swiper-pagination-' + index,
					clickable: true,
					type: paginationType,
				},
				clickable: true,
				navigation: {
					nextEl: '.swiper-button-next-' + index,
					prevEl: '.swiper-button-prev-' + index,
					disabledClass: 'swiper-button-disabled',
				},
				fadeEffect: {
					crossFade: true
				},
				noSwipingClass: 'swiper-no-swiping',
				watchSlidesVisibility: true,
				autoplay: autoPlayObject,
				iOSEdgeSwipeDetection: true,
				autoHeight: heightVar,
				preloadImages: false,
				lazy: lazyVar,
				//
				parallax: true,
			});
		});
	};


	/* ----------------------- */
	/* ---- CLICK HANDLER ---- */
	/* ----------------------- */
	$('.js-popup-btn').on('click', function (e) {
		e.preventDefault();

		$('.js-popup').addClass('is-opened');
	});

	$('.js-popup-close').on('click', function (e) {
		e.preventDefault();

		$('.js-popup').removeClass('is-opened');
	});


	$('a[href^="#"]').on('click', function (e) {
		e.preventDefault();
		const elem = $(this).attr('href');

		if ($(elem).length) {
			$('html,body').animate({
				scrollTop: $(elem).offset().top - $('.hr-header').outerHeight() - $('#wpadminbar').outerHeight()
			}, 'slow');
			// menuCloseHandler();
		}
	});

	function menuArrows() {
		if ($(window).outerWidth() <= 1024) {
			if (!$('.menu-item-has-children i').length) {
				$('.menu-item-has-children').append('<i class="fa fa-angle-down js-btn-mobile"></i>');
			}

			$('.js-btn-mobile').on('click', function () {
				const animationDuration = 350;

				if ($(this).hasClass('animation')) {
					return;
				}

				$(this)
					.addClass('animation')
					.prev('.sub-menu').slideToggle(animationDuration)
					.parent().toggleClass('is-opened')
					.siblings().removeClass('is-opened')
					.find('.sub-menu').slideUp(animationDuration);

				setTimeout(() => {
					$('.js-btn-mobile').removeClass('animation');
				}, animationDuration);
			});
		} else {
			$('.js-btn-mobile').remove();
		}
	}

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


	/* -------------------------- */
	/* ------ INIT ON LOAD ------ */
	/* -------------------------- */
	$(window).on('load', function () {
		calcHeaderOffset();
		menuArrows();
		initSwiper();
		wpc_add_img_bg('.js-bg');
	});


	/* ---------------------------- */
	/* ------ INIT ON RESIZE ------ */
	/* ---------------------------- */
	$(window).on('resize', function () {
		calcHeaderOffset();
		menuArrows();
	});


	/* ---------------------------------------- */
	/* ------ INIT ON ORIENTATION CHANGE ------ */
	/* ---------------------------------------- */
	window.addEventListener("orientationchange", function () {
		calcHeaderOffset();
		menuArrows();
	});

})(jQuery, window, document);