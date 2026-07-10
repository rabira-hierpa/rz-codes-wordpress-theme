<?php
/**
 * Static pages (including front page when set to a static page).
 *
 * Without this file, WordPress falls back to index.php for pages and the blog
 * template incorrectly treats the Page as the only “post” in the loop.
 *
 * @package Rz_Codes_Blog
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>
	<div class="site-page-wrap">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'site-page' ); ?>>
			<h1 class="site-page__title"><?php the_title(); ?></h1>
			<div class="site-page__content entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	</div>
	<?php
endwhile;
get_footer();
