<?php
/*
Plugin Name: MS header
Plugin URI: http://sourceoftools.com
Description: This is custom plugin for custom header for client.
Version: 1.0
Author: Mostafiz Shabbir
Author URI: http://facebook.com/shabbir4g
*/



add_action('wp_enqueue_scripts','ms_plugin_scripts');

function ms_plugin_scripts(){
	
	wp_enqueue_style('ms-plugin-css',PLUGINS_URL('css/style.css',__FILE__));
	wp_enqueue_style('ms-plugin-js',PLUGINS_URL('js/scripts.js',__FILE__));
	
}




add_shortcode('header-logo', 'advance_portfolio_output');

function advance_portfolio_output(){
	ob_start(); ?>

		<div class="special-header">
        
  <!-- Partnerleiste ANFANG -->

<div id="logo-leiste">



<div class="crossmedia-werbepartner">CROSSMEDIA<br>WERBEPARTNER</div>


<?php $logos = new WP_Query([
	'post_type'				=> 'headerlogo',
	'posts_per_page'		=> 4,
	
]); 


while($logos->have_posts()):  $logos->the_post(); ?>
<div class="logo" style="display: block;">
<a class="logo-link" href="<?php echo get_post_meta(get_the_id(),'link-logo', true); ?>">
<img src="<?php echo get_post_meta(get_the_id(),'nr-logo', true); ?>" alt="" />
<img src="<?php echo get_post_meta(get_the_id(),'hv-logo', true); ?>" alt="" />
</a>
</div>
<?php endwhile; ?>


      </div>
      </div>
	

	<?php return ob_get_clean();
}



/**
 * CMB2  include
 */
add_action('init', 'callback');
function callback(){
	require(plugin_dir_path( __FILE__ ) . 'lib/cmb/init.php');
require(plugin_dir_path( __FILE__ ) . 'lib/cmb/config.php');
}


/* Register Post Type with category */
		add_action( 'after_setup_theme', 'ready_setup' );
		
		function ready_setup(){
			$labels = array(
				'name'               => __( 'Header Logo', 'ready' ),
				'singular_name'      => __( 'Header Logo', 'ready' ),
				'menu_name'          => __( 'Header Logos', 'ready' ),
				'name_admin_bar'     => __( 'Header Logo', 'ready' ),
				'add_new'            => __( 'Add Logo', 'ready' ),
				'add_new_item'       => __( 'Add New Logo', 'ready' ),
				'new_item'           => __( 'New Logo', 'ready' ),
				'edit_item'          => __( 'Edit Logo', 'ready' ),
				'view_item'          => __( 'View Logo', 'ready' ),
				'all_items'          => __( 'All Logo', 'ready' ),
				'search_items'       => __( 'Search Logo', 'ready' ),
				'parent_item_colon'  => __( 'Parent Logo:', 'ready' ),
				'not_found'          => __( 'No Logo found.', 'ready' ),
				'not_found_in_trash' => __( 'No Logo found in Trash.', 'ready' )
			);

			$args = array(
				'labels'             => $labels,
				'description'        => __( 'Description.', 'ready' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'News' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'menu_icon'      	 => 'dashicons-smiley',
				'supports'           => array( 'title', )
			);

			register_post_type( 'headerlogo', $args );

			
			
		}
		