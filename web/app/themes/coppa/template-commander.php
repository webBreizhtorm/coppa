

<?php 
/**
* Template Name: Page commander
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header(); ?>

	<main id="main">
		<section id="content">
			
			<div class="wrapper">
				<?php if ( ! post_password_required() ) { ?>
					<div class="breadcrumb">
						<?php if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<p id="breadcrumbs">','</p>');
						} ?>
					</div>
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<?php the_content(); ?>
						<div class="zelty">
							<h3>Commander en ligne</h3>
                        	<a href="<?php echo carbon_get_theme_option('zelty'); ?>">Commander en Click & Collect</a>
						</div>
					<?php endwhile; else : ?>
					<?php endif; ?>
				<?php } ?>
			</div>
			
		</section>
	</main>

<?php get_footer(); ?>