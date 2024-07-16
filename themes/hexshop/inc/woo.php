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

// woo smart plugin position remove 
add_filter( 'woosw_button_position_archive', '__return_false' );
add_filter( 'woosw_button_position_single', '__return_false' );

add_filter( 'woosq_button_position', '__return_false' );

// product add to cart button
function hexshop_wooc_add_to_cart( $args = array() ) {
    global $product;

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'product-add-cart-btn w-100 cart-button icon-btn button',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = wp_parse_args( $args, $defaults );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }


        // check product type 
        if( $product->is_type( 'simple' ) ){
            $btntext = esc_html__("Add to Cart",'hexshop');
        } elseif( $product->is_type( 'variable' ) ){
            $btntext = esc_html__("Select Options",'hexshop');
        } elseif( $product->is_type( 'external' ) ){
            $btntext = esc_html__("Buy Now",'hexshop');
        } elseif( $product->is_type( 'grouped' ) ){
            $btntext = esc_html__("View Products",'hexshop');
        }
        else{
            $btntext = esc_html__("Add to Cart",'hexshop');
        } 

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button icon-btn button' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            '<i class="fa fa-shopping-cart"></i>'
        );
}

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
                    <li>
                        <?php echo do_shortcode('[woosq]'); ?>
                    </li>
                    <li>
                        <?php echo do_shortcode('[woosw]'); ?>
                    </li>
                    <li>
                        <?php hexshop_wooc_add_to_cart(); ?>
                    </li>
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