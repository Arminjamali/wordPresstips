<?php
$layout    = get_row_layout();
$sec_title = get_sub_field('title');
$sub_title = get_sub_field('subtitle');
$items     = get_sub_field('items');

// اگر هیچ محتوایی نیست، خروج
if (empty($sec_title) && empty($sub_title) && (empty($items) || !is_array($items))) {
    return;
}

$section_class = $layout ? sanitize_html_class($layout) : 'stats-section';

// فیلتر آیتم‌های ناقص
$items = array_values(array_filter((array) $items, function ($it) {
    return isset($it['number']) && !empty($it['title']);
}));
?>

<!-- <?php echo esc_html($section_class); ?> section -->
<section class="<?php echo esc_attr($section_class); ?> py-5 bg-main position-relative text-white">
    <div class="container">

        <?php if (!empty($sec_title)) : ?>
            <h2 class="text-center fs-30 fw-bold fsm-20"><?php echo esc_html($sec_title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($sub_title)) : ?>
            <span class="text-center fs-14 d-block azonix c-second mt-4"><?php echo esc_html($sub_title); ?></span>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
            <ul class="row mt-5 row-gap-3 list-unstyled m-0">
                <?php foreach ($items as $item):
                    $title  = isset($item['title']) ? $item['title'] : '';
                    $number = isset($item['number']) ? absint($item['number']) : 0;
                    $img_id = isset($item['img']) ? (int) $item['img'] : 0;
                    ?>
                    <li class="col-6 col-md-3">
                        <div class="counter-wrapper bg-bg position-relative text-center h-100">

                            <img class="counter-shape"
                                 src="<?php echo esc_url(get_theme_file_uri('assets/img/Exclude-counter.svg')); ?>"
                                 alt="<?php echo esc_attr__('decorative shape', 'your-textdomain'); ?>"
                                 loading="lazy" width="300" height="300" aria-hidden="true">

                            <div class="icon-wrapper w-25 mx-auto">
                                <?php
                                echo wp_get_attachment_image(
                                    $img_id,
                                    'full',
                                    false,
                                    array(
                                        'class'    => 'w-100 img-fluid',
                                        'loading'  => 'lazy',
                                        'decoding' => 'async',
                                    )
                                );
                                ?>
                            </div>

                            <div class="counter-number-wrapper fs-22 c-second" aria-label="<?php echo esc_attr($number . ' ' . $title); ?>">
                                <span class="plus" aria-hidden="true">+</span>
                                <span class="counter-number fs-26 fw-bold"
                                      data-count-to="<?php echo esc_attr($number); ?>"
                                      data-count-duration="1200"
                                      data-count-easing="easeOutCubic">0</span>
                            </div>

                            <h3 class="fs-16 m-0 fw-normal"><?php echo esc_html($title); ?></h3>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </div>
</section>
