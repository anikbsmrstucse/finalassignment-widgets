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
            'post_content',
            [
                'label' => esc_html__('Photo Gallery Options', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // its work for show how many post in frontend
        $this->add_control(
            'show_post',
            [
                'label' => esc_html__('Show Post', 'finalassignment'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'finalassignment'),
                'placeholder' => esc_html__('Type your Number', 'finalassignment'),
            ]
        );

        // its work for post show as ascending or desending order
        $this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order By', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => esc_html__( 'ASC', 'finalassignment' ),
                    'DSC' => esc_html__('DSC','finalassignment'),
				],
			]
		);
        // it also show post according by date,name and title
        $this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'title',
				'options' => [
					'title' => esc_html__( 'Title', 'finalassignment' ),
                    'date' => esc_html__('Date','finalassignment'),
                    'modified' => esc_html__('Modified','finalassignment'),
				],
			]
		);

        // it using desktop column view in frontend
        $this->add_control(
			'desktop_column',
			[
				'label' => esc_html__( 'Desktop Column', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'4' => esc_html__( '3', 'finalassignment' ),
                    '3' => esc_html__('4','finalassignment'),
                    '6' => esc_html__('2','finalassignment'),
				],
			]
		);
        // it using tablet column view in frontend
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
        // it using desktop mobile view in frontend
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

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $post = $settings['show_post'];
        $order = $settings['order'];
        $order_by = $settings['order_by'];
        $desktop = $settings['desktop_column'];
        $tablet = $settings['tablet_column'];
        $mobile = $settings['mobile_column'];
?>
        <div class="row">
            <?php
            $query = array(
                'post_type' => 'recent_work',
                'post_status' => 'publish',
                'posts_per_page' => $post,
                'orderby' => $order_by,
                'order' => $order,
            );

            $loop = new WP_Query($query);
            ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <!-- Single -->
                <div class="col-xl-<?php echo $desktop ?> col-md-<?php echo $tablet ?> col-<?php $mobile ?>">
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
