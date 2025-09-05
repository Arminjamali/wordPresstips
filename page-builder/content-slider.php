<!-- <?php echo get_row_layout(); ?> section -->
<section class="<?php echo esc_attr(get_row_layout()); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="swiper main-slider"
                 role="region"
                 aria-roledescription="carousel"
                 aria-label="<?php echo esc_attr__('اسلایدر هیرو','aryabyte'); ?>">
                <div class="swiper-wrapper">
                    <?php
                    $is_mobile = wp_is_mobile();
                    $items = get_sub_field('items');

                    if ($items && is_array($items)) :
                        $i = 0;
                        foreach ($items as $item) :
                            // آیدیِ تصویر بر اساس موبایل/دسکتاپ
                            if ($is_mobile) {
                                $img_id = $item['img_mobile'] ?? ($item['img'] ?? 0);
                            } else {
                                $img_id = $item['img'] ?? 0;
                            }

                            $title    = $item['title'] ?? '';
                            $subtitle = $item['content'] ?? '';
                            $link     = $item['link'] ?? '';
                            $loading       = ($i === 0) ? 'eager' : 'lazy';
                            $fetchpriority = ($i === 0) ? 'high' : 'auto';
                            ?>
                            <div class="swiper-slide">
                                <div class="position-relative">
                                    <?php
                                    if ($img_id) {
                                        // alt: اول از خود تصویر، اگر نبود از عنوان
                                        $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                                        $alt = $alt ? $alt : wp_strip_all_tags($title);

                                        echo wp_get_attachment_image(
                                            $img_id,
                                            'full',
                                            false,
                                            [
                                                'class'         => 'w-100 img-fluid',
                                                'loading'       => $loading,
                                                'decoding'      => 'async',
                                                'fetchpriority' => $fetchpriority,
                                                'alt'           => esc_attr($alt),
                                            ]
                                        );
                                    }
                                    ?>

                                    <div class="info-box">
                                        <?php if ($title) : ?>
                                            <h1 class="fw-bold fs-30 fsm-20"><?php echo esc_html($title); ?></h1>
                                        <?php endif; ?>
                                        <?php if ($subtitle) : ?>
                                            <p class="fs-16 fsm-14 mb-0"><?php echo esc_html($subtitle); ?></p>
                                        <?php endif; ?>

                                        <?php if (is_array($link) && !empty($link['url'])):
                                            $href   = esc_url($link['url']);
                                            $label  = !empty($link['title']) ? esc_html($link['title']) : esc_html__('Learn more', 'webramz');
                                            $target = !empty($link['target']) ? ' target="_blank" rel="noopener noreferrer"' : '';
                                            ?>
                                            <a class="second-button mt-3"
                                               title="<?php echo esc_attr($label); ?>"
                                               href="<?php echo $href; ?>"<?php echo $target; ?>>
                                                <?php echo $label; ?>
                                                <img class="me-2"
                                                     src="<?php echo esc_url(get_theme_file_uri('assets/img/arrow-left-black.svg')); ?>"
                                                     alt="<?php echo esc_attr__('مطالعه بیشتر', 'aryabyte'); ?>"
                                                     loading="lazy" width="20" height="20">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        endforeach;
                    endif;
                    ?>
                </div>

                <div class="slide-controller d-flex gap-5 align-items-center">
                    <button type="button" class="ms-perv-btn"
                            aria-label="<?php echo esc_attr__('اسلاید قبلی', 'aryabyte'); ?>">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/Arrow-Right.svg')); ?>"
                             alt="" loading="lazy" width="24" height="24">
                    </button>

                    <div id="slide-number" class="slide-number"
                         aria-live="polite" aria-atomic="true">01</div>

                    <button type="button" class="ms-next-btn"
                            aria-label="<?php echo esc_attr__('اسلاید بعدی', 'aryabyte'); ?>">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/Arrow-Left.svg')); ?>"
                             alt="" loading="lazy" width="24" height="24">
                    </button>
                </div>

            </div>
        </div>
    </div>
</section>
