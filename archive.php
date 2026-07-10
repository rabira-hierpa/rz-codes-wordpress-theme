<?php
/**
 * Category, tag, date archives (same layout as blog index; no featured card).
 *
 * @package Rz_Codes_Blog
 */

get_header();
get_template_part( 'template-parts/blog', 'archive' );
get_footer();
