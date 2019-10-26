jQuery.each( [ 'pdf', 'doc', 'xls', 'zip', 'ppt', 'odt', 'psd' ], function( i, type ) {
	var selector;
	switch( type ) {
		case 'doc':
			selector = 'a[href$=".doc"], a[href$=".docx"], a[href$=".docm"], a[href$=".rtf"]';
			break;
		case 'xls':
			selector = 'a[href$=".xls"], a[href$=".xlsx"], a[href$=".ods"], a[href$=".csv"], a[href$=".xlsm"]';
			break;
		case 'zip':
			selector = 'a[href$=".zip"], a[href$=".rar"], a[href$=".7z"]';
			break;
		case 'ppt':
			selector = 'a[href$=".ppt"], a[href$=".pptx"], a[href$=".odp"], a[href$=".pptm"]';
			break;
		default:
			selector = 'a[href$=".' + type + '"]';
			break;
	}
	jQuery( selector ).each( function ( index, element ) {
		var $link = jQuery( element );
		if (
			$link.find( '.file, .file-' + type ).length < 1 &&
			! $link.hasClass( 'no-file-icon' ) &&
			! $link.hasClass( 'button' ) &&
			! $link.hasClass( 'btn' ) &&
			! $link.hasClass( 'wp-block-file__button' ) &&
			$link.children( 'img' ).length < 1
		) {
			$link.prepend( jQuery( '<span>', {
				class: 'file file-' + type
			} ) );
		}
	} );
} );










/* Навигационное меню */
jQuery( document ).ready( function () {

	jQuery( 'body' ).on( 'click', '#burger, #close', function() {
		if ( jQuery( 'body' ).attr( 'data-nav' ) == 'active' ) {
			jQuery( '#nav' ).removeClass( 'nav--active' );
			jQuery( '#burger' ).removeClass( 'burger--active' );
			jQuery( 'body' ).attr( 'data-nav', 'inactive' ).css( { 'overflow': 'auto' } );
		} else {
			jQuery( '#nav' ).addClass( 'nav--active' );
			jQuery( '#burger' ).addClass( 'burger--active' );
			jQuery( 'body' ).attr( 'data-nav', 'active' ).css( { 'overflow': 'hidden' } );
		}
	} )

} );










/* кнопка наверх */
jQuery( document ).ready( function () {
  var $w = jQuery( window ),
    $toTopBtn = jQuery( '<button>', {
      class: 'to-top-btn',
      id: 'toTopBtn',
      title: StarterTheme.toTopBtn,
    } ).appendTo( jQuery( 'body' ) );
  function _btnHide() {
    if ( $w.scrollTop() > screen.height * 0.5) {
      $toTopBtn.show();
    } else {
      $toTopBtn.hide();
    }
  }
  function _toTopBtnClick() {
    jQuery( 'body, html' ).animate( {
      scrollTop: 0
    }, 500 );
    return false;
  }
  _btnHide();
  $w.bind( 'scroll', _btnHide );
  $toTopBtn.bind( 'click', _toTopBtnClick );
} );