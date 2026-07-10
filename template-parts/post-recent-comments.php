<?php
/**
 * Recent comments (single post sidebar).
 *
 * @package Rz_Codes_Blog
 *
 * @var array $args {
 *     @type WP_Comment[] $comments Comment objects.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comments = isset( $args['comments'] ) && is_array( $args['comments'] ) ? $args['comments'] : array();
$comments = array_values( array_filter( $comments, static function ( $c ) {
	return $c instanceof WP_Comment;
} ) );
if ( empty( $comments ) ) {
	return;
}
?>
<aside class="recent-comments-sidebar" aria-labelledby="recent-comments-title">
	<h2 id="recent-comments-title" class="recent-comments-sidebar__title"><?php esc_html_e( 'Recent comments', 'rz-codes-blog' ); ?></h2>
	<p class="recent-comments-sidebar__hint"><?php esc_html_e( 'Latest from readers across the blog.', 'rz-codes-blog' ); ?></p>
	<ul class="recent-comments-sidebar__list">
		<?php
		foreach ( $comments as $comment ) {
			$post_id   = (int) $comment->comment_post_ID;
			$post_title = get_the_title( $post_id );
			if ( '' === $post_title ) {
				continue;
			}
			$excerpt = wp_trim_words( wp_strip_all_tags( (string) $comment->comment_content ), 18, '…' );
			?>
			<li class="recent-comments-sidebar__item">
				<a class="recent-comments-sidebar__link" href="<?php echo esc_url( get_comment_link( $comment ) ); ?>">
					<span class="recent-comments-sidebar__comment"><?php echo esc_html( $excerpt ); ?></span>
					<span class="recent-comments-sidebar__meta">
						<span class="recent-comments-sidebar__author"><?php echo esc_html( get_comment_author( $comment ) ); ?></span>
						<span class="recent-comments-sidebar__sep" aria-hidden="true">·</span>
						<span class="recent-comments-sidebar__post"><?php echo esc_html( $post_title ); ?></span>
					</span>
				</a>
			</li>
			<?php
		}
		?>
	</ul>
</aside>
