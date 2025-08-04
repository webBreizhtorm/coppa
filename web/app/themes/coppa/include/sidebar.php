<?php
add_action( 'widgets_init', 'breizhtorm_sidebars' );
function breizhtorm_sidebars() {
	register_sidebar(
		array(
			'id' => 'footer-line1-col1',
			'name' => __( 'Bloc gauche haut footer' ),
			'description' => __( 'Elements dans le bas de page.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => ''
		)
	);
	
	register_sidebar(
		array(
			'id' => 'footer-line1-col2',
			'name' => __( 'Bloc droit haut footer' ),
			'description' => __( 'Elements dans le bas de page.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => ''
		)
	);
	
	register_sidebar(
		array(
			'id' => 'footer-line2-col1',
			'name' => __( 'Bloc gauche bas footer' ),
			'description' => __( 'Elements dans le bas de page.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'footer-line2-col2',
			'name' => __( 'Bloc centre bas footer' ),
			'description' => __( 'Elements dans le bas de page.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'footer-line2-col3',
			'name' => __( 'Bloc droit bas footer' ),
			'description' => __( 'Elements dans le bas de page.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
} 