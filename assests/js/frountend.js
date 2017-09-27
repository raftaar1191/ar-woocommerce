jQuery( 'span.ar-try-now' ).on( 'click', '.try-now-text-desktop', function ( e ) {
	e.preventDefault();

	var url = jQuery( this ).attr( 'href' );
	if ( 'undefined' != typeof( url ) && '' != url ) {

		var parent = jQuery( this ).closest( 'div.product' );

		parent.find( '.secondary_image' ).addClass( 'hide' );

		parent.find( 'span.onsale' ).addClass( 'hide' );
		parent.find( 'span.ar-try-now' ).addClass( 'hide' );
		parent.find( 'div.quickviewbtn' ).addClass( 'hide' );
		parent.find( 'div.actions' ).addClass( 'hide' );

		parent.find( 'span.ar-try-now-cancel' ).removeClass( 'hide' );

		var main_image = parent.find( 'img.wp-post-image' ).attr( 'src' );
		parent.find( 'img.wp-post-image' ).attr( 'data-main', main_image );

		parent.find( 'img.wp-post-image' ).attr( 'src', url );

	}
	return false;
} );


jQuery( 'div.product' ).on( 'click', 'span.ar-try-now-cancel', function ( e ) {
	e.preventDefault();
	var parent = jQuery( this ).closest( 'div.product' );

	var main_image = parent.find( 'img.wp-post-image' ).attr( 'data-main' );
	parent.find( 'img.wp-post-image' ).attr( 'src', main_image );

	parent.find( '.secondary_image' ).removeClass( 'hide' );

	parent.find( 'span.onsale' ).removeClass( 'hide' );
	parent.find( 'span.ar-try-now' ).removeClass( 'hide' );
	parent.find( 'div.quickviewbtn' ).removeClass( 'hide' );
	parent.find( 'div.actions' ).removeClass( 'hide' );

	parent.find( 'span.ar-try-now-cancel' ).addClass( 'hide' );

	return false;
} );



jQuery( 'body.single-product' ).on( 'click', 'a.show_ar_woocommerce_qr_code_img-desktop', function ( e ) {
	e.preventDefault();

	var parent = jQuery( this ).closest( '.summary' );

	if( parent.find( '.ar_woocommerce_qr_code_main' ).hasClass( 'hide' ) ) {
		parent.find( '.ar_woocommerce_qr_code_main' ).removeClass( 'hide' );
	} else {
		parent.find( '.ar_woocommerce_qr_code_main' ).addClass( 'hide' );
	}

	return false;
});