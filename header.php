<?php
/**
 * Theme header (matches Gatsby Header).
 *
 * @package Rz_Codes_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$main      = rz_codes_main_site_url();
$blog_url  = rz_codes_blog_url();
$blog_here = rz_codes_is_blog_section();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'rz-body' ); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="site-header__inner">
		<div class="site-header__brand">
			<a href="<?php echo esc_url( $main ); ?>" class="site-header__logo-link">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" width="50" height="50" class="site-header__logo-img" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<?php endif; ?>
				<span class="site-header__title"><?php esc_html_e( 'Rz Codes', 'rz-codes-blog' ); ?></span>
			</a>
		</div>

		<label for="menu-toggle" class="site-header__menu-btn" aria-label="<?php esc_attr_e( 'Menu', 'rz-codes-blog' ); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-hidden="true">
				<title>menu</title>
				<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
			</svg>
		</label>

		<input class="screen-reader-text" type="checkbox" id="menu-toggle" aria-hidden="true">
		<div class="site-header__nav-wrap" id="menu">
			<nav class="site-header__nav" aria-label="<?php esc_attr_e( 'Primary', 'rz-codes-blog' ); ?>">
				<ul class="site-header__menu">
					<li>
						<a class="site-header__link<?php echo $blog_here ? ' is-active' : ''; ?>" href="<?php echo esc_url( $blog_url ); ?>"><?php esc_html_e( 'Blog', 'rz-codes-blog' ); ?></a>
					</li>
					<li>
						<a class="site-header__link" href="<?php echo esc_url( $main . 'projects' ); ?>"><?php esc_html_e( 'Projects', 'rz-codes-blog' ); ?></a>
					</li>
					<li>
						<a class="site-header__link" href="<?php echo esc_url( $main . 'apps' ); ?>"><?php esc_html_e( 'Apps', 'rz-codes-blog' ); ?></a>
					</li>
					<li>
						<a class="site-header__link" href="<?php echo esc_url( $main . 'designs' ); ?>"><?php esc_html_e( 'Designs', 'rz-codes-blog' ); ?></a>
					</li>
					<li>
						<a class="site-header__link" href="<?php echo esc_url( $main . 'my-journey' ); ?>"><?php esc_html_e( 'My Journey', 'rz-codes-blog' ); ?></a>
					</li>
					<li>
						<a class="site-header__link" href="<?php echo esc_url( $main . 'about' ); ?>"><?php esc_html_e( 'About', 'rz-codes-blog' ); ?></a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>

<div class="site-layout">
	<main class="site-main">
