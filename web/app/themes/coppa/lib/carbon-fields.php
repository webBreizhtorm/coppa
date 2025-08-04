<?php

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once plugin_dir_path( __FILE__ ) . '../vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', 'Options Brook' )
        ->add_fields( array(
            Field::make( 'text', 'insta', 'Lien Instagram' ),
            Field::make( 'text', 'fb', 'Lien Facebook' ),
            Field::make( 'text', 'ubereats', 'Lien Ubereats' ),
            Field::make( 'text', 'zelty', 'Lien Zelty' ),
            Field::make( 'text', 'gmaps', 'Lien Google Maps' ),
            Field::make( 'text', 'contact_email', 'Adresse mail de contact' ),
            Field::make( 'file', 'download_menu', 'Menu à télécharger (PDF)' ),
            Field::make( 'file', 'download_allergenes', 'Tableau des allergènes à télécharger (PDF)' )
        ) );
}