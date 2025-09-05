<?php

$permalink = esc_url(get_permalink());
$title = esc_html(get_the_title());

// تصویر شاخص
$thumb_id = get_post_thumbnail_id();
$img_html = '';
if ($thumb_id) {
    $img_html = wp_get_attachment_image(
        $thumb_id,
        'product', // به‌جای full برای وزن کمتر؛ در صورت نیاز تغییر بده
        false,
        [
            'class' => 'w-100 product-thumb img-fluid',
            'loading' => $i === 0 ? 'eager' : 'lazy',
            'decoding' => 'async',
        ]
    );
}
?>
<div class="swiper-slide">
    <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">
        <div class="product-wrapper position-relative">
            <img class="product-logo"
                 src="<?php echo esc_url(get_theme_file_uri('assets/img/logo.png')); ?>"
                 alt="<?php echo esc_attr($title); ?>"
                 loading="lazy" width="92" height="92">
            <?php echo $img_html; ?>
            <img class="product-shape"
                 src="<?php echo esc_url(get_theme_file_uri('assets/img/product-shape.svg')); ?>"
                 alt="<?php echo esc_attr($title); ?>"
                 loading="lazy" width="100%" height="auto">
            <h3><?php echo $title; ?></h3>


        </div>
    </a>
</div>