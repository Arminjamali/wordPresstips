<?php
$layout     = get_row_layout();
$sec_title  = get_sub_field('title');
$sub_title  = get_sub_field('subtitle');
$content    = get_sub_field('content');
$img        = get_sub_field('cover');
$video      = get_sub_field('video'); // اینجا انتظار فایل ویدئو (مثلا mp4) داریم
$link1      = get_sub_field('link1') ?: [];
$link2      = get_sub_field('link2') ?: [];

$section_class = sanitize_html_class($layout);
if (empty($section_class)) {
    $section_class = 'acf-section';
}

$has_links = (!empty($link1['url']) || !empty($link2['url']));
$has_video = (!empty($video)) && (!empty($img));

if (
    empty($sec_title)
    && empty($sub_title)
    && empty($content)
    && !$has_video
    && !$has_links
) {
    return;
}
?>

<!-- <?php echo esc_html($layout); ?> section -->
<section class="<?php echo esc_attr($layout); ?> py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <?php if (!empty($sec_title)) : ?>
                    <h2 class="text-center fs-30 fw-bold fsm-20"><?php echo esc_html($sec_title); ?></h2>
                <?php endif; ?>

                <?php if (!empty($sub_title)) : ?>
                    <span class="text-center fs-14 d-block azonix c-main mt-3">
                        <?php echo esc_html($sub_title); ?>
                    </span>
                <?php endif; ?>

                <?php if (!empty($content)) : ?>
                    <div class="fs-16 text-center mt-4">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>

                <?php if ($has_links) : ?>
                    <div class="links mt-4 text-center">
                        <?php if (is_array($link1) && !empty($link1['url'])) :
                            $href   = esc_url($link1['url']);
                            $label  = !empty($link1['title']) ? esc_html($link1['title']) : esc_html__('بیشتر', 'aryabyte');
                            $target = !empty($link1['target']) ? ' target="_blank" rel="noopener noreferrer"' : '';
                            ?>
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

                        <?php if (is_array($link2) && !empty($link2['url'])) :
                            $href   = esc_url($link2['url']);
                            $label  = !empty($link2['title']) ? esc_html($link2['title']) : esc_html__('بیشتر', 'aryabyte');
                            $target = !empty($link2['target']) ? ' target="_blank" rel="noopener noreferrer"' : '';
                            ?>
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
                <?php endif; ?>

                <?php if ($has_video): ?>
                    <!-- کاور کلیک‌پذیر -->
                    <div class="cover-wrapper mt-5 position-relative"
                         role="button" tabindex="0"
                         aria-label="<?php echo esc_attr__('پخش ویدئو', 'aryabyte'); ?>"
                         data-open-video="section-video-dialog">
                        <?php echo wp_get_attachment_image($img, 'full', false, ['class'=>'w-100 img-fluid rounded-5']); ?>
                        <img class="about-logo"
                             src="<?php echo esc_url(get_theme_file_uri('assets/img/about-logo.png')); ?>"
                             alt="<?php echo esc_attr($sec_title); ?>"
                             loading="lazy" width="90" height="90">
                        <img class="about-shape"
                             src="<?php echo esc_url(get_theme_file_uri('assets/img/about-shape.svg')); ?>"
                             alt="<?php echo esc_attr($sec_title); ?>"
                             loading="lazy" width="240" height="42">

                    </div>

                    <!-- دیالوگ ویدئو -->
                    <dialog id="section-video-dialog" class="rounded-5"
                            style="max-width:900px;width:90%;border:none;padding:0;overflow:hidden;">
                        <button  class="video-close" type="button" data-close-dialog
                                aria-label="<?php esc_attr_e('بستن', 'aryabyte'); ?>"
                                >✕</button>

                        <video id="section-video"
                               controls
                               playsinline
                               preload="none"
                               poster="<?php echo esc_url(wp_get_attachment_image_url($img, 'full')); ?>"
                               style="display:block;width:100%;height:auto;">
                            <source src="<?php echo esc_url($video); ?>"
                                    type="<?php echo esc_attr(wp_check_filetype($video)['type'] ?? 'video/mp4'); ?>">
                            <?php esc_html_e('مرورگر شما از ویدئو پشتیبانی نمی‌کند.', 'aryabyte'); ?>
                        </video>
                    </dialog>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>


