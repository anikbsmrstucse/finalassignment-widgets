<?php

class Elementor_ServiceCard_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'servicecard-widget';
    }

    public function get_title()
    {
        return 'Service Card Widget';
    }

    public function get_icon()
    {
        return 'eicon-header';
    }

    public function get_categories()
    {
        return ['first-category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'finalassignment'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'desktop_column',
			[
				'label' => esc_html__( 'Desktop Column', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'4' => esc_html__( '3', 'finalassignment' ),
                    '3' => esc_html__('4','finalassignment')
				],
			]
		);

        $this->add_control(
			'tablet_column',
			[
				'label' => esc_html__( 'Tablet Column', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'6' => esc_html__( '2', 'finalassignment' ),
				],
			]
		);

        $this->add_control(
			'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '12',
				'options' => [
					'12' => esc_html__( '1', 'finalassignment' ),
				],
			]
		);

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name' => 'icon_list',
                        'label' => esc_html__('Icon', 'finalassignment'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-circle',
                            'library' => 'fa-solid',
                        ],
                        'recommended' => [
                            'fa-solid' => [
                                'circle',
                                'dot-circle',
                                'square-full',
                            ],
                            'fa-regular' => [
                                'circle',
                                'dot-circle',
                                'square-full',
                            ],
                        ],
                    ],

                    [
                        'name' => 'list_title',
                        'label' => esc_html__('Title', 'finalassignment'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Title', 'finalassignment'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'list_content',
                        'label' => esc_html__('Description', 'finalassignment'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'rows' => 10,
                        'default' => esc_html__('Default description', 'textdomain'),
                        'placeholder' => esc_html__('Type your description here', 'textdomain'),
                    ],
                    [
                        'name' => 'list_active',
                        'label' => esc_html__( 'Active Card', 'finalassignment' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'finalassignment' ),
                        'label_off' => esc_html__( 'No', 'finalassignment' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]

                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $list = $settings['list'];
        $desktop = $settings['desktop_column'];
        $tablet = $settings['tablet_column'];
        $mobile = $settings['mobile_column'];
?>
        <div class="row">
            <!-- Single -->
            <?php foreach($list as $items) {
                $icon = $items['icon_list']['value'];
                $title = $items['list_title'];
                $description = $items['list_content'];
                $active = $items['list_active'];
            ?>
            <div class="col-lg-<?php echo $desktop ?> col-md-<?php echo $tablet ?> col-<?php echo $mobile ?> mb-30">
                <div class="services-item <?php echo $active == 'yes' ? 'active' : '' ?>">
                    <i class="<?php echo $icon ?>"></i>
                    <h3><a href="#"><?php echo $title  ?></a></h3>
                    <p><?php echo $description ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
<?php
    }
}
