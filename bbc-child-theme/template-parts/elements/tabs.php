<?php

if( get_row_layout() == 'tabbed_content' ):

    // get fields
    $tabs = get_sub_field('tabs');

    if ( $tabs ) {

        // wrapper
        $tabs_wrapper_classes = [];
        $tabs_wrapper_classes[] = 'tabs-wrapper';
        $tabs_wrapper_classes[] = 'tabs-element';

        // tabs
        $tabs_classes = [];
        $tabs_classes[] = 'nav';
        $tabs_classes[] = 'nav-pills';
        $tabs_classes[] = 'nav-justified';
        $tabs_classes[] = 'mb-2';

        $button_classes = [];
        $button_classes[] = 'nav-link';
        $button_classes[] = 'rounded-pill';
        $button_classes[] = 'py-1';

        // content
        $tab_content_classes = [];
        $tab_content_classes[] = 'tab-content';

        $tab_pane_classes = [];
        $tab_pane_classes[] = 'tab-pane';
        $tab_pane_classes[] = 'fade';
        $tab_pane_classes[] = 'show';

        $tab_content_inner_classes = [];
        $tab_content_inner_classes[] = 'd-flex';
        $tab_content_inner_classes[] = 'tab-content-inner';
        $tab_content_inner_classes[] = 'p-0';

        $tab_image_classes = [];
        $tab_image_classes[] = 'tab-image';
        $tab_image_classes[] = 'light-half-background';
        $tab_image_classes[] = 'rainbow-border-bottom';

        $tab_image_inner_classes = [];
        $tab_image_inner_classes[] = 'tab-image-inner';
        $tab_image_inner_classes[] = 'rounded-bottom';
        $tab_image_inner_classes[] = 'rounded-pill';

        $tab_text_classes = [];
        $tab_text_classes[] = 'tab-text';
        $tab_text_classes[] = 'flex-grow-1';
        $tab_text_classes[] = 'bg-light';
        $tab_text_classes[] = 'no-margin-bottom';
        $tab_text_classes[] = 'rounded-end';
        $tab_text_classes[] = 'd-flex';
        $tab_text_classes[] = 'flex-column';
        $tab_text_classes[] = 'justify-content-center';

        // heading
        $heading_classes = [];
        $heading_settings = get_sub_field('heading_settings');
        $tag = $heading_settings['tag'];

        $heading_classes[] = 'mb-0';

        if ( $heading_settings['font_size'] && ( $heading_settings['font_size'] !== 'default' ) ) {
            $heading_classes[] = $heading_settings['font_size'];
            $heading_classes[] = 'tabs-font-size';
        }
        if ( $heading_settings['font_weight'] && ( $heading_settings['font_weight'] !== 'default' ) ) {
            $heading_classes[] = 'weight-' . $heading_settings['font_weight'];
        }
        if ( $heading_settings['font_family'] && ( $heading_settings['font_family'] !== 'default' ) ) {
            $heading_classes[] = 'font-' . $heading_settings['font_family'];
        }

        $tabs_wrapper_classes[] = get_spacing_bbc(get_sub_field('tabs_spacing'));

        // advanced
        $tabs_id = 'tabs-' . rand(0,9999);
        $tab_id = rand(0,9999);
        
        $additional_classes = get_sub_field('additional_classes');
        if ( $additional_classes ) {
            $tabs_wrapper_classes[] = $additional_classes;
        }

        // process tabs classes and styles
        $tabs_wrapper_classes = trim(implode(' ', $tabs_wrapper_classes));
        $tabs_classes = trim(implode(' ', $tabs_classes));
        $tab_pane_classes = trim(implode(' ', $tab_pane_classes));
        $tab_content_classes = trim(implode(' ', $tab_content_classes));
        $button_classes = trim(implode(' ', $button_classes));
        $heading_classes = trim(implode(' ', $heading_classes));
        $tab_content_inner_classes = trim(implode(' ', $tab_content_inner_classes));
        $tab_image_classes = trim(implode(' ', $tab_image_classes));
        $tab_image_inner_classes = trim(implode(' ', $tab_image_inner_classes));
        $tab_text_classes = trim(implode(' ', $tab_text_classes));
        
        ?>

        <div class="<?=$tabs_wrapper_classes?>">
            <!-- Nav tabs -->
            <ul class="<?=$tabs_classes?>" id="<?=$tabs_id?>" role="tablist">
                <?php
                $tabs_count = 0;
                $tab_count = $tab_id;
                $active = 'active';
                $active_button = 'active';
                $selected = 'true';
                foreach ($tabs as $tab ) {
                    $tabs_count++;
                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="<?=$button_classes?> <?=$active?>" id="tab<?=$tab_count?>-tab" data-bs-toggle="tab" data-bs-target="#tab<?=$tab_count?>" type="button" role="tab" aria-controls="tab<?=$tab_count?>" aria-selected="<?=$active?>">
                            <?php if ( $tab['heading'] ) { ?>
                                <<?=$tag?> class="<?=$heading_classes?>"><?=$tab['heading']['text']?></<?=$tag?>>
                            <?php } ?>
                        </button>
                    </li>
                    <?php
                    if ( $active === 'active' ) {
                        $active = '';
                        $active_button = '';
                    }
                    if ( $selected === 'false' ) {
                        $selected = '';
                    }
                    $tab_count++;
                }
                ?>
            </ul>

            <!-- nav content -->
            <div class="<?=$tab_content_classes?>">
                <?php
                $tabs_count = 0;
                $tab_count = $tab_id;
                $active = 'active';
                foreach ($tabs as $tab ) {
                    $tabs_count++;
                    $tab_text = $tab['text'];
                    $tab_text_content = $tab_text['text'];
                    $tab_image = $tab['image'];
                    $image = $tab_image['image'];
                    $has_image = '';
                    $show_image = '';
                    
                    ?>
                    <div class="<?=$tab_pane_classes?> <?=$active?>" id="tab<?=$tab_count?>" role="tabpanel" aria-labelledby="tab<?=$tab_count?>-tab">
                        <div class="<?=$tab_content_inner_classes?>">
                            <?php
                            if ( $image ) {
                                // Image variables.
                                $url = $image['url'];

                                // Thumbnail size attributes.
                                $size = 'medium_large';
                                $thumb = $image['sizes'][ $size ];

                                $has_image = ' py-3 px-2';
                                $show_image = ' col-md-5';

                                ?>
                                <div class="<?=$tab_image_classes?><?=$show_image?>">
                                    <div class="<?=$tab_image_inner_classes?>" style="background: url(<?php echo esc_url($thumb); ?>)"></div>
                                </div>
                            <?php } ?>
                            
                            <?php if ( $tab_text ) { ?>
                                <div class="<?=$tab_text_classes?><?=$has_image?>">
                                    <?=$tab_text_content?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    if ( $active === 'active' ) {
                        $active = '';
                    }
                    $tab_count++;
                }
                ?>
            </div>
        </div>

    <?php }

endif;