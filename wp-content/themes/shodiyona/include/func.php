<?php
function get_menu_children($menu_list, $parent_id=0)
{
	$new_menu_list=array();
	foreach($menu_list as $menu_item)
	{
		if($menu_item->menu_item_parent==$parent_id)
		{
			$new_menu_list[$menu_item->ID]=array('id'=>$menu_item->ID, 'url'=>$menu_item->url, 'title'=>$menu_item->title, 'object'=>$menu_item->object, 'object_id'=>$menu_item->object_id, 'children'=>get_menu_children($menu_list, $menu_item->ID));
		}
	}
	return $new_menu_list;
}
function get_menu_list($menu_name, $parent_id=0)
{
	$menu=wp_get_nav_menu_object( $menu_name );
	$new_menu_list=array();
	if(!empty($menu))
	{
		$menu_items = wp_get_nav_menu_items($menu->term_id);
        $new_menu_list=get_menu_children($menu_items, $parent_id);
	}
	return $new_menu_list;
}
function show_menu_items($items, $args)
{
	$item_str='';
	foreach($items as $item)
	{
		$link_active=false;
		if($args['permalink']==$item['url'] || ($item['object']=='category' && $item['object_id']==$args['category']->term_id && !$args['is_home']) || ($args['is_home'] && $args['home_url']==$item['url']))
		{
			$link_active=true;
		}
		$item_str.='<li';
		if($link_active && $args['active_list_id']!='')
		{
			$item_str.=' id="'.$args['active_list_id'].'"';
		}elseif(!empty($item['children']) && $args['parent_list_id']!='')
		{
			$item_str.=' id="'.$args['parent_list_id'].'_'.$item['id'].'"';
		}elseif($args['list_id']!='')
		{
			$item_str.=' id="'.$args['list_id'].'_'.$item['id'].'"';
		}
		if($link_active && $args['active_list_class']!='')
		{
			$item_str.=' class="'.$args['active_list_class'];
			if(!empty($item['children']) && $args['parent_list_class']!='')
			{
				$item_str.=' '.$args['parent_list_class'];
			}
			if($args['list_class']!='')
			{
				$item_str.=' '.$args['list_class'];
			}
			$item_str.='"';
		}elseif(!empty($item['children']) && $args['parent_list_class']!='')
		{
			$item_str.=' class="'.$args['parent_list_class'];
			if($args['list_class']!='')
			{
				$item_str.=' '.$args['list_class'];
			}
			$item_str.='"';
		}elseif($args['list_class']!='')
		{
			$item_str.=' class="'.$args['list_class'].'"';
		}
		$item_str.='><a';
		if($link_active && $args['active_link_id']!='')
		{
			$item_str.=' id="'.$args['active_link_id'].'"';
		}elseif(!empty($item['children']) && $args['parent_link_id']!='')
		{
			$item_str.=' id="'.$args['parent_link_id'].'_'.$item['id'].'"';
		}elseif($args['link_id']!='')
		{
			$item_str.=' id="'.$args['link_id'].'_'.$item['id'].'"';
		}
		if($link_active && $args['active_link_class']!='')
		{
			$item_str.=' class="'.$args['active_link_class'];
			if(!empty($item['children']) && $args['parent_link_class']!='')
			{
				$item_str.=' '.$args['parent_link_class'];
			}
			if($args['link_class']!='')
			{
				$item_str.=' '.$args['link_class'];
			}
			$item_str.='"';
		}elseif(!empty($item['children']) && $args['parent_link_class']!='')
		{
			$item_str.=' class="'.$args['parent_link_class'];
			if($args['link_class']!='')
			{
				$item_str.=' '.$args['link_class'];
			}
			$item_str.='"';
		}elseif($args['link_class']!='')
		{
			$item_str.=' class="'.$args['link_class'].'"';
		}
		$item_str.=' href="'.$item['url'].'">'.$item['title'].'</a>';
		if(!empty($item['children']))
		{
			$item_str.='<ul';
			if($link_active && $args['submenu_active_class']!='')
			{
				$item_str.=' class="'.$args['submenu_active_class'];
				if($args['submenu_class']!='')
				{
					$item_str.=' '.$args['submenu_class'];
				}
				$item_str.='"';
			}elseif($args['submenu_class']!='')
			{
				$item_str.=' class="'.$args['submenu_class'].'"';
			}
			if($args['submenu_id']!='')
			{
				$item_str.=' id="'.$args['submenu_id'].'"';
			}
			$item_str.='>';
			$item_str.=show_menu_items($item['children'], $args);
			$item_str.='</ul>';
		}
		$item_str.='</li>';
	}
	return $item_str;
}
function show_menu($args)
{
	if(empty($args['menu']))
	{
		return;
	}
	if(empty($args['container']))
	{
		$args['container']='div';
	}
	if(empty($args['container_class']))
	{
		$args['container_class']='menu-container';
	}
	if(empty($args['container_id']))
	{
		$args['container_id']='';
	}
	if(empty($args['menu_class']))
	{
		$args['menu_class']='';
	}
	if(empty($args['menu_id']))
	{
		$args['menu_id']='';
	}


	if(empty($args['link_class']))
	{
		$args['link_class']='';
	}
	if(empty($args['link_id']))
	{
		$args['link_id']='';
	}
	if(empty($args['list_class']))
	{
		$args['list_class']='';
	}
	if(empty($args['list_id']))
	{
		$args['list_id']='';
	}



	if(empty($args['parent_link_class']))
	{
		$args['parent_link_class']='';
	}
	if(empty($args['parent_link_id']))
	{
		$args['parent_link_id']='';
	}
	if(empty($args['parent_list_class']))
	{
		$args['parent_list_class']='';
	}
	if(empty($args['parent_list_id']))
	{
		$args['parent_list_id']='';
	}

	if(empty($args['active_link_class']))
	{
		$args['active_link_class']='';
	}
	if(empty($args['active_link_id']))
	{
		$args['active_link_id']='';
	}
	if(empty($args['active_list_class']))
	{
		$args['active_list_class']='';
	}
	if(empty($args['active_list_id']))
	{
		$args['active_list_id']='';
	}

	if(empty($args['submenu_class']))
	{
		$args['submenu_class']='';
	}
	if(empty($args['submenu_id']))
	{
		$args['submenu_id']='';
	}
	if(empty($args['submenu_active_class']))
	{
		$args['submenu_active_class']='';
	}

	$args['permalink']=get_permalink(get_the_ID());
    if(is_home() || is_front_page())
    {
    	$args['is_home']=true;
    	$args['home_url']=home_url('/');
    }else
    {
    	$args['is_home']=false;
    	$args['home_url']='';
    }
    $category_list=get_the_category();
    $args['category']=$category_list[0];


	if(empty($args['echo']))
	{
		$args['echo']=true;
	}else
	{
		if($args['echo'])
		{
			$args['echo']=true;
		}else
		{
			$args['echo']=false;
		}
	}
	if(empty($args['items_wrap']))
	{
		$args['items_wrap']='<ul id="%1$s" class="%2$s">%3$s</ul>';
	}
	if(empty($args['depth']))
	{
		$args['depth']=0;
	}
	if(empty($args['parent_id']))
	{
		$args['parent_id']=0;
	}
	$menu_list=get_menu_list($args['menu'], $args['parent_id']);
	$menu_str='';

	$menu_str.='<'.$args['container'];
	if($args['container_class']!='')
	{
		$menu_str.=' class="'.$args['container_class'].'"';
	}
	if($args['container_id']!='')
	{
		$menu_str.=' id="'.$args['container_id'].'"';
	}
	$menu_str.=' >';
	$menu_items_str=show_menu_items($menu_list, $args);
	$args['items_wrap']=str_replace('%1$s', $args['menu_id'], $args['items_wrap']);
	$args['items_wrap']=str_replace('%2$s', $args['menu_class'], $args['items_wrap']);
	$menu_str.=str_replace('%3$s', $menu_items_str, $args['items_wrap']);
	$menu_str.='</'.$args['container'].'>';

	if($args['echo'])
	{
		echo $menu_str;
	}else
	{
		return $menu_str;
	}
}
function fprice($price, $decimal=0, $point1=',', $point2=' ')
{
	return number_format($price, $decimal, $point1, $point2);
}
function send_json($json_arr)
{
	echo json_encode($json_arr);
	exit;
}
function secure_page($is_not=false, $page_slug='')
{
	if($is_not && is_user_logged_in())
	{
            if($page_slug!='')
            {
                redirect($page_slug);
            }else
            {
                redirect_home();
            }
	}elseif(!$is_not && !is_user_logged_in())
	{
            if($page_slug!='')
            {
                redirect($page_slug);
            }else
            {
                redirect_home();
            }
	}
}
function redirect_home()
{
	redirect(home_url());
}
function redirect($location, $status=302)
{
	wp_redirect( $location, $status );
	exit;
}
function update_table($table, $fields=array(), $where='')
{
	global $wpdb;
	if(empty($fields))
	{
		return false;
	}
	$set_field=array();
	foreach($fields as $key=>$val)
	{
		$set_field[]="`".$key."`='".$val."'";
	}
	if($where!='')
	{
		$where="WHERE ".$where;
	}
	$q="UPDATE `".$wpdb->prefix.$table."` SET ".implode(',', $set_field).' '.$where;
	$wpdb->query($q);
	return true;
}
function set_session($key, $val){
	$_SESSION[$key]=$val;
}

