<?php
/**
 * Rz Codes Blog theme functions.
 *
 * @package Rz_Codes_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'RZ_CODES_THEME_VERSION', '1.2.1' );

/**
 * Main portfolio / marketing site URL (Gatsby). Blog nav links point here except Blog.
 */
function rz_codes_main_site_url() {
	$url = get_theme_mod( 'rz_main_site_url', 'https://www.rz-codes.com' );
	return trailingslashit( esc_url_raw( $url ) );
}

/**
 * Enqueue scripts and styles.
 */
function rz_codes_enqueue_assets() {
	$theme_uri = get_template_directory_uri();

	wp_enqueue_style(
		'rz-codes-blog-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'rz-codes-blog',
		$theme_uri . '/assets/css/main.css',
		array( 'rz-codes-blog-fonts' ),
		RZ_CODES_THEME_VERSION
	);

	wp_enqueue_script(
		'rz-codes-blog',
		$theme_uri . '/assets/js/theme.js',
		array(),
		RZ_CODES_THEME_VERSION,
		true
	);

	if ( is_singular( 'post' ) ) {
		wp_enqueue_script(
			'rz-single-post',
			$theme_uri . '/assets/js/single-post.js',
			array(),
			RZ_CODES_THEME_VERSION,
			true
		);
	}

	if ( is_singular() && get_option( 'thread_comments' ) && ( comments_open() || get_comments_number() ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rz_codes_enqueue_assets' );

/**
 * Theme supports.
 */
function rz_codes_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 50,
			'width'       => 50,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'automatic-feed-links' );

	// Block editor: use the site's Poppins typography and a Medium-style writing layout.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );
	add_theme_support( 'align-wide' );

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Primary red', 'rz-codes-blog' ),
				'slug'  => 'primary',
				'color' => '#dc2626',
			),
			array(
				'name'  => __( 'Secondary yellow', 'rz-codes-blog' ),
				'slug'  => 'secondary',
				'color' => '#facc15',
			),
			array(
				'name'  => __( 'Text', 'rz-codes-blog' ),
				'slug'  => 'text',
				'color' => '#1a1a1a',
			),
			array(
				'name'  => __( 'Muted text', 'rz-codes-blog' ),
				'slug'  => 'text-muted',
				'color' => '#6b7280',
			),
			array(
				'name'  => __( 'Background', 'rz-codes-blog' ),
				'slug'  => 'background',
				'color' => '#f3f3f3',
			),
			array(
				'name'  => __( 'Surface', 'rz-codes-blog' ),
				'slug'  => 'surface',
				'color' => '#ffffff',
			),
		)
	);

	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name' => __( 'Small', 'rz-codes-blog' ),
				'slug' => 'small',
				'size' => 14,
			),
			array(
				'name' => __( 'Normal', 'rz-codes-blog' ),
				'slug' => 'normal',
				'size' => 18,
			),
			array(
				'name' => __( 'Large', 'rz-codes-blog' ),
				'slug' => 'large',
				'size' => 24,
			),
			array(
				'name' => __( 'Huge', 'rz-codes-blog' ),
				'slug' => 'huge',
				'size' => 32,
			),
		)
	);
}
add_action( 'after_setup_theme', 'rz_codes_setup' );

/**
 * Block editor: manual light/dark toggle for the writing canvas (defaults to light).
 */
function rz_codes_enqueue_block_editor_assets() {
	wp_enqueue_script(
		'rz-codes-editor-theme-toggle',
		get_template_directory_uri() . '/assets/js/editor-theme-toggle.js',
		array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-i18n' ),
		RZ_CODES_THEME_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'rz_codes_enqueue_block_editor_assets' );

/**
 * Customizer: main site URL for header/footer links.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function rz_codes_customize_register( $wp_customize ) {
	$wp_customize->add_setting(
		'rz_main_site_url',
		array(
			'default'           => 'https://www.rz-codes.com',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'rz_main_site_url',
		array(
			'label'   => __( 'Portfolio site URL', 'rz-codes-blog' ),
			'section' => 'title_tagline',
			'type'    => 'url',
		)
	);
}
add_action( 'customize_register', 'rz_codes_customize_register' );

/**
 * Ensure the blog index main query only loads published posts (not pages).
 *
 * @param WP_Query $query Query instance.
 */
function rz_codes_main_blog_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	// Blog home: "latest posts" on front, or the designated Posts page.
	// Use $query->is_home() — plain is_home() is unreliable inside pre_get_posts.
	if ( $query->is_home() ) {
		$query->set( 'post_type', 'post' );
		$query->set( 'post_status', 'publish' );
	}
}
add_action( 'pre_get_posts', 'rz_codes_main_blog_query' );

/**
 * Estimated reading time in minutes from text.
 *
 * @param string $text Post content or excerpt.
 * @return int
 */
function rz_codes_reading_minutes( $text ) {
	$words = str_word_count( wp_strip_all_tags( (string) $text ) );
	return max( 1, (int) ceil( $words / 200 ) );
}

/**
 * First two category names for a post (for badges).
 *
 * @param int $post_id Post ID.
 * @return array<int, WP_Term>
 */
function rz_codes_post_categories( $post_id ) {
	$cats = get_the_category( $post_id );
	if ( empty( $cats ) || is_wp_error( $cats ) ) {
		return array();
	}
	return array_slice( $cats, 0, 2 );
}

/**
 * URL of the blog posts index (Settings → Reading).
 *
 * @return string
 */
