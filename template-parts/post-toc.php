<?php
/**
 * Table of contents (single post left column).
 *
 * @package Rz_Codes_Blog
 *
 * @var array $args {
 *     @type array $items List of array{level: int, text: string, id: string}.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
if ( empty( $items ) ) {
	return;
}
?>
<nav class="post-toc" id="post-toc-nav" aria-label="<?php esc_attr_e( 'Table of contents', 'rz-codes-blog' ); ?>">
	<button type="button" class="post-toc__toggle" aria-expanded="false" aria-controls="post-toc-panel" id="post-toc-toggle">
		<svg class="post-toc__toggle-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
		<?php esc_html_e( 'On this page', 'rz-codes-blog' ); ?>
		<svg class="post-toc__chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
	</button>
	<div class="post-toc__panel" id="post-toc-panel">
		<p class="post-toc__label"><?php esc_html_e( 'Table of contents', 'rz-codes-blog' ); ?></p>
		<ol class="post-toc__list" id="post-toc-list">
			<?php
			foreach ( $items as $item ) {
				$level = (int) $item['level'];
				$cls   = 'post-toc__item post-toc__item--depth-' . min( 4, $level );
				printf(
					'<li class="%1$s"><a class="post-toc__link" href="#%2$s">%3$s</a></li>',
					esc_attr( $cls ),
					esc_attr( $item['id'] ),
					esc_html( $item['text'] )
				);
			}
			?>
		</ol>
	</div>
</nav>
