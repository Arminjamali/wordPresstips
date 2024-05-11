<?php
add_filter('woocommerce_package_rates', 'custom_shipping_method_disable_others', 10, 2);

function custom_shipping_method_disable_others($rates, $package) {
    // Exception Method
    $Exception_Shipping = 15;
    
    // Check If Free Shipping is Available
    $free_shipping_available = false;
    foreach ($rates as $rate_key => $rate) {
        if ('free_shipping' === $rate->method_id) {
            $free_shipping_available = true;
            break;
        }
    }

    // Deactive Other Method
    if ($free_shipping_available) {
        foreach ($rates as $rate_key => $rate) {
            if ('free_shipping' !== $rate->method_id && $Exception_Shipping != $rate->instance_id) {
                unset($rates[$rate_key]);
            }
        }
    }

    return $rates;
}