function get_session($key){
	if(!isset($_SESSION[$key])){
		set_session($key, null);
	}
	return $_SESSION[$key];
}
function set_information($info=array())
{
	set_session('info', $info);
}
function get_information()
{
	return get_session('info');
}
function output_information()
{
	$output='';
	$info=get_information();
	foreach($info as $key=>$val)
	{
		if(is_array($val) && !empty($val))
		{
			$output.="open_form_".$key."('".implode('<br />', $val)."');";
		}elseif($val===true)
		{
			$output.="open_form_".$key."();";
		}
	}
	return $output;
}
function get_var($arr, $key, $def_val='')
{
	if(isset($arr[$key]))
	{
		return $arr[$key];
	}
	return $def_val;
}
function get_varpost($key, $def_val='')
{
	return get_var($_POST, $key, $def_val);
}
function get_varget($key, $def_val='')
{
	return get_var($_GET, $key, $def_val);
}
function check_file_format($file_name, $format_list)
{
    $spos=strrpos($file_name, '.');
    $spos++;
    $sformat=strtolower(substr($file_name, $spos));
    return in_array($sformat, $format_list);
}
function get_new_file_name($file_dir, $file_name, $file_prefix='file', $file_prefix_splitter='_')
{
    $new_file_name=$file_name;
    $file_no=0;
    $file_dir=get_file_dir($file_dir);
    while(file_exists($file_dir.$new_file_name))
    {
        $file_no++;
        $new_file_name=$file_prefix.$file_no.$file_prefix_splitter.$file_name;
    }
    return $new_file_name;
}
function get_file_dir($file_dir)
{
    $dir_last_char=substr($file_dir, -1);
    if($dir_last_char!='/' && $dir_last_char!="\\"){
            $file_dir.='/';
    }
    return $file_dir;
}
function show_info()
{
	$info=get_information();
	$error=$info['error'];
	$message=$info['message'];
	foreach($error as $key=>$val)
	{
		echo '<p class="information_error">';
		print_r($val);
		echo '</p>';
	}
	foreach($message as $key=>$val)
	{
		echo '<p class="information_message">';
		print_r($val);
		echo '</p>';
	}
}
function get_message($arr=array())
{
	global $information_messages;
	$result=$information_messages;
	$arr_count=count($arr);
	for($i=0;$i<$arr_count;$i++)
	{
		if(isset($result[$arr[$i]]))
		{
			$result=$result[$arr[$i]];
		}
	}
	return $result;
}

