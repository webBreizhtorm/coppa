<?php
session_start();
//redirection page enfant si page sans contenu
$args = array( 'child_of' => $post->ID, 'sort_column' => 'menu_order' , 'sort_order'=> 'ASC');
$pagelist = get_pages( $args );
if ($pagelist) {
	$firstchild = $pagelist[0]->ID;
	if($post->post_content == "" && $_SERVER['REQUEST_URI'] != '/' && is_int($firstchild) && is_page()){
		header('Location: '.get_bloginfo('url').'/?page_id='.$firstchild);
	};
}

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php echo get_language_attributes(); ?>> <!--<![endif]-->
    <head itemscope itemtype="http://schema.org/WebSite">
        <meta charset="<?php bloginfo("charset"); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title() ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Agence Breizhtorm - www.breizhtorm.fr" />
        <?php wp_head(); ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177112348-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-177112348-1');
        </script>

    </head>
    <body <?php body_class($class); ?>>
    	
    	 <!--[if lt IE 7]>
            <p class="browsehappy">Vous utilisez un <strong>navigateur obsolète</strong>. Merci <a href="http://browsehappy.com/">de mettre à jour votre navigateur</a> pour une meilleure expérience.</p>
        <![endif]-->