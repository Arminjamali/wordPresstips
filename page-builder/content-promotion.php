<?php
$layout     = get_row_layout();
$sec_title  = get_sub_field('title');
$sub_title  = get_sub_field('subtitle');
$content    = get_sub_field('content');
$items      = get_sub_field('items');
$img        = get_sub_field('img');
$link1      = get_sub_field('link1') ?: [];
$link2      = get_sub_field('link2') ?: [];

$section_class = sanitize_html_class($layout);
if (empty($section_class)) {
    $section_class = 'acf-section';
}

/**
 * اگر هیچ محتوایی برای نمایش نیست، خروج
 * عنوان، زیرعنوان، متن/محتوا، تصویر، آیتم‌ها و هرکدام از لینک‌ها
 */
$has_items = is_array($items) && array_filter($items, function($i){
        return !empty($i['title']);
    });
$has_links = (!empty($link1['url']) || !empty($link2['url']));

if (
    empty($sec_title)
    && empty($sub_title)
    && empty($content)
    && empty($img)
    && !$has_items
    && !$has_links
) {
    return;
}
?>

<!-- <?php echo esc_html($section_class); ?> section -->
<section class="<?php echo esc_attr($section_class); ?> py-5 bg-main position-relative text-white">
    <div class="container">
        <div class="row align-items-center">
            <?php if (!empty($img)) : ?>
            <div class="col-md-5 mb-4 mb-md-0">
                <?php
                // WordPress خودش alt را از متادیتا می‌کشه. کلاس اضافه می‌کنیم.
                echo wp_get_attachment_image($img, 'full', false, ['class' => 'w-100 img-fluid']);
                ?>
            </div>
            <div class="col-md-7">
                <?php else : ?>
                <div class="col-12">
                    <?php endif; ?>

                    <?php if (!empty($sec_title)) : ?>
                        <h2 class="fs-30 fw-bold fsm-20"><?php echo esc_html($sec_title); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($content)) : ?>
                        <div class="fs-16 content mt-3">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($sub_title)) : ?>
                        <span class="fs-18 d-block c-second mt-4"><?php echo esc_html($sub_title); ?></span>
                    <?php endif; ?>

                    <?php if ($has_items) : ?>
                        <div class="row row-gap-3 mt-3">
                            <?php foreach ($items as $item) :
                                $item_title = isset($item['title']) ? trim($item['title']) : '';
                                if ($item_title === '') { continue; }
                                ?>
                                <div class="col-md-6">
                                    <div class="item-wrapper">
                                        <?php echo esc_html($item_title); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($has_links) : ?>
                        <div class="links mt-5">

                            <?php if (is_array($link1) && !empty($link1['url'])) :
                                $href   = esc_url($link1['url']);
                                $label  = !empty($link1['title']) ? esc_html($link1['title']) : esc_html__('Learn more', 'webramz');
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
                                $label  = !empty($link2['title']) ? esc_html($link2['title']) : esc_html__('Learn more', 'webramz');
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

                </div>
            </div>
        </div>
</section>
