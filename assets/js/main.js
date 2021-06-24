(function($) {

	function nzSliderFlickity() {
		$('.main-carousel').flickity({
			cellAlign: 'left',
			fullscreen: true,
			lazyLoad: 1,
			adaptiveHeight: true,
		});
	}

	nzSliderFlickity();
})( jQuery );