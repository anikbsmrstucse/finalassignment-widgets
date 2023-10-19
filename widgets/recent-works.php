<?php

class Elementor_RecentWorks_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'recentworks-widget';
    }

    public function get_title()
    {
        return 'Recent Works Widget';
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
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

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="row">
            <?php
            $query = array(
                'post_type' => 'recent_work',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'orderby' => 'title',
                'order' => 'ASC',
            );

            $loop = new WP_Query($query);
            ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <!-- Single -->
                <div class="col-xl-4 col-md-6">
                    <div class="project-item mb-30">
                       <?php echo '<img src="' . the_post_thumbnail() . '" alt="">'; ?>
                        <div class="portfolio-item-overly">
                            <div class="portfolio-item-overly-full">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><?php the_excerpt(); ?></p>
                                <?php
                                global $post;
                                $photos_query = get_post_meta($post->ID, 'gallery_data', true);
                                // $photos_array = unserialize($photos_query);
                                $url_array = $photos_query['image_url'];
                                $count = sizeof($url_array);
                                for ($i = 0; $i < $count; $i++) {
                                ?>
                                    <a class="zoom" href="<?php echo $url_array[$i]; ?>"><i class="fas fa-plus"></i></a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
            <!-- maginifier js script -->
            <script>
                (function($) {
                    $('.project-item  a.zoom').magnificPopup({
                        type: 'image',
                        gallery: {
                            enabled: true
                        },

                    });
                }(jQuery))
            </script>
        </div>
<?php
    }
}
