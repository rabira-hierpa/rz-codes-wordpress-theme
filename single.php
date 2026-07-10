<?php
/**
 * Single post: hero (title + meta + image), then 3 columns — TOC | content | related.
 *
 * @package Rz_Codes_Blog
 */

get_header();
while ( have_posts() ) :
	the_post();
	$mins        = rz_codes_reading_minutes( get_the_content() );
	$related     = rz_codes_get_related_posts( get_the_ID(), 5 );
	$related3    = array_slice( $related, 0, 3 );
	$raw_content = get_post()->post_content;
	$prepared    = rz_codes_prepare_content_with_toc( apply_filters( 'the_content', $raw_content ) );
	$toc_items   = $prepared['items'];
	$has_toc             = ! empty( $toc_items );
	$has_related         = ! empty( $related );
	$recent_comments = array_values(
		array_filter(
			rz_codes_get_recent_comments( 5 ),
			static function ( $c ) {
				return $c instanceof WP_Comment && '' !== get_the_title( (int) $c->comment_post_ID );
			}
		)
	);
	$has_recent_comments = ! empty( $recent_comments );
	$show_right_rail     = $has_related || $has_recent_comments;
	$grid_class          = 'post-3col';
	if ( $has_toc ) {
		$grid_class .= ' post-3col--with-toc';
	}
	if ( $show_right_rail ) {
		$grid_class .= ' post-3col--with-related';
	}
	?>
<div class="blog-single-wrap blog-single-wrap--3col">
	<article <?php post_class( 'blog-post-article' ); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/Article">
		<header class="blog-post-hero">
			<h1 class="blog-post-title" itemprop="headline"><?php the_title(); ?></h1>
			<div class="blog-post-meta">
				<span class="blog-post-meta__item">
					<svg class="blog-post-meta__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
					<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" itemprop="datePublished"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></time>
				</span>
				<span class="blog-post-meta__dot" aria-hidden="true">•</span>
				<span class="blog-post-meta__item"><?php echo esc_html( (string) $mins ); ?> <?php esc_html_e( 'min read', 'rz-codes-blog' ); ?></span>
			</div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="blog-post-featured">
					<?php the_post_thumbnail( 'large', array( 'class' => 'blog-post-featured__img', 'itemprop' => 'image' ) ); ?>
				</div>
			<?php endif; ?>
		</header>

		<div class="<?php echo esc_attr( $grid_class ); ?>">
			<?php if ( $has_toc ) : ?>
				<div class="post-3col__toc">
					<?php get_template_part( 'template-parts/post', 'toc', array( 'items' => $toc_items ) ); ?>
				</div>
			<?php endif; ?>

			<div class="post-3col__content">
				<div class="blog-post-content entry-content" itemprop="articleBody">
					<?php
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Same trust model as the_content(); from filters.
					echo $prepared['html'];
					wp_link_pages(
						array(
							'before' => '<nav class="page-links">' . esc_html__( 'Pages:', 'rz-codes-blog' ),
							'after'  => '</nav>',
						)
					);
					?>
				</div>
			</div>

			<?php if ( $show_right_rail ) : ?>
				<div class="post-3col__related">
					<div class="post-3col__rail-stack">
						<?php if ( $has_related ) : ?>
							<aside class="related-sidebar" aria-labelledby="related-sidebar-title">
								<h2 id="related-sidebar-title" class="related-sidebar__title"><?php esc_html_e( 'Related articles', 'rz-codes-blog' ); ?></h2>
								<p class="related-sidebar__hint"><?php esc_html_e( 'Keep reading — picks from the same topics.', 'rz-codes-blog' ); ?></p>
								<ul class="related-sidebar__list">
									<?php
									foreach ( $related as $rel ) {
										$rmin = rz_codes_reading_minutes( $rel->post_content );
										?>
										<li class="related-sidebar__item">
											<a class="related-sidebar__link" href="<?php echo esc_url( get_permalink( $rel ) ); ?>">
												<span class="related-sidebar__link-title"><?php echo esc_html( get_the_title( $rel ) ); ?></span>
												<span class="related-sidebar__meta">
													<?php echo esc_html( get_the_date( 'M j, Y', $rel ) ); ?>
													<span class="related-sidebar__sep">·</span>
													<?php echo esc_html( (string) $rmin ); ?> <?php esc_html_e( 'min', 'rz-codes-blog' ); ?>
												</span>
											</a>
										</li>
										<?php
									}
									?>
								</ul>
							</aside>
						<?php endif; ?>

						<?php if ( $has_recent_comments ) : ?>
							<?php get_template_part( 'template-parts/post', 'recent-comments', array( 'comments' => $recent_comments ) ); ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<footer class="post-author" aria-labelledby="post-author-heading">
			<div class="post-author__inner" itemprop="author" itemscope itemtype="https://schema.org/Person">
				<?php
				echo get_avatar(
					get_the_author_meta( 'ID' ),
					96,
					'',
					'',
					array(
						'class'   => 'post-author__avatar',
						'loading' => 'lazy',
					)
				);
				?>
				<div class="post-author__body">
					<h2 id="post-author-heading" class="post-author__label"><?php esc_html_e( 'About the author', 'rz-codes-blog' ); ?></h2>
					<p class="post-author__name">
						<a class="post-author__name-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url">
							<span itemprop="name"><?php the_author(); ?></span>
						</a>
					</p>
					<?php
					$author_bio = get_the_author_meta( 'description' );
					if ( '' !== trim( (string) $author_bio ) ) :
						?>
						<div class="post-author__bio"><?php echo wp_kses_post( wpautop( $author_bio ) ); ?></div>
					<?php endif; ?>
					<a class="post-author__more" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e( 'View all posts by', 'rz-codes-blog' ); ?> <?php the_author(); ?> →</a>
				</div>
			</div>
		</footer>
	</article>

	<?php if ( ! empty( $related3 ) ) : ?>
	<section class="blog-post-bottom blog-post-bottom--full" aria-labelledby="continue-reading-title">
		<div class="blog-post-bottom__inner">
			<div class="blog-post-bottom__head">
				<h2 id="continue-reading-title" class="blog-post-bottom__title"><?php esc_html_e( 'You might also like', 'rz-codes-blog' ); ?></h2>
				<p class="blog-post-bottom__lead"><?php esc_html_e( 'More stories worth your time — dive in while you are here.', 'rz-codes-blog' ); ?></p>
			</div>
			<div class="blog-grid blog-grid--bottom">
				<?php
				global $post;
				foreach ( $related3 as $rel ) {
					$post = $rel; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					setup_postdata( $post );
					get_template_part( 'template-parts/content', 'post-card' );
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php
	if ( ! post_password_required() ) {
		comments_template();
	}
	?>
</div>
<?php
endwhile;
get_footer();
