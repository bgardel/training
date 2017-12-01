<?php
/*
    =========================
    ADMIN PAGE
    =========================
*/

function adc_add_admin_page() {
    //Generate Custom Admin Page
    add_menu_page( 'ADC Theme Options', 'ADC', 'manage_options', 'adc_options', 'adc_theme_create_page', 'dashicons-admin-customizer', 110 );

    //Generate Custom Admin Sub pages
    add_submenu_page('adc_options', 'ADC Theme Options', 'General', 'manage_options', 'adc_options', 'adc_theme_create_page');
    add_submenu_page('adc_options', 'ADC CSS Options', 'Custom CSS', 'manage_options', 'adc_options_css', 'adc_theme_settings_page');
}
add_action('admin_menu', 'adc_add_admin_page');

function adc_theme_create_page() {
    require_once( get_template_directory() . '/inc/templates/adc-admin.php' );
}

function adc_theme_settings_page() {
    echo '<h1>Custom CSS</h1>';
}
