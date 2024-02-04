<?php
class SD_Food_Menu extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'sd-food-menu';
    }

    public function get_title()
    {
        return esc_html__('Food Menu');
    }

    public function get_icon()
    {
        return 'eicon-bullet-list';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['elementor', 'menu', 'food', 'sd'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'sd_food_menu_item_start',
            [
                'label' => esc_html__('Food Menu', 'sd-food-menu'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sd_food_menu_sub_title',
            [
                'label' => esc_html__('Food Menu Sub-Title', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Some text', 'sd-food-menu'),
                'label_block' => true,
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'sd_food_menu_title',
            [
                'label' => esc_html__('Food Menu Title', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Palestinsk Cuisine', 'sd-food-menu'),
                'label_block' => true,
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'sd_food_menu_time',
            [
                'label' => esc_html__('Food Menu Time', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('11.00 - 15.00', 'sd-food-menu'),
                'label_block' => true,
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'show_dots',
            [
                'label' => esc_html__('Show Dots', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'sd-food-menu'),
                'label_off' => esc_html__('No', 'sd-food-menu'),
                'default' => 'yes',
            ]
        );

        $sd_menu_reps = new \Elementor\Repeater();

        $sd_menu_reps->add_control(
            'sd_food_menu_item_title',
            [
                'label' => esc_html__('Menu Name', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Menu Name', 'sd-food-menu'),
                'label_block' => true,
            ]
        );

        $sd_menu_reps->add_control(
            'sd_food_menu_item_price',
            [
                'label' => esc_html__('Menu Price', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$25.99', 'sd-food-menu'),
                'label_block' => true,
            ]
        );

        $sd_menu_reps->add_control(
            'sd_food_menu_item_link',
			[
				'label' => esc_html__( 'Menu Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
            ]
        );

        $sd_menu_reps->add_control(
            'sd_food_menu_item_desc',
            [
                'label' => esc_html__('Menu Item Description', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('aving good restaurant reviews is crucial these day', 'sd-food-menu'),
                'separator' => 'before'
            ]
        );

        $sd_menu_reps->add_control(
            'sd_food_menu_item_img',
            [
                'label' => esc_html__('Choose Menu Image', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'sd_food_menu_item_list',
            [
                'label' => esc_html__('Food Menu List', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $sd_menu_reps->get_controls(),
                'default' => [
                    [
                        'sd_food_menu_item_title' => esc_html__('Menu Item Title', 'sd-food-menu'),
                    ]
                ],
                'title_field' => '{{{ sd_food_menu_item_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sd_food_menu_item_style_start',
            [
                'label' => esc_html__('Food Menu Style', 'sd-food-menu'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        /**
         * Menu section sub-title
         * Style
         */

         $this->add_control(
            'sd_food_menu_subtitle_color',
            [
                'label' => esc_html__('Menu SubTitle Color', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foods .section-heading .sub-title' => 'color: {{VALUE}}; margin-bottom: {{sd_food_menu_subtitle_spacing.SIZE}}{{sd_food_menu_subtitle_spacing.UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sd_food_menu_subtitle_typo',
                'selector' => '{{WRAPPER}} .foods .section-heading .sub-title',
            ]
        );
        
        $this->add_control(
            'sd_food_heading_subtitle_margin',
            [
                'label' => esc_html__( 'Subtitle Margin', 'mistri' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'	=> 'before'
            ]
        );

        $this->add_control(
            'sd_food_heading_subtitle_padding',
            [
                'label' => esc_html__( 'Subtitle Padding', 'mistri' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'	=> 'before'
            ]
        );

        /**
         * Menu section heading
         * Style
         */
        $this->add_control(
            'sd_food_menu_title_color',
            [
                'label' => esc_html__('Menu Title Color', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foods .section-heading h1' => 'color: {{VALUE}}; margin-bottom: {{sd_food_menu_title_spacing.SIZE}}{{sd_food_menu_title_spacing.UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sd_food_menu_title_typo',
                'selector' => '{{WRAPPER}} .foods .section-heading h1',
            ]
        );
        
        $this->add_control(
            'sd_food_heading_title_margin',
            [
                'label' => esc_html__( 'Margin', 'mistri' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'	=> 'before'
            ]
        );

        $this->add_control(
            'sd_food_heading_title_padding',
            [
                'label' => esc_html__( 'Padding', 'mistri' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'	=> 'before'
            ]
        );

        /**
         * Section heading
         * Timing style
         */
        $this->add_control(
            'sd_food_menu_timing_color',
            [
                'label' => esc_html__('Menu Time Color', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foods .section-heading .menu-timing' => 'color: {{VALUE}}; margin-bottom: {{sd_food_menu_timing_spacing.SIZE}}{{sd_food_menu_timing_spacing.UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sd_food_menu_timing_typo',
                'selector' => '{{WRAPPER}} .foods .section-heading .menu-timing',
            ]
        );
        
        $this->add_control(
            'sd_food_heading_timing_margin',
            [
                'label' => esc_html__( 'Menu Time Margin', 'mistri' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading .menu-timing' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'	=> 'before'
            ]
        );

        $this->add_control(
            'sd_food_heading_timing_padding',
            [
                'label' => esc_html__( 'Menu Time Padding', 'mistri' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading .menu-timing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'	=> 'before'
            ]
        );


         /**
          * Single Item style
          */
        

        $this->add_control(
            'sd_food_menu_item_title_color',
            [
                'label' => esc_html__('Menu Item Title Color', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foods .content h3' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sd_food_menu_item_title_type',
                'selector' => '{{WRAPPER}} .foods .content h3',
            ]
        );

        $this->add_control(
            'sd_food_menu_item_desc_color',
            [
                'label' => esc_html__('Menu Item Description Color', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foods .content p' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sd_food_menu_item_desc_type',
                'selector' => '{{WRAPPER}} .foods .content p',
            ]
        );

        // Add a control for image size
        $this->add_control(
            'image_size',
            [
                'label' => __('Image Size', 'sd-food-menu'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 300, // Default size
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .food-image img' => 'width: {{SIZE}}px; height: auto;', // Apply the size to the image
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings               = $this->get_settings_for_display();
        $show_dots = ! empty($settings['show_dots']) && $settings['show_dots'] === 'yes';

        $sd_food_menu_item_list = isset( $settings['sd_food_menu_item_list'] )  ? $settings['sd_food_menu_item_list'] : [];
        $sd_food_subtitle       = isset(  $settings['sd_food_menu_sub_title'] ) ?  $settings['sd_food_menu_sub_title'] : '';
        $sd_food_title          = isset(  $settings['sd_food_menu_sub_title'] ) ?  $settings['sd_food_menu_title'] : '';
        $sd_food_timing         = isset(  $settings['sd_food_menu_sub_title'] ) ?  $settings['sd_food_menu_time'] : '';
        ?>
        <section class="foods bg-image">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-12">
                        <div class="section-heading sd-food-section-heading">
                            
                            <?php if( ! empty( $sd_food_subtitle ) ) : ?>
                            <h4 class="sub-title"><?php echo esc_html( $sd_food_subtitle ); ?></h4>
                            <?php endif; ?>

                            <?php if( ! empty( $sd_food_title ) ) : ?>
                            <h1 class="title">
                                <?php echo esc_html( $sd_food_title ); ?>
                            </h1>
                            <?php endif; ?>

                            <?php if( ! empty( $sd_food_timing ) ) : ?>
                            <h2 class="menu-timing"><?php echo esc_html( $sd_food_timing ); ?></h2>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    <?php foreach ($sd_food_menu_item_list as $single_menu_item): ?>
                        <div class="single-menu mb-5">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center  ">
                                    <div class="content">
                                        <h3>
                                            <a href="<?php echo esc_url( $single_menu_item['sd_food_menu_item_link']['url'] ); ?>" class="title-price-wrapper">
                                                <span class="title">  <?php echo esc_html($single_menu_item['sd_food_menu_item_title']); ?></span>
                                                <?php 
                                                    if ($show_dots) {
                                                        echo '<div class="dots">.</div>';
                                                    }
                                                ?>
                                                <span class="menu-item-price">
                                                    <?php echo esc_html( $single_menu_item['sd_food_menu_item_price'] ); ?>
                                                </span>
                                            </a>
                                        </h3>
                                        <p>
                                            <?php echo esc_html($single_menu_item['sd_food_menu_item_desc']); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="food-image">
                                       <a href="<?php echo esc_url( $single_menu_item['sd_food_menu_item_link']['url'] ); ?>">
                                            <img src="<?php echo esc_url($single_menu_item['sd_food_menu_item_img']['url']); ?>" alt="<?php  echo esc_html($single_menu_item['sd_food_menu_item_title']); ?>">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <script>
        window.onload = function() {
            const addDot = (e) => {
                var container = document.querySelectorAll(".foods .title-price-wrapper")[e];
                var containerWidth = container.offsetWidth;
                var textWidth = document.querySelectorAll(".foods .title")[e].offsetWidth
                var priceWidth = document.querySelectorAll(".foods .menu-item-price")[e].offsetWidth
                
                var dotwidth = document.querySelectorAll(".foods .dots")[e].offsetWidth
                var remainingSpace = containerWidth - textWidth - priceWidth;
                var numDots = Math.floor(remainingSpace / dotwidth); // Assuming the width of a dot is 6px
                var dots = "";
        
                for (var i = 0; i < numDots-2; i++) {
                    dots += ".";
                }
        
                document.querySelectorAll(".foods .dots")[e].innerHTML += dots;
            }
            
            const allMenu = document.querySelectorAll('.single-menu')
            for(let i=0; i< allMenu.length; i++){
                addDot(i)
            }
        }
    </script>
        <?php
    }
}
