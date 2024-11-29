<?php


function add_content_after_addtocart() {


    $current_product_id = get_the_ID();


    echo '<a id="add-lenses-button"  type="submit" href="'.get_site_url() . '/lenses/?add-to-cart='.$current_product_id.'" class="single_add_to_cart_button button alt" >Add Lenses</a>';

}
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );




add_filter( 'woocommerce_product_single_add_to_cart_text', 'add_to_cart_text' );
function add_to_cart_text() {
        return __( 'Add Frame', 'your-slug' );

}
