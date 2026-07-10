<?php
/**
 * Main blog index (matches Gatsby BlogArchive).
 *
 * @package Rz_Codes_Blog
 */

get_header();
get_template_part( 'template-parts/blog', 'archive' );
get_footer();
