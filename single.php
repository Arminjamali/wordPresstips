



<?php
wrc_enqueue::toc();
get_header(); ?>

<section class="py-3">
    <div class="container">
        <div class="row align-items-center row-gap-3">

            <div class="col-md-6 order-2 order-md-1">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<span class="post-category text-white fs-14 d-inline-block bg-main rounded-3 px-3">' . esc_html($categories[0]->name) . '</span>';
                }
                ?>

                <header>
                    <h1 class="kalameh fs-20 mt-3"><?php the_title(); ?></h1>
                    <div class="info c-main my-2">
                        نوشته شده توسط
                        <?php
                        $nickname = get_the_author_meta('nickname');
                        echo $nickname;
                        ?>
                        <span>|</span>
                        <?php echo get_the_date('d F Y'); ?>
                    </div>
                </header>

                <div><?php echo get_the_excerpt(); ?></div>

                <div class="d-flex flex-column flex-md-row gap-3 mt-3 align-items-center">
                    <strong>اشتراک گذاری:</strong>
                    <?php
                    $post_url = urlencode(get_permalink());
                    $post_title = urlencode(get_the_title());
                    ?>
                    <ul class="social-icon2 d-flex align-items-center">

                        <!-- Twitter -->
                        <li>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank" rel="noopener">
                                <!-- آیکون توئیتر -->
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.3458 9.85715L17.6099 3.53564H16.3624L11.7905 9.02413L8.14015 3.53564H3.92856L9.45023 11.8359L3.92856 18.4642H5.17611L10.004 12.6682L13.8598 18.4642H18.0714L12.3458 9.85715Z" fill="black"/>
                                </svg>
                            </a>
                        </li>

                        <!-- Telegram -->
                        <li>
                            <a href="https://t.me/share/url?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank" rel="noopener">
                                <!-- آیکون تلگرام -->
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_567)">
                                        <path d="M13.75 9.16699L10.0833 12.8337L15.5833 18.3337L19.25 3.66699L2.75 10.0837L6.41667 11.917L8.25 17.417L11 13.7503" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_567">
                                            <rect width="22" height="22" fill="black"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>

                        <!-- LinkedIn -->
                        <li>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $post_url; ?>" target="_blank" rel="noopener">
                                <!-- آیکون لینکدین -->
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_558)">
                                        <path d="M3.67188 5.50033C3.67188 5.0141 3.86503 4.54778 4.20885 4.20396C4.55266 3.86015 5.01898 3.66699 5.50521 3.66699H16.5052C16.9914 3.66699 17.4578 3.86015 17.8016 4.20396C18.1454 4.54778 18.3385 5.0141 18.3385 5.50033V16.5003C18.3385 16.9866 18.1454 17.4529 17.8016 17.7967C17.4578 18.1405 16.9914 18.3337 16.5052 18.3337H5.50521C5.01898 18.3337 4.55266 18.1405 4.20885 17.7967C3.86503 17.4529 3.67188 16.9866 3.67188 16.5003V5.50033Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.32812 10.083V14.6663" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.32812 7.33301V7.34217" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11 14.6663V10.083" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.6667 14.6663V11.9163C14.6667 11.4301 14.4735 10.9638 14.1297 10.62C13.7859 10.2762 13.3196 10.083 12.8333 10.083C12.3471 10.083 11.8808 10.2762 11.537 10.62C11.1932 10.9638 11 11.4301 11 11.9163" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_558">
                                            <rect width="22" height="22" fill="black"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>

                        <!-- Instagram - تبدیل به "کپی لینک برای استوری" -->
                        <li>
                            <a href="#" onclick="copyPostLink(event)" title="کپی لینک برای استوری">
                                <!-- آیکون اینستاگرام -->
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_551)">
                                        <path d="M3.67188 7.33366C3.67187 6.3612 4.05818 5.42857 4.74582 4.74093C5.43345 4.0533 6.36608 3.66699 7.33854 3.66699H14.6719C15.6443 3.66699 16.577 4.0533 17.2646 4.74093C17.9522 5.42857 18.3385 6.3612 18.3385 7.33366V14.667C18.3385 15.6395 17.9522 16.5721 17.2646 17.2597C16.577 17.9474 15.6443 18.3337 14.6719 18.3337H7.33854C6.36608 18.3337 5.43345 17.9474 4.74582 17.2597C4.05818 16.5721 3.67188 15.6395 3.67188 14.667V7.33366Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.25 11C8.25 11.7293 8.53973 12.4288 9.05546 12.9445C9.57118 13.4603 10.2707 13.75 11 13.75C11.7293 13.75 12.4288 13.4603 12.9445 12.9445C13.4603 12.4288 13.75 11.7293 13.75 11C13.75 10.2707 13.4603 9.57118 12.9445 9.05546C12.4288 8.53973 11.7293 8.25 11 8.25C10.2707 8.25 9.57118 8.53973 9.05546 9.05546C8.53973 9.57118 8.25 10.2707 8.25 11Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.125 6.875V6.88417" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_551">
                                            <rect width="22" height="22" fill="black"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>


                        <!-- WhatsApp -->
                        <li>
                            <a href="https://wa.me/?text=<?php echo $post_title . '%0A' . $post_url; ?>" target="_blank" rel="noopener">
                                <!-- آیکون واتساپ -->
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_545)">
                                        <path d="M2.75 19.2499L4.2625 15.7666C3.10536 14.124 2.58744 12.1155 2.80596 10.1182C3.02447 8.12082 3.96439 6.27187 5.44932 4.9183C6.93424 3.56474 8.8621 2.79961 10.8711 2.7665C12.8801 2.7334 14.8321 3.43459 16.3608 4.7385C17.8896 6.04241 18.8899 7.85939 19.1741 9.84846C19.4583 11.8375 19.0068 13.8619 17.9044 15.5418C16.802 17.2216 15.1245 18.4414 13.1866 18.9723C11.2487 19.5031 9.18374 19.3085 7.37917 18.4249L2.75 19.2499Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.25 9.16699C8.25 9.28855 8.29829 9.40513 8.38424 9.49108C8.4702 9.57704 8.58678 9.62533 8.70833 9.62533C8.82989 9.62533 8.94647 9.57704 9.03242 9.49108C9.11838 9.40513 9.16667 9.28855 9.16667 9.16699V8.25033C9.16667 8.12877 9.11838 8.01219 9.03242 7.92623C8.94647 7.84028 8.82989 7.79199 8.70833 7.79199C8.58678 7.79199 8.4702 7.84028 8.38424 7.92623C8.29829 8.01219 8.25 8.12877 8.25 8.25033V9.16699ZM8.25 9.16699C8.25 10.3826 8.73289 11.5484 9.59243 12.4079C10.452 13.2674 11.6178 13.7503 12.8333 13.7503M12.8333 13.7503H13.75C13.8716 13.7503 13.9881 13.702 14.0741 13.6161C14.16 13.5301 14.2083 13.4135 14.2083 13.292C14.2083 13.1704 14.16 13.0539 14.0741 12.9679C13.9881 12.8819 13.8716 12.8337 13.75 12.8337H12.8333C12.7118 12.8337 12.5952 12.8819 12.5092 12.9679C12.4233 13.0539 12.375 13.1704 12.375 13.292C12.375 13.4135 12.4233 13.5301 12.5092 13.6161C12.5952 13.702 12.7118 13.7503 12.8333 13.7503Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_545">
                                            <rect width="22" height="22" fill="black"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>

            <div class="col-md-6 order-1 order-md-2">
                <?php if (has_post_thumbnail(get_the_ID()))
                    echo get_the_post_thumbnail(get_the_ID(), 'blog-first', array(
                        'class' => 'w-100 single-thumb img-fluid rounded-4',
                        'alt' => get_the_title()
                    ));
                ?>
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-md-9">
                <section class="toc my-3 rounded-3">
                    <div class="toc-acc my-accordion shadow-sm">
                        <div class="my-accordion-header d-flex justify-content-between align-items-center">
                            <h2 class="fs-16 kalameh c-main m-0">آنچه در این مقاله می‌خوانید</h2>
                            <div class="icon-wrapper plus bg-main">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 8H8M8 8H15M8 8V15M8 8V1" stroke="white" stroke-width="2"
                                          stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div class="icon-wrapper minus bg-second">
                                <svg width="16" height="2" viewBox="0 0 16 2" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1H8H15" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="my-accordion-content">
                            <?php wrc_helper::toc('h2,h3', 'c-toc'); ?>
                        </div>
                    </div>
                </section>

                <article class="content c-toc my-4 post-content">
                    <?php the_content(); ?>
                </article>
                <div class="comments">
                    <?php comments_template(); ?>
                </div>

                <?php if (!empty(get_field('faqs')) && get_field('faqs') !== array()): ?>
                    <section class="faqs mb-3">
                        <h2 class="c-text2 fs-24 fsm-16 fw-bold text-center kalameh title-line">سوالات متداول</h2>
                        <p class="text-center c-text fs-16 fsm-14 kalameh">سوالات متداول کاربران</p>
                        <div class="accordion" id="accordionExample">
                            <div class="row row-gap-3 mt-5">
                                <?php
                                $i = 1;
                                foreach (get_field('faqs') as $item): ?>
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button justify-content-between collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse<?php echo $i; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="collapse<?php echo $i; ?>">
                                                    <?php echo esc_html($item['q']); ?>
                                                </button>
                                            </h2>
                                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse"
                                                 data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php echo esc_html($item['a']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++;
                                endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            </div>

            <aside class="col-md-3">
                <?php include('sidebar.php'); ?>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>
