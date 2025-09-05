<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preload" as="font" href="/assets/fonts/Inter-Regular.woff2" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="/assets/fonts/YekanBakh-Regular.woff2" type="font/woff2" crossorigin>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if (wp_is_mobile()): ?>
    <header id="header">
        <div class=" container">
            <div class="row align-items-center justify-content-between">
                <div class="col-3">
                    <?php
                    if (function_exists('the_custom_logo') && has_custom_logo()) {
                        the_custom_logo();
                    }
                    ?>
                </div>

                <div class="col-md-6">
                </div><!-- .col-md-6 -->
            </div><!-- .row -->
        </div><!-- .container -->

    </header>

<?php else: ?>
    <header id="header">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-1">
                    <?php
                    if (function_exists('the_custom_logo') && has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        printf(
                            '<a class="site-title text-white text-decoration-none" href="%s">%s</a>',
                            esc_url(home_url('/')),
                            esc_html(get_bloginfo('name'))
                        );
                    }
                    ?>
                </div>
                <div class="col-md-auto">
                    <nav id="main-menu-wrapper" class="navbar navbar-expand-lg"
                         aria-label="<?php echo esc_attr__('Main navigation', 'aryabyte'); ?>">

                        <?php
                        wp_nav_menu([
                            'theme_location' => 'main_menu',
                            'depth' => 2,
                            'container' => 'div',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'main-menu',
                            'menu_class' => 'navbar-nav',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'walker' => class_exists('bootstrap_5_wp_nav_menu_walker') ? new bootstrap_5_wp_nav_menu_walker() : null,
                        ]);
                        ?>
                    </nav>
                </div>

                <div class="col-md-1 me-auto">
                    <div class="search-icon-wrapper">
                        <img data-bs-toggle="modal" data-bs-target="#exampleModal" class="float-end"
                             src="<?php echo esc_url(get_theme_file_uri('assets/img/search-normal.svg')); ?>"
                             alt="<?php echo esc_attr__('Search', 'aryabyte'); ?>"
                             loading="lazy" width="24" height="24">
                    </div>

                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
<main>
