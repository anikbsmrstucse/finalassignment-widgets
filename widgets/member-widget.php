<?php

class Elementor_Member_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'member-widget';
    }

    public function get_title()
    {
        return 'Show Member';
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
                'label' => esc_html__('Show Member Options', 'finalassignment'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // its work for show how many post in frontend
        $this->add_control(
            'show_member',
            [
                'label' => esc_html__('Show Member', 'finalassignment'),
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

        // it also show post according by date,name and title
        $this->add_control(
			'filter_by',
			[
				'label' => esc_html__( 'Category Name', 'finalassignment' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'senior-member',
				'options' => [
					'senior-member' => esc_html__( 'Senior Member', 'finalassignment' ),
                    'junior-member' => esc_html__('Junior Member','finalassignment'),
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
        $member = $settings['show_member'];
        $order = $settings['order'];
        $order_by = $settings['order_by'];
        $filter_by = $settings['filter_by'];
        $desktop = $settings['desktop_column'];
        $tablet = $settings['tablet_column'];
        $mobile = $settings['mobile_column'];
?>
        <div class="row">
            <?php 
                //  $galleryCat = get_terms([
                //     'taxonomy' => 'member_category',
                //     'hide_empty' => false,
                //     'orderby' => 'name',
                //     'order' => "ASC",
                //     'parent' => 0
                // ]);

                // print_r($galleryCat);

                 $query = array(
                     'post_type' => 'member_post',
                     'post_status' => 'publish',
                     'posts_per_page' => $member,
                     'orderby' => $order_by,
                     'order' => $order,
                     'tax_query' => array(
                        array(
                            'taxonomy' => 'member_category', // Replace with the actual taxonomy name
                            'field'    => 'slug',     // Use 'slug', 'term_id', or 'name' depending on your needs
                            'terms'    => $filter_by, // Replace with the term you want to filter by
                        ),
                    ),
                 );
     
                 $loop = new WP_Query($query);
                 
            ?>
            <!-- Single -->
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="col-lg-<?php echo $desktop ?> col-md-<?php echo $tablet ?> col-<?php echo $mobile ?> mb-30">
                <div class="team-item">
                    <div class="thumbnail">
                    <?php echo '<img src="' . the_post_thumbnail() . '" alt="">'; ?>
                    </div>
                    <div class="content">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo get_post_meta( get_the_ID(), "textarea_degination", true ); ?></p>
                        <ul>
                            <li><a href="<?php echo get_post_meta( get_the_ID(), "url_facebook", true ); ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo get_post_meta( get_the_ID(), "url_twitter", true ); ?>"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?php echo get_post_meta( get_the_ID(), "url_instagram", true ); ?>"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="<?php echo get_post_meta( get_the_ID(), "url_linkedin", true ); ?>"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> 
            <?php
            endwhile;
            wp_reset_postdata();
            ?>          
        </div>
<?php
    }
}