function rz_codes_blog_url() {
	if ( is_front_page() && is_home() ) {
		return home_url( '/' );
	}
	if ( is_front_page() && ! empty( $GLOBALS['rz_blog_front_blog'] ) ) {
		return home_url( '/' );
	}
	$page_for_posts = (int) get_option( 'page_for_posts' );
	if ( $page_for_posts ) {
		return get_permalink( $page_for_posts );
	}
	return home_url( '/' );
}

/**
 * Whether the current view is the main blog listing (home, posts page, or front-page blog layout).
 *
 * @return bool
 */
function rz_codes_is_blog_section() {
	return is_home()
		|| ( is_front_page() && ! empty( $GLOBALS['rz_blog_front_blog'] ) )
		|| is_singular( 'post' )
		|| is_category()
		|| is_tag()
		|| is_search();
}

/**
 * Related posts for single view (same categories, else recent posts).
 *
 * @param int $post_id Post ID.
 * @param int $limit   Max posts.
 * @return WP_Post[]
 */
function rz_codes_get_related_posts( $post_id, $limit = 5 ) {
	$post_id = (int) $post_id;
	$limit   = max( 1, (int) $limit );
	$cats    = wp_get_post_categories( $post_id );
	$args    = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $limit,
		'post__not_in'        => array( $post_id ),
		'orderby'             => 'date',
		'order'               => 'DESC',
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( $cats ) ) {
		$args['category__in'] = $cats;
	}
	return get_posts( $args );
}

/**
 * Recent approved comments (site-wide), for single-post sidebar.
 *
 * @param int $limit Max comments.
 * @return WP_Comment[]
 */
function rz_codes_get_recent_comments( $limit = 5 ) {
	$limit = max( 1, min( 20, (int) $limit ) );
	$list  = get_comments(
		array(
			'status'  => 'approve',
			'type'    => 'comment',
			'number'  => $limit,
			'orderby' => 'comment_date_gmt',
			'order'   => 'DESC',
		)
	);
	return is_array( $list ) ? $list : array();
}

/**
 * Add stable IDs to h2–h4 and build a table of contents from rendered post HTML.
 *
 * @param string $html HTML from apply_filters( 'the_content', ... ).
 * @return array{html: string, items: array<int, array{level: int, text: string, id: string}>}
 */
function rz_codes_prepare_content_with_toc( $html ) {
	$items = array();
	$html  = (string) $html;
	if ( trim( $html ) === '' ) {
		return array(
			'html'  => $html,
			'items' => $items,
		);
	}
	if ( ! class_exists( 'DOMDocument' ) ) {
		return array(
			'html'  => $html,
			'items' => $items,
		);
	}

	libxml_use_internal_errors( true );

	$doc  = new DOMDocument();
	$wrap = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body><div id="rz-parse-root">' . $html . '</div></body></html>';

	// phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
	$loaded = @$doc->loadHTML( $wrap, LIBXML_HTML_NODEFDTD );
	if ( ! $loaded ) {
		libxml_clear_errors();
		return array(
			'html'  => $html,
			'items' => $items,
		);
	}

	$xpath = new DOMXPath( $doc );
	$nodes = $xpath->query( '//div[@id="rz-parse-root"]//*[self::h2 or self::h3 or self::h4]' );

	if ( ! $nodes || 0 === $nodes->length ) {
		libxml_clear_errors();
		$root = $doc->getElementById( 'rz-parse-root' );
		$out  = $html;
		if ( $root ) {
			$out = '';
			foreach ( $root->childNodes as $child ) {
				$out .= $doc->saveHTML( $child );
			}
		}
		return array(
			'html'  => $out,
			'items' => $items,
		);
	}

	$used_ids = array();

	foreach ( $nodes as $node ) {
		if ( ! ( $node instanceof DOMElement ) ) {
			continue;
		}
		$tag = $node->tagName;
		if ( ! preg_match( '/^h([234])$/', $tag, $m ) ) {
			continue;
		}
		$level = (int) $m[1];
		$text  = trim( preg_replace( '/\s+/u', ' ', $node->textContent ) );
		if ( '' === $text ) {
			continue;
		}
		$id = $node->getAttribute( 'id' );
		if ( '' === $id || isset( $used_ids[ $id ] ) ) {
			$base = sanitize_title( $text );
			if ( '' === $base ) {
				$base = 'section';
			}
			$id = $base;
			$i  = 2;
			while ( isset( $used_ids[ $id ] ) ) {
				$id = $base . '-' . $i;
				++$i;
			}
			$node->setAttribute( 'id', $id );
		}
		$used_ids[ $id ] = true;
		$items[]         = array(
			'level' => $level,
			'text'  => $text,
			'id'    => $id,
		);
	}

	$root = $doc->getElementById( 'rz-parse-root' );
	$out  = $html;
	if ( $root ) {
		$out = '';
		foreach ( $root->childNodes as $child ) {
			$out .= $doc->saveHTML( $child );
		}
	}

	libxml_clear_errors();

	return array(
		'html'  => $out,
		'items' => $items,
	);
}

/**
 * SVG chevron left for pagination buttons.
 *
 * @return string
 */
function rz_codes_icon_chevron_left() {
	return '<svg xmlns="http://www.w3.org/2000/svg" class="pagination__svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>';
}

/**
 * SVG chevron right for pagination buttons.
 *
 * @return string
 */
function rz_codes_icon_chevron_right() {
	return '<svg xmlns="http://www.w3.org/2000/svg" class="pagination__svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>';
}
