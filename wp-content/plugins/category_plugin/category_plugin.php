<?php
/**
 * Plugin Name: Category Plugin
 * Description: This is a test category plugin.
 * Author: Hawana Tamang
 * Version: 1.0.0
 */

// Add custom admin menu
function custom_admin_menu() {
    add_menu_page(
        'Movie Categories',      // Page title
        'Movie Categories',      // Menu title
        'manage_options',        // Capability required to view the page
        'custom-categories',     // Menu slug
        'display_categories',    // Function to display the page content
        'dashicons-category',    // Icon for the menu
        6                        // Position in the menu
    );

    // Register a hidden submenu page for displaying posts by category
    add_submenu_page(
        null,                   // Parent slug (null means it's hidden)
        'Posts by Category',    // Page title
        'Posts by Category',    // Menu title (not shown)
        'manage_options',       // Capability required to view the page
        'posts-by-category',    // Menu slug
        'display_posts_by_category' // Function to display the page content
    );
}
add_action('admin_menu', 'custom_admin_menu');

// Display custom taxonomy terms
function display_categories() {
    echo '<div class="wrap">';
    echo '<h1>Movie Categories</h1>';
    echo '<ul>';

    $movie_categories = get_terms(array(
        'taxonomy' => 'movie_category',
        'hide_empty' => false,
    ));

    if (!empty($movie_categories) && !is_wp_error($movie_categories)) {
        foreach ($movie_categories as $category) {
            $category_link = admin_url('admin.php?page=posts-by-category&category_id=' . $category->term_id);
            echo '<li><a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a></li>';
        }
    } else {
        echo '<li>No categories found.</li>';
    }

    echo '</ul>';
    echo '</div>';
}

// Display posts by selected category
function display_posts_by_category() {
    if (!isset($_GET['category_id'])) {
        echo '<div class="wrap"><h1>No Category Selected</h1></div>';
        return;
    }

    $category_id = intval($_GET['category_id']);
    $category = get_term($category_id, 'movie_category');

    if (is_wp_error($category) || !$category) {
        echo '<div class="wrap"><h1>Invalid Category</h1></div>';
        return;
    }

    echo '<div class="wrap">';
    echo '<h1>Posts in Category: ' . esc_html($category->name) . '</h1>';
    echo '<ul>';

    // Fetch posts from the selected category
    $posts = get_posts(array(
        'post_type' => 'movie',
        'tax_query' => array(
            array(
                'taxonomy' => 'movie_category',
                'field' => 'term_id',
                'terms' => $category_id,
            ),
        ),
    ));

    if (!empty($posts)) {
        foreach ($posts as $post) {
            echo '<li><a href="' . get_edit_post_link($post->ID) . '">' . esc_html($post->post_title) . '</a></li>';
        }
    } else {
        echo '<li>No posts found in this category.</li>';
    }

    echo '</ul>';
    echo '</div>';
}
?>