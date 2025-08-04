<?php get_header(); ?>
<?php if ( ! post_password_required() ) : ?>
	<main id="main" role="main">
		<?php 
		$context  = stream_context_create(
		  array(
		    "http" => array(
		      "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
		    )
		));
		?>
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

				<?php
				// recuperation des slides du slider
				$wpjson = get_bloginfo('url').'/wp-json/wp/v2/slider?_embed&order=asc';
				$response = file_get_contents($wpjson);
				$Slidesdatas = json_decode($response);

				// traitement des donnees des slides
				if ($Slidesdatas) { ?>
					<section id="slider" class="slider">
						<div class="flexslider fade">
							<ul class="slides">
								<?php foreach ($Slidesdatas AS $data) { ?>
									<li style="background:url('<?php echo $data->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->full->source_url; ?>') no-repeat center center / cover;"></li>
								<?php } ?>
							</ul>
						</div>
						<div class="container">
							<div class="wrapper center">
								<div class="content">
									<div class="cols align-center">
										<div class="col_full">
											<?php if (get_theme_mod( 'custom_logo' )) { ?>
												<?php
													$custom_logo_id = get_theme_mod( 'custom_logo' );
													$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
												?>
												<figure class="presentation">
													<img src="<?php echo $image[0]; ?>" />
													<figcaption class="presentation__caption">
														<h1 class="presentation__title"><?php echo get_the_title(); ?></h1>
														<?php the_content(); ?>
													</figcaption>
												</figure>
											<?php }; ?>
										</div>
										<div class="col_full">
											<ul>
												<li>
													<a href="<?php echo carbon_get_theme_option('insta'); ?>" target="_blank" title="<?php echo get_bloginfo('name'); ?> sur Instagram" alt="<?php echo get_bloginfo('name'); ?> sur Instagram"><i class="icon-instagram"></i></a>
												</li>
												<li>
													<a href="<?php echo carbon_get_theme_option('fb'); ?>" target="_blank" title="<?php echo get_bloginfo('name'); ?> sur Facebook" alt="<?php echo get_bloginfo('name'); ?> sur Facebook"><i class="icon-facebook"></i></a>
												</li>
											</ul>
										</div>
										<div class="col_full">
											<?php if ( ! empty( carbon_get_theme_option('zelty') ) ) { ?>
												<a id="commander" href="<?php echo get_bloginfo('url'); ?>/commander/"><i class="icon-shopping-bag"></i> Commander à emporter</a>
											<?php } ?>
											<?php if ( ! empty( carbon_get_theme_option('ubereats') ) ) { ?>
												<a id="ubereats" href="<?php echo carbon_get_theme_option('ubereats'); ?>" target="_blank"><i class="icon-bicycle"></i> Livraison Ubereats</a>
												<!-- <a id="deliveroo" href="https://deliveroo.fr/fr/menu/rennes/centre/coppa" target="_blank"><i class="icon-deliveroo"></i> Livraison Deliveroo</a> -->
											<?php } ?>
										</div>
										<div class="col_full">
											<a id="menu" href="<?php echo wp_get_attachment_url(carbon_get_theme_option('download_menu')); ?>" target="_blank">Télécharger le menu</a>
											<a id="roadmap" href="<?php echo carbon_get_theme_option('gmaps'); ?>" target="_blank"><i class="icon-location"></i> J'y vais !</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				<?php } ?>

			<?php endwhile; ?>
		<?php endif; ?>
	</main>
<?php endif; ?> 
<?php get_footer(); ?>