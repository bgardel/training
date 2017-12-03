<h1>ADC Theme Options</h1>
<?php settings_errors(); ?>
<?php
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    $fullName = $firstName . ' ' . $lastName;
    $description = esc_attr(get_option('user_description'));
?>

<div class="adc-sidebar-preview">
    <div class="adc-sidebar">
        <h1 class="adc-username"><?php print $fullName ?></h1>
        <h2 class="adc-description"><?php print $description ?></h2>
        <div class="icons-wrapper">

        </div>
    </div>
</div>

<form method="post" action="options.php" class="adc-general-form">
    <?php settings_fields('adc-settings-group'); ?>
    <?php do_settings_sections('adc_options') ?>
    <?php submit_button(); ?>
</form>
