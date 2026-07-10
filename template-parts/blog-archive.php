<?php
/**
 * Blog archive / hero / search / grid (Gatsby BlogArchive).
 *
 * Supports optional $GLOBALS['rz_blog_query'] (WP_Query) for front-page blog layout.
 *
 * @package Rz_Codes_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;

$rz_q = ( isset( $GLOBALS['rz_blog_query'] ) && $GLOBALS['rz_blog_query'] instanceof WP_Query )
	? $GLOBALS['rz_blog_query']
	: $wp_query;

$paged = max(
	1,
	(int) get_query_var( 'paged' ),
	(int) get_query_var( 'page' ),
	(int) $rz_q->get( 'paged' )
);

$on_blog_home = is_home() || ( is_front_page() && ! empty( $GLOBALS['rz_blog_front_blog'] ) );

$show_featured = ( 1 === $paged )
	&& $on_blog_home
	&& ! is_search()
	&& ! is_category()
	&& ! is_tag()
	&& ! is_author()
	&& ! is_date()
	&& ! is_post_type_archive();

$categories = get_categories(
	array(
		'hide_empty' => true,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);

$search_base = rz_codes_blog_url();
?>

<section class="blog-hero" aria-labelledby="blog-hero-title">
	<div class="blog-hero__pattern" aria-hidden="true"></div>
	<div class="blog-hero__inner">
		<div class="blog-hero__header animate-fade-in">
			<div class="blog-hero__pill">
				<svg class="blog-hero__pill-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.206 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.794 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.794 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.206 18 16.5 18s-3.332.477-4.5 1.253"/>
				</svg>
				<?php esc_html_e( 'Latest Insights', 'rz-codes-blog' ); ?>
			</div>
			<h1 id="blog-hero-title" class="blog-hero__title">
				<?php esc_html_e( 'Tech Blog &', 'rz-codes-blog' ); ?>
				<span class="blog-hero__title-accent"><?php esc_html_e( 'Insights', 'rz-codes-blog' ); ?></span>
			</h1>
			<p class="blog-hero__subtitle">
				<?php esc_html_e( 'Deep dives into web development, GIS technologies, and open-source tools', 'rz-codes-blog' ); ?>
			</p>
		</div>

		<?php
		if ( $rz_q->have_posts() && $show_featured ) {
			$rz_q->the_post();
			get_template_part( 'template-parts/content', 'featured' );
			$rz_q->rewind_posts();
		}
		?>
	</div>
</section>

<section class="blog-filters" aria-label="<?php esc_attr_e( 'Search and filter articles', 'rz-codes-blog' ); ?>">
	<div class="blog-filters__inner">
		<form class="blog-filters__row" method="get" action="<?php echo esc_url( $search_base ); ?>">
			<div class="blog-filters__search-wrap">
				<input
					type="search"
					name="s"
					class="blog-filters__search"
					placeholder="<?php esc_attr_e( 'Search articles by title or content...', 'rz-codes-blog' ); ?>"
					value="<?php echo esc_attr( get_search_query() ); ?>"
				>
				<svg class="blog-filters__search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
				</svg>
				<?php if ( get_search_query() ) : ?>
					<a href="<?php echo esc_url( $search_base ); ?>" class="blog-filters__clear" aria-label="<?php esc_attr_e( 'Clear search', 'rz-codes-blog' ); ?>">
						<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
					</a>
				<?php endif; ?>
			</div>

			<div class="blog-filters__select-wrap">
				<label class="screen-reader-text" for="rzcat"><?php esc_html_e( 'Category', 'rz-codes-blog' ); ?></label>
				<select class="blog-filters__select" id="rzcat" name="rzcat" onchange="if (this.value) { window.location.href = this.value; } else { window.location.href = <?php echo wp_json_encode( $search_base ); ?>; }">
					<option value=""><?php esc_html_e( 'All Categories', 'rz-codes-blog' ); ?></option>
					<?php foreach ( $categories as $cat ) : ?>
						<option value="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"<?php echo is_category( $cat->term_id ) ? ' selected' : ''; ?>>
							<?php echo esc_html( $cat->name ); ?> (<?php echo (int) $cat->count; ?>)
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</form>

		<p class="blog-filters__meta">
			<?php
			$found = (int) $rz_q->found_posts;
			printf(
				/* translators: 1: number of articles */
				$found === 1
					? esc_html__( 'Showing %1$d article', 'rz-codes-blog' )
					: esc_html__( 'Showing %1$d articles', 'rz-codes-blog' ),
				$found
			);
			if ( get_search_query() ) {
				printf(
					/* translators: %s: search query */
					' ' . esc_html__( 'matching "%s"', 'rz-codes-blog' ),
					esc_html( get_search_query() )
				);
			}
			if ( is_category() ) {
				printf(
					/* translators: %s: category name */
					' ' . esc_html__( 'in "%s"', 'rz-codes-blog' ),
					single_cat_title( '', false )
				);
			}
			?>
		</p>
	</div>
</section>

<section class="blog-grid-section">
	<div class="blog-grid-section__inner">
		<?php if ( $rz_q->have_posts() ) : ?>
			<?php
			$index      = 0;
			$card_count = 0;
			ob_start();
			while ( $rz_q->have_posts() ) :
				$rz_q->the_post();
				if ( $show_featured && 0 === $index ) {
					$index++;
					continue;
				}
				get_template_part( 'template-parts/content', 'post-card' );
				$index++;
				$card_count++;
			endwhile;
			$grid_html = ob_get_clean();
			?>
			<?php if ( $card_count > 0 ) : ?>
			<div class="blog-grid">
				<?php echo $grid_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- template HTML. ?>
			</div>
			<?php elseif ( $show_featured ) : ?>
				<p class="blog-grid-section__more"><?php esc_html_e( 'More articles coming soon.', 'rz-codes-blog' ); ?></p>
			<?php endif; ?>

			<?php
			$links = paginate_links(
				array(
					'total'     => max( 1, (int) $rz_q->max_num_pages ),
					'current'   => $paged,
					'prev_text' => '<span class="pagination__icon">' . rz_codes_icon_chevron_left() . '</span>' . esc_html__( 'Previous', 'rz-codes-blog' ),
					'next_text' => esc_html__( 'Next', 'rz-codes-blog' ) . '<span class="pagination__icon">' . rz_codes_icon_chevron_right() . '</span>',
					'type'      => 'list',
				)
			);
			if ( $links ) {
				echo '<nav class="pagination" aria-label="' . esc_attr__( 'Posts pagination', 'rz-codes-blog' ) . '">';
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- paginate_links output.
				echo $links;
				echo '</nav>';
			}
			?>
		<?php else : ?>
			<div class="blog-empty">
				<svg class="blog-empty__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="80" height="80" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
				</svg>
				<h3 class="blog-empty__title"><?php esc_html_e( 'No articles found', 'rz-codes-blog' ); ?></h3>
				<p class="blog-empty__text"><?php esc_html_e( 'Try adjusting your search or filter criteria', 'rz-codes-blog' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
