<?php
// لود ترجمه‌های تم
add_action('after_setup_theme', function () {
    load_theme_textdomain('aryabyte', get_template_directory() . '/languages');
});

// ثبت پست‌تایپ Product با text domain: aryabyte
function aryabyte_register_product_cpt() {
    $labels = array(
        'name'                  => _x( 'محصولات', 'Post Type General Name', 'aryabyte' ),
        'singular_name'         => _x( 'محصول', 'Post Type Singular Name', 'aryabyte' ),
        'menu_name'             => __( 'محصولات', 'aryabyte' ),
        'name_admin_bar'        => __( 'محصول', 'aryabyte' ),
        'add_new'               => __( 'افزودن محصول جدید', 'aryabyte' ),
        'add_new_item'          => __( 'افزودن محصول جدید', 'aryabyte' ),
        'edit_item'             => __( 'ویرایش محصول', 'aryabyte' ),
        'new_item'              => __( 'محصول جدید', 'aryabyte' ),
        'view_item'             => __( 'مشاهده محصول', 'aryabyte' ),
        'search_items'          => __( 'جستجوی محصولات', 'aryabyte' ),
        'not_found'             => __( 'هیچ محصولی یافت نشد', 'aryabyte' ),
        'not_found_in_trash'    => __( 'هیچ محصولی در زباله‌دان یافت نشد', 'aryabyte' ),
        'all_items'             => __( 'همه محصولات', 'aryabyte' ),
    );

    $args = array(
        'label'                 => __( 'محصول', 'aryabyte' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-cart',
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'product' ), // اسلاگ ثابت
        'show_in_rest'          => true, // گوتنبرگ/REST
    );

    register_post_type( 'product', $args );
}
add_action( 'init', 'aryabyte_register_product_cpt' );


// ثبت پست تایپ پروژه
function aryabyte_register_project_cpt()
{
    $labels = array(
        'name' => _x('پروژه‌ها', 'Post Type General Name', 'aryabyte'),
        'singular_name' => _x('پروژه', 'Post Type Singular Name', 'aryabyte'),
        'menu_name' => __('پروژه‌ها', 'aryabyte'),
        'name_admin_bar' => __('پروژه', 'aryabyte'),
        'add_new' => __('افزودن پروژه جدید', 'aryabyte'),
        'add_new_item' => __('افزودن پروژه جدید', 'aryabyte'),
        'edit_item' => __('ویرایش پروژه', 'aryabyte'),
        'new_item' => __('پروژه جدید', 'aryabyte'),
        'view_item' => __('مشاهده پروژه', 'aryabyte'),
        'search_items' => __('جستجوی پروژه‌ها', 'aryabyte'),
        'not_found' => __('هیچ پروژه‌ای یافت نشد', 'aryabyte'),
        'not_found_in_trash' => __('هیچ پروژه‌ای در زباله‌دان یافت نشد', 'aryabyte'),
        'all_items' => __('همه پروژه‌ها', 'aryabyte'),
    );

    $args = array(
        'label' => __('پروژه', 'aryabyte'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio', // آیکون مناسب برای پروژه‌ها
        'has_archive' => true,
        'rewrite' => array('slug' => 'project'), // اسلاگ ثابت
        'show_in_rest' => true, // فعال‌سازی برای گوتنبرگ
    );

    register_post_type('project', $args);
}

add_action('init', 'aryabyte_register_project_cpt');

// تاکسونومی دسته‌بندی برای محصولات: product_category
function aryabyte_register_product_category_tax()
{
    $labels = array(
        'name' => _x('دسته‌های محصول', 'taxonomy general name', 'aryabyte'),
        'singular_name' => _x('دستهٔ محصول', 'taxonomy singular name', 'aryabyte'),
        'search_items' => __('جستجوی دسته‌ها', 'aryabyte'),
        'all_items' => __('همه دسته‌ها', 'aryabyte'),
        'parent_item' => __('دستهٔ مادر', 'aryabyte'),
        'parent_item_colon' => __('دستهٔ مادر:', 'aryabyte'),
        'edit_item' => __('ویرایش دسته', 'aryabyte'),
        'update_item' => __('به‌روزرسانی دسته', 'aryabyte'),
        'add_new_item' => __('افزودن دستهٔ جدید', 'aryabyte'),
        'new_item_name' => __('نام دستهٔ جدید', 'aryabyte'),
        'menu_name' => __('دسته‌های محصول', 'aryabyte'),
    );

    register_taxonomy('product_category', array('product'), array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,                 // مثل category
        'show_ui' => true,
        'show_admin_column' => true,                 // ستون در لیست محصولات
        'show_in_rest' => true,                 // گوتنبرگ / REST
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'product-category',   // اسلاگ قابل ترجمه از طریق پلاگین‌های چندزبانه
            'with_front' => false,
            'hierarchical' => true
        ),
    ));
}

