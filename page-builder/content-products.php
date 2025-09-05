<?php

$layout = get_row_layout();
$sec_title = get_sub_field('title');
$sub_title = get_sub_field('subtitle');

// آماده‌سازی لینک‌ها


// آیتم‌ها: تضمین آرایه و فیلتر اعداد معتبر
$raw_items = get_sub_field('items');
$items = array_values(array_filter((array)$raw_items, static function ($id) {
    return is_numeric($id) && (int)$id > 0;
}));

// اگر هیچ محتوایی برای نمایش نیست، خروج
if (empty($sec_title) && empty($sub_title)  && empty($items)) {
    return;
}
?>

<!-- <?php echo esc_html($layout); ?> section -->
<section class="<?php echo esc_attr($layout); ?> py-5 position-relative">
    <div class="container">

        <?php if (!empty($sec_title)) : ?>
            <h2 class="text-center fs-30 fw-bold fsm-20"><?php echo esc_html($sec_title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($sub_title)) : ?>
            <span class="text-center fs-14 d-block azonix c-main mt-4"><?php echo esc_html($sub_title); ?></span>
        <?php endif; ?>

        <div class="swiper product-slider mt-2 mt-md-5" role="region"
             aria-label="<?php echo esc_attr__('اسلایدر محصولات', 'aryabyte'); ?>">
            <div class="swiper-wrapper">

                <?php
                if ($items && is_array($items)) :

                    $args = [
                        'post_type' => 'product',
                        'post__in' => array_map('intval', $items),
                        'orderby' => 'post__in',               // حفظ ترتیب ACF
                        'posts_per_page' => count($items),
                        'no_found_rows' => true,                     // سبک‌تر
                        'ignore_sticky_posts' => true,
                        'update_post_term_cache' => false,
                        'update_post_meta_cache' => false,
                    ];

                    $products = new WP_Query($args);
                    $i = 0;

                    if ($products->have_posts()) :
                        while ($products->have_posts()) :
                            $products->the_post();

                            include get_template_directory() . '/template-parts/product-card.php';

                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;

                endif; // $ids
                ?>
            </div>
            <div class="navigation d-flex justify-content-center gap-2 mt-4">
                <div class="slide-perv">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 14.75L14.5 1.25M14.5 1.25H4.375M14.5 1.25V11.375" stroke="#0B4C4C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>
                <div class="slide-next">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 1.25L1.5 14.75M1.5 14.75H11.625M1.5 14.75V4.625" stroke="#0B4C4C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>

            </div>
        </div>
    </div>
</section>
