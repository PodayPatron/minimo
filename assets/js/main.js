(function($) {

	function nzSliderFlickity() {
		$( '.main-carousel' ).flickity({
			cellAlign: 'left',
			fullscreen: true,
			lazyLoad: 1,
		});
	}

	nzSliderFlickity();
})( jQuery );