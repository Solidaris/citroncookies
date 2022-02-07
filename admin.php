<?php
if (!is_admin()) {
    die();
}
?>
<div class="wrap">
	<h2><?php _e('Citron Cookies','citron-cookies'); ?></h2>
</div>
<form method="post" action="options.php">
	<?php
		echo settings_fields( 'citron_cookies' );
    ?>
	
	<table class="form-table form-v2">
		<tr valign="top">
			<th scope="row"><?php _e('Fichiers Tarteaucitron.js','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_filesOp" value="local" <?php checked("local", get_option('citron_cookies_filesOp')) ?>> <?php _e('Local', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_filesOp" value="cdn" <?php checked("cdn", get_option('citron_cookies_filesOp')) ?>> <?php _e('CDN', 'citron-cookies') ?></label></p>
				<p><ul><li><input type="text" id="citron_cookies_filesURL" name="citron_cookies_filesURL" class="regular-text" value="<?php echo get_option('citron_cookies_filesURL'); ?>" /></li></ul></p>
			</td>
		</tr>
        <tr valign="top">
            <th scope="row"><label for="citroncookies_services"><?php _e('Services Options','citron-cookies'); ?> : </span></label></th>
            <td>
				<fieldset>
					<p><a href="https://opt-out.ferank.eu/fr/install/"><?php _e('Installation guide','citron-cookies'); ?></a></p>
					<p>
						<textarea type="text" id="citroncookies_services" name="citron_cookies_services" cols="100" rows="20" class="large-text code"><?php echo get_option('citron_cookies_services'); ?></textarea>
					</p>
				</fieldset>
			</td>
        </tr>
		<tr valign="top">
            <th scope="row"><label for="citroncookies_op_privacyUrl"><?php _e('Privacy URL','citron-cookies'); ?> : </span></label></th>
            <td>
				<input type="text" id="citroncookies_op_privacyUrl" name="citron_cookies_op_privacyUrl" class="regular-text" value="<?php echo get_option('citron_cookies_op_privacyUrl'); ?>" />
			</td>
        </tr>
		<tr valign="top">
			<th scope="row"><?php _e('Orientation','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_orientation" value="top" <?php checked("top", get_option('citron_cookies_op_orientation')) ?>> <?php _e('Top', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_orientation" value="bottom" <?php checked("bottom", get_option('citron_cookies_op_orientation')) ?>> <?php _e('Bottom', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Show Alert Small','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_showAlertSmall" value="true" <?php checked("true", get_option('citron_cookies_op_showAlertSmall')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_showAlertSmall" value="false" <?php checked("false", get_option('citron_cookies_op_showAlertSmall')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Cookies List','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_cookieslist" value="true" <?php checked("true", get_option('citron_cookies_op_cookieslist')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_cookieslist" value="false" <?php checked("false", get_option('citron_cookies_op_cookieslist')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Adblocker','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_adblocker" value="true" <?php checked("true", get_option('citron_cookies_op_adblocker')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_adblocker" value="false" <?php checked("false", get_option('citron_cookies_op_adblocker')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Hight Privacy','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_highPrivacy" value="true" <?php checked("true", get_option('citron_cookies_op_highPrivacy')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_highPrivacy" value="false" <?php checked("false", get_option('citron_cookies_op_highPrivacy')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Deny All Cta','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_DenyAllCta" value="true" <?php checked("true", get_option('citron_cookies_op_DenyAllCta')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_DenyAllCta" value="false" <?php checked("false", get_option('citron_cookies_op_DenyAllCta')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Accept All Cta','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_AcceptAllCta" value="true" <?php checked("true", get_option('citron_cookies_op_AcceptAllCta')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_AcceptAllCta" value="false" <?php checked("false", get_option('citron_cookies_op_AcceptAllCta')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('handleBrowserDNTRequest','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_handleBrowserDNTRequest" value="true" <?php checked("true", get_option('citron_cookies_op_handleBrowserDNTRequest')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_handleBrowserDNTRequest" value="false" <?php checked("false", get_option('citron_cookies_op_handleBrowserDNTRequest')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Remove Credit','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_removeCredit" value="true" <?php checked("true", get_option('citron_cookies_op_removeCredit')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_removeCredit" value="false" <?php checked("false", get_option('citron_cookies_op_removeCredit')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('More Info Link','citron-cookies'); ?> : </span></th>
			<td>
				<p><label><input type="radio" name="citron_cookies_op_moreInfoLink" value="true" <?php checked("true", get_option('citron_cookies_op_moreInfoLink')) ?>> <?php _e('Yes', 'citron-cookies') ?></label></p>
				<p><label><input type="radio" name="citron_cookies_op_moreInfoLink" value="false" <?php checked("false", get_option('citron_cookies_op_moreInfoLink')) ?>> <?php _e('No', 'citron-cookies') ?></label></p>
			</td>
		</tr>
		
		
		
    </table>
	
	<?php submit_button(); ?>
	
</form>