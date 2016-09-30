<?php

// create custom plugin settings menu
add_action('admin_menu', 'lds_plugin_create_menu');

function lds_plugin_create_menu() {

	//create new top-level menu
	add_menu_page('LDS Plugin Settings', 'LDS Settings', 'administrator', __FILE__, 'lds_plugin_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_lds_plugin_settings' );
}


function register_lds_plugin_settings() {
	//register our settings
	register_setting( 'lds-plugin-settings-group', 'no_carteles' );
	register_setting( 'lds-plugin-settings-group', 'banner' );
	register_setting( 'lds-plugin-settings-group', 'text_cita' );
	register_setting( 'lds-plugin-settings-group', 'text_autor' );
	register_setting( 'lds-plugin-settings-group', 'background' );
}

function lds_plugin_settings_page() {
?>
<div class="wrap">
<h1>LDS Theme</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'lds-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'lds-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">


        <th scope="row">Cantidad de Carteles</th>
        <td><input type="number" name="no_carteles" class="small-text" value="<?php echo esc_attr( get_option('no_carteles') ); ?>" /></td>
        </tr>

        <th scope="row">URL Banner</th>
        <td><input type="text" name="banner" class="regular-text" value="<?php echo esc_attr( get_option('banner') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Text Cita</th>
        <td><input type="text" name="text_cita" class="regular-text" value="<?php echo esc_attr( get_option('text_cita') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Text Autor</th>
        <td><input type="text" name="text_autor" class="regular-text" value="<?php echo esc_attr( get_option('text_autor') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Background</th>
        <td><input type="text" name="background" class="regular-text" value="<?php echo esc_attr( get_option('background') ); ?>" /></td>
        </tr>


    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php }
