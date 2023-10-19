<?php

class Elementor_Breadcrum_Widget extends \Elementor\Widget_Base
{

    //widgets name
    public function get_name()
    {
        return "breadcrum-widget";
    }

    //widget title
    public function get_title()
    {
        return "Breadcrum-widget";
    }

    //widgets icon
    public function get_icon()
    {

        return 'eicon-image-rollover';
    }

    //widgets categories
    public function get_categories()
    {
        return ['first-category'];
    }

    // // styles files calls
    // public function get_style_depends()
    // {
    // 	return ['custom_styles'];
    // }

    // widgets element register in this function
    protected function register_controls()
    {
    }

    // display widgets functionalities
    protected function render()
    {
?>
        <section class="breacrumb-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2> <?php echo get_the_title(); ?></h2>
                            <?php echo mj_wp_breadcrumb(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }

    //uses for widgets refresh functionality
    protected function content_template()
    {
    }
}
