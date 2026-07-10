<?php
/**
 * Theme footer (matches Gatsby Footer + contact section).
 *
 * @package Rz_Codes_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$main     = rz_codes_main_site_url();
$blog_url = rz_codes_blog_url();
$year     = (int) gmdate( 'Y' );
$formspree = 'https://formspree.io/f/xanyzbzw';
?>
	</main>

	<footer class="site-footer">
		<section class="contact-section">
			<div class="contact-section__inner">
				<div class="contact-section__head">
					<h2 class="contact-section__title"><?php esc_html_e( "Let's Work Together", 'rz-codes-blog' ); ?></h2>
					<p class="contact-section__lead">
						<?php esc_html_e( 'Have a project in mind? Looking for a collaborator? Or just want to say hi? I\'d love to hear from you!', 'rz-codes-blog' ); ?>
					</p>
				</div>

				<div class="contact-cards">
					<a class="contact-card" href="mailto:rzcodesbiz@gmail.com">
						<div class="contact-card__icon contact-card__icon--primary">
							<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
						</div>
						<h3 class="contact-card__label"><?php esc_html_e( 'Email', 'rz-codes-blog' ); ?></h3>
						<p class="contact-card__meta">rzcodesbiz@gmail.com</p>
					</a>
					<a class="contact-card" href="https://www.linkedin.com/in/rabira" target="_blank" rel="noopener noreferrer">
						<div class="contact-card__icon contact-card__icon--blue">
							<svg fill="currentColor" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
						</div>
						<h3 class="contact-card__label"><?php esc_html_e( 'LinkedIn', 'rz-codes-blog' ); ?></h3>
						<p class="contact-card__meta">@rabira</p>
					</a>
					<a class="contact-card" href="https://github.com/rabira-hierpa" target="_blank" rel="noopener noreferrer">
						<div class="contact-card__icon contact-card__icon--gh">
							<svg fill="currentColor" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
						</div>
						<h3 class="contact-card__label"><?php esc_html_e( 'GitHub', 'rz-codes-blog' ); ?></h3>
						<p class="contact-card__meta">@rabira-hierpa</p>
					</a>
				</div>

				<div class="calendly-cta-wrap">
					<a class="calendly-cta" href="https://calendly.com/rzcodes-biz/30min" target="_blank" rel="noopener noreferrer">
						<div class="calendly-cta__row">
							<div class="calendly-cta__left">
								<div class="calendly-cta__icon-wrap">
									<svg class="calendly-cta__cal" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="40" height="40" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
									<span class="calendly-cta__ping" aria-hidden="true"></span>
								</div>
								<div>
									<h3 class="calendly-cta__title">
										<?php esc_html_e( 'Schedule a Meeting', 'rz-codes-blog' ); ?>
										<svg class="calendly-cta__arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
									</h3>
									<p class="calendly-cta__sub"><?php esc_html_e( 'Book a free 30-minute consultation call to discuss your project', 'rz-codes-blog' ); ?></p>
								</div>
							</div>
							<div class="calendly-cta__badge">
								<span class="calendly-cta__badge-inner">
									<span class="calendly-cta__dot" aria-hidden="true"></span>
									<?php esc_html_e( 'Available Now', 'rz-codes-blog' ); ?>
								</span>
							</div>
						</div>
					</a>

					<div class="contact-divider">
						<span><?php esc_html_e( 'Or send me a message', 'rz-codes-blog' ); ?></span>
					</div>
				</div>

				<div class="contact-form-card">
					<form class="contact-form" action="<?php echo esc_url( $formspree ); ?>" method="post">
						<input type="hidden" name="_subject" value="Portfolio Contact (WordPress)">
						<div class="contact-form__grid">
							<div class="contact-form__field">
								<label for="cf-name"><?php esc_html_e( 'Your Name *', 'rz-codes-blog' ); ?></label>
								<input type="text" id="cf-name" name="name" required placeholder="<?php esc_attr_e( 'John Doe', 'rz-codes-blog' ); ?>">
							</div>
							<div class="contact-form__field">
								<label for="cf-email"><?php esc_html_e( 'Your Email *', 'rz-codes-blog' ); ?></label>
								<input type="email" id="cf-email" name="email" required placeholder="<?php esc_attr_e( 'john@example.com', 'rz-codes-blog' ); ?>">
							</div>
						</div>
						<div class="contact-form__field">
							<label for="cf-subject"><?php esc_html_e( 'Subject *', 'rz-codes-blog' ); ?></label>
							<input type="text" id="cf-subject" name="subject" required placeholder="<?php esc_attr_e( 'Project Inquiry', 'rz-codes-blog' ); ?>">
						</div>
						<div class="contact-form__field">
							<label for="cf-message"><?php esc_html_e( 'Message *', 'rz-codes-blog' ); ?></label>
							<textarea id="cf-message" name="message" rows="6" required placeholder="<?php esc_attr_e( 'Tell me about your project...', 'rz-codes-blog' ); ?>"></textarea>
						</div>
						<button type="submit" class="contact-form__submit">
							<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
							<?php esc_html_e( 'Send Message', 'rz-codes-blog' ); ?>
						</button>
					</form>
				</div>
			</div>
		</section>

		<div class="footer-main">
			<div class="footer-main__inner">
				<div class="footer-grid">
					<div class="footer-brand">
						<a href="<?php echo esc_url( $main ); ?>" class="footer-brand__link">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" alt="" width="48" height="48" class="footer-brand__logo">
							<span class="footer-brand__name"><?php esc_html_e( 'Rz Codes', 'rz-codes-blog' ); ?></span>
						</a>
						<p class="footer-brand__text">
							<?php esc_html_e( 'Software Engineer, GIS Developer, and FOSS enthusiast crafting innovative solutions for web and mobile platforms.', 'rz-codes-blog' ); ?>
						</p>
						<div class="footer-brand__email">
							<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
							<a href="mailto:rzcodes.biz@gmail.com">rzcodes.biz@gmail.com</a>
						</div>
					</div>

					<div class="footer-col">
						<h3 class="footer-col__title"><?php esc_html_e( 'Quick Links', 'rz-codes-blog' ); ?></h3>
						<ul class="footer-links">
							<li><a href="<?php echo esc_url( $main ); ?>"><?php esc_html_e( 'Home', 'rz-codes-blog' ); ?></a></li>
							<li><a href="<?php echo esc_url( $blog_url ); ?>"><?php esc_html_e( 'Blog', 'rz-codes-blog' ); ?></a></li>
							<li><a href="<?php echo esc_url( $main . 'projects' ); ?>"><?php esc_html_e( 'Projects', 'rz-codes-blog' ); ?></a></li>
							<li><a href="<?php echo esc_url( $main . 'apps' ); ?>"><?php esc_html_e( 'Apps', 'rz-codes-blog' ); ?></a></li>
						</ul>
					</div>

					<div class="footer-col">
						<h3 class="footer-col__title"><?php esc_html_e( 'Explore', 'rz-codes-blog' ); ?></h3>
						<ul class="footer-links">
							<li><a href="<?php echo esc_url( $main . 'designs' ); ?>"><?php esc_html_e( 'Designs', 'rz-codes-blog' ); ?></a></li>
							<li><a href="<?php echo esc_url( $main . 'my-journey' ); ?>"><?php esc_html_e( 'My Journey', 'rz-codes-blog' ); ?></a></li>
							<li><a href="<?php echo esc_url( $main . 'about' ); ?>"><?php esc_html_e( 'About', 'rz-codes-blog' ); ?></a></li>
						</ul>
					</div>

					<div class="footer-col footer-col--social">
						<h3 class="footer-col__title"><?php esc_html_e( 'Connect With Me', 'rz-codes-blog' ); ?></h3>
						<p class="footer-social__lead"><?php esc_html_e( 'Follow me on social media for updates, tutorials, and tech insights.', 'rz-codes-blog' ); ?></p>
						<div class="footer-social">
							<a class="footer-social__btn" href="https://www.github.com/rabira-hierpa" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'GitHub Profile', 'rz-codes-blog' ); ?>" title="GitHub">
								<svg class="footer-social__icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
							</a>
							<a class="footer-social__btn" href="https://www.linkedin.com/in/rabira" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'LinkedIn Profile', 'rz-codes-blog' ); ?>" title="LinkedIn">
								<svg class="footer-social__icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
							</a>
							<a class="footer-social__btn" href="https://twitter.com/rzcodes" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Twitter Profile', 'rz-codes-blog' ); ?>" title="Twitter">
								<svg class="footer-social__icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
							</a>
							<a class="footer-social__btn" href="https://www.youtube.com/@rzcodes" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'YouTube Channel', 'rz-codes-blog' ); ?>" title="YouTube">
								<svg class="footer-social__icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
							</a>
							<a class="footer-social__btn" href="https://www.facebook.com/rzcodes" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Facebook Page', 'rz-codes-blog' ); ?>" title="Facebook">
								<svg class="footer-social__icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
							</a>
							<a class="footer-social__btn" href="https://www.tiktok.com/@rzcodes" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'TikTok Profile', 'rz-codes-blog' ); ?>" title="TikTok">
								<svg class="footer-social__icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
							</a>
							<a class="footer-social__btn" href="https://dev.to/rabra_hierpa" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'DEV.to Profile', 'rz-codes-blog' ); ?>" title="DEV.to">
								<svg class="footer-social__icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M7.42 10.05c-.18-.16-.46-.23-.84-.23H6l.02 2.44.04 2.45.56-.02c.41 0 .63-.07.83-.26.24-.24.26-.36.26-2.2 0-1.91-.02-1.96-.29-2.18zM0 4.94v14.12h24V4.94H0zM8.56 15.3c-.44.58-1.06.77-2.53.77H4.71V8.53h1.4c1.67 0 2.16.18 2.6.9.27.43.29.6.32 2.57.05 2.23-.02 2.73-.47 3.3zm5.09-5.47h-2.47v1.77h1.52v1.28l-.72.04-.75.03v1.77l1.22.03 1.2.04v1.28h-1.6c-1.53 0-1.6-.01-1.87-.3l-.3-.28v-3.16c0-3.02.01-3.18.25-3.48.23-.31.25-.31 1.88-.31h1.64v1.3zm4.68 5.45c-.17.43-.64.79-1 .79-.18 0-.45-.15-.67-.39-.32-.32-.45-.63-.82-2.08l-.9-3.39-.45-1.67h.76c.4 0 .75.02.75.05 0 .06 1.16 4.54 1.26 4.83.04.15.32-.7.73-2.3l.66-2.52.74-.04c.4-.02.73 0 .73.04 0 .14-1.67 6.38-1.8 6.68z"/></svg>
							</a>
							<a class="footer-social__btn" href="https://www.openstreetmap.org/user/Rabira%20Hierpa" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'OpenStreetMap Profile', 'rz-codes-blog' ); ?>" title="OpenStreetMap">
								<svg class="footer-social__icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0C7.802 0 4 3.403 4 7.602C4 11.8 7.469 16.812 12 24C16.531 16.812 20 11.8 20 7.602C20 3.403 16.199 0 12 0zM13.03 14.989v-4.968c-3.804-.126-6.024-1.589-7.886-3.813 1.327 5.904 5.216 7.068 7.886 7.379v2.424L18 10.029l-4.97-5.982v2.482c-4.844.078-6.969 2.282-8.01 5.995C6.815 10.043 8.708 8.556 13.03 8.26v-3.262l3.059 3.717L13.03 14.99z"/></svg>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="footer-bottom__inner">
					<div class="footer-bottom__copy">
						© <?php echo esc_html( (string) $year ); ?> <?php esc_html_e( 'Rz Codes. All rights reserved. Made with', 'rz-codes-blog' ); ?>
						<span class="footer-heart" aria-hidden="true">♥</span>
						<?php esc_html_e( 'by', 'rz-codes-blog' ); ?>
						<a href="https://www.rz-codes.com"><?php esc_html_e( 'Rabra Hierpa', 'rz-codes-blog' ); ?></a>
					</div>
					<div class="footer-bottom__links">
						<a href="<?php echo esc_url( $main . 'about' ); ?>"><?php esc_html_e( 'About', 'rz-codes-blog' ); ?></a>
						<span class="footer-bottom__sep">|</span>
						<a href="mailto:rzcodes.biz@gmail.com"><?php esc_html_e( 'Contact', 'rz-codes-blog' ); ?></a>
						<span class="footer-bottom__sep">|</span>
						<a href="<?php echo esc_url( $blog_url ); ?>"><?php esc_html_e( 'Blog', 'rz-codes-blog' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<button type="button" class="theme-toggle" id="theme-toggle" aria-label="<?php esc_attr_e( 'Toggle theme', 'rz-codes-blog' ); ?>"></button>

<?php wp_footer(); ?>
</body>
</html>
