(function($) {
	function nzAddGallery() {
		let $metaBoxWrapper = $( '#gallery-minimo' );

		if ( ! $metaBoxWrapper.length ) {
			return;
		}

		$metaBoxWrapper.each(
			function () {
				let frame;
				let $metaBox      = $( this );
				let $addImgLink   = $metaBox.find( '.upload-custom-img' );
				let $imgContainer = $metaBox.find( '.custom-img-container' );
				let $imgIdInput   = $metaBox.find( '.custom-img-id' );

				$addImgLink.on(
					'click',
					function( event ){
						event.preventDefault();

						if ( frame ) {
							frame.open();
							return;
						}

						frame = wp.media(
							{
								title: 'Add image icon for category',
								button: {
									text: 'Add image photo'
								},
								multiple: true,
							}
						);

						frame.on(
							'select',
							function() {
								let attachment = frame.state().get( 'selection' ).toJSON();
								let id_photo = [];

								for ( let i = 0; i < attachment.length; i++ ) {
									id_photo[i] = attachment[i]['id'];
									$imgContainer.append(
										`<div class="custom-img-gallery" data-id="${attachment[i]['id']}">
											<img src="${attachment[i]['url']}" alt="photo hotel">
											<button class="custom-remove-image">
												x
											</button>
										</div>`
									);
								}

								$imgIdInput.val( $imgIdInput.val() + ',' + id_photo.join() );
							}
						);
						frame.open();
					}
				);
			}
		)
	}

	function nzRemovePhoto() {
		$( document ).on( 'click', '.custom-remove-image', function( event ) {
			event.preventDefault();

			let $this       = $(this);
			let $id_photo   = $this.parent().data( 'id' );
			let $input      = $this.parents( '#gallery-minimo' ).find( '.custom-img-id' );
			let $inputValue = $input.val().split( ',' );
			$inputValue.splice( $.inArray( $id_photo, $inputValue ) ,1 );
			$input.val( $inputValue.join() );
			$this.parent().slideUp();
		});
	}

	nzAddGallery();
	nzRemovePhoto();
})( jQuery );