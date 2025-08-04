<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".get_bloginfo('url'));
exit();
?>
<?php get_header(); ?>
	<main id="main">
		<sections id="content">
			<div class="wrapper">
				<div class="breadcrumb">
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					} ?>
				</div>
				<h1>ERREUR 404</h1>
				<h2>Vous êtes perdu ?</h2>		
				<p>Désolé, mais la page que vous recherchez n'existe pas ou plus.</p>
				<p><a class="btn" href="<?php bloginfo('url'); ?>">Retour à l'accueil du site</a></p>
			</div>
		</section>
    </main>
<?php get_footer(); ?>