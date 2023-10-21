<?php

// // custom short code
// function custom_shortcode_function($atts) {
//     // Process attributes if needed
//     $content = '[contact-form-7 id="0b95ebc" title="FAQ"]';
//     return $content;
// }
// add_shortcode('custom_shortcode', 'custom_shortcode_function');


class Custom_Shortcode_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'custom-shortcode-widget';
    }

    public function get_title() {
        return 'Custom Shortcode Widget';
    }

    public function get_icon()
    {
        return 'eicon-shortcode';
    }

    public function get_categories()
    {
        return ['first-category'];
    }

    public function register_controls()
    {
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Short Code Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'short_code',
			[
				'label' => esc_html__( 'Paste Your Shortcode', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
			]
		);

		$this->end_controls_section();

    }

    protected function render() 

    {
        $settings = $this->get_settings_for_display();
        // Display your shortcode content here
        $shortcode = $settings['short_code'];
        // echo do_shortcode('[custom_shortcode]');
        echo do_shortcode($shortcode);
    }
}