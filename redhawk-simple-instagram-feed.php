<?php
/**
* Plugin Name: Red Hawk Simple instagram feed
* Plugin URI: www.entiven.com
* Description: This is a simple plugin for share your latest 10 photos of your instagram feed.
* Version: 1.1
* Author: Red Hawk Group - entiven
* License: FREE
* Licence URI: http://www.entiven.com
* Tags: Instagram, feed, 10, photos, grid, list, table, latest, featured, simple grid, instagram grid
* Author URI: www.entiven.com
* Text Domain: rhsif_entiven_lang
**/
if (!defined('ABSPATH')) exit;
add_action( 'plugins_loaded', 'rhsif_entiven_lang' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function rhsif_entiven_lang() 
{//LOAD .PO & .MO FILES
  load_plugin_textdomain('rhsif_entiven_lang',false,plugin_basename(dirname(__FILE__ )).'/languages'); 
}

add_action( 'admin_menu','rhsif_entiven_admin' );
function rhsif_entiven_admin() {
		add_menu_page(
                  'Redhawk - Simple Instagram',
		          'Simple Instagram',
                  'manage_options',
                  'redhawk-simple-instagram-plugin',
                  'rhsif_entiven_page',
                  plugins_url('assets/images/redhawk-plugins-ico.png',__FILE__),6
                  );
}
	add_action('admin_init', 'rhsif_entiven_group');
	if(!function_exists('rhsif_entiven_group')) 
	{
		function rhsif_entiven_group() 
		{
			register_setting('rhsif_entiven_group', 'rhsif_entiven_redhawk_1');
			register_setting('rhsif_entiven_group', 'rhsif_entiven_redhawk_2');
			register_setting('rhsif_entiven_group', 'rhsif_entiven_redhawk_check');
			register_setting('rhsif_entiven_group', 'rhsif_entiven_redhawk_set_color');
			register_setting('rhsif_entiven_group', 'rhsif_entiven_redhawk_set_text');
			register_setting('rhsif_entiven_group', 'rhsif_entiven_redhawk_set_text_color');
			register_setting('rhsif_entiven_group', 'rhsif_entiven_redhawk_set_icon_color');


		}
	}
	function rhsif_entiven_page() 
	{
		include_once('includes/controller/options.php');
		rhsif_instagram_feed_options();
	}
function rhsif_entiven_dpf() 
{

//GET INSTAGRAM USER ID
		include_once('includes/controller/rhsi_simple-instagram-feed-guID.php');
		$rhsif_username = get_option('rhsif_entiven_redhawk_1');
		$rhsif_userid = rhsif_get_instagram_user_ID($rhsif_username);
		$rhsif_accessToken = "708865002.3a81a9f.105a780748714934b5c98b7695411664";
		$rhsif_countPhotos = get_option('rhsif_entiven_redhawk_2');
		
		$rhsif_json_link =	"https://api.instagram.com/v1/users/{$rhsif_userid}/media/recent/?";
		$rhsif_json_link.=	"access_token={$rhsif_accessToken}&count={$rhsif_countPhotos}";

		$rhsif_json = file_get_contents($rhsif_json_link);
		$rhsif_obj  = json_decode($rhsif_json, true, 512, JSON_BIGINT_AS_STRING);

		?>
		<div id="rdh_sif_group_instafeed">
		<?php
		if(get_option('rhsif_entiven_redhawk_check')=='SI')
		{
			include_once('includes/rhsif_simple_instagram_feed_grid.php');
			echo "<ul>";
			foreach($rhsif_obj["data"] as $post)
			{
				$rhsif_entiven_link = $post['link'];
				$rhsif_entiven_text = $post['caption']['text'];
				$rhsif_entiven_likes = $post['likes']['count'];
				$rhsif_entiven_comments =$post['comments']['count'];
				$rhsif_entiven_image = str_replace( 'http://', 'https://', $post['images']['standard_resolution']['url'] );
				$$rhsif_entiven_time = date("F j, Y", $post['caption']['created_time']);
		    	$rhsif_entiven_time = date("F j, Y", strtotime($rhsif_entiven_time . " +1 days"));
				rhsif_simple_instagram_feed_grids($rhsif_entiven_link,$rhsif_entiven_text,$rhsif_entiven_likes,$rhsif_entiven_comments,$rhsif_entiven_image,$rhsif_entiven_time);
			}
			echo "</ul>";
		}
		else
		{
			include_once('includes/rhsif_simple_instagram_feed_list.php');
			echo "<ul>";
				foreach($rhsif_obj["data"] as $post)
				{
				$rhsif_entiven_link = $post['link'];
				$rhsif_entiven_text = $post['caption']['text'];
				$rhsif_entiven_likes = $post['likes']['count'];
				$rhsif_entiven_comments =$post['comments']['count'];
				$rhsif_entiven_image = str_replace( 'http://', 'https://', $post['images']['standard_resolution']['url'] );
				$$rhsif_entiven_time = date("F j, Y", $post['caption']['created_time']);
		    	$rhsif_entiven_time = date("F j, Y", strtotime($rhsif_entiven_time . " +1 days"));
				rhsif_simple_instagram_feed_list($rhsif_entiven_link,$rhsif_entiven_text,$rhsif_entiven_likes,$rhsif_entiven_comments,$rhsif_entiven_image,$rhsif_entiven_time);
				}
			echo "</ul>";
		}
		?>
		</div>
		<?php
}

add_shortcode('rhsif_entiven','rhsif_entiven');	
function rhsif_entiven() 
{
	   return rhsif_entiven_dpf();
}		

add_action( 'admin_enqueue_scripts', 'rhsif_entiven_assets' );
function rhsif_entiven_assets() {
wp_enqueue_script('rhsif_entiven_js',plugins_url('assets/js/redhawk.js',__FILE__), array( 'jquery' ) );
wp_register_style('rhsif_entiven_css1',plugins_url('assets/css/style.css',__FILE__));
wp_enqueue_style('rhsif_entiven_css1');
}


add_action('wp_enqueue_scripts','rhsif_entiven_front');
function rhsif_entiven_front()
{
	wp_register_style('rhsif_entiven_css_front',plugins_url('assets/css/front-end.css',__FILE__));
	wp_register_style('rhsif_entiven_css_icons', plugins_url('assets/css/materialdesignicons.min.css', __FILE__));
	wp_enqueue_style(array('rhsif_entiven_css_front','rhsif_entiven_css_icons'));
}


?>