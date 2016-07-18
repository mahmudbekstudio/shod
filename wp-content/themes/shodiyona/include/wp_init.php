<?php
function my_custom_login_logo(){
	echo '<style type="text/css">.login h1 a {background-image:url(' . get_bloginfo('template_directory') . '/images/home/logo.png) !important;	background-size: 137px 60px; width: 137px; height: 60px;}</style>';
}
add_action('login_head', 'my_custom_login_logo');
add_filter('login_errors',create_function('$a', "return null;"));
/*if( !current_user_can( 'edit_users' ) ){
	add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
	add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
	add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
}*/

/*function web_init($a) {
    $support = array(
        'add' => array(
            'page' => array('excerpt'),
        ),
        'remove' => array(
            'page' => array('commentstatus', 'comments', 'slug', 'author'),
        ),
    );
    foreach ($support as $func_prefix => $items) {
        $func_name = $func_prefix . '_post_type_support';
        if (function_exists($func_name)) {
            foreach ($items as $post_type => $list) {
                foreach ($list as $item) {
                    call_user_func($func_name, $post_type, $item);
                }
            }
        }
    }
}
add_action('init', 'web_init');*/


function my_custom_login_url() {
  return site_url();
}
add_filter( 'login_headerurl', 'my_custom_login_url', 10, 4 );

