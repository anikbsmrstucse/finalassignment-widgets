<?php

class Elementor_Hero_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return "hero-widget";
    }

    public function get_title()
    {
        return "Hero Widget";
    }

    public function get_icon()
    {
        return "eicon-image-rollover";
    }

    public function get_categories()
    {
        return ["first-category"];
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
            'list',
            [
                'label' => esc_html__('Repeater List', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
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
                        'name' => 'button_text',
                        'label' => esc_html__('Button Text', 'finalassignment'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Title', 'finalassignment'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'button_link',
                        'label' => esc_html__('Link', 'finalassignment'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => ['url', 'is_external', 'nofollow'],
                        'default' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => true,
                            // 'custom_attributes' => '',
                        ],
                        'label_block' => true,
                    ],
                    [
                        'name' => 'image_content',
                        'label' => esc_html__('Choose Image', 'finalassignment'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]

                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); // Get the widget's settings

        if (!empty($settings['list'])) {
?>
            <section class="hero-area">
                <div class="hero-lider-full owl-carousel">
                    <?php
                    foreach ($settings['list'] as $item) {
                        $list_title = $item['list_title'];
                        $list_content = $item['list_content'];
                        $button_text = $item['button_text'];
                        $button_link = $item['button_link']['url'];
                        $image_url = $item['image_content']['url'];
                    ?>
                        <!-- Single -->
                        <div class="hero-slider-single" style="background-image: url('<?php echo esc_url($image_url); ?>');">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="hero-captopn">
                                            <h2><?php echo esc_html($list_title); ?></h2>
                                            <p><?php echo esc_html($list_content); ?></p>
                                            <a class="button-1" href="<?php echo esc_url($button_link); ?>"><?php echo esc_html($button_text); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <script>
                    (function($) {
                        /*---slider activation---*/
                        var $slider = $('.hero-lider-full');
                        if ($slider.length > 0) {
                            $slider.owlCarousel({
                                loop: true,
                                nav: false,
                                autoplay: true,
                                dots: false,
                                autoplayTimeout: 8000,
                                items: 1,
                                nav: true,
                                navText: ['<span class="hero-slider-nav"><i class="fas fa-arrow-left"></i></span>', '<span class="hero-slider-nav"><i class="fas fa-arrow-right"></i></span>']
                            });
                        }
                    }(jQuery))
                </script>
            </section>

<?php
        }
    }
}
