<?php get_header(); ?>

	<section role="main" id="content">
		
		<div class="wrapper">
			<div class="breadcrumb">
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
				} ?>
			</div>
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; else : ?>
			<?php endif; ?>
		</div>
		
	</section>

<?php get_footer(); ?>      