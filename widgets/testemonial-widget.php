<?php

class Elementor_Testimonials_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'testimonials-widget';
    }

    public function get_title()
    {
        return 'Testimonials';
    }

    public function get_icon()
    {
        return 'eicon-posts-carousel';
    }

    public function get_categories()
    {
        return ['first-category'];
    }

    protected function register_controls()
    {
    }

    protected function render()
    {
?>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-item-full owl-carousel">
                    <!-- Single -->
                    <div class="testimonial-item">
                        <div class="content">
                            <div class="thumbnail">
                                <img src="assets/img/1.jpg" alt="img">
                                <div class="icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                            <h2>Brian Maxweel</h2>
                            <h5>Designer</h5>
                            <div class="ratting">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="testimonial-item">
                        <div class="content">
                            <div class="thumbnail">
                                <img src="assets/img/2.jpg" alt="img">
                                <div class="icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                            <h2>Brian Maxweel</h2>
                            <h5>Designer</h5>
                            <div class="ratting">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="testimonial-item">
                        <div class="content">
                            <div class="thumbnail">
                                <img src="assets/img/3.jpg" alt="img">
                                <div class="icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                            <h2>Brian Maxweel</h2>
                            <h5>Designer</h5>
                            <div class="ratting">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="testimonial-item">
                        <div class="content">
                            <div class="thumbnail">
                                <img src="assets/img/1.jpg" alt="img">
                                <div class="icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                            <h2>Brian Maxweel</h2>
                            <h5>Designer</h5>
                            <div class="ratting">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="testimonial-item">
                        <div class="content">
                            <div class="thumbnail">
                                <img src="assets/img/2.jpg" alt="img">
                                <div class="icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                            <h2>Brian Maxweel</h2>
                            <h5>Designer</h5>
                            <div class="ratting">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="testimonial-item">
                        <div class="content">
                            <div class="thumbnail">
                                <img src="assets/img/3.jpg" alt="img">
                                <div class="icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                            <h2>Brian Maxweel</h2>
                            <h5>Designer</h5>
                            <div class="ratting">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                (function($) {
                    /*---slider activation---*/
                    var $Testimonialslider = $(".testimonial-item-full");
                    if ($Testimonialslider.length > 0) {
                        $Testimonialslider.owlCarousel({
                            loop: true,
                            nav: false,
                            autoplay: true,
                            dots: true,
                            autoplayTimeout: 8000,
                            items: 3,
                            nav: false,
                            responsive: {
                                0: {
                                    items: 1,
                                },
                                400: {
                                    items: 1,
                                },
                                767: {
                                    items: 2,
                                },
                                991: {
                                    items: 3,
                                },
                            },
                        });
                    }
                })(jQuery)
            </script>
        </div>
<?php
    }
}
