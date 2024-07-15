<?php

// All Hexshop template parts calling function

/*
on the installation, theme name on the logo name
menu not set yet lekha thakbe
top info bar hide thakbe
*/

// Header template calling
function hexshop_header_parts(){
    get_template_part( 'inc/template-parts/header/header-1' );
}

// Footer template calling
function hexshop_footer_parts(){
    get_template_part( 'inc/template-parts/footer/footer-1' );
}

// hexshop header section logo
function hexshop_header_logo(){
    
    $header_section_logo = get_theme_mod('hexshop_header_logo_image');
	
    if( !empty($header_section_logo) ) : ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <img src="<?php echo esc_url($header_section_logo); ?>" alt="logo">
        </a>
	<?php else : ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <p class="no-logo"><?php bloginfo('name'); ?></p>
        </a>
	<?php endif;
}

// hexshop primary menu
function hexshop_primary_menus(){
    wp_nav_menu( 
        array( 
            'theme_location'  => 'primary-menu',
			'container' => false, // div class, make it false to avoid div generation
            'menu_class'      => 'nav', // ul class
            'menu_id'         => '', // ul id
            'fallback_cb'     => 'Hexshop_Walker_Nav_Menu::fallback',
            'walker'     	  => new Hexshop_Walker_Nav_Menu,
			'depth'           => 3,
        ) 
    );
}


// Hexshop widget register area
function hexshop_widgets_init() {

	// Sidebar widget
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Widgets', 'hexshop' ),
			'id'            => 'hexshop-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'hexshop' ),
			'before_widget' => '<div id="%1$s" class="first-item %2$s">',
			'after_widget'  => '</div>',
            'before_title'  => '<h4 class="">',
			'after_title'   => '</h4>',
		)
	);

	// Sidebar service widget
	register_sidebar(
		array(
			'name'          => esc_html__( 'Service Widgets', 'hexshop' ),
			'id'            => 'hexshop-sidebar-service',
			'description'   => esc_html__( 'Add widgets here.', 'hexshop' ),
			'before_widget' => '<div id="%1$s" class="first-item %2$s">',
			'after_widget'  => '</div>',
            'before_title'  => '<h4 class="">',
			'after_title'   => '</h4>',
		)
	);

	// All footer widgets
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1- Left Widgets', 'hexshop' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'hexshop' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
            'before_title'  => '<h4 class="">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2 - Center Left', 'hexshop' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'hexshop' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
            'before_title'  => '<h4 class="">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3 - Center Right', 'hexshop' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'hexshop' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
            'before_title'  => '<h4 class="">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4 - Right', 'hexshop' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'hexshop' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
            'before_title'  => '<h4 class="">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'hexshop_widgets_init' );

// Hexshop copyright
function hexshop_copyright(){

    $developer_switch = get_theme_mod('hexshop_developer_switch', false);
    $developer_text = get_theme_mod('hexshop_devs_copyright_text','Design: TemplateMo');
    $copyright_text = get_theme_mod('hexshop_copyright_text','Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved.');

    if ( !empty($copyright_text) and ('true' == $developer_switch)) : ?>
        <p><?php echo wp_kses_post($copyright_text . "<br/>" . $developer_text); ?></p>
    <?php elseif (!empty($copyright_text)) : ?>
        <p><?php echo wp_kses_post($copyright_text,'hexshop'); ?></p>
    <?php else : ?>
        <p class=""><?php echo esc_html__('Add copyright text here', 'hexshop'); ?></p>
    <?php endif;
	
}