function remove_menus(){
	global $menu, $submenu;
	$submenu_restricted=array('options-general.php'=>array('options-discussion.php'), 'edit.php'=>array('edit-tags.php?taxonomy=post_tag'));
	//$submenu
	foreach($submenu_restricted as $key=>$val)
	{
		if(!isset($submenu[$key])) continue;
		foreach($submenu[$key] as $key1=>$val1)
		{
			if(in_array($val1[0], $val) || in_array($val1[2], $val))
			{
				unset($submenu[$key][$key1]);
			}
		}
	}
	$restricted = array(__('Dashboard'), __('Media'), __('Comments'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ', $menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');
remove_action('wp_head', 'wp_generator');

/*function example_remove_dashboard_widgets() {
	global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
		//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );*/

/*function mytheme_admin_bar_render() {
    global $wp_admin_bar;//print_r($wp_admin_bar);exit;
    // we can remove a menu item, like the Comments link, just by knowing the right $id
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    // or we can remove a submenu, like New Link.
    $wp_admin_bar->remove_menu('new-post', 'new-content');
    $wp_admin_bar->remove_menu('new-link', 'new-content');
    $wp_admin_bar->remove_menu('new-media');
    $wp_admin_bar->remove_menu('new-user');
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('view-site');
    // we can add a submenu item too
    //$wp_admin_bar->add_menu( array(
    //    'parent' => 'new-content',
    //    'id' => 'new_media',
    //    'title' => __('Media'),
    //    'href' => admin_url( 'media-new.php')
    //) );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );*/

if(!current_user_can('add_users'))
{
	add_filter('show_admin_bar', '__return_false');
}
//widgets
function mg_widgets_init() {
	// Area 1, located at the top of the sidebar.
    register_sidebar( array(
        'name' => __( 'Language block' ),
        'id' => 'lang-block',
	    'class' => 'asdasd',
        'description' => __( 'Language block' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--h3>',
        'after_title' => '</h3-->',
    ) );

     register_sidebar( array(
        'name' => __( 'Subscribe block' ),
        'id' => 'subscribe-block',
        'description' => __( 'Subscribe block' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--h3>',
        'after_title' => '</h3-->',
    ) );

}
add_action( 'widgets_init', 'mg_widgets_init' );

//images
add_theme_support( 'post-thumbnails' );
add_image_size( 'category_thumb', 268, 249, true );
add_image_size( 'category_thumb_hover', 482, 448, true );
add_image_size( 'category_thumb_main', 355, 330, true );
add_image_size( 'category_map_thumbnail', 256, 256, true );
//add_image_size( 'medium_thumb', 220, 200, false );

function create_post_type() {
	/*register_post_type( 'photo',
		array(
			'labels' => array(
				'name' => __( 'Photo' ),
				'singular_name' => __( 'Photo' )
			),
			'public' => true,
			'publicly_queryable'=>true,
			'show_in_menu'=>true,
			'show_ui' => true,
			'query_var' => true,
			//'rewrite' => false,
			'exclude_from_search'=>false,
			'supports'=>array('title', 'editor', 'thumbnail', 'author', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats'),
			'taxonomies'=>array('product_category'),
			//'has_archive' => true,
			'rewrite' => array('slug' => 'product')
		)
	);*/
	/*register_post_type( 'photo',
		array(
			'labels' => array(
				'name' => __( 'Photo' ),
				'singular_name' => __( 'Photo' )
			),
			'public' => true,
			'publicly_queryable'=>false,
			'show_in_menu'=>true,
			'show_ui' => true,
			'query_var' => false,
			//'rewrite' => false,
			'exclude_from_search'=>true,
			'supports'=>array('title', 'thumbnail'
			//, 'excerpt', 'editor', 'custom-fields', 'page-attributes'
			),
			//'taxonomies'=>array('gallery'),
			//'has_archive' => true,
			'rewrite' => true//array('slug' => 'video')
		)
	);*/

	global $customPostTypes;
	foreach($customPostTypes as $name => $item) {
		register_post_type( $name,
			array(
				'labels' => array(
					'name' => __( $item['title'] ),
					'singular_name' => __( $item['title'] )
				),
				'public' => true,
				'publicly_queryable'=>true,
				'show_in_menu'=>true,
				'show_ui' => true,
				'query_var' => true,
				'exclude_from_search'=>false,
				'supports'=>array('title', 'editor', 'excerpt', 'thumbnail'),
				'rewrite' => array('slug' => $name)
			)
		);
	}
}
function create_taxanomy_type() {

	/*register_taxonomy('product_category','product',array(
		//'hierarchical' => false,
		'labels' => array('name' =>'Category products'),
        'hierarchical' => true,
        'show_ui' => true,
    	'query_var' => true,
    	'public' => true,
        //'show_ui' => true,
        //'query_var' => true,
		//'show_ui' => true,
		//'update_count_callback' => '_update_post_term_count',
		//'query_var' => true,
		'rewrite' => array( 'slug' => 'product_category' ),
	));*/
}
//add_action( 'init', 'create_taxanomy_type', 0 );
add_action( 'init', 'create_post_type' );

/*function social_settings()
{
	$link_twitter = get_option('settings_link_twitter', '');
	$link_facebook = get_option('settings_link_facebook', '');
	$link_say = get_option('settings_link_say', '');

	$link_google = get_option('settings_link_google', '');
	$link_vk = get_option('settings_link_vk', '');
	echo '<input name="settings_link_twitter" size="50" id="settings_link_twitter" type="text" value="'.$link_twitter.'" /> Twitter<br />';
	echo '<input name="settings_link_facebook" size="50" id="settings_link_facebook" type="text" value="'.$link_facebook.'" /> Facebook<br />';
	echo '<input name="settings_link_google" size="50" id="settings_link_google" type="text" value="'.$link_google.'" /> Google Plus<br />';
	echo '<input name="settings_link_vk" size="50" id="settings_link_vk" type="text" value="'.$link_vk.'" /> VK<br />';
	echo '<input name="settings_link_say" size="50" id="settings_link_say" type="text" value="'.$link_say.'" /> SAY<br />';

}*/
function social_links() {
    $link1 = get_option('link_twitter', '');
    echo '<input name="link_twitter" size="50" id="link_twitter" type="text" value="'.$link1.'" /> Twitter<br />';
    $link2 = get_option('link_facebook', '');
    echo '<input name="link_facebook" size="50" id="link_facebook" type="text" value="'.$link2.'" /> Facebook<br />';
}
function admin_init_function()
{
	//register_setting( 'general', 'settings_link_twitter', 'esc_attr' );
	//register_setting( 'general', 'settings_link_facebook', 'esc_attr' );
	//register_setting( 'general', 'settings_link_say', 'esc_attr' );
    //register_setting( 'general', 'web_phone', 'esc_attr' );

    register_setting( 'general', 'link_facebook', 'esc_attr' );
    register_setting( 'general', 'link_twitter', 'esc_attr' );
    //register_setting( 'general', 'link_mailru', 'esc_attr' );
    //register_setting( 'general', 'link_vk', 'esc_attr' );

	//add_settings_field( 'settings_social_settings_id', 'Social networks', 'social_settings', 'general'
	//, 'myprefix_settings-section-name', array( 'label_for' => 'myprefix_setting-id' )
	// );
    //add_settings_field( 'web_phone_id', 'Phone', 'web_phone', 'general');
}
//add_action('admin_init', 'admin_init_function');

/*function mg_image_attachment_fields_to_edit($form_fields, $post) {
	// $form_fields is a an array of fields to include in the attachment form
	// $post is nothing but attachment record in the database
	//     $post->post_type == 'attachment'
	// attachments are considered as posts in WordPress. So value of post_type in wp_posts table will be attachment
	// now add our custom field to the $form_fields array
	// input type="text" name/id="attachments[$attachment->ID][custom1]"
	$form_fields["mg-image-link"] = array(
		"label" => __("Image Link"),
		"input" => "text", // this is default if "input" is omitted
		"value" => get_post_meta($post->ID, "_mg-image-link", true),
        //"helps" => __("To be used with special slider added via [mg_carousel] shortcode."),
	);
	$mg_image_type=get_post_meta($post->ID, "_mg-image-type", true);
	$image_type_arr=array('None', 'Friends');
	$image_type_str="";
	foreach($image_type_arr as $val)
	{
		$image_type_str.="<option value='".$val."'".(($mg_image_type==$val)?' selected':'').">".$val."</option>";
	}
	$form_fields["mg-image-type"] = array(
		"label" => __("Image Type"),
		"input" => "html", // this is default if "input" is omitted
		"html"	=> "<select name='attachments[{$post->ID}][mg-image-type]' id='attachments[{$post->ID}][mg-image-type]'>
					    ".$image_type_str."
					</select>",
		//"value" => ,
        //"helps" => __("To be used with special slider added via [mg_carousel] shortcode."),
	);
   return $form_fields;
}
function mg_image_attachment_fields_to_save($post, $attachment) {
	// $attachment part of the form $_POST ($_POST[attachments][postID])
        // $post['post_type'] == 'attachment'
	if( isset($attachment['mg-image-link']) ){
		// update_post_meta(postID, meta_key, meta_value);
		update_post_meta($post['ID'], '_mg-image-link', $attachment['mg-image-link']);
	}
	if(isset($attachment['mg-image-type']))
	{
		update_post_meta($post['ID'], '_mg-image-type', $attachment['mg-image-type']);
	}
	return $post;
}*/
// attachments meta data
//add_filter("attachment_fields_to_edit", "mg_image_attachment_fields_to_edit", null, 2);
//add_filter("attachment_fields_to_save", "mg_image_attachment_fields_to_save", null , 2);

function new_excerpt_more( $excerpt ) {
	return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
function custom_excerpt_more( $more ) {
    return ' <a class="moretext" href="' . get_permalink() . '"></a>';
}
//add_filter( 'excerpt_more', 'custom_excerpt_more' );
if(!current_user_can('add_users'))
{
	add_filter('show_admin_bar', '__return_false');
}

/*function function_car_pending_to_publish($post_id)
{
	//
}
function function_car_pending_to_trash($post_id)
{
	//
}
add_action( 'pending_to_publish', 'function_car_pending_to_publish' );
add_action( 'pending_to_trash', 'function_car_pending_to_trash' );*/

function my_custom_post_types( $query ) {
	global $customPostTypes;
	if(isset($customPostTypes[$query->query['pagename']])) {
		$query->set( 'post_type', $query->query['pagename'] );
		//print_r($query);exit;
	}
	/*if($query->is_author())
	{
		$query->set( 'posts_per_page', 19 );
	}
    if( ($query->is_main_query() && $query->is_home()) || $query->is_author() ) {
        $query->set( 'post_type', array( 'car' ) );
        //$query->set( 'orderby', 'rand' );
    }*/
}
//add_action( 'pre_get_posts', 'my_custom_post_types' );

//remove_filter('the_title', 'wptexturize');
//remove_filter('the_content', 'wptexturize');
//remove_filter('comment_text', 'wptexturize');
//remove_filter('the_excerpt', 'wptexturize');

//define('WP_HTTP_BLOCK_EXTERNAL', true);


/*function posttype_columns_filter($columns)
{
	$columns = array(
		'cb'	 		=> '<input type="checkbox" />',
		'title' 		=> __('Service'),
		'price' 		=> __('Price'),
		'sexcerpt'		=> __('Excerpt')
	);
	return $columns;
}
function posttype_columns( $column, $post_id ) {
	switch ( $column ) {
	case 'price':
		$val=get_field('service_price', $post_id);
		echo $val;
		break;
	case 'sexcerpt':
		$mypost=get_post($post_id);
		echo $mypost->post_excerpt;
		break;
	}
}
add_filter("manage_edit-posttype_columns", "posttype_columns_filter");
add_action( 'manage_posttype_posts_custom_column' , 'posttype_columns', 10, 2 );*/




/*function remove_row_actions( $actions )
{
    if( get_post_type() === 'requests' )
    {
    	unset( $actions['inline hide-if-no-js']);
    	unset( $actions['view'] );
    	//$actions['view']='<a onclick="return false;" id="content-add_media" class="thickbox add_media" href="'.home_url().'" title="View &#8220;test&#8221;" rel="permalink">View</a>';
    }
    return $actions;
}
add_filter( 'post_row_actions', 'remove_row_actions', 10, 1 );*/

/*
    function fb_add_custom_user_profile_fields( $user ) {
    ?>
    <h3><?php _e('Extra Profile Information', 'your_textdomain'); ?></h3>
    <table class="form-table">
    <tr>
    <th>
    <label for="address"><?php _e('Address', 'your_textdomain'); ?>
    </label></th>
    <td>
    <input type="text" name="address" id="address" value="<?php echo esc_attr( get_the_author_meta( 'address', $user->ID ) ); ?>" class="regular-text" /><br />
    <span class="description"><?php _e('Please enter your address.', 'your_textdomain'); ?></span>
    </td>
    </tr>
    </table>
    <?php }
    function fb_save_custom_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
    return FALSE;
    update_usermeta( $user_id, 'address', $_POST['address'] );
    }
    add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
    add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );
    add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
    add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );
*/
//add_filter( 'template_include', 'web_template_include', 99 );

function web_template_include( $template ) {
    if ( is_category() ) {
        global $wp_query;
        $parent_cat_name = array_shift(explode('/', $wp_query->query['category_name']));
        $new_template = locate_template( array( 'category-' . $parent_cat_name . '.php' ) );
        if ( '' != $new_template ) {
            return $new_template ;
        }
    }
    return $template;
}

//add_filter( "single_template", "get_custom_post_type_template" ) ;
function get_custom_post_type_template($single_template) {
    global $post, $wp_query;
    $single_type = array_shift(explode('/', $wp_query->query['category_name']));
    $new_template = locate_template(array('single_' . $single_type . '.php'));
    if ('' != $new_template) {
        return $new_template;
    }
    return $single_template;
}

add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	include_once('acf/country_select.php');
	include_once('acf/run_sql.php');
	include_once('acf/save_google_map.php');
    //include_once('acf/textarea_multilang.php');
    //include_once('acf/wysiwyg_multilang.php');
}

//add_action('event_add_form', 'qtrans_modifyTermFormFor');
//add_action('event_edit_form', 'qtrans_modifyTermFormFor');

//add_filter('home_url', 'qtrans_convertURL');



function qtranslate_edit_taxonomies(){
	$args=array(
		'public' => true ,
		'_builtin' => false
	);
	$output = 'object'; // or objects
	$operator = 'and'; // 'and' or 'or'

	$taxonomies = get_taxonomies($args,$output,$operator);

	if ($taxonomies) {
		foreach ($taxonomies as $taxonomy ) {
			add_action( $taxonomy->name.'_add_form', 'qtrans_modifyTermFormFor');
			add_action( $taxonomy->name.'_edit_form', 'qtrans_modifyTermFormFor');
		}
	}
}
//add_action('admin_init', 'qtranslate_edit_taxonomies');

function save_post_meta( $post_id, $post, $update ) {
	global $wpdb;
	if($update) {

		if(isset($_POST['select_country'])) {
			$_POST['select_country']['country'] = trim($_POST['select_country']['country']);
			$_POST['select_country']['region'] = $_POST['select_country']['country'] . ',' . trim($_POST['select_country']['region']);
			$_POST['select_country']['city'] = $_POST['select_country']['region'] . ',' . trim($_POST['select_country']['city']);
			$_POST['select_country']['district'] = $_POST['select_country']['city'] . ',' . trim($_POST['select_country']['district']);

			$wpdb->delete( $wpdb->prefix . 'filter', array('post_ID' => $post_id), array('%d') );

			foreach($_POST['select_country'] as $key => $val) {
				$wpdb->insert($wpdb->prefix . 'filter', array('post_ID' => $post_id, 'meta_key' => 'select_country_' . $key, 'meta_val' => $val), array('%d', '%s', '%s'));
			}
		}
	}
}
add_action( 'save_post', 'save_post_meta', 10, 3 );