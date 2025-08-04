<?php
$footerMenu = array(
    'theme_location'  => 'footer',
    'menu'            => '',
    'container'       => '',
    'container_class' => false,
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => 'footer-menu',
    'echo'            => false,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => ' |',
    'link_before'     => '',
    'link_after'      => '',
    'depth'           => 0,
    'walker'          => ''
);
?>

		<footer>
			<div class="wrapper">
				<div class="cols center">
					<div class="col_full">
					<p>Pour toute question ou réclamation, contactez nous par mail sur <a href="mailto:<?php echo carbon_get_theme_option('contact_email'); ?>"><?php echo carbon_get_theme_option('contact_email'); ?></a></p>
					</div>
					<div class="col_full">
						<?php echo strip_tags( wp_nav_menu( $footerMenu ), '<a>' ); ?><a href="<?php echo wp_get_attachment_url(carbon_get_theme_option('download_allergenes')); ?>" target="_blank">Tableau des allergènes</a>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
    </body>
</html>
