<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Breizhtorm
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'breizhtorm_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function breizhtorm_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        /*array(
            'name'               => 'Contact Form 7', // The plugin name.
            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/lib/plugins/contact-form-7.4.1.1.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),*/
        /**
         * *** STARTER *** *
         */
        array(
            'name'      => 'Breizhtorm starter',
            'slug'      => 'wordpress-breizhtorm-utils',
            'required'  => false,
            'source'    => get_stylesheet_directory() . '/lib/plugins/wordpress-breizhtorm-utils.zip', // The plugin source.
        ),
        /**
         * *** ACF *** *
         */
        array(
            'name'      => 'Advanced Custom Fields PRO',
            'slug'      => 'advanced-custom-fields-pro',
            'required'  => false,
            // 'source'    => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.zip', // The plugin source.
            'source'    => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.5.8.0.zip', // The plugin source.
        ),
        array(
            'name'      => 'Advanced Custom Fields: Contact Form 7',
            'slug'      => 'acf-cf7',
            'source'    => get_stylesheet_directory() . '/lib/plugins/acf-cf7.zip', // The plugin source.
            'required'  => false,
        ),
        array(
            'name'      => 'ACF to REST API',
            'slug'      => 'acf-to-rest-api',
            'required'  => false,
        ),
        /**
         * *** CONTACT FORM *** *
         */
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'Contact Form 7 Honeypot',
            'slug'      => 'contact-form-7-honeypot',
            'required'  => false,
        ),
        /**
         * *** SEO *** *
         */
        array(
            'name'      => 'WordPress SEO by Yoast',
            'slug'      => 'wordpress-seo',
            'required'  => false,
        ),
        /**
         * *** PERFORMANCES *** *
         */
        array(
            'name'      => 'Regenerate Thumbnails',
            'slug'      => 'regenerate-thumbnails',
            'required'  => false,
        ),
        array(
            'name'      => 'WP Fastest Cache',
            'slug'      => 'wp-fastest-cache',
            'required'  => false,
        ),
        array(
            'name'      => 'W3 Total Cache',
            'slug'      => 'w3-total-cache',
            'required'  => false,
        ),
        array(
            'name'      => 'Lazy Load by WP Rocket',
            'slug'      => 'rocket-lazy-load',
            'required'  => false,
        ),
        array(
            'name'      => 'Disable Emojis',
            'slug'      => 'disable-emojis',
            'required'  => false,
        ),
        array(
            'name'      => 'EWWW Image Optimizer',
            'slug'      => 'ewww-image-optimizer',
            'required'  => false,
        ),
        array(
            'name'      => 'WP Cerber Security, Antispam & Malware Scan',
            'slug'      => 'wp-cerber',
            'required'  => false,
        ),
        /**
         * *** UTILS *** *
         */
        array(
            'name'      => 'Updraft Plus',
            'slug'      => 'updraftplus',
            'required'  => false,
        ),
        array(
            'name'      => 'Newsletter',
            'slug'      => 'newsletter',
            'required'  => false,
        ),
        array(
            'name'      => 'Super Progressive Web Apps',
            'slug'      => 'super-progressive-web-apps',
            'required'  => false,
        ),
        array(
            'name'      => 'Revolution Slider',
            'slug'      => 'revslider',
            'source'    => get_stylesheet_directory() . '/lib/plugins/revslider.zip', // The plugin source.
            'required'  => false,
        ),
        array(
            'name'      => 'WP Sitemap Page',
            'slug'      => 'wp-sitemap-page',
            'required'  => false,
        ),
        array(
            'name'      => 'Polylang',
            'slug'      => 'polylang',
            'required'  => false,
        ),
        array(
            'name'      => 'WP RSS Bridge',
            'slug'      => 'wp-rss-bridge',
            'source'    => get_stylesheet_directory() . '/lib/plugins/wp-rss-bridge.zip', // The plugin source.
            'required'  => false,
        ),
        /**
         * *** POSTS *** *
         */
        array(
            'name'      => 'Classic Editor',
            'slug'      => 'classic-editor',
            'required'  => false,
        ),
        array(
            'name'      => 'Simple Custom Post Order',
            'slug'      => 'simple-custom-post-order',
            'required'  => false,
        ),
        array(
            'name'      => 'Duplicate Post Page Menu & Custom Post Type',
            'slug'      => 'duplicate-post-page-menu-custom-post-type',
            'required'  => false,
        ),
        array(
            'name'      => 'WP Editor Widget',
            'slug'      => 'wp-editor-widget',
            'required'  => false,
        ),
        array(
            'name'      => 'WP Better Emails',
            'slug'      => 'wp-better-emails',
            'required'  => false,
        ),
        /**
         * *** USER *** *
         */
        array(
            'name'      => 'Adminimize',
            'slug'      => 'adminimize',
            'required'  => false,
        ),
        array(
            'name'      => 'User Role Editor',
            'slug'      => 'user-role-editor',
            'required'  => false,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Installation des Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Installer les plugins', 'tgmpa' ),
            'installing'                      => __( 'Installation du plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Oups, il y a eu un bug.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'Ce thème requiert: %1$s.', 'Ce thème requiert: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'Ce thème recommande: %1$s.', 'Ce thème recommande: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( "Désolé, mais les permissions pour installer le plugin sont insuffisantes. Contactez l'administrateur.", "Désolé, mais les permissions pour installer les plugins sont insuffisantes. Contactez l'administrateur." ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'Un plugin requis est inactif: %1$s.', 'Certains plugins requis sont inactifs: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'Un plugin recommandé est inactif: %1$s.', 'Certains plugins recommandés sont inactifs: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( "Désolé, mais les permissions pour installer le plugin sont insuffisantes. Contactez l'administrateur.", "Désolé, mais les permissions pour installer les plugins sont insuffisantes. Contactez l'administrateur." ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'Ce plugin devrait être mis-à-jour: %1$s.', 'Ces plugins devraient être mis-à-jour: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( "Désolé, mais les permissions pour installer le plugin sont insuffisantes. Contactez l'administrateur.", "Désolé, mais les permissions pour installer les plugins sont insuffisantes. Contactez l'administrateur." ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( "Commencer l'installation", "Commencer les installations" ),
            'activate_link'                   => _n_noop( "Commencer l'activation", "Commencer les activations" ),
            'return'                          => __( "Retourner à l'installateur", 'tgmpa' ),
            'plugin_activated'                => __( 'Le plugin a été activé.', 'tgmpa' ),
            'complete'                        => __( 'Tous les plugins ont été activés. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}