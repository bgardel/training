<?php
/*
    =========================
    ADMIN PAGE
    =========================
*/

function adc_add_admin_page() {
    //Generate Custom Admin Page
    add_menu_page('ADC Theme Options', 'ADC', 'manage_options', 'adc_options', 'adc_theme_create_page', 'dashicons-admin-customizer', 110);

    //Generate Custom Admin Sub pages
    add_submenu_page('adc_options', 'ADC Theme Options', 'General', 'manage_options', 'adc_options', 'adc_theme_create_page');
    add_submenu_page('adc_options', 'ADC CSS Options', 'Custom CSS', 'manage_options', 'adc_options_css', 'adc_theme_settings_page');

    //Activate custom settings
    add_action('admin_init', 'adc_custom_settings');
}
add_action('admin_menu', 'adc_add_admin_page');

function adc_custom_settings() {
    register_setting('adc-settings-group', 'first_name');
    register_setting( 'adc-settings-group', 'last_name');
    register_setting( 'adc-settings-group', 'user_description');
    register_setting( 'adc-settings-group', 'twitter_handler', 'adc_sanitize_twitter_handler');
    register_setting( 'adc-settings-group', 'facebook_handler');
    register_setting( 'adc-settings-group', 'gplus_handler');

    add_settings_section('adc-sidebar-options', 'Sidebar Options', 'adc_sidebar_options', 'adc_options');

    add_settings_field('sidebar-name', 'Full Name', 'adc_sidebar_name', 'adc_options', 'adc-sidebar-options');
    add_settings_field('sidebar-description', 'Description', 'adc_sidebar_description', 'adc_options', 'adc-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter handler', 'adc_sidebar_twitter', 'adc_options', 'adc-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook handler', 'adc_sidebar_facebook', 'adc_options', 'adc-sidebar-options');
    add_settings_field('sidebar-gplus', 'Google+ handler', 'adc_sidebar_gplus', 'adc_options', 'adc-sidebar-options');
}

function adc_sidebar_options() {
    echo 'Customize your sidebar information';
}

function adc_sidebar_name() {
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function adc_sidebar_description() {
    $description = esc_attr(get_option('user_description'));
    echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}

function adc_sidebar_twitter() {
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Inpur your Twitte username without the @ character.</p>';
}

function adc_sidebar_facebook() {
    $facebook = esc_attr(get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}

function adc_sidebar_gplus() {
    $gplus = esc_attr(get_option('gplus_handler'));
    echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

//Sanitization settings
function adc_sanitize_twitter_handler($input) {
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}

function adc_theme_create_page() {
    require_once(get_template_directory() . '/inc/templates/adc-admin.php');
}

function adc_theme_settings_page() {
    echo '<h1>Custom CSS</h1>';
}