function get_short_text($text, $attr=array('length'=>140, 'dotted'=>'...'))
{
	$text=strip_tags($text);
	$encode='utf-8';
	if(empty($attr['dotted']))
	{
		$attr['dotted']='...';
	}
	if(mb_strlen($text, $encode)<=$attr['length'])
	{
		return $text;
	}
	$text1=$text;
	$text=mb_substr($text, 0, $attr['length'], $encode);
	$text_p=mb_strrpos($text, ' ', 0, $encode);
	if($text_p!==false)
	{
		$text=mb_substr($text, 0, $text_p);
	}
	if(mb_strlen($text, $encode)<mb_strlen($text1, $encode))
	{
		$text.=' '.$attr['dotted'];
	}
	return $text;
}

function get_short_url($text, $attr=array('length'=>140, 'dotted'=>'...'))
{
	$text_arr=parse_url($text);
	$text=$text_arr['host'];
	$encode='utf-8';
	if(empty($attr['dotted']))
	{
		$attr['dotted']='...';
	}
	if(mb_strlen($text, $encode)<=$attr['length'])
	{
		return $text;
	}
	$text1=$text;
	$text=mb_substr($text, 0, $attr['length'], $encode);
	if(mb_strlen($text, $encode)<mb_strlen($text1, $encode))
	{
		$text.=' '.$attr['dotted'];
	}
	return $text;
}
function include_template($template_name, $vars=array())
{
	if(!empty($vars))
	{
		foreach($vars as $var=>$val)
		{
			$$var=$val;
		}
	}
	include(THEME_PATH.'/'.$template_name.'.php');
}
function is_index()
{
	return (is_home() || is_front_page());
}

