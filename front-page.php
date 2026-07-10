<?php
/**
 * Front page: full blog layout (featured post, grid by date, search) like localhost:8000/blog.
 *
 * @package Rz_Codes_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$GLOBALS['rz_blog_front_blog'] = true;

get_header();

// Latest posts on front: main query is already posts (do not set rz_blog_query).
if ( ! ( is_front_page() && is_home() ) ) {
	// Static page assigned as front — show blog via custom query ordered by date.
	$paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
	$GLOBALS['rz_blog_query'] = new WP_Query(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => (int) get_option( 'posts_per_page' ),
			'paged'               => $paged,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => true,
		)
	);
}

get_template_part( 'template-parts/blog', 'archive' );

if ( ! empty( $GLOBALS['rz_blog_query'] ) && $GLOBALS['rz_blog_query'] instanceof WP_Query ) {
	wp_reset_postdata();
}
unset( $GLOBALS['rz_blog_query'], $GLOBALS['rz_blog_front_blog'] );

get_footer();
