<?php

class Elementor_SectionHeader_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'sectionheader-widget';
    }

    public function get_title()
    {
        return 'Section Header Widget';
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
            'widget_content',
            [
                'label' => esc_html__('Section Title', 'finalassignment'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'finalassignment'),
                'placeholder' => esc_html__('Type your title here', 'finalassignment'),
            ]
        );
        $this->add_responsive_control(
            'section_subtitle',
            [
                'label' => esc_html__('Section SubTitle', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'finalassignment'),
                'placeholder' => esc_html__('Type your title here', 'finalassignment'),
            ]
        );
        $this->add_responsive_control(
            'section_topic',
            [
                'label' => esc_html__('Section Topic', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'finalassignment'),
                'placeholder' => esc_html__('Type your title here', 'finalassignment'),
            ]
        );
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $title = $settings['section_title'];
        $subtitle = $settings['section_subtitle'];
        $topic = $settings['section_topic'];

?>
        <div class="col-lg-12 text-center pb-50">
            <div class="section-title">
                <h4>// <?php echo $title ?></h4>
                <h2><?php echo $subtitle ?><br><?php echo $topic ?></h2>
            </div>
        </div>
<?php
    }
}
