<?php 

// Hexshop theme options
new \Kirki\Panel(
    'hexshop_theme_options',
    [
        'priority'      => 10,
        'title'         => esc_html__( 'Theme Options', 'hexshop' ),
        'description'   => esc_html__( 'Hexshop Options Panel', 'hexshop' ),
    ]
);

// Hexshop header section
function hexshop_header_section() {

    new \Kirki\Section(
        'hexshop_header_section',
        [
            'title'       => esc_html__( 'Header Section', 'hexshop' ),
            'description' => esc_html__( 'Control header section', 'hexshop' ),
            'panel'       => 'hexshop_theme_options',
            'priority'    => 160,
        ]
    );

    // Header logo
    new \Kirki\Field\Image(
        [
            'settings' 		=> 'hexshop_header_logo_image',
            'label'    		=> esc_html__( 'Logo', 'hexshop' ),
			'description' 	=> esc_html__( 'The saved photo will be your logo', 'hexshop' ),
            'section'  		=> 'hexshop_header_section',
            'default'  		=> get_template_directory_uri() . '/assets/images/logo.png',
			'priority'    	=> 10,
        ]
    );
}
hexshop_header_section();

// Hexshop theme footer section
function hexshop_footer_settings() {
    new \Kirki\Section(
        'hexshop_footer_settings',
        [
            'title'       => esc_html__( 'Footer Section', 'hexshop' ),
            'description' => esc_html__( 'Update copyright section details', 'hexshop' ),
            'panel'       => 'hexshop_theme_options',
            'priority'    => 160,
        ]
    );

    // Show developer
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_developer_switch',
            'label'       => esc_html__( 'Display developer text', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

     // Show social
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_social_switch',
            'label'       => esc_html__( 'Display Socials', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

    // Copyright text
    new \Kirki\Field\Text(
        [
            'settings' => 'hexshop_copyright_text',
            'label'    => esc_html__( 'Copyright Message', 'hexshop' ),
            'section'  => 'hexshop_footer_settings',
            'default'  => esc_html__( 'Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved.', 'hexshop' ),
            'priority' => 10,
        ]
    );

    // Developer copyright text
    new \Kirki\Field\Text(
        [
            'settings' => 'hexshop_devs_copyright_text',
            'label'    => esc_html__( 'Copyright developer info', 'hexshop' ),
            'section'  => 'hexshop_footer_settings',
            'default'  => esc_html__( 'Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>', 'hexshop' ),
            'priority' => 10,
        ]
    );
    
    
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_facebook_switch',
            'label'       => esc_html__( 'Display Facebook', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

    new \Kirki\Field\URL(
		[
			'settings' => 'hexshop_facebook_url',
			'label'    => esc_html__( 'Facebook URL', 'hexshop' ),
			'section'  => 'hexshop_footer_settings',
			'default'  => '#',
			'priority' => 10,
		]
	);

        new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_x_switch',
            'label'       => esc_html__( 'Display X', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

    new \Kirki\Field\URL(
		[
			'settings' => 'hexshop_x_url',
			'label'    => esc_html__( 'X URL', 'hexshop' ),
			'section'  => 'hexshop_footer_settings',
			'default'  => '#',
			'priority' => 10,
		]
	);

        new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_instagram_switch',
            'label'       => esc_html__( 'Display Instagram', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

    new \Kirki\Field\URL(
		[
			'settings' => 'hexshop_instagram_url',
			'label'    => esc_html__( 'Instagram URL', 'hexshop' ),
			'section'  => 'hexshop_footer_settings',
			'default'  => '#',
			'priority' => 10,
		]
	);

        new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_linkedin_switch',
            'label'       => esc_html__( 'Display LinkedIn', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

    new \Kirki\Field\URL(
		[
			'settings' => 'hexshop_linkedin_url',
			'label'    => esc_html__( 'LinkedIn URL', 'hexshop' ),
			'section'  => 'hexshop_footer_settings',
			'default'  => '#',
			'priority' => 10,
		]
	);

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_youtube_switch',
            'label'       => esc_html__( 'Display YouTube', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

    new \Kirki\Field\URL(
		[
			'settings' => 'hexshop_youtube_url',
			'label'    => esc_html__( 'YouTube URL', 'hexshop' ),
			'section'  => 'hexshop_footer_settings',
			'default'  => '#',
			'priority' => 10,
		]
	);

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_pinterest_switch',
            'label'       => esc_html__( 'Display Pinterest', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

    new \Kirki\Field\URL(
		[
			'settings' => 'hexshop_pinterest_url',
			'label'    => esc_html__( 'Pinterest URL', 'hexshop' ),
			'section'  => 'hexshop_footer_settings',
			'default'  => '#',
			'priority' => 10,
		]
	);

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'hexshop_other_switch',
            'label'       => esc_html__( 'Others', 'hexshop' ),
            'section'     => 'hexshop_footer_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'hexshop' ),
                'off' => esc_html__( 'Hide', 'hexshop' ),
            ],
        ]
    );

    new \Kirki\Field\URL(
		[
			'settings' => 'hexshop_others_url',
			'label'    => esc_html__( 'Others URL', 'hexshop' ),
			'section'  => 'hexshop_footer_settings',
			'default'  => '#',
			'priority' => 10,
		]
	);

}
hexshop_footer_settings();

// hexshop 404 error page
function hexshop_error_page() {
    new \Kirki\Section(
        'hexshop_error_page',
        [
            'title'       => esc_html__( '404 Page', 'hexshop' ),
            'description' => esc_html__( 'Error page settings', 'hexshop' ),
            'panel'       => 'hexshop_theme_options',
            'priority'    => 160,
        ]
    );

    // Error page main image
    new \Kirki\Field\Image(
        [
            'settings' 		=> 'hexshop_error_page_image',
            'label'    		=> esc_html__( 'Shape Right', 'hexshop' ),
            'section'  		=> 'hexshop_error_page',
            'default'  		=> get_template_directory_uri() . '/assets/images/404.png',
			'priority'    	=> 10,
        ]
    );

    // Error page heading
    new \Kirki\Field\Text(
        [
            'settings' => 'hexshop_error_page_heading',
            'label'    => esc_html__( 'Error Heading', 'hexshop' ),
            'section'  => 'hexshop_error_page',
            'default'  => esc_html__( 'Whoops! This Page got Lost in conversation!', 'hexshop' ),
            'priority' => 10,
        ]
    );

    // Error page button
    new \Kirki\Field\Text(
        [
            'settings' => 'hexshop_error_page_button_text',
            'label'    => esc_html__( 'Button Text', 'hexshop' ),
            'section'  => 'hexshop_error_page',
            'default'  => esc_html__( 'Back To Home Page', 'hexshop' ),
            'priority' => 10,
        ]
    );
    
    new \Kirki\Field\URL(
		[
			'settings' => 'hexshop_error_page_bar_button_url',
			'label'    => esc_html__( 'Button URL', 'hexshop' ),
			'section'  => 'hexshop_error_page',
			'default'  => '#',
			'priority' => 10,
		]
	);
}
hexshop_error_page();