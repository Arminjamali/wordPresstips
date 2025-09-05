<?php
$layout    = get_row_layout();
$sec_title = get_sub_field('title');
$sub_title = get_sub_field('subtitle');

// آیتم‌ها: تضمین آرایه و فیلتر اعداد معتبر
$raw_items = get_sub_field('items');
$items = array_values(array_filter((array) $raw_items, static function ($id) {
    return is_numeric($id) && (int) $id > 0;
}));

// اگر هیچ محتوایی برای نمایش نیست، خروج
if (empty($sec_title) && empty($sub_title) && empty($items)) {
    return;
}
?>

<!-- <?php echo esc_html($layout); ?> section -->
<section class="<?php echo esc_attr($layout); ?> py-5 position-relative bg-main">
    <div class="container">

        <?php if (!empty($sec_title)) : ?>
            <h2 class="text-center text-white fs-24 fw-bold fsm-20"><?php echo esc_html($sec_title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($sub_title)) : ?>
            <span class="text-center fs-14 d-block azonix c-second mt-4"><?php echo esc_html($sub_title); ?></span>
        <?php endif; ?>

        <div
                class="swiper project-slider mt-2 mt-md-5"
                role="region"
                aria-roledescription="carousel"
                aria-live="polite"
                aria-label="<?php echo esc_attr__('اسلایدر محصولات', 'aryabyte'); ?>"
        >
            <div class="swiper-wrapper">
                <?php
                if ($items) :

                    $args = [
                        'post_type'              => 'project',
                        'post__in'               => array_map('intval', $items),
                        'orderby'                => 'post__in',     // حفظ ترتیب ACF
                        'posts_per_page'         => count($items),
                        'no_found_rows'          => true,
                        'ignore_sticky_posts'    => true,
                        'update_post_term_cache' => false,
                        'update_post_meta_cache' => false,
                        'cache_results'          => false,
                    ];

                    $projects_q = new WP_Query($args);
                    $i = 0;

                    if ($projects_q->have_posts()) :
                        while ($projects_q->have_posts()) :
                            $projects_q->the_post();
                            ?>
                            <div class="swiper-slide">
                                <?php
                                // پاس‌دادن وضعیت اسلاید اول به کارت با args
                                get_template_part(
                                    'template-parts/project-card',
                                    null,
                                    ['is_first' => ($i === 0)]
                                );
                                ?>
                            </div>
                            <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;

                endif; // $items
                ?>
            </div>

            <div class="navigation d-flex justify-content-center gap-2 mt-4" aria-label="<?php echo esc_attr__('کنترل‌های اسلایدر', 'aryabyte'); ?>">
                <div class="slide-perv" aria-label="<?php echo esc_attr__('اسلاید قبلی', 'aryabyte'); ?>">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="M1 14.75L14.5 1.25M14.5 1.25H4.375M14.5 1.25V11.375" stroke="#F9B625" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <div  class="slide-next" aria-label="<?php echo esc_attr__('اسلاید بعدی', 'aryabyte'); ?>">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="M15 1.25L1.5 14.75M1.5 14.75H11.625M1.5 14.75V4.625" stroke="#F9B625" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
