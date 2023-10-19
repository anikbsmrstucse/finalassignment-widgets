<?php

class Elementor_AboutUs_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'aboutus-widget';
    }

    public function get_title()
    {
        return 'AboutUs Widget';
    }

    public function get_icon()
    {
        return 'eicon-thumbnails-right';
    }

    public function get_categories()
    {
        return ['first-category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
			'widget_content',
			[
				'label' => esc_html__( 'About Us content', 'finalassignment' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'widget_name',
			[
				'label' => esc_html__( 'Section Name', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'finalassignment' ),
				'placeholder' => esc_html__( 'Type your title here', 'finalassignment' ),
			]
		);
		$this->add_responsive_control(
			'widget_title',
			[
				'label' => esc_html__( 'Title', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'finalassignment' ),
				'placeholder' => esc_html__( 'Type your title here', 'finalassignment' ),
                'label_block' => true,
			]
		);

        $this->add_control(
			'section_description',
			[
				'label' => esc_html__( 'Description', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'finalassignment' ),
			]
		);

        $this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default Text', 'finalassignment' ),
			]
		);

        $this->add_control(
			'button_url',
			[
				'label' => esc_html__( 'Button URL', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

        $this->add_control(
			'exp_number',
			[
				'label' => esc_html__( 'Experience Number', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'finalassignment' ),
				'placeholder' => esc_html__( 'Type your title here', 'finalassignment' ),
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'finalassignment' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'font_size',
			[
				'label' => esc_html__( 'Font Size', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .about-info h2' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

        

		$this->end_controls_section();

	
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $section_name = $settings['widget_name'];
        $title = $settings['widget_title'];
        $description = $settings['section_description'];
        $button = $settings['button_text'];
        $button_url = $settings['button_url']['url'];
        $experience_number = $settings['exp_number'];
?>
        <div class="about-info">
            <h4>// <?php echo $section_name; ?></h4>
            <h2><?php echo $title; ?></h2>
            <?php echo $description ?>
            <div class="bottom mt-20">
                <div class="btn-a">
                    <a class="button-1" href="<?php echo $button_url ?>"><?php echo $button; ?></a>
                </div>
                <div class="con-s">
                    <h3><?php echo $experience_number ?></h3>
                    <span>Years <br> Of Experience</span>
                </div>
            </div>
        </div>
<?php

    }
}
