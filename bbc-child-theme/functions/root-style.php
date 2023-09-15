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

	// logo
	$logo_width = get_field('logo_width', 'header');
	
	// colors
	$primary = get_field('primary', 'style');
	$secondary = get_field('secondary', 'style');
	$accent = get_field('accent', 'style');
	$text = get_field('text', 'style');
	$light = get_field('light', 'style');
	$light_blue = get_field('light_blue', 'style');
	$white = get_field('white', 'style');

	// typography
	$base_font_size = get_field('base_font_size', 'style');
	$primary_font = get_field('primary_font', 'style');
	$secondary_font = get_field('secondary_font', 'style');
	
	// buttons
	$button_border = get_field('button_border', 'style');
	if ( $button_border == 'radius' ) {
		$border_radius = get_field('border_radius', 'style');
	} elseif ( $button_border == 'square' ) {
		$border_radius = '0';
	} elseif ( $button_border == 'round' ) {
		$border_radius = '1000';
	}
	?>
	
	<style>
		:root {
			/* colors */	
			--primary: <?=$primary;?>;
			--secondary: <?=$secondary;?>;
			--accent: <?=$accent;?>;
			--text: <?=$text;?>;
			--dark: <?=$text;?>;
			--light: <?=$light;?>;
			--info: <?=$light_blue;?>;
			--white: <?=$white;?>;

			/* logo */
			--logo_width: <?=$logo_width;?>px;

			/* typography */
			--base_font_size: <?=$base_font_size;?>px;
			--base_font_size_small: <?=$base_font_size - 1;?>px;

			/* sections */
			--max-width: <?=$max_width;?>px;

			/* font families */
			--font-primary: <?=$primary_font;?>;
			--font-secondary: <?=$secondary_font;?>;

			/* buttons */
			--button_border-radius: <?=$border_radius;?>px;
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
	$light_blue = null;
	$white = null;
	
	// colors
	$primary = get_field('primary', 'style');
	$secondary = get_field('secondary', 'style');
	$accent = get_field('accent', 'style');
	$text = get_field('text', 'style');
	$light = get_field('light', 'style');
	$light_blue = get_field('light_blue', 'style');
	$white = get_field('white', 'style');
	
	?>
	
	<style>
		:root {
			/* colors */
			--primary: <?=$primary;?>;
			--secondary: <?=$secondary;?>;
			--accent: <?=$accent;?>;
			--text: <?=$text;?>;
			--dark: <?=$text;?>;
			--light: <?=$light;?>;
			--info: <?=$light_blue;?>;
			--white: <?=$white;?>;
		}
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
	$light_blue = get_field('light_blue', 'style');
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

	if ( $light_blue ) {
		$choices += array( $light_blue => __('Light Blue', 'bbc') );
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
	$light_blue = 'info';
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

	if ( $light_blue ) {
		$choices += array( $light_blue => __('Light Blue', 'bbc') );
	}
	
	if ( $white ) {
		$choices += array( $white => __('White', 'bbc') );
	}
	
	$field['choices'] = $choices;
	$field['default_value'] = null;
	return $field;

});

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

// Set the default color palette for certain fields
function set_acf_color_picker_default_palettes() {
	
	$primary = get_field('primary', 'style');
	$secondary = get_field('secondary', 'style');
	$accent = get_field('accent', 'style');
	$text = get_field('text', 'style');
	$light = get_field('light', 'style');
	$light_blue = get_field('light_blue', 'style');
	$white = get_field('white', 'style');
	
?>
<script>
let setDefaultPalette = function() {
    acf.add_filter('color_picker_args', function( args, $field ){

        // Find the field key
        let targetFieldKey = $field[0]['dataset']['key'];

        // Set color options for the field
        if ( 'field_64371b51ab13a' === targetFieldKey ) {
            args.palettes = [ 
				'<?php echo $primary; ?>', 
				'<?php echo $secondary; ?>', 
				'<?php echo $accent; ?>', 
				'<?php echo $text; ?>', 
				'<?php echo $light; ?>', 
				'<?php echo $light_blue; ?>', 
				'<?php echo $white; ?>' ];
        }

        // Return
        return args;
    });
}
setDefaultPalette();
</script>
<?php
}
add_action('acf/input/admin_footer', 'set_acf_color_picker_default_palettes');