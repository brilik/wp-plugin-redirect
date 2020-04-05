<div>
    <h2><?php _e( 'New domains settings', PLUGIN_SLUG ); ?></h2>
    <form method="post" action="options.php">
        <label for="<?php echo PLUGIN_SLUG; ?>_option_name"><?php _e( 'New domain name for redirect', PLUGIN_SLUG ); ?></label>
        <input type="url" id="<?php echo PLUGIN_SLUG; ?>_option_name" name="<?php echo PLUGIN_SLUG; ?>_option_name" value="<?php echo get_option( PLUGIN_SLUG . '_option_name' ); ?>">
        <input type="checkbox" name="<?php echo PLUGIN_SLUG; ?>_option_redirect"<?php echo $checked; ?>>
		<?php settings_fields( PLUGIN_SLUG . '_options_group' ); ?>
		<?php submit_button(); ?>
    </form>
</div>