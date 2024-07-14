<?php 

// get all category 
function post_cat($category = 'category'){
$categories = get_categories( array(
    'taxonomy' => $category,
    'orderby' => 'name',
    'order'   => 'ASC',
) );
$cat_list = [];
foreach($categories as $cat){
    $cat_list[$cat->slug] = $cat->name;
}
return $cat_list;
}

// get all post 
function get_all_post($post_type_name = 'post'){
$posts = get_posts( array(
    'post_type' => $post_type_name,
    'orderby' => 'name',
    'order'   => 'ASC'
) );
$posts_list = [];
foreach($posts as $post){
    $posts_list[$post->ID] = $post->post_title;
}
return $posts_list;
}

// get cat slug and name 
function harry_get_cat_data($categories = [],$delimeter = ' ',$term = 'slug'){
$slugs = [];
foreach($categories as $cat){
    if ($term == 'slug'){
        array_push($slugs, $cat->slug);
    }
    if ($term == 'name'){
        $slugs[] =  $cat->name;
    }
}
return implode($delimeter, $slugs);
}

/**
* Sanitize SVG markup for front-end display.
*
* @param  string $svg SVG markup to sanitize.
* @return string 	  Sanitized markup.
*/
function harry_core_kses( $harry_custom_tag = '' ) {
$harry_allowed_html = [
    'svg' => array(
        'class' => true,
        'aria-hidden' => true,
        'aria-labelledby' => true,
        'role' => true,
        'xmlns' => true,
        'width' => true,
        'height' => true,
        'fill' => true,
        'viewbox' => true, // <= Must be lower case!
    ),
    'path'  => array( 
        'd' => true, 
        'fill' => true,  
        'stroke' => true,  
        'stroke-width' => true,  
        'stroke-linecap' => true,  
        'stroke-linejoin' => true,  
        'opacity' => true,  
    ),

    // 'svg'  => [
    // 	'xmlns'       => [],
    // 	'fill'        => [],
    // 	'viewbox'     => [],
    // 	'role'        => [],
    // 	'aria-hidden' => [],
    // 	'focusable'   => [],
    // 	'height'      => [],
    // 	'width'       => [],
    // ],
    // 'path' => [
    // 	'd'    => [],
    // 	'fill' => [],
    // ],
    'a' => [
        'class'    => [],
        'href'    => [],
        'title'    => [],
        'target'    => [],
        'rel'    => [],
    ],
        'b' => [],
        'blockquote'  =>  [
        'cite' => [],
        ],
        'cite'                      => [
        'title' => [],
        ],
        'code'                      => [],
        'del'                    => [
        'datetime'   => [],
        'title'      => [],
    ],
        'dd'                     => [],
        'div'                    => [
        'class'   => [],
        'title'   => [],
        'style'   => [],
        ],
        'dl'                     => [],
        'dt'                     => [],
        'em'                     => [],
        'h1'                     => [],
        'h2'                     => [],
        'h3'                     => [],
        'h4'                     => [],
        'h5'                     => [],
        'h6'                     => [],
        'i'                         => [
        'class' => [],
        ],
        'img'                    => [
        'alt'  => [],
        'class'   => [],
        'height' => [],
        'src'  => [],
        'width'   => [],
        ],
        'li'                     => array(
        'class' => array(),
        ),
        'ol'                     => array(
        'class' => array(),
        ),
        'p'                         => array(
        'class' => array(),
        ),
        'q'                         => array(
        'cite'    => array(),
        'title'   => array(),
        ),
        'span'                      => array(
        'class'   => array(),
        'title'   => array(),
        'style'   => array(),
        ),
        'iframe'                 => array(
        'width'         => array(),
        'height'     => array(),
        'scrolling'     => array(),
        'frameborder'   => array(),
        'allow'         => array(),
        'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
];

return wp_kses( $harry_custom_tag, $harry_allowed_html );
}