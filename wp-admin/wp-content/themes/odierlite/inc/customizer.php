<?php
/**
 * odierlite Theme Customizer.
 *
 * @package odierlite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function odierlite_customize_register( $wp_customize ) {

	require_once get_template_directory().'/inc/customizer-controls.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_panel( 'theme_options' ,
        array(
            'title'       => esc_html__( 'ODIER: Theme Options', 'odierlite' ),
            'description' => ''
        )
    );


    // Sidebar settings
    $wp_customize->add_section( 'odierlite_home_sidebar' ,
        array(
            'title'       => esc_html__( 'Sidebar', 'odierlite' ),
            'description' => '',
            'panel'       => 'theme_options',
            'piority'     => 1
        )
    );

    $wp_customize->add_setting( 'odierlite_home_sidebar', array(
        'sanitize_callback' => 'odierlite_sanitize_checkbox',
        'default' => false,
    ) );

    $wp_customize->add_control(
        'odierlite_home_sidebar',
            array(
                'type' => 'checkbox',
                'label'      => esc_html__( 'Disable Sidebar on Home Page, Archive Page', 'odierlite' ),
                'section'    => 'odierlite_home_sidebar',
            )
    );

    $wp_customize->add_setting( 'odierlite_sidebar_post', array(
        'sanitize_callback' => 'odierlite_sanitize_checkbox',
        'default' => false,
    ) );

    $wp_customize->add_control(
        'odierlite_sidebar_post',
            array(
                'type' => 'checkbox',
                'label'      => esc_html__( 'Disable Sidebar on Single Post', 'odierlite' ),
                'section'    => 'odierlite_home_sidebar',
            )
    );


	// Color settings
	$wp_customize->add_section( 'odierlite_color_general' ,
	    array(
	        'title'       => esc_html__( 'Color Accent', 'odierlite' ),
	        'description' => '',
	        'panel'       => 'theme_options',
	        'piority'     => 2
	    )
	);

	$wp_customize->add_setting( 'odierlite_color_accent', array(
	    'default'              => '#BB992E',
	    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
	    'sanitize_js_callback' => 'maybe_hash_hex_color',
	) );

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'odierlite_color_accent',
	            array(
	                'label'      => esc_html__( 'Primary Color', 'odierlite' ),
	                'section'    => 'odierlite_color_general',
	            )
	    )
	);

	// Featured slider settings
	$wp_customize->add_section( 'odierlite_featured' ,
	    array(
	        'title'       => esc_html__( 'Featured Slider', 'odierlite' ),
	        'description' => '',
	        'panel'       => 'theme_options',
	        'piority'     => 3
	    )
	);

	$wp_customize->add_setting( 'odierlite_featured_slider', array(
        'sanitize_callback' => 'odierlite_sanitize_checkbox',
		'default' => false,
	) );

	$wp_customize->add_control(
		'odierlite_featured_slider',
            array(
                'type' => 'checkbox',
                'label'      => esc_html__( 'Enable Featured Slider', 'odierlite' ),
                'section'    => 'odierlite_featured',
            )
	);

	$wp_customize->add_setting( 'featured_style', array(
            'sanitize_callback' => 'odierlite_sanitize_sanitize_select',
            'default' => 'carousel',
            'validate_callback' => 'odierlite_upgrade_pro_notice'
        ) );

	$wp_customize->add_control(
            'featured_style',
            array(
                'type'       => 'select',
                'label'      => esc_html__( 'Display', 'odierlite' ),
                'section'    => 'odierlite_featured',
                'choices' => array(
                    'carousel' => esc_html__( 'Carousel', 'odierlite' ),
                    'slider' => esc_html__( 'Slider boxes', 'odierlite' ),
                )
            )
	);

	$wp_customize->add_setting( 'featured_cate', array(
            'sanitize_callback' => 'odierlite_sanitize_sanitize_select',
            'default' => 'latest',
            'validate_callback' => 'odierlite_upgrade_pro_notice'
        ) );
	$wp_customize->add_control(
            'featured_cate',
            array(
                'type'       => 'select',
                'label'      => esc_html__( 'Featured Category (Upgrade Odier Pro)', 'odierlite' ),
                'section'    => 'odierlite_featured',
                'choices' => array(
                    'latest' => esc_html__( 'Recent Posts', 'odierlite' )
                )
            )
	);

	$wp_customize->add_setting( 'odierlite_featured_number', array(
            'sanitize_callback' => 'odierlite_sanitize_number',
            'default' => 10,
    ) );
    $wp_customize->add_control(
            'odierlite_featured_number',
            array(
                'type' => 'text',
                'label'      => esc_html__( 'Number post to show', 'odierlite' ),
                'section'    => 'odierlite_featured',
            )
    );

    // Odier Pro
	$wp_customize->add_section( 'odierlite_pro' ,
	    array(
	        'title'       => esc_html__( 'Upgrade to Odier Pro', 'odierlite' ),
	        'description' => '',
	        'panel'       => 'theme_options',
	        'piority'     => 3
	    )
	);

	$wp_customize->add_setting( 'odierlite_features', array(
            'sanitize_callback' => 'sanitize_text_field',
        ) );
	$wp_customize->add_control(
            new Odierlite_Customize_Pro_Control(
                $wp_customize,
                'odierlite_features',
                array(
                    'label'      => esc_html__( 'Odier Features', 'odierlite' ),
                    'description'   => sprintf( __('<span>2 Featured slider style</span><span>4 Different Blog Layouts</span><span>WooCommerce Compatible</span><span>3 Useful Promo Boxes</span><span>Customizable coloring options</span><span>4 Custom Widgets</span><span>3 Footer Widget</span><span>Love Post System</span><span>Footer Copyright Text</span><span>Footer Logo Upload</span><span>6 months support</span><span>Well Documented</span><span>Child Theme included</span><span>And More...</span>','odierlite')),
                    'section'    => 'odierlite_pro',
                )
            )
	);
	$wp_customize->add_setting( 'odierlite_pro_links', array(
            'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control(
		new Odierlite_Customize_Pro_Control(
			$wp_customize,
			'odierlite_pro_links',
			array(
				'description'   => sprintf( __('<a target="_blank" class="odierlite-buy-button" href="http://zthemes.net/themes/odier">Buy Now</a>', 'odierlite')),
				'section'    => 'odierlite_pro',
			)
        )
	);

}
add_action( 'customize_register', 'odierlite_customize_register' );

function odierlite_sanitize_checkbox( $input ){
    if ( $input == 1 || $input == 'true' || $input === true ) {
        return 1;
    } else {
        return 0;
    }
}
function odierlite_sanitize_sanitize_select( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function odierlite_upgrade_pro_notice( $validity, $value ){
    if ( $value == 'slider' ) {
        $validity->add( 'notice', esc_html__( 'Upgrade to Odier Pro to display featured content as a slider.', 'odierlite' ) );
    }
    return $validity;
}
function odierlite_sanitize_number( $number, $setting ) {
    $number = absint( $number );
    return ( $number ? $number : $setting->default );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function odierlite_customize_preview_js() {
	wp_enqueue_script( 'odierlite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'odierlite_customize_preview_js' );

/**
 * Load customizer style
 */
function odierlite_customizer_load_css(){
    wp_enqueue_style( 'odierlite-customizer', get_template_directory_uri() . '/css/customizer.css' );
}
add_action('customize_controls_print_styles', 'odierlite_customizer_load_css');
