<?php

function hexshop_breadcrumb(){
    global $post;  
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {

$name ='Blog';
        $localName = 'Blog';
        $title = get_theme_mod('breadcrumb_blog_title', esc_html__('%1$s','hexshop'), $localName);
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','hexshop'));
        $breadcrumb_show = 0;
    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) {
        $title = get_the_title();
    } 
    elseif ( is_single() && 'service' == get_post_type() ) {
        $title = get_the_title();
    } 
    elseif ( is_single() && 'product' == get_post_type() ) {
        $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'hexshop' ) );
    } 
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'hexshop' ) . get_search_query();
    } 
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'hexshop' );
    } 
    elseif ( is_archive() ) {
        $title = strip_tags(get_the_archive_title());
    } 
    else {
        $title = get_the_title();
    }

    $breadcrumb_bg = get_theme_mod('breadcrumb_bg_image', get_template_directory_uri().'/assets/images/banner/banner-inner-page.jpg');
?>

<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2><?php echo esc_html__($title,'hexshop'); ?></h2>
                    <span><?php echo esc_html__('Home', 'hexshop'); ?> / <?php echo esc_html__($title,'hexshop'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<?php
}