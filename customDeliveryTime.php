<?php

function delivery_checkout_field( $checkout ) {
    date_default_timezone_set('Asia/Tehran');
    
    $current_time = time(); 
    $time_now = date( 'H:i:s', $current_time ); 
    $is_before_noon = date( 'H', $current_time ) < 12;

    // تابع برای بررسی تعطیلی با استفاده از API
    function is_holiday($date) {
        $url = "https://holidayapi.ir/jalali/" . $date;
        $response = wp_remote_get($url);
        if (is_wp_error($response)) {
            return false;
        }
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        if (isset($data['is_holiday']) && $data['is_holiday']) {
            return true;
        }
        return false;
    }

    // پیدا کردن سه روز غیر تعطیل
    $dates = [];
    $day_increment = 0;
    while (count($dates) < 3) {
        $date_to_check = strtotime("+$day_increment days", $current_time);
        $date_to_check_jalali = jdate('Y/m/d', $date_to_check);
        if ($is_before_noon || $day_increment > 0) {
            if (!is_holiday($date_to_check_jalali)) {
                $dates[] = [
                    'date' => $date_to_check_jalali,
                    'day_name' => jdate('l', $date_to_check)
                ];
            }
        }
        $day_increment++;
    }

    // تعریف بازه‌های زمانی
    $time_slots = [
        '16:30-18:00',
        '18:00-19:30',
        '19:30-21:00'
    ];

     //رندر فیلد
    echo '<div id="delivery_checkout_field"><h2>' . __('زمان ارسال پیکی') . '</h2>';
    echo '<div class="woocommerce-input-wrapper">';
    echo '<ul class="nav nav-tabs" role="tablist">';

    foreach ($dates as $key => $date_info) {
        $active_class = $key === 0 ? 'active' : '';
        echo '<li role="presentation" class="' . esc_attr($active_class) . '"><a href="#tab_' . esc_attr($key) . '" aria-controls="tab_' . esc_attr($key) . '" role="tab" data-toggle="tab">' . esc_html($date_info['day_name'] . ' - ' . $date_info['date']) . '</a></li>';
    }

    echo '</ul>';
    echo '<div class="tab-content">';

    foreach ($dates as $key => $date_info) {
        $active_class = $key === 0 ? 'active' : '';
        echo '<div role="tabpanel" class="tab-pane ' . esc_attr($active_class) . '" id="tab_' . esc_attr($key) . '">';
        foreach ($time_slots as $slot) {
            $checked_attr = $key === 0 && $slot === $time_slots[0] ? 'checked="checked"' : '';
            echo '<div class="date-item">';
            echo '<input type="radio" class="input-radio" value="' . esc_attr($date_info['date'] . ' ' . $slot) . '" name="delivery_field" id="delivery_field_' . esc_attr($date_info['date'] . '_' . $slot) . '" ' . $checked_attr . '>';
            echo '<label for="delivery_field_' . esc_attr($date_info['date'] . '_' . $slot) . '" class="radio">' . esc_html($slot) . '</label>';
            echo '</div>';
        }
        echo '</div>';
    }

    echo '</div>'; 
    echo '</div>'; 
    echo '</div>'; 
}

add_action( 'woocommerce_after_order_notes', 'delivery_checkout_field' );
function delivery_checkout_tab_styles() {
    if(!is_checkout()){
      return;
    }
    echo '<style>
        .nav-tabs {
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
        }
        .nav-tabs li {
            float: left;
            margin-bottom: -1px;
        }
        .nav-tabs li a {
            margin-right: 2px;
            line-height: 1.42857143;
            border: 1px solid transparent;
            border-radius: 4px 4px 0 0;
            padding: 10px;
        }
        .nav-tabs li a:hover {
            border-color: #eee #eee #ddd;
        }
        .nav-tabs .active a {
            color: #555;
            cursor: default;
            background-color: #fff;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
        }
        .tab-content > .tab-pane {
            display: none;
        }
        .tab-content > .active {
            display: block;
        }
    </style>';
}
add_action('wp_head', 'delivery_checkout_tab_styles');




function delivery_checkout_script() {
    if ( is_checkout() ) {
        ?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                var tabLinks = document.querySelectorAll(".nav-tabs li a");
                var tabPanes = document.querySelectorAll(".tab-content .tab-pane");
    
                tabLinks.forEach(function(link) {
                    link.addEventListener("click", function(e) {
                        e.preventDefault();
    
                        tabLinks.forEach(function(item) {
                            item.parentElement.classList.remove("active");
                        });
    
                        tabPanes.forEach(function(pane) {
                            pane.classList.remove("active");
                        });
    
                        this.parentElement.classList.add("active");
                        document.querySelector(this.getAttribute("href")).classList.add("active");
                    });
                });
            });
            jQuery(document).ready(function($) {
                function toggleCustomField() {
                    var shippingMethod = $('input[name^="shipping_method"]:checked').val();
                  // جایگزین flat_rate:3 با آی‌دی روش ارسال پیکی خود
                    if (shippingMethod === 'flat_rate:9') { 
                        $('#delivery_checkout_field').show();
                    } else {
                        $('#delivery_checkout_field').hide();
                    }
                }
                toggleCustomField();
                $('body').on('change', 'input[name^="shipping_method"]', function() {
                    toggleCustomField();
                });
            });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'delivery_checkout_script' );
function delivery_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['delivery_field'] ) ) {
        update_post_meta( $order_id, 'Custom Field', sanitize_text_field( $_POST['delivery_field'] ) );
    }
}
add_action( 'woocommerce_checkout_update_order_meta', 'delivery_checkout_field_update_order_meta' );

function delivery_checkout_field_display_admin_order_meta($order){
    $delivery_field = get_post_meta( $order->get_id(), 'Custom Field', true );
    if ( ! empty( $delivery_field ) ) {
        echo '<p><strong>' . __( 'زمان ارسال انتخابی' ) . ':</strong> ' . $delivery_field . '</p>';
    }
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'delivery_checkout_field_display_admin_order_meta', 10, 1 );
