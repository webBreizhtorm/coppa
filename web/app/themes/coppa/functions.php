<?php
// require_once dirname( __FILE__ ) . '/lib/plugins.php';
require_once('lib/carbon-fields.php');
/* ==========================================================================
   FONCTIONNALITES WORDPRESS
   ========================================================================== */
// Prise en charge du HTML5 Markup
add_theme_support('html5');
// Prise en charge de la modification des styles via l'éditeur
add_theme_support('editor-style');
// Prise en charge des widgets
add_theme_support('widgets');
// Prise en charge wp menu
add_theme_support('menus');
add_theme_support('custom-logo');

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//Ajouter les menus ici :
register_nav_menu('main', 'Navigation Principale');
register_nav_menu('footer', 'Bas de page');
register_nav_menu('rs', 'Réseaux sociaux');

// Prise en charge des miniatures
add_theme_support('post-thumbnails');
//Ajouter les tailles ici :
add_image_size('slide', 1600, 450, true);

/* ==========================================================================
   SCRIPTS
   ========================================================================== */

if (!is_admin()) add_action("wp_enqueue_scripts", "breizhtorm_query", 11);
function breizhtorm_query() {
	wp_deregister_script('bzh-scripts');
	wp_register_script( 'bzh-scripts', get_template_directory_uri() . '/build/app.min.js', array(), null, true );
	wp_enqueue_script( 'bzh-scripts' );
}

add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {

   echo '<script type="text/javascript">
           var ajax_url = "' . admin_url('admin-ajax.php') . '";
           var assets_path = "'.get_stylesheet_directory_uri() . '/build'.'";
           var baseurl = "'.get_stylesheet_directory_uri().'";
         </script>';
}

function breizhtorm_add_google_fonts() {
	wp_enqueue_style( 'breizhtorm-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:600&display=swap', array(), false ); 
}

if (!is_admin()) add_action( 'wp_enqueue_scripts', 'breizhtorm_add_google_fonts' );

function breizhtorm_add_css() {
	//wp_enqueue_style( 'breizhtorm-style', get_template_directory_uri()."/style.css", array(), false);
	wp_enqueue_style( 'breizhtorm-style', get_template_directory_uri()."/build/styles.min.css", array(), false);
}

if (!is_admin()) add_action( 'wp_enqueue_scripts', 'breizhtorm_add_css' );

/* ==========================================================================
   FONCTIONS WIDGETS
   ========================================================================== */   

   get_template_part( 'include/sidebar' );

/* ==========================================================================
   FONCTIONS POST TYPE
   ========================================================================== */	

   get_template_part( 'include/post_type' );

/* ==========================================================================
   SHORTCODES
   ========================================================================== */

   get_template_part( 'include/shortcode' );
   
   
/* ==========================================================================
   FONCTIONS SUPP
   ========================================================================== */

	/**
	 * Function to defer or asynchronously load scripts
	 * See : https://www.wpfaster.org/code/how-to-defer-or-async-javascript-without-a-plugin
	 */
	function js_async_attr($tag){

	# Do not add defer or async attribute to these scripts
	$scripts_to_exclude = array('jquery','revolution','owl','themepunch','main','script','shortcodes','tarteaucitron','isotope','kd_addon_script');

	foreach($scripts_to_exclude as $exclude_script){
	    if(true == strpos($tag, $exclude_script ) && false == strpos($tag, 'jquery.js' ) ) {
	        return str_replace( ' src', ' defer="defer" src', $tag );
	        //return $tag;
	    }
	}
	/* ANCIENNE VERSION A VOIR SI ELLE FONCTIONNE OU PAS CAR L'AUTRE SEMBLE PLUS OPTIMISEE
	$scripts_to_exclude = array('revolution','isotope','jquery-migrate','tarteaucitron','main','jquery.themepunch.tools.min.js','jquery.themepunch.revolution.min.js','shortcodes.js');

	foreach($scripts_to_exclude as $exclude_script){
		if(true == strpos($tag, $exclude_script ) ) {
			return str_replace( ' src', ' defer="defer" src', $tag );
			//return $tag;
		}
	}*/

	# Defer or async all remaining scripts not excluded above
	return str_replace( ' src', ' async src', $tag );

	}

	if (!is_admin()) add_filter( 'script_loader_tag', 'js_async_attr', 10 );
	
   
   /* CONTACT FORM 7 */
	
	// replace cf7 form submit with button
	function fowl_wpcf7_submit_button() {
			if(function_exists('wpcf7_remove_shortcode')) {
					wpcf7_remove_shortcode('submit');
					remove_action( 'admin_init', 'wpcf7_add_tag_generator_submit', 55 );
					$fowl_cf7_module = TEMPLATEPATH . '/cf7/submit.php';
					require_once $fowl_cf7_module;
			}
	}
	add_action('after_setup_theme','fowl_wpcf7_submit_button');

	/* DISABLE auto-generated Yoast JSON-LD Schema
	 * https://www.prodjex.com/2018/04/how-to-disable-yoast-generated-schema-data/
	 */
	function disable_yoast_schema_data($data){
		$data = array();
		return $data;
	}
	add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);
   

