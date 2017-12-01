<?php
/*
    =========================
    ADMIN PAGE
    =========================
*/

function adc_add_admin_page() {
    add_menu_page( 'ADC Theme Options', 'ADC', 'manage_options', 'adc', 'adc_theme_create_page', 'dashicons-admin-customizer', 110 );
}
add_action('admin_menu', 'adc_add_admin_page');

function adc_theme_create_page() {
    echo '<h1>ADC Theme Options</h1>';
}
