<?php
/**
 * Post card in archive grid.
 *
 * @package Rz_Codes_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mins = rz_codes_reading_minutes( get_the_excerpt() . ' ' . get_post_field( 'post_content', get_the_ID() ) );
$cats = rz_codes_post_categories( get_the_ID() );
?>
<article <?php post_class( 'blog-card' ); ?>>
	<a href="<?php the_permalink(); ?>" class="blog-card__link">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="blog-card__media">
				<?php the_post_thumbnail( 'medium_large', array( 'class' => 'blog-card__img' ) ); ?>
			</div>
		<?php endif; ?>
		<div class="blog-card__body">
			<?php if ( ! empty( $cats ) ) : ?>
				<div class="blog-card__cats">
					<?php foreach ( $cats as $cat ) : ?>
						<span class="blog-card__cat"><?php echo esc_html( $cat->name ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<h3 class="blog-card__title"><?php the_title(); ?></h3>
			<div class="blog-card__excerpt"><?php the_excerpt(); ?></div>
			<div class="blog-card__meta">
				<span class="blog-card__meta-item">
					<svg class="blog-card__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
					<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
				</span>
				<span class="blog-card__meta-item">
					<svg class="blog-card__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
					<?php echo esc_html( (string) $mins ); ?> <?php esc_html_e( 'min', 'rz-codes-blog' ); ?>
				</span>
			</div>
		</div>
	</a>
</article>
