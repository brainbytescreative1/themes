<?php

if( get_row_layout() == 'heading' ):

    $heading_classes = [];

    // content
    $text = get_sub_field('text');
    $tag = get_sub_field('tag');

    if ( $text && $tag ) {

        // process global functions
        $heading_classes[] = 'element';
        
        $heading_classes[] = get_heading_style_bbc('text_styles', $heading_classes, true);
        $heading_classes[] = get_spacing_bbc(get_sub_field('heading_spacing'));

        $heading_classes = trim(implode(' ', array_unique($heading_classes)));

        echo '<' . $tag . ' class="'. esc_attr($heading_classes) .'">' . $text . '</' . $tag . '>';

    }

endif;