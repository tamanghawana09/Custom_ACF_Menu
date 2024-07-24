<?php
/**
 * Plugin Name: Test Plugin
 * Description: This is a custom plugin for CPT of movies
 * Author: Hawana Tamang
 * Version: 1.0.0
 */

// Creating a Custom Post Type
if (!function_exists('create_movie_cpt')) {
    function create_movie_cpt() {
        $labels = array(
            'name' => _x('Movies', 'Post Type General Name', 'textdomain'),
            'singular_name' => _x('Movie', 'Post Type Singular Name', 'textdomain'),
            'menu_name' => __('Movies', 'textdomain'),
            // Add other labels as needed
        );
        $args = array(
            'label' => __('Movie', 'textdomain'),
            'description' => __('Movie Custom Post Type', 'textdomain'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
            'taxonomies' => array('movie_category'), // Link to taxonomy
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        register_post_type('movie', $args);
    }
    add_action('init', 'create_movie_cpt');
}

if (!function_exists('create_movie_taxonomy')) {
    function create_movie_taxonomy() {
        $labels = array(
            'name' => _x('Movie Categories', 'taxonomy general name', 'textdomain'),
            'singular_name' => _x('Movie Category', 'taxonomy singular name', 'textdomain'),
            'search_items' => __('Search Movie Categories', 'textdomain'),
            // Add other labels as needed
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'movie-category'),
        );

        register_taxonomy('movie_category', array('movie'), $args);
    }
    add_action('init', 'create_movie_taxonomy', 0);
}

?>