function register_user($user_name, $pass, $email, $meta_arr=array())
{
	global $activation_code_length, $user_must_activate;
    $user_name=str_replace('@', '', str_replace('.', '', $user_name));
    $user_id = username_exists( $user_name );
	if ( !$user_id ) {
		$user_id = wp_create_user( $user_name, $pass, $email );
		add_user_meta($user_id, 'user_active', 0, false);
		if(isset($meta_arr['first_name']))
		{
			update_user_meta( $user_id, 'first_name', $meta_arr['first_name'], false );
			unset($meta_arr['first_name']);
		}
		if(isset($meta_arr['last_name']))
		{
			update_user_meta( $user_id, 'last_name', $meta_arr['last_name'], false );
			unset($meta_arr['last_name']);
		}
		if(!empty($meta_arr))
		{
			foreach($meta_arr as $key=>$val)
			{
				add_user_meta( $user_id, $key, $val, false );
			}
		}
		$admin_user_data=get_userdata( 1 );
		$to=$email;
		$subject=get_message(array('txt', 'activation_mail_subject'));
		$code=generate_code($activation_code_length);
		update_table('users', array('user_activation_key'=>$code), "`ID`=".$user_id);
		if($user_must_activate)
		{
			$acctivation_link=site_url('/login/')."?activation=".$code."&email=".$email;
			$mail_message=str_replace('%s', $acctivation_link, get_message(array('txt', 'activation_mail_text')));;
			$headers = 'From: Administrator <'.$admin_user_data->user_email.'>' . "\r\n";
			add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
			wp_mail( $to, $subject, $mail_message, $headers );
		}else
		{
			update_user_meta( $user_id, 'user_active', 1 );
		}

		return true;
	}
	return false;
}

function authenticate_user($login, $password, $remember=false, $secure_cookie=false, $auth_by='login')//login | email
{
	global $user_must_activate;
	if($auth_by=='email')
	{
		if(!email_exists( $login ))
		{
			return get_message(array('error', 'login', 'user_not_exist'));
		}
		$my_user=$user = get_user_by('email', $login);//get_userdatabylogin($login);
	}else
	{
		if(!username_exists( $login ))
		{
			return get_message(array('error', 'login', 'user_not_exist'));
		}
		$my_user=get_userdatabylogin($login);
	}
	if($user_must_activate && get_user_meta($my_user->ID, 'user_active', true)==0)
	{
		return get_message(array('error', 'login', 'user_not_active'));
	}
	$creds = array();
	$creds['user_login'] = $my_user->user_login;
	$creds['user_password'] = $password;
	$creds['remember'] = $remember;
	$user = wp_signon( $creds, $secure_cookie );
	if ( is_wp_error($user) )
	   //return $user->get_error_message();
	   return get_message(array('error', 'login', 'user_not_found'));
	update_usermeta( $my_user->ID, 'last_visited', time() );
	return true;
}