/* ==========================================================================
   FONCTIONS ADMIN
   ========================================================================== */

//	affiche les fichier styles du modele
function specif_styles($type = 'css'){
	if(isset($_SESSION['modele']) && $_SESSION['modele']){
		$file = get_template_directory().'/'.$type.'/'.$_SESSION['modele'].'.'.$type;
		$file_uri = get_template_directory_uri().'/'.$type.'/'.$_SESSION['modele'].'.'.$type;

		if(is_file($file)){
			echo '<link rel="stylesheet" type="text/'.$type.'" href="'.$file_uri.'" />';
		}
	}
	echo '<link rel="stylesheet" href="'.get_stylesheet_uri().'" type="text/css" media="all"/>';
	
}

// Supprimer barre wordpress
function my_function_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

// FONCTION DEBUG
function debug($var, $die = false){
	if($_SERVER['REMOTE_ADDR'] == '80.15.15.155'){
		echo '<pre>';
		print_r($var);
		echo '</pre>';
		if($die)
			die();
	}
}

function cleanString($text) {
    $utf8 = array(
        '/[áàâãªä]/u'   =>   'a',
        '/[ÁÀÂÃÄ]/u'    =>   'A',
        '/[ÍÌÎÏ]/u'     =>   'I',
        '/[íìîï]/u'     =>   'i',
        '/[éèêë]/u'     =>   'e',
        '/[ÉÈÊË]/u'     =>   'E',
        '/[óòôõºö]/u'   =>   'o',
        '/[ÓÒÔÕÖ]/u'    =>   'O',
        '/[úùûü]/u'     =>   'u',
        '/[ÚÙÛÜ]/u'     =>   'U',
        '/ç/'           =>   'c',
        '/Ç/'           =>   'C',
        '/ñ/'           =>   'n',
        '/Ñ/'           =>   'N',
        '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
        '/[“”«»„]/u'    =>   ' ', // Double quote
        '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
    );
    return preg_replace(array_keys($utf8), array_values($utf8), $text);
}

function mrpropre($string) {
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string);
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '-', $string);
    return strtolower(trim($string, '-'));
}

// PAGINATION
/* A placer en haut de la page concernée : 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts('post_type=post&category_name=actualites&paged=' . $paged);
A placer en bas :
<?php theme_pagination(); ?> 
*/
if( !function_exists( 'theme_pagination' ) ) {
	function theme_pagination(){
		 global $wp_query, $wp_rewrite;
		 $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		 
		 $pagination = array(
		  'base' => @add_query_arg('page','%#%'),
		  'format' => '',
		  'total' => $wp_query->max_num_pages,
		  'current' => $current,
			  'show_all' => false,
			  'end_size'     => 1,
			  'mid_size'     => 2,
		  'type' => 'list',
		  'next_text' => '>',
		  'prev_text' => '<'
		 );
		 
		 if( $wp_rewrite->using_permalinks() )
		  $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		 
		 if( !empty($wp_query->query_vars['s']) )
		  $pagination['add_args'] = array( 's' => str_replace( ' ' , '+', get_query_var( 's' ) ) );
		  
		 echo str_replace('page/1/','', paginate_links( $pagination ) );
	}
}

add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
	$addsizes = array(
		"slide" => __( "Slider"),
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}

