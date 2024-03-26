<?php 

// This code is utilized by the Forced Login Page Lock plugin, ensuring that users log in before accessing the checkout page.

add_action('template_redirect', 'redirect_to_my_account_if_not_logged_in');

function redirect_to_my_account_if_not_logged_in() {
    // If the user is not logged in and is on the checkout page
    if (!is_user_logged_in() && is_checkout()) {
        // Redirect to the My Account page
        wp_redirect(wc_get_page_permalink('myaccount'));
        exit;
    }
}

add_action('woocommerce_login_redirect', 'redirect_to_checkout_after_login');

function redirect_to_checkout_after_login($redirect_to) {
    // If the user logged in from the checkout page
    if (strpos($redirect_to, 'checkout') !== false) {
        // Redirect to the checkout page
        return wc_get_checkout_url();
    }
    // Otherwise, return the remaining redirects
    return $redirect_to;
}


?>
