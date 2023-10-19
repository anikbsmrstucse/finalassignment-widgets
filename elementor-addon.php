<?php
/**
 * Plugin Name: Finalassignment Addon
 * Description: Final Assignment All widgets for Elementor.
 * Version:     1.0.0
 * Author:      Anik Islam
 * Author URI:  https://www.devaanik.com/
 * Text Domain: finalassignment
 */

function finalassignment_elementor_addon( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/breadcrum-widget.php' );
	require_once( __DIR__ . '/widgets/hero-widget.php' );
	require_once( __DIR__ . '/widgets/aboutus-widget.php' );
	require_once( __DIR__ . '/widgets/section-header.php' );
	require_once( __DIR__ . '/widgets/service-card.php' );
	require_once( __DIR__ . '/widgets/achivement-widget.php' );
	require_once( __DIR__ . '/widgets/recent-works.php' );


	$widgets_manager->register( new \Elementor_Hero_Widget() );
	$widgets_manager->register( new \Elementor_Breadcrum_Widget() );
	$widgets_manager->register( new \Elementor_AboutUs_Widget() );
	$widgets_manager->register( new \Elementor_SectionHeader_Widget() );
	$widgets_manager->register( new \Elementor_ServiceCard_Widget() );
	$widgets_manager->register( new \Elementor_Achivement_Widget() );
	$widgets_manager->register( new \Elementor_RecentWorks_Widget() );

}
add_action( 'elementor/widgets/register', 'finalassignment_elementor_addon' );

// function register_custom_css(){
// 	/* Styles */
// 	wp_register_style( 'custom_styles', plugins_url( 'assests/css/custom-styles.css', __FILE__ ) );

// }

// add_action( 'wp_enqueue_scripts', 'register_custom_css' );

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'first-category',
		[
			'title' => esc_html__( 'Final Assignment', 'finalassignment' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );