<?php

// add site settings css variables
add_action('wp_head', 'global_site_variables');
add_action( 'admin_head', 'global_site_variables' );
function global_site_variables(){
	
	// initialize variables
	$primary = null;
	$secondary = null;
	$accent = null;
	$text = null;
	$light = null;
	$gray = null;
	$white = null;
	$base_font_size = null;
	$max_width = null;
	$section_padding = null;
	$button_border = null;
	$border_radius = null;
	$button_primary = null;
	$button_secondary = null;
	$button_accent = null;
	$font_size_standard = null;
	$font_size_large = null;
	$font_size_small = null;
	$width_standard = null;
	$width_large = null;
	$width_small = null;
	$padding_standard = null;
	$padding_large = null;
	$padding_small = null;
	
	// colors
	$primary = get_field('primary', 'style');
	$secondary = get_field('secondary', 'style');
	$accent = get_field('accent', 'style');
	$text = get_field('text', 'style');
	$light = get_field('light', 'style');
	$gray = get_field('gray', 'style');
	$white = get_field('white', 'style');

	// typography
	$base_font_size = get_field('base_font_size', 'style');
	
	// sections
	$max_width = get_field('max_width', 'style');
	$section_padding = get_field('section_padding', 'style');
	if ( $section_padding ) {
		$top_desktop_padding = $section_padding['desktop_padding']['top'];
		$right_desktop_padding = $section_padding['desktop_padding']['right'];
		$bottom_desktop_padding = $section_padding['desktop_padding']['bottom'];
		$left_desktop_padding = $section_padding['desktop_padding']['left'];
		$top_tablet_padding = $section_padding['tablet_padding']['top'];
		$right_tablet_padding = $section_padding['tablet_padding']['right'];
		$bottom_tablet_padding = $section_padding['tablet_padding']['bottom'];
		$left_tablet_padding = $section_padding['tablet_padding']['left'];
		$top_mobile_padding = $section_padding['mobile_padding']['top'];
		$right_mobile_padding = $section_padding['mobile_padding']['right'];
		$bottom_mobile_padding = $section_padding['mobile_padding']['bottom'];
		$left_mobile_padding = $section_padding['mobile_padding']['left'];
	}
	
	// buttons
	$button_border = get_field('button_border', 'style');
	if ( $button_border == 'radius' ) {
		$border_radius = get_field('border_radius', 'style');
	} elseif ( $button_border == 'square' ) {
		$border_radius = '0';
	} elseif ( $button_border == 'round' ) {
		$border_radius = '1000';
	}
	/*
	$button_primary = get_field('primary_button', 'style');
	if ( $button_primary ) {
		$button_style_primary = $button_primary['button_style_primary'];
		$primary_button_text_color = $button_primary['text_color']['site_colors'];
		$primary_button_text_color_hover = $button_primary['text_hover_color']['site_colors'];
		$primary_button_background_color = $button_primary['background_color']['site_colors'];
		$primary_button_background_color_hover = $button_primary['background_hover_color']['site_colors'];
	}
	$button_secondary = get_field('secondary_button', 'style');
	if ( $button_secondary ) {
		$button_style_secondary = $button_secondary['button_style_secondary'];
		$secondary_button_text_color = $button_secondary['text_color']['site_colors'];
		$secondary_button_text_color_hover = $button_secondary['text_hover_color']['site_colors'];
		$secondary_button_background_color = $button_secondary['background_color']['site_colors'];
		$secondary_button_background_color_hover = $button_secondary['background_hover_color']['site_colors'];
	}
	$button_accent = get_field('accent_button', 'style');
	if ( $button_accent ) {
		$button_style_accent = $button_accent['button_style_accent'];
		$accent_button_text_color = $button_accent['text_color']['site_colors'];
		$accent_button_text_color_hover = $button_accent['text_hover_color']['site_colors'];
		$accent_button_background_color = $button_accent['background_color']['site_colors'];
		$accent_button_background_color_hover = $button_accent['background_hover_color']['site_colors'];
	}
	*/
	$font_size_standard = get_field('font_size_standard', 'style');
	if ( $font_size_standard ) {
		$font_size_standard_desktop = $font_size_standard['desktop'];
		$font_size_standard_tablet = $font_size_standard['tablet'];
		$font_size_standard_mobile = $font_size_standard['mobile'];
	}
	$font_size_large = get_field('font_size_large', 'style');
	if ( $font_size_large ) {
		$font_size_large_desktop = $font_size_large['desktop'];
		$font_size_large_tablet = $font_size_large['tablet'];
		$font_size_large_mobile = $font_size_large['mobile'];
	}
	$font_size_small = get_field('font_size_small', 'style');
	if ( $font_size_small ) {
		$font_size_small_desktop = $font_size_small['desktop'];
		$font_size_small_tablet = $font_size_small['tablet'];
		$font_size_small_mobile = $font_size_small['mobile'];
	}
	$width_standard = get_field('width_standard', 'style');
	if ( $width_standard ) {
		$width_standard_desktop = $width_standard['desktop'];
		$width_standard_tablet = $width_standard['tablet'];
		$width_standard_mobile = $width_standard['mobile'];
	}
	$width_large = get_field('width_large', 'style');
	if ( $width_large ) {
		$width_large_desktop = $width_large['desktop'];
		$width_large_tablet = $width_large['tablet'];
		$width_large_mobile = $width_large['mobile'];
	}
	$width_small = get_field('width_small', 'style');
	if ( $width_small ) {
		$width_small_desktop = $width_small['desktop'];
		$width_small_tablet = $width_small['tablet'];
		$width_small_mobile = $width_small['mobile'];
	}
	$padding_standard = get_field('padding_standard', 'style');
	if ( $padding_standard ) {
		$padding_standard_desktop = $padding_standard['desktop'];
		$padding_standard_tablet = $padding_standard['tablet'];
		$padding_standard_mobile = $padding_standard['mobile'];
	}
	$padding_large = get_field('padding_large', 'style');
	if ( $padding_large ) {
		$padding_large_desktop = $padding_large['desktop'];
		$padding_large_tablet = $padding_large['tablet'];
		$padding_large_mobile = $padding_large['mobile'];
	}
	$padding_small = get_field('padding_small', 'style');
	if ( $padding_small ) {
		$padding_small_desktop = $padding_small['desktop'];
		$padding_small_tablet = $padding_small['tablet'];
		$padding_small_mobile = $padding_small['mobile'];
	}
	?>
	
	<style>
		:root {
			/* colors */	
			--primary: <?=$primary;?>;
			--secondary: <?=$secondary;?>;
			--accent: <?=$accent;?>;
			--text: <?=$text;?>;
			--light: <?=$light;?>;
			--gray: <?=$gray;?>;
			--white: <?=$white;?>;
			/* typography */
			--base_font_size: <?=$base_font_size;?>px;
			/* sections */
			--section_max_width: <?=$max_width;?>px;
			<?php if ( $section_padding ) { ?>
				--section_desktop_padding: <?=$top_desktop_padding;?>px 0 <?=$bottom_desktop_padding;?>px 0;
				--section_tablet_padding: <?=$top_tablet_padding;?>px 0 <?=$bottom_tablet_padding;?>px 0;
				--section_mobile_padding: <?=$top_mobile_padding;?>px 0 <?=$bottom_mobile_padding;?>px 0;
			<?php } ?>
			<?php if ( $button_border ) { ?>
				--button_border-radius: <?=$border_radius;?>px;
			<?php } ?>
			<?php if ( $font_size_standard ) { ?>
				--font-size-standard-desktop: <?=$font_size_standard_desktop;?>px;
				--font-size-standard-tablet: <?=$font_size_standard_tablet;?>px;
				--font-size-standard-mobile: <?=$font_size_standard_mobile;?>px;
			<?php } ?>
			<?php if ( $font_size_large ) { ?>
				--font-size-large-desktop: <?=$font_size_large_desktop;?>px;
				--font-size-large-tablet: <?=$font_size_large_tablet;?>px;
				--font-size-large-mobile: <?=$font_size_large_mobile;?>px;
			<?php } ?>
			<?php if ( $font_size_small ) { ?>
				--font_size-small-desktop: <?=$font_size_small_desktop;?>px;
				--font_size-small-tablet: <?=$font_size_small_tablet;?>px;
				--font_size-small-mobile: <?=$font_size_small_mobile;?>px;
			<?php } ?>
			<?php if ( $width_standard ) { ?>
				--button-width-standard-desktop: <?=$width_standard_desktop;?>px;
				--button-width_standard-tablet: <?=$width_standard_tablet;?>px;
				--button-width_standard-mobile: <?=$width_standard_mobile;?>px;
			<?php } ?>
			<?php if ( $width_large ) { ?>
				--button-width-large-desktop: <?=$width_large_desktop;?>px;
				--button-width_large-tablet: <?=$width_large_tablet;?>px;
				--button-width_large-mobile: <?=$width_large_mobile;?>px;
			<?php } ?>
			<?php if ( $width_small ) { ?>
				--button-width-small-desktop: <?=$width_small_desktop;?>px;
				--button-width_small-tablet: <?=$width_small_tablet;?>px;
				--button-width-small-mobile: <?=$width_small_mobile;?>px;
			<?php } ?>
			<?php if ( $padding_standard ) { ?>
				--button-padding-standard-desktop: <?=$padding_standard_desktop;?>px;
				--button-padding-standard-tablet: <?=$padding_standard_tablet;?>px;
				--button-padding-standard-mobile: <?=$padding_standard_mobile;?>px;
			<?php } ?>
			<?php if ( $padding_large ) { ?>
				--button-padding-large-desktop: <?=$padding_large_desktop;?>px;
				--button-padding-large-tablet: <?=$padding_large_tablet;?>px;
				--button-padding-large-mobile: <?=$padding_large_mobile;?>px;
			<?php } ?>
			<?php if ( $padding_small ) { ?>
				--button-padding-small-desktop: <?=$padding_small_desktop;?>px;
				--button-padding-small-tablet: <?=$padding_small_tablet;?>px;
				--button-padding-small-mobile: <?=$padding_small_mobile;?>px;
			<?php } ?>
		}
		
	</style>
		
	<?php

}

