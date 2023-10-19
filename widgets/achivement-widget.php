<?php

class Elementor_Achivement_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'achivement-widget';
    }

    public function get_title()
    {
        return 'Achivement Widget';
    }

    public function get_icon()
    {
        return 'eicon-custom';
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
                'label' => esc_html__('Achivement content', 'finalassignment'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // section background image control
        $this->add_control(
            'bg_image',
            [
                'label' => esc_html__('Section BG Image', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // section name control
        $this->add_responsive_control(
            'widget_name',
            [
                'label' => esc_html__('Section Name', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'finalassignment'),
                'placeholder' => esc_html__('Type your title here', 'finalassignment'),
            ]
        );
        // section title control
        $this->add_responsive_control(
            'widget_title',
            [
                'label' => esc_html__('Title', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'finalassignment'),
                'placeholder' => esc_html__('Type your title here', 'finalassignment'),
                'label_block' => true,
            ]
        );

        // section description
        $this->add_control(
            'section_description',
            [
                'label' => esc_html__('Description', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default description', 'finalassignment'),
            ]
        );

        // button text control
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Text', 'finalassignment'),
            ]
        );

        // button url control
        $this->add_control(
            'button_url',
            [
                'label' => esc_html__('Button URL', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        // achivement card control
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
                            'value' => 'far fa-circle',
                            'library' => 'fa-regular',
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
                        'label' => esc_html__('Number', 'finalassignment'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'default' => esc_html__('List Title', 'finalassignment'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'list_description',
                        'label' => esc_html__('Description', 'finalassignment'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'rows' => 10,
                        'default' => esc_html__('Default description', 'finalassignment'),
                        'placeholder' => esc_html__('Type your description here', 'finalassignment'),
                    ],
                    [
                        'name' => 'list_number',
                        'label' => esc_html__( 'K+', 'finalassignment' ),
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
        $section_name = $settings['widget_name'];
        $title = $settings['widget_title'];
        $description = $settings['section_description'];
        $button_text = $settings['button_text'];
        $button_url = $settings['button_url']['url'];
        $bg_image = $settings['bg_image']['url'];
        $list = $settings['list'];
        ?>
        <section class="counter-area pt-100 pb-100" style="background-image:url('<?php echo $bg_image ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="counter-area-content">
                            <h4>// <?php echo $section_name ?></h4>
                            <h2><?php echo $title ?></h2>
                            <p><?php echo $description ?></p>
                            <a class="button-1" href="<?php echo $button_url ?>"><?php echo $button_text ?></a>
                        </div>
                    </div>
                    <!-- add repetear functionality -->
                    <div class="col-lg-6">
                        <div class="row">
                            <!-- Singel -->
                            <?php 
                            foreach($list as $items){
                                $icon = $items['icon_list']['value'];
                                $number = $items['list_title'];
                                $description_achive = $items['list_description'];
                                $active = $items['list_number'];
                            ?>
                            <div class="col-sm-6 mb-30">
                                <div class="counter-item">
                                    <div class="icon">
                                        <i class="<?php echo $icon ?>"></i>
                                    </div>
                                    <div class="content">
                                        <div class="headding">
                                            <h2 class="counter"><?php echo $number ?></h2>
                                            <span><?php echo $active == 'yes' ? 'K+' : '' ?></span>
                                        </div>
                                        <p><?php echo $description_achive ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- end single -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
