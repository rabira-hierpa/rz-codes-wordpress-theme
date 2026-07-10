<?php
/**
 * Featured post card (first post on blog home page 1).
 *
 * @package Rz_Codes_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mins = rz_codes_reading_minutes( get_the_excerpt() . ' ' . get_post_field( 'post_content', get_the_ID() ) );
$cats = rz_codes_post_categories( get_the_ID() );
?>
<div class="featured-post-card animate-slide-up">
	<a href="<?php the_permalink(); ?>" class="featured-post-card__link">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="featured-post-card__media">
				<?php the_post_thumbnail( 'large', array( 'class' => 'featured-post-card__img' ) ); ?>
				<span class="featured-post-card__badge"><?php esc_html_e( '⭐ Featured', 'rz-codes-blog' ); ?></span>
			</div>
		<?php endif; ?>
		<div class="featured-post-card__body">
			<?php if ( ! empty( $cats ) ) : ?>
				<div class="featured-post-card__cats">
					<?php foreach ( $cats as $cat ) : ?>
						<span class="featured-post-card__cat"><?php echo esc_html( $cat->name ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<h2 class="featured-post-card__title"><?php the_title(); ?></h2>
			<div class="featured-post-card__excerpt"><?php the_excerpt(); ?></div>
			<div class="featured-post-card__meta">
				<span class="featured-post-card__meta-item">
					<svg class="featured-post-card__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
					<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
				</span>
				<span class="featured-post-card__meta-item">
					<svg class="featured-post-card__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
					<?php
					printf(
						/* translators: %d: minutes */
						esc_html__( '%d min read', 'rz-codes-blog' ),
						(int) $mins
					);
					?>
				</span>
			</div>
			<div class="featured-post-card__cta">
				<?php esc_html_e( 'Read Full Article', 'rz-codes-blog' ); ?>
				<svg class="featured-post-card__cta-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
			</div>
		</div>
	</a>
</div>
