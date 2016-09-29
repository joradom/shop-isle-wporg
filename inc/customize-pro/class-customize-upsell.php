<?php


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Shop_Isle_Customizer_Upsell {

    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {

        static $instance = null;

        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }

        return $instance;
    }

    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct() {}

    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions() {

        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', array( $this, 'sections' ) );

        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
    }

    /**
     * Sets up the customizer sections.
     *
     * @since  1.0.0
     * @access public
     * @param  object  $manager
     * @return void
     */
    public function sections( $manager ) {

        // Load custom sections.
        require_once( trailingslashit( get_template_directory() ) . 'inc/customize-pro/class-customize-upsell-pro.php' );

        // Register custom section types.
        $manager->register_section_type( 'Shop_Isle_Customizer_Upsell_Pro' );

        // Register sections.
        $manager->add_section( new Shop_Isle_Customizer_Upsell_Pro( $manager, 'shop-isle-upsell',
                array(
                    'label_url' => 'http://themeisle.com/themes/shop-isle-pro/',
                    'label_text' => __('View PRO version', 'shop-isle'),

                    'btn1_url' => 'http://docs.themeisle.com/article/421-shop-isle-documentation-wordpress-org',
                    'btn1_text' => __('View Documentation','shop-isle'),

                    'priority' => -1
                )
            )
        );
    }

    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {

        wp_enqueue_script( 'shop-isle-upsell-js', trailingslashit( get_template_directory_uri() ) . 'inc/customize-pro/upsell-customize-controls.js', array( 'customize-controls' ) );

        wp_enqueue_style( 'shop-isle-upsell-style', trailingslashit( get_template_directory_uri() ) . 'inc/customize-pro/upsell-customize-controls.css' );
    }
}

// Doing this customizer thang!
Shop_Isle_Customizer_Upsell::get_instance();