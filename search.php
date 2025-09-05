<?php get_header(); ?>

<section class="blog py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php
                    if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-md-6 mb-4">

                                <a href="<?php the_permalink(); ?>">
                                    <div class="first-wrapper position-relative h-100">
                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'blog-first', false, array('class' => 'w-100 img-fluid')); ?>
                                        <div class="title-bar px-5 py-4 d-inline-block">
                                            <h2 class="text-center fw-bold fs-16 c-main"><?php the_title() ?></h2>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                            <svg class="float-start" width="38" height="38" viewBox="0 0 38 38"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_37_359)">
                                                    <path d="M1.23991 18.5986L0.619956 17.9787C0.455534 18.1431 0.363163 18.3661 0.363163 18.5986C0.363163 18.8312 0.455534 19.0542 0.619956 19.2186L1.23991 18.5986ZM6.19955 23.5583L5.57959 24.1782C5.70215 24.3012 5.85847 24.3851 6.02873 24.4191C6.19899 24.4532 6.37553 24.4359 6.53596 24.3695C6.69639 24.3031 6.8335 24.1905 6.92989 24.0461C7.02628 23.9017 7.07762 23.7319 7.0774 23.5583L6.19955 23.5583ZM6.19955 13.639L7.0774 13.639C7.07762 13.4654 7.02628 13.2956 6.92989 13.1512C6.8335 13.0067 6.69639 12.8942 6.53596 12.8278C6.37553 12.7614 6.19899 12.7441 6.02873 12.7782C5.85847 12.8122 5.70215 12.896 5.57959 13.019L6.19955 13.639ZM6.19955 19.4765L35.9574 19.4765V17.7208L6.19955 17.7208V19.4765ZM0.619956 19.2186L5.57959 24.1782L6.8195 22.9383L1.85987 17.9787L0.619956 19.2186ZM7.0774 23.5583V13.639L5.32169 13.639V23.5583L7.0774 23.5583ZM5.57959 13.019L0.619956 17.9787L1.85987 19.2186L6.8195 14.259L5.57959 13.019Z"
                                                          fill="#FFC367"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_37_359">
                                                        <rect width="26.3024" height="26.3024" fill="white"
                                                              transform="translate(0 18.5986) rotate(-45)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>


                                        </div>
                                    </div>

                                </a>
                            </div>


                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="pagination-wrapper">
                        <?php the_posts_pagination(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <?php include('sidebar.php'); ?>

            </div>
        </div>

    </div>
</section>


<?php get_footer(); ?>