//add_action( 'admin_head', 'global_site_variables_admin' );
function global_site_variables_admin(){
	
	$primary = null;
	$secondary = null;
	$accent = null;
	$text = null;
	$light = null;
	$gray = null;
	$white = null;
	
	// colors
	$primary = get_field('primary', 'style');
	$secondary = get_field('secondary', 'style');
	$accent = get_field('accent', 'style');
	$text = get_field('text', 'style');
	$light = get_field('light', 'style');
	$gray = get_field('gray', 'style');
	$white = get_field('white', 'style');
	
	?>
	
	<style>
		:root {
			/* colors */
			--primary: <?=$primary;?>;
			--secondary: <?=$secondary;?>;
			--accent: <?=$accent;?>;
			--text: <?=$text;?>;
			--light: <?=$light;?>;
			--gray: <?=$gray;?>;
			--white: <?=$white;?>;
	</style>
	
	<?php
	
}

// populate selected colors
add_filter('acf/load_field/name=site_colors', function($field) {
	
	$primary = get_field('primary', 'style');
	$secondary = get_field('secondary', 'style');
	$accent = get_field('accent', 'style');
	$text = get_field('text', 'style');
	$light = get_field('light', 'style');
	$white = get_field('white', 'style');
	
	$choices = [];
	
	$choices += array( 'default' => __('Default', 'bbc') );

	if ( $primary ) {
		$choices += array( $primary => __('Primary', 'bbc') );
	}
	
	if ( $secondary ) {
		$choices += array( $secondary => __('Secondary', 'bbc') );
	}
	
	if ( $accent ) {
		$choices += array( $accent => __('Accent', 'bbc') );
	}
	
	if ( $text ) {
		$choices += array( $text => __('Text', 'bbc') );
	}
	
	if ( $light ) {
		$choices += array( $light => __('Light', 'bbc') );
	}
	
	if ( $white ) {
		$choices += array( $white => __('White', 'bbc') );
	}
	
	$field['choices'] = $choices;
	$field['default_value'] = 'default';
	return $field;

});

// populate selected colors
add_filter('acf/load_field/name=theme_colors', function($field) {
	
	$primary = 'primary';
	$secondary = 'secondary';
	$accent = 'success';
	$text = 'dark';
	$light = 'light';
	$white = 'white';
	
	$choices = [];

	$choices += array( 'default' => __('Default', 'bbc') );
	
	if ( $primary ) {
		$choices += array( $primary => __('Primary', 'bbc') );
	}
	
	if ( $secondary ) {
		$choices += array( $secondary => __('Secondary', 'bbc') );
	}
	
	if ( $accent ) {
		$choices += array( $accent => __('Accent', 'bbc') );
	}
	
	if ( $text ) {
		$choices += array( $text => __('Text', 'bbc') );
	}
	
	if ( $light ) {
		$choices += array( $light => __('Light', 'bbc') );
	}
	
	if ( $white ) {
		$choices += array( $white => __('White', 'bbc') );
	}
	
	$field['choices'] = $choices;
	$field['default_value'] = null;
	return $field;

});


add_action('wp_head', 'nav_submenu_fix');
function nav_submenu_fix(){ ?>

	<style>
		.dropdown:hover .dropdown-menu{
			display: block;
		}
		.dropdown-menu{
			margin-top: 0;
		}
	</style>
	<script>
	$(document).ready(function(){
		$(".dropdown").hover(function(){
			var dropdownMenu = $(this).children(".dropdown-menu");
			if(dropdownMenu.is(":visible")){
				dropdownMenu.parent().toggleClass("open");
			}
		});
	});     
	</script>
	
	<script>
	$(document).ready(function () {
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');
	
	
	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });
	
	
	  return false;
	});
	});
	
	</script>

