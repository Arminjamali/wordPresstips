<!-- <?php echo esc_html(get_row_layout()); ?> section -->
<section class="<?php echo esc_attr(get_row_layout()); ?> py-5">
    <div class="container">
        <?php if ($sec_title = get_sub_field('title')) : ?>
            <h2 class="text-center fs-32 fw-bold"><?php echo esc_html($sec_title); ?></h2>
        <?php endif; ?>

        <?php
        $args = [
            'post_type'              => 'blog', // اگر CPT ندارید، 'post' بگذارید
            'posts_per_page'         => 2,
            'no_found_rows'          => true,
            'ignore_sticky_posts'    => true,
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
        ];
        $blogs = new WP_Query($args);

        if ($blogs->have_posts()) :
            $i = 0; // شمارنده برای یکی‌درمیان
            while ($blogs->have_posts()) : $blogs->the_post();

                $permalink   = esc_url( get_permalink() );
                $title_text  = get_the_title();
                $title_attr  = esc_attr( $title_text );
                $title_html  = esc_html( $title_text );

                // تصویر شاخص
                $thumb_id = get_post_thumbnail_id();
                $img_html = '';
                if ($thumb_id) {
                    $img_html = wp_get_attachment_image(
                        $thumb_id,
                        'large', // اگر سایز 'blog' تعریف کرده‌اید می‌توانید همان را بگذارید
                        false,
                        [
                            'class'    => 'w-100 img-fluid blog-img',
                            'decoding' => 'async',
                            'loading'  => $i === 0 ? 'eager' : 'lazy',
                            'alt'      => $title_attr,
                        ]
                    );
                }

                // برای آیتم اول (i=0) ردیف را برعکس می‌کنیم تا تصویر سمت راست بیاید
                $row_class = $i % 2 === 0 ? 'flex-md-row-reverse' : '';
                ?>
                <a class="my-5 d-block bg-main text-white rounded-4 blog-item" href="<?php echo $permalink; ?>" title="<?php echo $title_attr; ?>">
                    <div class="row align-items-center <?php echo $row_class; ?>">
                        <div class="col-md-6">
                            <?php echo $img_html; ?>
                        </div>
                        <div class="col-md-6 py-2 px-5">
                            <h3 class="fw-bold fs-18 my-3"><?php echo $title_html; ?></h3>
                            <p class="excerpt fs-17">
                                <?php echo esc_html( wp_trim_words( get_the_excerpt(), 24, '…' ) ); ?>
                            </p>
                            <img
                                    aria-hidden="true"
                                    class="float-end"
                                    src="<?php echo esc_url(get_theme_file_uri('assets/img/arrow.svg')); ?>"
                                    alt="<?php echo esc_attr__('See More', 'webramz'); ?>"
                                    loading="lazy" width="30" height="20">
                        </div>
                    </div>
                </a>
                <?php
                $i++;
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>
