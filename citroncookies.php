<?php
/*
Plugin Name: Citron Cookies
Plugin URI: http://www.solidaris.be
Description: Encapsulation du code tarteaucitron.js
Version: 1.2
Author: Morgan De Clerck (tdptce)
Author URI: mailto:morgan.declerck@solidaris.be
GitHub Plugin URI: Solidaris/citroncookies
*/

function citroncookies_load_tarteaucitron() {
	
	if(get_option('citron_cookies_filesOp') == 'local' || empty(get_option('citron_cookies_filesURL'))) {
		$filesULR = plugin_dir_url( __FILE__ ) . 'tarteaucitron/tarteaucitron.js';
	} else {
		$filesULR = get_option('citron_cookies_filesURL');
	}
	
  wp_enqueue_script('tarteaucitron', $filesULR);
} 
add_action('wp_enqueue_scripts', 'citroncookies_load_tarteaucitron');

function citroncookies_init() {
  ?><script type="text/javascript">
	var tarteaucitronForceLanguage = "fr";
      tarteaucitron.init({
        "privacyUrl": "<?php echo get_option('citron_cookies_op_privacyUrl') ?>", /* Privacy policy url */
        "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
        "cookieName": "tartaucitron", /* Cookie name */
        "orientation": "<?php echo get_option('citron_cookies_op_orientation') ?>", /* Banner position (top - bottom) */
        "showAlertSmall": <?php echo get_option('citron_cookies_op_showAlertSmall') ?>, /* Show the small banner on bottom right */
        "cookieslist": <?php echo get_option('citron_cookies_op_cookieslist') ?>, /* Show the cookie list */
		"closePopup": false,
		"showIcon": true,
        "adblocker": <?php echo get_option('citron_cookies_op_adblocker') ?>, /* Show a Warning if an adblocker is detected */
		"DenyAllCta" : <?php echo get_option('citron_cookies_op_DenyAllCta') ?>,
        "AcceptAllCta" : <?php echo get_option('citron_cookies_op_AcceptAllCta') ?>, /* Show the accept all button when highPrivacy on */
        "highPrivacy": <?php echo get_option('citron_cookies_op_highPrivacy') ?>, /* Disable auto consent */
        "handleBrowserDNTRequest": <?php echo get_option('citron_cookies_op_handleBrowserDNTRequest') ?>, /* If Do Not Track == 1, accept all */
        "removeCredit": <?php echo get_option('citron_cookies_op_removeCredit') ?>, /* Remove credit link */
        "moreInfoLink": <?php echo get_option('citron_cookies_op_moreInfoLink') ?>, /* Show more info link */
      });
    </script><?php
}    
add_action('wp_head', 'citroncookies_init');

function citroncookies_add_services() {
	echo '<script type="text/javascript">' . get_option('citron_cookies_services') . '</script>';
}

add_action('wp_footer', 'citroncookies_add_services');

// Auto
add_filter( 'embed_oembed_html', 'citroncookies_oembed_dataparse', PHP_INT_MAX, 4 );
function citroncookies_oembed_dataparse($cache, $url, $attr, $post_ID) {

	if (strpos($url, "youtube.com")) {
		parse_str( parse_url( $url, PHP_URL_QUERY ), $youtube_args );

		if ($youtube_args['v'] != "") {
			return "<script>jQuery(function() {(tarteaucitron.job = tarteaucitron.job || []).push('youtube');});</script><div class=\"youtube_player\" videoID=\"".$youtube_args['v']."\" width=\"100%\" height=\"100%\" style=\"height:240px\" theme=\"light\" rel=\"0\" controls=\"1\" showinfo=\"1\" autoplay=\"0\"></div>";
		}
	}

	if (strpos($url, "vimeo.com")) {
		$id = substr(parse_url($url, PHP_URL_PATH), 1);

		if ($id != "") {
			return "<script>jQuery(function() {(tarteaucitron.job = tarteaucitron.job || []).push('vimeo');});</script><div class=\"vimeo_player\" videoID=\"".$id."\" width=\"100%\" height=\"100%\" style=\"height:50vw\"></div>";
		}
	}

	if (strpos($url, "dailymotion.com")) {
		$id = end(explode("/", $url));

		if ($id != "") {
			return "<script>jQuery(function() {(tarteaucitron.job = tarteaucitron.job || []).push('dailymotion');});</script><div class=\"dailymotion_player\" videoID=\"".$id."\" width=\"100%\" height=\"100%\" style=\"height:50vw\" showinfo=\"1\" autoplay=\"0\"></div>";
		}
	}

	return $cache;
}

class CitronCookies {
	
	public static function init() {
		add_action( 'admin_init', array('CitronCookies', 'register_settings' ));
		add_action( 'admin_menu', array('CitronCookies', 'register_menu_page' ));
		
	}
	
	public static function register_settings() {

        /* user-configurable values */
        add_option('citron_cookies_services', '');
		add_option('citron_cookies_filesURL', 'https://cdn.jsdelivr.net/gh/AmauriC/tarteaucitron.js@v1.3/tarteaucitron.min.js');
		add_option('citron_cookies_filesOp', 'local');
		add_option('citron_cookies_op_privacyUrl', get_site_url());
        add_option('citron_cookies_op_orientation', 'bottom');
        add_option('citron_cookies_op_showAlertSmall', 'true');
		add_option('citron_cookies_op_cookieslist', 'true');
        add_option('citron_cookies_op_adblocker', 'false');
        add_option('citron_cookies_op_AcceptAllCta', 'true');
		add_option('citron_cookies_op_DenyAllCta', 'true');
        add_option('citron_cookies_op_highPrivacy', 'true');
        add_option('citron_cookies_op_handleBrowserDNTRequest', 'false');
        add_option('citron_cookies_op_removeCredit', 'false');
        add_option('citron_cookies_op_moreInfoLink', 'true');

        /* user-configurable value checking public static functions */
		register_setting( 'citron_cookies', 'citron_cookies_filesOp', '' );
		register_setting( 'citron_cookies', 'citron_cookies_filesURL', '' );
        register_setting( 'citron_cookies', 'citron_cookies_services', 'CitronCookies::filter_string' );
		register_setting( 'citron_cookies', 'citron_cookies_op_privacyUrl', 'CitronCookies::filter_string' );
        register_setting( 'citron_cookies', 'citron_cookies_op_orientation', '' );
        register_setting( 'citron_cookies', 'citron_cookies_op_showAlertSmall', '' );
        register_setting( 'citron_cookies', 'citron_cookies_op_cookieslist', '' );
        register_setting( 'citron_cookies', 'citron_cookies_op_adblocker', '' );
        register_setting( 'citron_cookies', 'citron_cookies_op_AcceptAllCta', '' );
		register_setting( 'citron_cookies', 'citron_cookies_op_highPrivacy', '' );
		register_setting( 'citron_cookies', 'citron_cookies_op_handleBrowserDNTRequest', '' );
        register_setting( 'citron_cookies', 'citron_cookies_op_removeCredit', '' );
        register_setting( 'citron_cookies', 'citron_cookies_op_moreInfoLink', '' );
    }

	
	public static function register_menu_page(){
        add_options_page(
			__('Citron Cookies','citron-cookies'), __('Citron Cookies','citron-cookies'), 'manage_options', plugin_dir_path(  __FILE__ ).'admin.php'
		);
    }
	
	public static function filter_string( $string ) {
        return trim(filter_var($string, FILTER_UNSAFE_RAW)); //must consist of valid string characters
    }
	
}

CitronCookies::init();