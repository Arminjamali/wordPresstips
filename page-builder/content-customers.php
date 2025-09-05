<?php
/**
 * Section: Brand Slider (ACF)
 * fields: title, subtitle, content, link1 (array), link2 (array), items (attachment IDs)
 */

$layout = get_row_layout();
$sec_title = get_sub_field('title');
$sub_title = get_sub_field('subtitle');
$content = get_sub_field('content');

// آماده‌سازی لینک‌ها


// آیتم‌ها: تضمین آرایه و فیلتر اعداد معتبر
$raw_items = get_sub_field('items');
$items = array_values(array_filter((array)$raw_items, static function ($id) {
    return is_numeric($id) && (int)$id > 0;
}));

// اگر هیچ محتوایی برای نمایش نیست، خروج
if (empty($sec_title) && empty($sub_title) && empty($content) && empty($items)) {
    return;
}

// تقسیم امن به دو ردیف اسلاید
$chunks = array_chunk($items, (int)ceil(count($items) / 2));
$brands1 = $chunks[0] ?? [];
$brands2 = $chunks[1] ?? [];
?>

<!-- <?php echo esc_html($layout); ?> section -->
<section class="<?php echo esc_attr($layout); ?> bg-main text-white position-relative">
    <div class="container">
        <div class="row justify-content-end align-items-center">
            <div class="col-md-5">
                <?php if (!empty($sec_title)) : ?>
                    <h2 class="fs-28 fw-bold fsm-20"><?php echo esc_html($sec_title); ?></h2>
                <?php endif; ?>

                <?php if (!empty($sub_title)) : ?>
                    <span class="fs-14 d-block azonix c-second mt-4"><?php echo esc_html($sub_title); ?></span>
                <?php endif; ?>

                <?php if (!empty($content)) : ?>
                    <p class="mt-3"><?php echo esc_html($content); ?></p>
                <?php endif; ?>

                <?php
                $link1 = get_sub_field('link1') ?: [];
                $link2 = get_sub_field('link2') ?: []; // 👈 این خط باید link2 باشه

                if ((!empty($link1) && !empty($link1['url'])) || (!empty($link2) && !empty($link2['url']))) { ?>
                    <div class="links mt-4">

                        <?php if (is_array($link1) && !empty($link1['url'])):
                            $href   = esc_url($link1['url']);
                            $label  = !empty($link1['title']) ? esc_html($link1['title']) : esc_html__('Learn more', 'webramz');
                            $target = !empty($link1['target']) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>
                            <a class="main-button"
                               title="<?php echo esc_attr($label); ?>"
                               href="<?php echo $href; ?>"<?php echo $target; ?>>
                                <?php echo $label; ?>
                                <img class="me-2"
                                     src="<?php echo esc_url(get_theme_file_uri('assets/img/arrow-left-white.svg')); ?>"
                                     alt="<?php echo esc_attr($label); ?>"
                                     loading="lazy" width="20" height="20">
                            </a>
                        <?php endif; ?>

                        <?php if (is_array($link2) && !empty($link2['url'])):
                            $href   = esc_url($link2['url']);
                            $label  = !empty($link2['title']) ? esc_html($link2['title']) : esc_html__('Learn more', 'webramz');
                            $target = !empty($link2['target']) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>
                            <a class="second-button mx-2"
                               title="<?php echo esc_attr($label); ?>"
                               href="<?php echo $href; ?>"<?php echo $target; ?>>
                                <?php echo $label; ?>
                                <img class="me-2"
                                     src="<?php echo esc_url(get_theme_file_uri('assets/img/arrow-left-black.svg')); ?>"
                                     alt="<?php echo esc_attr($label); ?>"
                                     loading="lazy" width="20" height="20">
                            </a>
                        <?php endif; ?>

                    </div>
                <?php } ?>

            </div>

            <?php if (!empty($items)) : ?>
                <div class="col-md-6">
                    <div class="brand-sliders d-flex justify-content-center gap-4">
                        <?php if (!empty($brands1)) : ?>
                            <div class="swiper brand-slider brand-slider-down"
                                 role="region"
                                 aria-roledescription="carousel"
                                 aria-live="polite"
                                 aria-label="<?php echo esc_attr__('اسلایدر برند - ردیف ۱', 'webramz'); ?>">
                                <div class="swiper-wrapper">
                                    <?php foreach ($brands1 as $item_id) : ?>
                                        <div class="swiper-slide text-center">
                                            <div class="brand-logo-wrapper">

                                                <?php
                                                echo wp_get_attachment_image(
                                                    $item_id,
                                                    'full', // پیشنهاد: سایز سفارشی مثل 'brand-logo' برای بهینه‌تر شدن
                                                    false,
                                                    [
                                                        'class' => 'img-fluid',
                                                        'loading' => 'lazy',
                                                        'decoding' => 'async',
                                                    ]
                                                );
                                                ?>
                                            </div>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($brands2)) : ?>
                            <div class="swiper brand-slider brand-slider-up"
                                 role="region"
                                 aria-roledescription="carousel"
                                 aria-live="polite"
                                 aria-label="<?php echo esc_attr__('اسلایدر برند - ردیف ۲', 'webramz'); ?>">
                                <div class="swiper-wrapper">
                                    <?php foreach ($brands2 as $item_id) : ?>
                                        <div class="swiper-slide text-center">
                                            <div class="brand-logo-wrapper">

                                                <?php
                                                echo wp_get_attachment_image(
                                                    $item_id,
                                                    'full',
                                                    false,
                                                    [
                                                        'class' => 'img-fluid',
                                                        'loading' => 'lazy',
                                                        'decoding' => 'async',
                                                    ]
                                                );
                                                ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
