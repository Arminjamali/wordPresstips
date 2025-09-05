<?php
$layout = get_row_layout();
$items = get_sub_field('items');
$section_title = get_sub_field('title') ?: '';
?>
    <!-- <?php echo esc_html($layout); ?> section -->
    <section class="py-5 bg-main <?php echo esc_attr($layout); ?>">
        <div class="container">
            <?php if ($section_title): ?>
                <h2 class="fw-bold mb-5 text-white text-center"><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>
            <div class="swiper testimonial-slider" role="region"
                 aria-label="<?php echo esc_attr__('testimonial slider', 'webramz'); ?>">
                <div class="swiper-wrapper">
                    <?php


                    if ($items && is_array($items)) :
                        $i = 0;
                        foreach ($items as $item) :

                            $content = $item['content'] ?? '';
                            $name = $item['name'] ?? '';
                            $img_id = $item['img'] ?? 0;
                            $loading = ($i === 0) ? 'eager' : 'lazy';
                            ?>
                            <div class="swiper-slide bg-second rounded-5">
                                <div class="row align-items-center">
                                    <div class="col-md-4">


                                        <?php
                                        if ($img_id) {
                                            // alt: اول از خود تصویر، اگر نبود از عنوان
                                            $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                                            $alt = $alt ? $alt : wp_strip_all_tags($name);

                                            echo wp_get_attachment_image(
                                                $img_id,
                                                'full',
                                                false,
                                                [
                                                    'class' => 'w-100 img-fluid',
                                                    'loading' => $loading,
                                                    'decoding' => 'async',
                                                    'alt' => esc_attr($alt),
                                                ]
                                            );
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8 py-3 px-5">
                                        <p class="fs-18">
                                            <?php echo wp_kses_post($content); ?>
                                        </p>
                                        <b class="float-end">
                                            <?php echo esc_html($name); ?>
                                        </b>
                                    </div>

                                </div>
                            </div>
                            <?php
                            $i++;
                        endforeach;
                    endif;
                    ?>
                </div>

                <div class="swiper-pagination mt-3"></div>

            </div>
        </div>
    </section>