/* ==========================================================================
   ACF
   ========================================================================== */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Options du thème',
		'menu_title'	=> 'Options du thème',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/* ==========================================================================
   CORRECTIFS ADMIN
   ========================================================================== */

// Hack version wordpress
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

/********************************/
/*		CUSTOM EXCERPT			*/
/********************************/

function breizhtorm_trim_excerpt( $text='' )
{
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $excerpt_length = apply_filters('excerpt_length', 19);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '');
    return wp_trim_words( $text, $excerpt_length, $excerpt_more );
}
add_filter('wp_trim_excerpt', 'breizhtorm_trim_excerpt');

/* ACF */

function my_acf_google_map_api( $api ){
		
	$api['key'] = '';
	
	return $api;
	
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


/* PROTECTED POSTS */

// Filter to hide protected posts
function exclude_protected($where) {
	global $wpdb;
	return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
	if( !is_single() && !is_page() && !is_admin() ) {
		add_filter( 'posts_where', 'exclude_protected' );
	}
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');



// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');

/* Recuperation des feed des reseaux sociaux */
add_action( 'wp_ajax_nopriv_networks_load', 'networks_load' );
add_action( 'wp_ajax_networks_load', 'networks_load' );
function networks_load() {
    $items = array();

    if (wp_doing_ajax() && class_exists("Wp_Rss_Bridge_Processor"))
    {

        $bridge = array(
            "Twitter" => array(
                'u' => 'thinkR_fr',
                'norep' => 'on',
                // 'noretweet' => 'on',
            ),
        );
        $processor = new Wp_Rss_Bridge_Processor($bridge);
        $twitter = $processor->get_data();
        $twitter = array_slice($twitter, 0, 7);
        $items['twitter'] = $twitter;


        // On check si le contenu du fichier json actuel est different du nouveau
        if (file_get_contents(TEMPLATEPATH.'/build/social.json') != json_encode($items)) {

            // Si c'est le cas on remplace l'ancien contenu par le nouveau
            $fp = fopen(TEMPLATEPATH.'/build/social.json',"wb");
            fwrite($fp,json_encode($items));
            fclose($fp);
        }
    }

    echo json_encode($items);

    die();
}

/* Personnalise la longueur de l'extrait des articles (excerpt)
 * source : https://wpchannel.com/wordpress/tutoriels-wordpress/definir-longueur-extrait-personnalisee-articles-wordpress/
 */
function new_excerpt_length($length) {
	return 220;
}
add_filter('excerpt_length', 'new_excerpt_length');


/* Force le formulaire de recherche a rechercher uniquement dans les articles du blog
 * source : https://www.wpbeginner.com/wp-tutorials/how-to-exclude-pages-from-wordpress-search-results/
 */
if (!is_admin()) {
	function wpb_search_filter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	// add_filter('pre_get_posts','wpb_search_filter');
}


/* Empeche l'editeur de texte de wordpress (tinyMCE) de supprimer les tags HTML si on enregistre
 *
 * https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 * https://wordpress.org/support/topic/how-do-you-prevent-the-wordpress-editor-from-stripping-out-certain-html-tags/#post-6651177
 * https://linklay.com/stop-wordpress-automatically-removing-html-markups/
 */
// add_filter('tiny_mce_before_init', 'xbs_allow_tinymce_tags_attr');
function xbs_allow_tinymce_tags_attr( $init ) {

    if(!empty($in['extended_valid_elements']))
        $init['extended_valid_elements'] .= ',';
 
  // Teste la présence de extended_valid_elements et ajoute $ext
  $init['extended_valid_elements'] .= '*[*]';
 
  return $init;
}


/* Permet d'executer des taches CRON
 *
 * DESACTIVER WP_CRON (config.php)
 * define('DISABLE_WP_CRON', true);
 * 
 * source : https://www.100son.net/cron-wordpress-problemes-solutions/
 * source : https://wordpress.stackexchange.com/questions/316544/wordpress-function-run-using-crontab
 *
 * CRON URL : http://XXXXX/wp-cron.php?doing_wp_cron
 * https://cron-job.org (maxence@breizhtorm.fr / 1B2Z3Hcro)
 */
function isa_add_cron_recurrence_interval( $schedules ) {

	$schedules['every_minutes'] = array(
            'interval'  => 60,
            'display'   => __( 'Every Minutes', 'textdomain' )
    );

    $schedules['every_three_minutes'] = array(
            'interval'  => 180,
            'display'   => __( 'Every 3 Minutes', 'textdomain' )
    );
 
    $schedules['every_fifteen_minutes'] = array(
            'interval'  => 900,
            'display'   => __( 'Every 15 Minutes', 'textdomain' )
    );  
     
    return $schedules;
}
add_filter( 'cron_schedules', 'isa_add_cron_recurrence_interval' );

if ( ! wp_next_scheduled( 'your_minute_action_hook' ) ) {
    wp_schedule_event( time(), 'every_minutes', 'your_minute_action_hook' );
}

// add_action('your_minute_action_hook', 'isa_test_cron_job_send_mail');
 
function isa_test_cron_job_send_mail() {
    $to = 'maxence.breizhtorm@gmail.com';
    $subject = 'Test my direct-minute cron job';
    $message = 'If you received this message, it means that your 3-minute cron job has worked! <img draggable="false" class="emoji" alt="🙂" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/1f642.svg"> ';
 
    wp_mail( $to, $subject, $message );
 
}


/* ==========================================================================
   TRANSLATOR
   ========================================================================== */
if (class_exists('Polylang')) {
	$lang = pll_current_language();

	function translator($string) {

		$translation = $string;

		if (pll_current_language() == 'fr') {
			switch($string){
				case 'on':
				$translation = 'sur';
				break;
				case 'RSS Feed':
				$translation = 'Flux RSS';
				break;
				case 'Our calendar':
				$translation = 'Notre calendrier';
				break;
				case 'View all dates':
				$translation = 'Voir toutes les dates';
				break;
				case '<i>R</i> experts, for all your R needs':
				$translation = "Une équipe d'experts du langage <i>R</i> pour tous vos besoins";
				break;
				case 'R experts at your disposal':
				$translation = 'Des experts R à votre service';
				break;
				case 'Discover':
				$translation = 'Découvrir';
				break;
				case 'Contact us':
				$translation = 'Contactez-nous';
				break;
				case 'Get in touch':
				$translation = 'Envoyez-nous un message';
				break;
				case 'A question ?<br/>Tell us how we can help.':
				$translation = 'Vous avez une question<br/>ou désirez un renseignement ?';
				break;
				case 'A team of R consultants':
				$translation = 'Consultants logiciel R';
				break;
				case 'Website by':
				$translation = 'Une réalisation';
				break;
				case 'Legal Notice':
				$translation = 'Mentions Légales';
				break;
				case 'Context summary':
				$translation = 'Contexte et enjeux de la mission';
				break;
				case 'Our intervention':
				$translation = 'Notre intervention';
				break;
				case 'Result & added value':
				$translation = 'Résultat & valeur ajoutée';
				break;
				case 'Table of contents':
				$translation = 'Table des matières';
				break;
				case 'Read more':
				$translation = 'Lire la suite';
				break;
				case 'About the author':
				$translation = "À propos de l'auteur";
				break;
				case 'Share this article on':
				$translation = "Partager l'article sur";
				break;
				default:
				$translation = $string;
				break;
			}
		}

		return $translation;
	}
}

/* Remplace la valeur de ver= par la derniere date de modification du fichier
 * source: https://digwp.com/2009/07/remove-wordpress-version-number/
 */
// function shapeSpace_remove_version_scripts_styles($src) {
//   if (strpos($src, 'ver=')) {
//     $src = remove_query_arg('ver', $src);
//     $dt = remoteFileData($src);
//     $src = add_query_arg( 'ver', /*date('YmdHis')*/$dt, $src );
//   }
//   return $src;
// }
// add_filter('style_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);
// add_filter('script_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);

// /* Retourne la date de modification du fichier
//  * source: https://stackoverflow.com/a/13503544
//  */
// function remoteFileData($f) {
//     $h = get_headers($f, 1);
//     if (stristr($h[0], '200')) {
//         foreach($h as $k=>$v) {
//             if(strtolower(trim($k))=="last-modified") return date('YmdHis',strtotime($v));
//         }
//     }
// }