<?php }

//add_action('wp_footer', 'add_class_to_buttons');
function add_class_to_buttons(){ ?>

	<?php
		$button_border = get_field('button_border', 'style');
	?>
	
	<script>
		window.onload = function() {
			var buttons = document.getElementsByClassName("btn"),
				len = buttons !== null ? buttons.length : 0,
				i = 0;
			for(i; i < len; i++) {
				buttons[i].className += " btn-<?php echo $button_border; ?>"; 
			}
		}
	</script>
	
<?php }

add_action( 'admin_head', 'add_id_to_dynamic_content_sections' );
function add_id_to_dynamic_content_sections(){ ?>
	
	<?php
	$post_id = null;
	
	global $post;
	
	if ( $post_id && ( $post->ID != '651' ) ) { ?>
		<script>		
			(function($){
			if (typeof acf != 'undefined') {
			  acf.add_action('ready append', function($el) {
				// array to hold list of existing ID values
				var layout_ids = [];
				// selector targets id field butnot hidden clones of layouts
				var fields = $('[data-key="field_644fcd226b7f7"] .acf-input input').not('.clones [data-key="field_644fcd226b7f7"] .acf-input input');
				if (fields.length) {
				  for (i=0; i<fields.length; i++) {
					var field = $(fields[i]);
					var value = field.val();
					if (value == '' || layout_ids.indexOf(value) != -1) {
					  value = 'bbc-'+acf.uniqid();
					  field.val(value);
					  field.trigger('change');
					}
					layout_ids.push(value);
				  }
				}
				
			  });
			}
			})(jQuery);
		</script>
	<?php } ?>
<?php }

//add_filter('acf/load_field/key=field_644fcd226b7f7'.$key, 'readonly_field', 20, 1);
function readonly_field($field) {
	$field['readonly'] = true;
	return $field;
}