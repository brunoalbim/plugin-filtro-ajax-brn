<?php
/**
 * Plugin Name: Filtro Customizado em Ajax para Elementor
 * Description: Adicione um filtro de categoria personalizado usando checkboxes. <a href="https://wleads.link/go/filtro-customizado-em-ajax-para-elementor">Documentação aqui.</a>
 * Version: 1.0.3
 * Author: Bruno A.
 */

function my_query_by_post_types( $query ) {
    $query->set( 'category_name', $_GET['filtro'] );
}
add_action( 'elementor/query/my_custom_filter_brn', 'my_query_by_post_types' );

function generate_category_checkboxes_shortcode() {
    $categories = get_categories();
    
    ob_start();

    if (!empty($categories)) {
        foreach ($categories as $category) {
            echo '<label><input type="checkbox" class="checkbox-categoria" name="category_filter" value="' . esc_attr($category->slug) . '"> ' . esc_html($category->name) . '</label><br>';
        }
    }

    return ob_get_clean();
}
add_shortcode('category_checkboxes_brn', 'generate_category_checkboxes_shortcode');


function custom_category_filter_enqueue_scripts() {
    wp_enqueue_script('plugin-filtro-ajax-brn', plugin_dir_url(__FILE__) . 'assets/js/master.js', array('jquery'), '1.0', true);
    wp_enqueue_style('plugin-filtro-ajax-brn', plugin_dir_url(__FILE__) . 'assets/css/master.css');
}
add_action('wp_enqueue_scripts', 'custom_category_filter_enqueue_scripts');

