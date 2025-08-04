<?php
/* ==========================================================================
   FONCTIONS POST TYPE
   ========================================================================== */	
	
	/* SLIDER */
	
	add_action( 'init', 'create_post_slider' );
	function create_post_slider() {
		$labels = array(
			'name'						=> 'Slider',
			'singular_name'				=> 'slider',
			'add_new'					=> 'Ajouter un slider',
			'add_new_item'				=> 'Ajouter un slider',
			'edit_item'					=> 'Modifier un slider',
			'new_item'					=> 'Nouveau slider',
			'view_item'					=> 'Voir le slider',
			'search_items'				=> 'Rechercher un slider',
			'not_found'					=>  'Aucun slider trouvé',
			'not_found_in_trash'		=> 'Aucun slider dans la poubelle', 
			'parent_item_colon'			=> __('Slider'),
			'parent'					=> __('Slider'),
			'menu_name'					=> 'Slider',
		);
		
		$args = array(
			'labels'				=> $labels,
			'show_ui'				=> true, 
			'has_archive' 			=> false,
			'public'				=> false,
			'publicly_queryable'  	=> false,
			'show_in_menu'			=> true, 
			'show_in_rest'			=> true, 
			'query_var'				=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'menu_position'			=> 6,
			'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'menu_icon' => 'dashicons-format-gallery',
		); 
		register_post_type('slider',$args);
	}
	
	/* PRODUITS */
	/*add_action( 'init', 'produit_taxonomy_init' );
	function produit_taxonomy_init() {

		$labels = array(
			'name' => _x( 'Catégorie', 'taxonomy general name' ) ,
			'singular_name' => _x( 'Gamme', 'taxonomy singular name' ) ,
			'search_items' => __( 'Rechercher une catégorie' ) ,
			'all_items' => __( 'Toutes les catégorie' ) ,
			'parent_item' => __( 'Catégorie parente' ) ,
			'parent_item_colon' => __( 'Catégorie parente:' ) ,
			'edit_item' => __( 'Editer la catégorie' ) ,
			'update_item' => __( 'Mettre à jour la catégorie' ) ,
			'add_new_item' => __( 'Ajouter une catégorie' ) ,
			'new_item_name' => __( 'Nom de la nouvelle catégorie' ) ,
			'menu_name' => __( 'Catégories' ) 
		);

		register_taxonomy( 'category_produit', array() ,
			array(
				'public' => true,
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'query_var' => 'category_produit',
				'rewrite' => array(
					'slug' => 'plv',
				),
			)
		);
		flush_rewrite_rules();
	}


	add_action( 'init', 'create_post_produits' );
	function create_post_produits() {
		$labels = array(
			'name'						=> 'PLV',
			'singular_name'				=> 'produit',
			'add_new'					=> 'Ajouter un Produit',
			'add_new_item'				=> 'Ajouter un nouveau Produit',
			'edit_item'					=> 'Modifier un Produit',
			'new_item'					=> 'Nouveau Produit',
			'view_item'					=> 'Voir le Produit',
			'search_items'				=> 'Rechercher un Produit',
			'not_found'					=> 'Aucun Produti trouvé',
			'not_found_in_trash'		=> 'Aucun Produit dans la poubelle', 
			'parent_item_colon'			=> __('PLV'),
			'parent'					=> __('PLV'),
			'menu_name'					=> 'PLV',
		);
		
		$args = array(
			'labels'				=> $labels,
			'show_ui'				=> true, 
			'public'				=> true,
			'publicly_queryable'	=> true,
			'show_in_menu'			=> true, 
			
			'rewrite' => array
				(
					'slug' => 'plv/%category_produit%',
					'with_front' => false

				),
			'query_var'				=> 'plv-term',
			'capability_type'		=> 'post',
			'has_archive' 			=> 'plv',
			'taxonomies' 			=> array( 'category_produit' ),
			'menu_position'			=> 4,
			'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
			'menu_icon' => 'dashicons-welcome-add-page',
		); 
		register_post_type('plv',$args);
		flush_rewrite_rules();
	}

	add_filter('post_type_link', 'plv_term_permalink', 10, 4);
	function plv_term_permalink($post_link, $post, $leavename, $sample)
	{
		if ( false !== strpos( $post_link, '%category_produit%' ) ) {
			$glossary_letter = get_the_terms( $post->ID, 'category_produit' );
			$post_link = str_replace( '%category_produit%', array_pop( $glossary_letter )->slug, $post_link );
		}
		return $post_link;
	}*/

	/* PROJETS */
	// add_action( 'init', 'create_post_projets' );
	// function create_post_projets() {
	// 	$labels = array(
	// 		'name'						=> 'Projet',
	// 		'singular_name'				=> 'projet',
	// 		'add_new'					=> 'Ajouter un projet',
	// 		'add_new_item'				=> 'Ajouter un projet',
	// 		'edit_item'					=> 'Modifier un projet',
	// 		'new_item'					=> 'Nouveau projet',
	// 		'view_item'					=> "Voir le projet",
	// 		'search_items'				=> 'Rechercher un projet',
	// 		'not_found'					=>  'Aucun projet trouvé',
	// 		'not_found_in_trash'		=> 'Aucun projet dans la poubelle', 
	// 		'parent_item_colon'			=> __('Projets'),
	// 		'parent'					=> __('Projets'),
	// 		'menu_name'					=> 'Projets',
	// 	);
		
	// 	$args = array(
	// 		'labels'				=> $labels,
	// 		'show_ui'				=> true, 
	// 		'has_archive' 			=> true,
	// 		'public'				=> true,
	// 		'publicly_queryable'  	=> true,
	// 		'show_in_menu'			=> true, 
	// 		'query_var'				=> true,
	// 		'rewrite' 				=> array( 'slug' => 'references', 'with_front' => true ),
	// 		'capability_type'		=> 'post',
	// 		'hierarchical'			=> true,
	// 		'menu_position'			=> 6,
	// 		'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions' ),
	// 		'menu_icon' => 'dashicons-welcome-view-site',
	// 	); 
	// 	register_post_type('projet',$args);
	// }

?>