// با اولویت 11 تا بعد از ثبت CPT اجرا شود
add_action('init', 'aryabyte_register_product_category_tax', 11);

add_action('init', function () {
    register_taxonomy_for_object_type('category', 'blog');
    register_taxonomy_for_object_type('post_tag', 'blog');
}, 11);




// ثبت پنج جایگاه منو
function aryabyte_register_menus()
{
    register_nav_menus(array(
        'main_menu' => __('منو اصلی', 'aryabyte'),
        'mobile_menu' => __('منو موبایل', 'aryabyte'),
        'first_menu' => __('منو اول', 'aryabyte'),
        'second_menu' => __('منو دوم', 'aryabyte'),
        'third_menu' => __('منو سوم', 'aryabyte'),
        'footer_menu' => __('فوتر', 'aryabyte'),
    ));
}

add_action('after_setup_theme', 'aryabyte_register_menus');

// فعال‌سازی پشتیبانی از لوگو سفارشی
function aryabyte_custom_logo_setup()
{
    add_theme_support('title-tag');

    add_theme_support('custom-logo', array(
        'height' => 64,   // ارتفاع لوگو
        'width' => 64,   // عرض لوگو
        'flex-height' => true,  // اجازه تغییر ارتفاع
        'flex-width' => true,  // اجازه تغییر عرض
    ));
}

add_action('after_setup_theme', 'aryabyte_custom_logo_setup');





add_action('wp_enqueue_scripts', 'aryabyte_enqueue_theme_assets');
function aryabyte_enqueue_theme_assets() {
    $uri  = get_template_directory_uri();
    $path = get_template_directory();

    // --- اول jQuery از پوشه تم ---
    $jq_ver = file_exists("$path/assets/js/jquery-3.7.1.min.js") ? filemtime("$path/assets/js/jquery-3.7.1.min.js") : '3.7.1';
    wp_deregister_script('jquery'); // غیرفعال کردن jQuery داخلی وردپرس
    wp_register_script(
        'jquery', // هندل همون jquery بمونه که افزونه‌ها قاطی نکنن
        $uri . '/assets/js/jquery-3.7.1.min.js',
        [],
        $jq_ver,
        true
    );
    wp_enqueue_script('jquery');

    // --- Bootstrap CSS ---
    $css_ver = file_exists("$path/assets/css/bootstrap.min.css") ? filemtime("$path/assets/css/bootstrap.min.css") : '1.0.0';
    wp_enqueue_style(
        'aryabyte-bootstrap',
        $uri . '/assets/css/bootstrap.min.css',
        [],
        $css_ver,
        'all'
    );
    $swiper_css_ver = file_exists("$path/assets/css/swiper-bundle.min.css") ? filemtime("$path/assets/css/swiper-bundle.min.css") : '1.0.0';
    wp_enqueue_style(
        'aryabyte-siwper',
        $uri . '/assets/css/swiper-bundle.min.css',
        [],
        $swiper_css_ver,
        'all'
    );
    // --- Bootstrap JS (وابسته به jQuery) ---
    $bs_ver = file_exists("$path/assets/js/bootstrap.bundle.min.js") ? filemtime("$path/assets/js/bootstrap.bundle.min.js") : '1.0.0';
    wp_enqueue_script(
        'aryabyte-bootstrap',
        $uri . '/assets/js/bootstrap.bundle.min.js',
        ['jquery'], // چون بالا jquery رجیستر کردیم
        $bs_ver,
        true
    );

    // --- فایل‌های اختصاصی قالب ---
    $app_css_ver = file_exists("$path/assets/css/style.css") ? filemtime("$path/assets/css/style.css") : '1.0.0';
    wp_enqueue_style(
        'aryabyte-style',
        $uri . '/assets/css/style.css',
        ['aryabyte-bootstrap'],
        $app_css_ver,
        'all'
    );


    $swiper_js_ver = file_exists("$path/assets/js/swiper-bundle.min.js") ? filemtime("$path/assets/js/swiper-bundle.min.js") : '1.0.0';
    wp_enqueue_script(
        'aryabyte-swiper',
        $uri . '/assets/js/swiper-bundle.min.js',
        [],
        $swiper_js_ver,
        true
    );
    $app_js_ver = file_exists("$path/assets/js/app.js") ? filemtime("$path/assets/js/app.js") : '1.0.0';
    wp_enqueue_script(
        'aryabyte-script',
        $uri . '/assets/js/app.js',
        ['jquery', 'aryabyte-bootstrap'],
        $app_js_ver,
        true
    );
}

