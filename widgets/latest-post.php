<?php

class Elementor_LatestPost_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'latestpost-widget';
    }

    public function get_title()
    {
        return 'Latest Post';
    }

    public function get_icon()
    {
        return 'eicon-image-rollover';
    }

    public function get_categories()
    {
        return ['first-category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'post_content',
            [
                'label' => esc_html__('Show Member Options', 'finalassignment'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // its work for show how many post in frontend
        $this->add_control(
            'show_recent',
            [
                'label' => esc_html__('Show Member', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'finalassignment'),
                'placeholder' => esc_html__('Type your Number', 'finalassignment'),
            ]
        );

        // it using desktop column view in frontend
        $this->add_control(
            'desktop_column',
            [
                'label' => esc_html__('Desktop Column', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '4' => esc_html__('3', 'finalassignment'),
                    '3' => esc_html__('4', 'finalassignment'),
                    '6' => esc_html__('2', 'finalassignment'),
                ],
            ]
        );
        // it using tablet column view in frontend
        $this->add_control(
            'tablet_column',
            [
                'label' => esc_html__('Tablet Column', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '6' => esc_html__('2', 'finalassignment'),
                ],
            ]
        );
        // it using desktop mobile view in frontend
        $this->add_control(
            'mobile_column',
            [
                'label' => esc_html__('Mobile Column', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '12',
                'options' => [
                    '12' => esc_html__('1', 'finalassignment'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $show_recent = $settings['show_recent'];
        $desktop = $settings['desktop_column'];
        $tablet = $settings['tablet_column'];
        $mobile = $settings['mobile_column'];

?>
        <div class="row">
            <?php
            $query = array(
                'numberposts' => $show_recent,
            );
            $recent_posts = wp_get_recent_posts($query); // Retrieve an array of recent posts

            // Create a WP_Query object to use in the while loop
            $recent_posts_query = new WP_Query(array(
                'post__in' => wp_list_pluck($recent_posts, 'ID'), // Retrieve post IDs from the recent posts array
                'post_type' => 'post', // Replace with your post type if necessary
                'posts_per_page' => count($recent_posts), // Display all recent posts
            ));

            // Use a while loop to iterate through recent posts
            while ($recent_posts_query->have_posts()) : $recent_posts_query->the_post(); ?>

                <div class="col-lg-<?php echo $desktop ?> col-md-<?php echo $tablet ?> col-<?php echo $mobile ?> mb-30">
                    <div class="blog-item">
                        <div class="thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnails');

                                if ($image_url) {
                                    echo '<img alt="..." src="' . esc_url($image_url) . '">';
                                }
                                ?>
                            </a>
                        </div>
                        <div class="content">
                            <div class="meta">
                                <span><i class="far fa-calendar-check"></i> <?php the_time('d, F Y'); ?></span>
                                <span><i class="far fa-comment-alt"></i> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <a class="read-more" href="<?php the_permalink(); ?>">Load More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

            <?php endwhile;

            wp_reset_postdata();
            ?>
        </div>
<?php
    }
}
