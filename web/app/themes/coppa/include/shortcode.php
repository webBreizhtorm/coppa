<?php
/* COLONNE 1_2 */
function colonne_1_2( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'id'     => '',
	  'class' => '',
	  'first' => '',
   ), $atts, 'colonne_1_2' ) );

   $html = "<div id='$id' class='col_1_2 $class $first'>".do_shortcode($content)."</div>";
   return $html;
}
add_shortcode( 'colonne_1_2', 'colonne_1_2' );

/* CLEAR */
function clear( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'id'     => '',
	  'class' => '',
	  'first' => '',
   ), $atts, 'clear' ) );

   $html = "<br class='clear'>";
   return $html;
}
add_shortcode( 'clear', 'clear' );

/* VIDEO */
function youtube( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'id'     => '',
	  'first' => '',
	  'lien' => '',
   ), $atts, 'video' ) );

   $html = "<a class='btn black video yellow-icon before' href='$lien'><span>".do_shortcode($content)."</span></a>";
   return $html;
}
add_shortcode( 'youtube', 'youtube' );