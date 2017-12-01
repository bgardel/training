<h1>ADC Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields('adc-settings-group'); ?>
    <?php do_settings_sections('adc_options') ?>
    <?php submit_button(); ?>
</form>
