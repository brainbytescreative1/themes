<?php

/*
register_post_type('staff', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail','taxonomies'),
    'rewrite' => array('slug' => 'staff'),
    'has_archive' => false,
    'public' => true,
    'labels' => array(
        'name' => 'Staff',
        'add_new_item' => 'Add New Staff Member',
        'edit_item' => 'Edit_Staff_Member',
        'all_items' => 'All Staff',
        'singular_name' => 'Contractor'
    ),
    'menu_icon' => 'dashicons-buddicons-buddypress-logo',
    'taxonomies' => array
    (
        'staff_category',
        'post_tag'
    )
));

// register staff categories
register_taxonomy('staff_category', 'staff', array(
    'label' => 'Categories',
    'rewrite' => array('slug' => 'staff-category'),
    'show_in_rest' => true,
    'hierarchical' => true,
    'show_admin_column' => true
));

// register staff tags
/*
register_taxonomy('staff_tags', 'staff', array(
    'label' => 'Tags',
    'rewrite' => array('slug' => 'staff-tags'),
    'show_in_rest' => true
));
*/

/*
register_post_type('locations', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail','taxonomies'),
    'rewrite' => array('slug' => 'locations'),
    'has_archive' => false,
    'has_front' => false,
    'public' => true,
    'labels' => array(
        'name' => 'Locations',
        'add_new_item' => 'Add New Location',
        'edit_item' => 'Edit Location',
        'all_items' => 'All Locations',
        'singular_name' => 'Location'
    ),
    'menu_icon' => 'dashicons-post-status',
    'taxonomies' => array
    (
        'locations_category',
        'post_tag'
    )
));

// register locations categories
register_taxonomy('locations_category', 'locations', array(
    'label' => 'Categories',
    'rewrite' => array('slug' => 'locations-category'),
    'show_in_rest' => true,
    'hierarchical' => true,
    'show_admin_column' => true
));
*/

// change blog URL prefix
function add_rewrite_rules( $wp_rewrite )
{
    $new_rules = array(
        'blog/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
    );

    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'add_rewrite_rules'); 

function change_blog_links($post_link, $id=0){

    $post = get_post($id);

    if( is_object($post) && $post->post_type == 'post'){
        return home_url('/blog/'. $post->post_name.'/');
    }

    return $post_link;
}
add_filter('post_link', 'change_blog_links', 1, 3);

// change blog excerpt length
function my_excerpt_length($length){ 
    return 30; 
} 
add_filter('excerpt_length', 'my_excerpt_length');

function all_excerpts_get_more_link( $post_excerpt ) {

    return $post_excerpt . '<a class="btn btn-secondary understrap-read-more-link" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'understrap' ) . '</a>';
}
//add_filter( 'wp_trim_excerpt', 'all_excerpts_get_more_link' );

