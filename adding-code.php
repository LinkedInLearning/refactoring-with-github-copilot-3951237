<?php

function apply_discount( string $product_type, float $price ) {
    $discount = get_discount_for_product_type( $product_type );
    return $price - ( $price * $discount );
}

function display_discount_percent_for_product( string $product_type ) {
    $discount = get_discount_for_product_type( $product_type );
    return $discount * 100;
}

function get_discount_for_product_type( string $product_type ) {
    if ( $product_type === 'clothing' ) {
        return 0.1;
    } elseif ( $product_type === 'grocery' ) {
        return 0.2;
    } elseif ( $product_type === 'electronics' ) {
        return 0.3;
    }

    return 0;
}