function generate_code($code_length=0, $unique=false)
{
	$code_length=abs((int)$code_length);
	if($code_length==0)
	{
		$code_length=6;
	}
	if($unique)
	{
		$symbols = "23456789abcdegkmnpqsuvxyz";
	}else
	{
		$symbols = "0123456789AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpPqRrSsTtUuVvWwXxYyZz";
	}
	$symbols_length=strlen($symbols)-1;
	$code='';
	for($i=0;$i<$code_length;$i++)
	{
		$code.=$symbols{mt_rand(0,$symbols_length)};
	}
	return $code;
}

function user_activation($email, $code)
{
	global $wpdb;
	if($email=='' || $code=='')
	{
		return false;
	}
	$user_count = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM ".$wpdb->users." WHERE `user_email`='".$email."' AND `user_activation_key`='".$code."'" ) );
	if($user_count>0)
	{
		update_table('users', array('user_activation_key'=>''), "`user_email`='".$email."'");
		$my_user=get_user_by('email', $email);
		update_user_meta( $my_user->ID, 'user_active', 1 );
		return true;
	}else
	{
		$user_count = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM ".$wpdb->users." WHERE `user_email`='".$email."' AND `user_activation_key`=''" ) );
		if($user_count>0)
		{
			return true;
		}else
		{
			return false;
		}
	}
}

function change_password($email, $password)
{
	$password=wp_hash_password($password);
	update_table('users', array('user_activation_key'=>'', 'user_pass'=>$password), "`user_email`='".$email."'");
}

function save_user_data($user_id, $user_data=array(), $user_metadata=array())
{
	global $current_user;
	if(empty($user_data) && empty($user_metadata))
	{
		return false;
	}
	if(!empty($user_data))
	{
		$user_data['ID']=$user_id;
		wp_update_user( $user_data );
		if(isset($user_data['user_login']))
		{
			$user_nicename=str_replace('@', '', str_replace('.', '', $user_data['user_login']));
			update_table('users', array('user_login'=>$user_data['user_login'], 'user_nicename'=>$user_nicename, 'display_name'=>$user_data['user_login']), "`ID`='".$user_id."'");
			wp_set_auth_cookie( $user_id);
			get_currentuserinfo();
		}
		//if(isset($user_data['user_pass']))
		//{
		//	$user_data['user_pass']=wp_hash_password($user_data['user_pass']);
		//}
		//update_table('users', $user_data, "`ID`='".$user_id."'");
	}
	if(!empty($user_metadata))
	{
		foreach($user_metadata as $key=>$val)
		{
			update_user_meta( $user_id, $key, $val );
		}
	}
}

function downloadFile($file)
{
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
	exit;
}

function is_ajax_request() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest');
}


function add_thumbnail($post_id, $image_url) {
    global $wp_upload_dir;
    $wp_filetype = wp_check_filetype(basename($image_url), null );
    $attachment = array(
        'guid' => $image_url,
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => preg_replace('/\.[^.]+$/', '', basename($image_url)),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $wp_upload_dir['path'] . '/' . basename($image_url), $post_id );
    // you must first include the image.php file
    // for the function wp_generate_attachment_metadata() to work
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $attach_data = wp_generate_attachment_metadata( $attach_id, $wp_upload_dir['path'] . '/' . basename($image_url) );
    //print_r($attach_data);exit;
    wp_update_attachment_metadata( $attach_id, $attach_data );
    set_post_thumbnail( $post_id, $attach_id );
}

