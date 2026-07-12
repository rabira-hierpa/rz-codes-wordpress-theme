/**
 * Manual light/dark toggle for the block editor canvas.
 * Defaults to light; the choice is remembered per browser via localStorage.
 */
( function ( wp ) {
	if ( ! wp || ! wp.plugins || ! wp.element ) {
		return;
	}

	var MoreMenuItem = ( wp.editPost && wp.editPost.PluginMoreMenuItem ) ||
		( wp.editSite && wp.editSite.PluginMoreMenuItem );

	if ( ! MoreMenuItem ) {
		return;
	}

	var registerPlugin = wp.plugins.registerPlugin;
	var useState = wp.element.useState;
	var useEffect = wp.element.useEffect;
	var createElement = wp.element.createElement;
	var __ = wp.i18n.__;

	var STORAGE_KEY = 'rzCodesEditorTheme';
	var DARK_CLASS = 'rz-editor-theme-dark';

	function getStoredTheme() {
		try {
			return window.localStorage.getItem( STORAGE_KEY ) === 'dark' ? 'dark' : 'light';
		} catch ( e ) {
			return 'light';
		}
	}

	function setStoredTheme( theme ) {
		try {
			window.localStorage.setItem( STORAGE_KEY, theme );
		} catch ( e ) {
			// Ignore storage failures (e.g. private browsing).
		}
	}

	function getIframeBody() {
		var iframe = document.querySelector( 'iframe[name="editor-canvas"]' );
		return iframe && iframe.contentDocument ? iframe.contentDocument.body : null;
	}

	function applyTheme( theme ) {
		var body = getIframeBody();
		if ( body ) {
			body.classList.toggle( DARK_CLASS, theme === 'dark' );
		}
	}

	function ThemeToggleMenuItem() {
		var state = useState( getStoredTheme() );
		var theme = state[ 0 ];
		var setTheme = state[ 1 ];

		useEffect(
			function () {
				applyTheme( theme );

				// The canvas iframe can mount after this component does; retry briefly.
				var attempts = 0;
				var id = window.setInterval( function () {
					attempts++;
					if ( getIframeBody() ) {
						applyTheme( theme );
						window.clearInterval( id );
					} else if ( attempts > 20 ) {
						window.clearInterval( id );
					}
				}, 250 );

				return function () {
					window.clearInterval( id );
				};
			},
			[ theme ]
		);

		return createElement(
			MoreMenuItem,
			{
				icon: 'admin-appearance',
				onClick: function () {
					var next = theme === 'dark' ? 'light' : 'dark';
					setStoredTheme( next );
					setTheme( next );
				},
			},
			theme === 'dark'
				? __( 'Switch to light editor', 'rz-codes-blog' )
				: __( 'Switch to dark editor', 'rz-codes-blog' )
		);
	}

	registerPlugin( 'rz-codes-editor-theme-toggle', {
		render: ThemeToggleMenuItem,
	} );
} )( window.wp );
