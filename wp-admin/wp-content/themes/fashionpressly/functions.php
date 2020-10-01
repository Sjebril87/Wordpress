<?php 


// New sticky nav after scroll JS & styles

add_action( 'wp_enqueue_scripts', 'fashionpressly_enqueue_styles' );
function fashionpressly_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
	wp_enqueue_script( 'fasionpressly-script', get_stylesheet_directory_uri() . '/js/fashionpressly.js', array(), '20170824', true );
} 


// New fonts

function fashionpressly_google_fonts() {
	wp_enqueue_style( 'fashionpressly-google-fonts', '//fonts.googleapis.com/css?family=Raleway', false ); 
}
add_action( 'wp_enqueue_scripts', 'fashionpressly_google_fonts' );


// New customizer stuff

function fashionpressly_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'navigation_settings', array(
		'title'      => __('Navigation Settings','fashionpressly'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'navigation_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_background_color', array(
		'label'       => __( 'Background Color', 'fashionpressly' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_background_color',
		) ) );
	$wp_customize->add_setting( 'navigation_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_text_color', array(
		'label'       => __( 'Link Color', 'fashionpressly' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_text_color',
		) ) );
	$wp_customize->add_setting( 'navigation_border_color', array(
		'default'           => '#dedede',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_border_color', array(
		'label'       => __( 'Border Color', 'fashionpressly' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_border_color',
		) ) );
}
add_action( 'customize_register', 'fashionpressly_customize_register' );

if(! function_exists('fashionpressly_customizer_output' ) ):
	function fashionpressly_customizer_output(){
		?>

		<style type="text/css">
			.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
			#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; }
			#secondary .widget h3, #secondary .widget h3 a, #secondary .widget h4, #secondary .widget h1, #secondary .widget h2, #secondary .widget h5, #secondary .widget h6 { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
			#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
		</style>
		<?php }
		add_action( 'wp_head', 'fashionpressly_customizer_output' );
		endif;