function generate_session_code($name, $code_length = 50) {
    $code = generate_code($code_length);
    set_session_code($name, $code);
    return $code;
}
function check_session_code($name, $code) {
    return get_session_code($name) == $code;
}
function get_session_code_prefix() {
    return 'session_code_';
}
function get_session_code($name) {
    return get_session(get_session_code_prefix() . $name);
}
function set_session_code($name, $code) {
    set_session(get_session_code_prefix() . $name, $code);
}

function get_array_item($arr, $key, $def_value = '') {
    $arr = (array) $arr;
    if (isset($arr[$key])) {
        return $arr[$key];
    } else {
        return $def_value;
    }
}
function get_post_form_field($form, $field, $default_value = '') {
    if (isset($_POST[$form]) && isset($_POST[$form][$field])) {
        return $_POST[$form][$field];
    }
    return $default_value;
}

function get_pagination_link($paged, $url = '', $get_key = '') {
    if ($get_key != '') {
        $get_key = '?' . $get_key . '=' . $paged;
    }
    if ($url == '') {
        $result = esc_url(get_pagenum_link($paged));
    } else {
        $result = $url;
    }
    $result .= $get_key;
    return $result;
}

function render_pagination($found_posts = 0, $max_num_pages = 0, $paged = 0, $get_key = '', $url = '') {
    global $wp_query;
    if ($found_posts == 0) {
        $found_posts = $wp_query->found_posts;
    }
    if ($max_num_pages == 0) {
        $max_num_pages = $wp_query->max_num_pages;
    }
    if ($paged == 0 && $wp_query->query_vars['paged']) {
        $paged = $wp_query->query_vars['paged'];
    } elseif ($paged == 0) {
        $paged = 1;
    }
    /*
    ?>
    <p class="tar">
        <?php Language::_e("Total"); ?> <?php echo $found_posts ?>
    </p>
    <?php
    */
    if ($max_num_pages > 1) :
        include_once(INCLUDE_PATH . '/Pagination.php');
        $pagination = new Pagination($max_num_pages, $paged, 3, 1, 1);
        $pagination_arr = $pagination->createArray();
        ?>
        <div class="page-nav">
            <a class="prev<?php if ($paged == $pagination_arr['first']) : ?> disabled<?php endif; ?>" href="<?php echo get_pagination_link($pagination_arr['prev'], $url, $get_key); ?>"></a>

            <ul>
                <?php foreach ($pagination_arr['items'] as $item) : ?>
                    <li<?php if (isset($item['current']) && $item['current']) : ?> class="active"<?php endif; ?>>
                        <?php if (isset($item['value']) && $item['value']) : ?>
                            <a href="<?php echo get_pagination_link($item['value'], $url, $get_key); ?>"><?php echo $item['value']; ?></a>
                        <?php else : ?>
                            ...
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a class="next<?php if ($paged == $pagination_arr['last']) : ?> disabled<?php endif; ?>" href="<?php echo get_pagination_link($pagination_arr['next'], $url, $get_key); ?>"></a>
        </div>
    <?php endif;
}

function show_start() {
	if(!isset($_COOKIE['start_lang'])) {
		return true;
	} else {
		return false;
	}
}

function getIdRestaurantsInThisCity($id, $limit = 5) {
	global $wpdb;

	$meta_val = $wpdb->get_var( "SELECT `meta_val` FROM `" . $wpdb->prefix . "filter` WHERE `post_ID`='" . $id . "' AND `meta_key`='select_country_city'" );
	$result = $wpdb->get_results("SELECT `post_ID` FROM `" . $wpdb->prefix . "filter` WHERE `post_ID` != '" . $id . "' AND `meta_val` = '" . $meta_val . "' AND `meta_key` = 'select_country_city' ORDER BY RAND() LIMIT " . $limit, 'ARRAY_A');

	$ids = array();
	$resultCount = count($result);
	for($i = 0; $i < $resultCount; $i++) {
		$ids[] = $result[$i]['post_ID'];
	}

	return $ids;
}

function exchangeCurrency($price) {
	global $currencyItem;
	$price = number_format($price / $currencyItem['rate'], 2, ',', ' ');
	return str_replace('%s%', $price, $currencyItem['layout']);
}