<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$wrapper_classes = [];

$wrapper_classes[] = 'wrapper';
$wrapper_classes[] = 'footer-bottom';

// get fields
// menus
$menu_1 = get_field('menu_1', 'footer');
$menu_2 = get_field('menu_2', 'footer');

// copyright text
$copyright_text = get_field('copyright_text', 'footer');

// text color
$text_color = get_field('text_color', 'footer');
if ( $text_color ) {
	$wrapper_classes[] = 'text-' . $text_color['theme_colors'];
} else {
	$text_color = null;
}

// background color
$background_color = get_field('background_color', 'footer');
if ( $background_color ) {
	$wrapper_classes[] = 'bg-' . $background_color['theme_colors'];
} else {
	$background_color = null;
}

// width
$footer_width = get_field('footer_width', 'footer');
if ( $footer_width ) {
	$container = $footer_width;
} else {
	$container = get_theme_mod( 'understrap_container_type' );
}

// process global functions
$wrapper_classes[] = get_spacing_bbc(get_field('footer_spacing', 'footer'));

// process classes
$wrapper_classes = implode(' ', $wrapper_classes);

// footer icons
$footer_icon_list = get_field('footer_icon_list', 'footer');

// custom code 
$footer_code = get_field('footer', 'code');

?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer class="wrapper footer-bottom <?=esc_attr($wrapper_classes)?>" id="wrapper-footer">

	<div class="<?=esc_attr($container)?>">

		<div class="row small">

			<div class="col-md-3 pe-md-4 footer-left">
				<div class="site-logo">
					<?php 
					$home_url = get_home_url();
					$image = wp_get_attachment_image( get_field('footer_logo', 'footer'), 'medium' );
					if ( $image ) { ?>
						<a href="<?=esc_attr($home_url)?>" class="navbar-brand custom-logo-link" rel="home" aria-current="page">
							<?=$image?>
						</a>
					<?php }
					?>
				</div>
				<div class="footer-cta d-grid gap-0">
					<a href="/appointment-request/" class="btn btn-primary">Get Started</a>
				</div>
			</div>

			<div class="col-md-6 footer-left">

				<div class="site-info mt-2">

					<div class="footer-menu">
						<?php
						if ( $menu_1 ) {
							echo $menu_1;
						}
						if ( $menu_2 ) {
							echo $menu_2;
						}
						?>
					</div>

				</div><!-- .site-info -->

			</div><!-- col -->

			<div class="col-md-3 footer-right">

				<div class="site-info">

					<div class="footer-social">
						<?php
						foreach ( $footer_icon_list as $footer_icon ) {

							if ( $footer_icon ) {

								foreach ( $footer_icon as $icon ) {

									$icon_element = $icon['icon'];
									$link = $icon['link'];
									$separator = $icon['separator'];

									if ( $link ) {
										$value = $link['value'];
										$target = $link['target'];
										if ( $value ) {
											echo '<a class="ms-lg-2 me-lg-0 me-2" href="'. esc_url($value) .'" target="'. $target .'">';
										}
									}

										if ( $icon_element ) {

											$icon_classes = [];

											$icon_classes[] = 'footer-social-icon';

											if ( $separator ) {
												$icon_classes[] = 'separator-'. $separator;
											}

											$icon_classes = implode(' ', $icon_classes);

											echo '<span class="'. esc_attr($icon_classes) .'">'. $icon_element .'</span>';
										}

									if ( $link ) {
										echo '</a>';
									}

								}
							}					
						}
						?>
					</div>

					<div class="footer-copyright">
						<span>
							<?php if ( $copyright_text ) {
								echo $copyright_text;
							} ?>
						</span>
					</div>

				</div><!-- .site-info -->

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</footer><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if ( $footer_code ) {
	echo $footer_code;
} ?>

<!-- <script type="text/javascript" src="<?php //echo get_stylesheet_directory_uri(); ?>/js/mdb.min.js"></script> -->

<!-- back to top button -->
<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
  <i class="fas fa-chevron-up"></i>
</button>

<script>
	//Get the button
	let mybutton = document.getElementById("btn-back-to-top");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
	scrollFunction();
	};

	function scrollFunction() {
	if (
		document.body.scrollTop > 20 ||
		document.documentElement.scrollTop > 20
	) {
		mybutton.style.display = "flex";
	} else {
		mybutton.style.display = "none";
	}
	}
	// When the user clicks on the button, scroll to the top of the document
	mybutton.addEventListener("click", backToTop);

	function backToTop() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
	}
</script>

</body>

</html>