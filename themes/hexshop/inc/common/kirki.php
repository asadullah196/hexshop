<?php 

// Hexshop theme options
new \Kirki\Panel(
    'hexshop_theme_options',
    [
        'priority'      => 10,
        'title'         => esc_html__( 'Theme Options', 'sadaka' ),
        'description'   => esc_html__( 'Hexshop Options Panel', 'sadaka' ),
    ]
);

// Hexshop header section
function hexshop_header_section() {

    new \Kirki\Section(
        'hexshop_header_section',
        [
            'title'       => esc_html__( 'Header Section', 'sadaka' ),
            'description' => esc_html__( 'Control header section', 'sadaka' ),
            'panel'       => 'hexshop_theme_options',
            'priority'    => 160,
        ]
    );

    // Header logo
    new \Kirki\Field\Image(
        [
            'settings' 		=> 'hexshop_header_logo_image',
            'label'    		=> esc_html__( 'Logo', 'sadaka' ),
			'description' 	=> esc_html__( 'The saved photo will be your logo', 'sadaka' ),
            'section'  		=> 'hexshop_header_section',
            'default'  		=> get_template_directory_uri() . '/assets/images/logo.png',
			'priority'    	=> 10,
        ]
    );
}
hexshop_header_section();