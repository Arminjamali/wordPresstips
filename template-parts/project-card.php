<?php
// template-parts/project-card.php

// $args از get_template_part می‌آید (WP 5.5+)
$is_first = isset($args['is_first']) ? (bool) $args['is_first'] : false;

$permalink = get_permalink();
$title_raw = get_the_title();
$title     = $title_raw ? esc_html($title_raw) : '';

$customer  = get_field('customer');
$employer  = $customer ? esc_html($customer) : '';

// تصویر شاخص
$thumb_id = get_post_thumbnail_id();
$img_html = '';
if ($thumb_id) {
    // اگر سایز ثبت‌شده‌ی 'project' داری، عالی؛ در غیر این صورت می‌تونی از 'large' استفاده کنی.
    $img_html = wp_get_attachment_image(
        $thumb_id,
        'project',
        false,
        [
            'class'    => 'w-100 project-thumb img-fluid',
            'loading'  => $is_first ? 'eager' : 'lazy',
            'decoding' => 'async',
        ]
    );
}
?>
<a href="<?php echo esc_url($permalink); ?>" title="<?php echo $title; ?>" rel="bookmark">
    <div class="project-wrapper">
        <div class="project-thumb-wrapper position-relative">
            <?php echo $img_html; ?>

            <img
                    class="project-shape"
                    src="<?php echo esc_url( get_theme_file_uri('assets/img/project-shape.svg') ); ?>"
                    alt=""
                    aria-hidden="true"
                    loading="lazy"
            >

            <?php if ($employer) : ?>
                <span class="employer"><?php echo $employer; ?></span>
            <?php endif; ?>
        </div>

        <?php if ($title) : ?>
            <h3 class="fs-18 oneline text-white mt-4"><?php echo $title; ?></h3>
        <?php endif; ?>
    </div>
</a>
