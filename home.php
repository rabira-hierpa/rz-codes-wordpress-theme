<?php
/**
 * Blog posts index when a static front page is set (uses same template as index.php).
 *
 * @package Rz_Codes_Blog
 */

get_header();
get_template_part( 'template-parts/blog', 'archive' );
get_footer();
