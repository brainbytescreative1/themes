<?php

if( get_row_layout() == 'video_popup' ):
    
    // id
    $id = get_sub_field('unique_id');

    if ( $id ) {

        // trigger
        $trigger = get_sub_field('trigger');
        if ( $trigger && ( $trigger == 'icon' ) ) {

            $icon = get_sub_field('icon');

            $icon_classes = [];
            $icon_classes[] = 'modal-trigger-icon';

            // style
            $icon_size = get_sub_field('icon_size');
            if ( $icon_size ) {
                $icon_classes[] = $icon_size;
            }

            $icon_color = get_sub_field('icon_color');
            if ( $icon_color['theme_colors'] ) {
                $icon_classes[] = 'text-' . $icon_color['theme_colors'];
            }

        }

        // content
        $video_type = get_sub_field('video_type');
        if ( $video_type == 'youtube' ) {

            $youtube_video = get_sub_field('youtube_video');

            $icon_classes[] = 'wp-video-popup';

            $icon_classes = esc_attr( trim( implode(' ', $icon_classes ) ) );

            echo do_shortcode('[wp-video-popup video="'. $youtube_video .'"]');
            echo '<a type="button" class="'. $icon_classes .'">'. $icon .'</a>'; // trigger icon
            
        }

        

    }

    
    
endif;