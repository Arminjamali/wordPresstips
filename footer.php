</main>

<?php
// Gather ACF options once
$phones  = get_field('phones', 'option') ?: [];
$email   = get_field('mail', 'option') ?: '';
$address = get_field('address', 'option') ?: '';

// Social links (ensure fields exist in ACF Options)
$social = [
    'youtube'   => get_field('youtube', 'option') ?: '',
    'whatsapp'  => get_field('whatsapp', 'option') ?: '',
    'telegram'  => get_field('telegram', 'option') ?: '',
    'instagram' => get_field('instagram', 'option') ?: '',
];

// Helpers for tel links
$build_tel_href = function($raw) {
    $tel_raw  = preg_replace('/\s+/', '', (string)$raw);
    $tel_href = 'tel:' . preg_replace('/[^\d+]/', '', $tel_raw);
    return esc_url($tel_href);
};
?>

<footer class="bg-main text-white py-5 text-center" role="contentinfo">
    <div class="container">
        <div class="row">

            <!-- Contact -->
            <div class="col-md-4">
                <div class="wrapper px-3 py-5">
                    <h4 class="fw-bold mb-5"><?php esc_html_e('Contact Us', 'aryabyte'); ?></h4>

                    <?php if (!empty($phones['phone_1'])): ?>
                        <p class="my-2">
                            <span class="me-1"><?php esc_html_e('Tel:', 'aryabyte'); ?></span>
                            <a class="text-white text-decoration-none"
                               href="<?php echo $build_tel_href($phones['phone_1']); ?>" dir="ltr">
                                <?php echo esc_html( antispambot($phones['phone_1']) ); ?>
                            </a>
                        </p>
                    <?php endif; ?>


                    <?php if (!empty($email) && is_email($email)): ?>
                        <p class="my-2">
                            <span class="me-1"><?php esc_html_e('Email:', 'aryabyte'); ?></span>
                            <a class="text-white text-decoration-none"
                               href="mailto:<?php echo esc_attr( antispambot($email) ); ?>">
                                <?php echo esc_html( antispambot($email) ); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Social -->
            <div class="col-md-4">
                <div class="wrapper px-3 py-5 bordered-wrapper">
                    <h4 class="fw-bold mb-5"><?php esc_html_e('Follow Us On Social Media', 'aryabyte'); ?></h4>

                    <ul class="list-unstyled d-flex align-items-center gap-3 justify-content-center"
                        aria-label="<?php echo esc_attr__('Social media links', 'aryabyte'); ?>">

                        <?php if (!empty($social['youtube'])): ?>
                            <li>
                                <a href="<?php echo esc_url($social['youtube']); ?>" target="_blank" rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr__('YouTube', 'aryabyte'); ?>">
                                    <img src="<?php echo esc_url( get_theme_file_uri('assets/img/youtube.svg') ); ?>"
                                         alt="" aria-hidden="true" loading="lazy" width="27" height="27">
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($social['whatsapp'])): ?>
                            <li>
                                <a href="<?php echo esc_url($social['whatsapp']); ?>" target="_blank" rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr__('WhatsApp', 'aryabyte'); ?>">
                                    <img src="<?php echo esc_url( get_theme_file_uri('assets/img/whatsapp.svg') ); ?>"
                                         alt="" aria-hidden="true" loading="lazy" width="27" height="27">
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($social['telegram'])): ?>
                            <li>
                                <a href="<?php echo esc_url($social['telegram']); ?>" target="_blank" rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr__('Telegram', 'aryabyte'); ?>">
                                    <img src="<?php echo esc_url( get_theme_file_uri('assets/img/telegram.svg') ); ?>"
                                         alt="" aria-hidden="true" loading="lazy" width="21" height="21">
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($social['instagram'])): ?>
                            <li>
                                <a href="<?php echo esc_url($social['instagram']); ?>" target="_blank" rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr__('Instagram', 'aryabyte'); ?>">
                                    <img src="<?php echo esc_url( get_theme_file_uri('assets/img/instagram.svg') ); ?>"
                                         alt="" aria-hidden="true" loading="lazy" width="21" height="21">
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Address -->
            <div class="col-md-4">
                <div class="wrapper px-3 py-5">
                    <h4 class="fw-bold mb-5"><?php esc_html_e('Address', 'aryabyte'); ?></h4>
                    <?php if (!empty($address)): ?>
                        <address class="mb-0"><?php echo esc_html($address); ?></address>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
