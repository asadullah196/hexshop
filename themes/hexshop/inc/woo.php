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
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// remove sidebar from product archive page
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);

// woo smart plugin position remove 
add_filter( 'woosw_button_position_archive', '__return_false' );
add_filter( 'woosw_button_position_single', '__return_false' );

add_filter( 'woosq_button_position', '__return_false' );

// Remove from single product page
add_filter('woocommerce_sale_flash', 'remove_sale_flash_single_product', 10, 2);

function remove_sale_flash_single_product($html, $post) {
    if (is_product() && $post->post_type === 'product') {
        return ''; // Remove the sale badge on single product pages
    }
    return $html; // Keep the sale badge on archive pages
}

// Remove default info
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
remove_action('woocommerce_single_product_summary', 'WC_Structured_Data', 60);

// Remove related default info
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

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

// Single product details
function hexshop_product_details(){ 
    global $post;
    global $product;
    global $woocommerce;

    // Get the product details
    $product_name = $product->get_name();
    $product_price = $product->get_price_html();
    $product_description = $product->get_short_description();
    $average_rating = $product->get_average_rating();

    // Get the product image
    $product_image_url = wp_get_attachment_url($product->get_image_id());

    // Get the product categories
    $categories = wc_get_product_category_list($product->get_id());

    ?>
    <div class="right-content">
        <h4><?php echo esc_html($product_name); ?></h4>
        
        <div class="price-star">
            <span class="price"><?php echo wp_kses_post($product_price); ?></span>
            <ul class="stars stars-single">
                <?php woocommerce_template_loop_rating(); ?>
            </ul>
        </div>
        
        <span><?php echo wp_kses_post($product_description); ?></span>
        <div class="quote">
            <i class="fa fa-quote-left"></i><p><?php echo wp_kses_post($product_description); ?></p>
        </div>
        <div class="quantity-content">
            <div class="left-content">
                <h6>No. of Orders</h6>
            </div>
            <div class="right-content">
                <form class="cart" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype='multipart/form-data'>
                    <div class="quantity buttons_added quantity-content-border">
                        <input type="button" value="-" class="minus">
                        <?php
                        // Quantity input field
                        woocommerce_quantity_input(array(
                            'min_value'   => apply_filters('woocommerce_quantity_input_min', 1, $product),
                            'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                            'input_value' => isset($_POST['quantity']) ? wc_stock_amount($_POST['quantity']) : 1,
                        ));
                        ?>
                        <input type="button" value="+" class="plus">
                    </div>
                    <div class="total">
                        <h4>Total: <?php echo wp_kses_post($product_price); ?></h4>
                        <button type="submit" class="single_add_to_cart_button button alt main-border-button"><?php esc_html_e('Add To Cart', 'woocommerce'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('form.cart .quantity.buttons_added').on('click', '.plus, .minus', function() {
                // Get the current quantity values
                var qty = $(this).closest('.quantity').find('.qty'),
                    val = parseFloat(qty.val()),
                    max = parseFloat(qty.attr('max')),
                    min = parseFloat(qty.attr('min')),
                    step = parseFloat(qty.attr('step'));

                // Change the value
                if ($(this).is('.plus')) {
                    if (max && (max <= val)) {
                        qty.val(max);
                    } else {
                        qty.val(val + step);
                    }
                } else {
                    if (min && (min >= val)) {
                        qty.val(min);
                    } else if (val > 1) {
                        qty.val(val - step);
                    }
                }
                qty.trigger('change');
            });
        });
    </script>
    <?php
}

add_action('woocommerce_single_product_summary','hexshop_product_details');