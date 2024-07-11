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