require_once get_template_directory() . '/inc/bootstrap-5-wordpress-navbar-walker.php';


// فعال‌سازی ویرایشگر کلاسیک
add_filter('use_block_editor_for_post', '__return_false', 10);

// فعال‌سازی ابزارک‌های کلاسیک
add_filter('use_widgets_block_editor', '__return_false');


// فعال‌سازی پشتیبانی تصویر شاخص در قالب
function aryabyte_enable_featured_images()
{
    // روش ۱: فعال برای همه‌ی پست‌تایپ‌هایی که thumbnail را در supports دارند
    add_theme_support('post-thumbnails');
    add_image_size('blog', 690, 350, true);
    add_image_size('product', 519, 473, true);
    add_image_size('project', 407, 314, true);
    add_image_size('gallery', 302, 247, true);


    // روش ۲ (اختیاری): محدودکردن/اعلام صریح پست‌تایپ‌ها
    // add_theme_support('post-thumbnails', array('post','page','service','blog','agency'));
}

add_action('after_setup_theme', 'aryabyte_enable_featured_images');


// 1) مجازکردن MIME نوع SVG (محدود به مدیر و ادیتور)
function aryabyte_allow_svg_mime( $mimes ) {
    // فقط مدیرها و ادیتورها بتوانند SVG آپلود کنند
    if ( current_user_can('manage_options') || current_user_can('edit_others_posts') ) {
        $mimes['svg']  = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter('upload_mimes', 'aryabyte_allow_svg_mime');

// 2) اطمینان از تشخیص صحیح پسوند/نوع فایل توسط وردپرس
function aryabyte_fix_svg_filetype( $data, $file, $filename, $mimes, $real_mime = '' ) {
    $filetype = wp_check_filetype( $filename, $mimes );

    // اگر svg یا svgz بود، خروجی را اصلاح کن
    if ( in_array( $filetype['ext'], array('svg','svgz'), true ) ) {
        $data['ext']  = $filetype['ext'];
        $data['type'] = 'image/svg+xml';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'aryabyte_fix_svg_filetype', 10, 5);

// 3) بهبود نمایش SVG در رسانه‌ها و انتخاب تصویر شاخص
function aryabyte_admin_svg_thumb_fix() {
    echo '<style>
        .attachment .thumbnail img[src$=".svg"],
        img[src$=".svg"].attachment-post-thumbnail { width: 100% !important; height: auto !important; }
    </style>';
}
add_action('admin_head', 'aryabyte_admin_svg_thumb_fix');

function aryabyte_prepare_svg_for_js( $response, $attachment, $meta ) {
    if ( isset($response['mime']) && $response['mime'] === 'image/svg+xml' ) {
        // جلوگیری از خطای ابعاد در مدیا
        $response['sizes'] = $response['sizes'] ?? array();
        $response['icon']  = true;
    }
    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'aryabyte_prepare_svg_for_js', 10, 3);

// 4) Sanitization ساده هنگام آپلود (حذف <script> و رویدادهای on*)
function aryabyte_sanitize_svg_prefilter( $file ) {
    if ( isset($file['type']) && $file['type'] === 'image/svg+xml' && is_readable($file['tmp_name']) ) {
        $svg = file_get_contents($file['tmp_name']);

        // حذف هر اسکریپت
        $svg = preg_replace('/<script\b[^>]*>.*?<\/script>/is', '', $svg);

        // حذف خصیصه‌های خطرناک on*
        $svg = preg_replace('/\son[a-z]+\s*=\s*"[^"]*"/i', '', $svg);
        $svg = preg_replace("/\son[a-z]+\s*=\s*'[^']*'/i", '', $svg);

        // می‌توانید لیست سفید تگ/اتریبوت هم اعمال کنید (برای سادگی در اینجا حذف نشده)

        file_put_contents($file['tmp_name'], $svg);
    }
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'aryabyte_sanitize_svg_prefilter');



