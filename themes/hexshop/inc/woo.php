<?php

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
//remove_action('woocommerce_shop_loop_header','woocommerce_product_taxonomy_archive_header',10);

remove_action('woocommerce_shop_loop_header','woocommerce_template_loop_product_link_open',10);
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

// hexshop_product_grid
function hexshop_product_grid(){
    global $post;
    global $product;
    global $woocommerce;
    ?>
    <div class="item">
        <div class="thumb">
            <div class="hover-content">
                <ul>
                    <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <div class="down-content">
            <h4 class="archive__products__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <span><?php woocommerce_template_loop_price(); ?></span>
            <ul class="stars">
                <?php woocommerce_template_loop_rating(); ?>
            </ul>
        </div>
    </div>
    <?php
}

add_action( 'woocommerce_before_shop_loop_item','hexshop_product_grid');