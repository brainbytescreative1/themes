<?php

if( get_row_layout() == 'divider' ):

    // get fields
    $divider = get_sub_field('divider');

    if ( $divider ) {

        // initialize arrays
        $divider_classes = [];
        $divider_styles = [];

        // add initial classes
        $divider_classes[] = 'divider';
        $divider_classes[] = 'element';

        // width and height
        if ( $divider['width'] ) {
            $value = $divider['width']['value'];
            if ( $value ) {
                $unit = $divider['width']['unit'];
                $divider_styles[] = 'width: ' . $value . $unit . ';';
            }
        }

        if ( $divider['height'] ) {
            $value = $divider['height']['value'];
            if ( $value ) {
                $unit = $divider['height']['unit'];
                $divider_styles[] = 'height: ' . $value . $unit . ';';
            }
        }

        // color
        $divider_color = $divider['theme_colors'];
        if ( $divider_color ) {
            $divider_classes[] = 'bg-' . $divider_color;
        }

        /*
        $divider_spacing = $divider['divider_spacing'];
        if ( !empty( $divider_spacing ) ) {
            foreach ( $divider_spacing as $spacing ) {
                if ( $spacing != 'default' ) {
                    $divider_classes[] = $spacing;
                }
            }
        }
        */

        $alignment = $divider['alignment'];
        if ( $alignment ) {
            $divider_classes[] = 'align-' . $alignment;
        }

        $divider_classes[] = get_spacing_bbc($divider['divider_spacing']);

        // process divider classes and styles
        $divider_classes = implode(' ', $divider_classes);
        $divider_styles = implode(' ', $divider_styles);
        
        ?>

        <div class="<?=esc_attr($divider_classes)?>" style="<?=esc_attr($divider_styles)?>"></div>

    <?php }

endif;