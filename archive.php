<?php get_header(); ?>

<section class="blog py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row row-gap-4">
                    <?php
                    if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-md-6">

                                <a href="<?php the_permalink(); ?>">
                                    <div class="first-wrapper position-relative h-100 shadow-sm rounded-4">
                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'blog-first', false, array('class' => 'w-100 img-fluid rounded-top-4 ')); ?>
                                        <div class=" px-4 py-3 d-inline-block rounded-bottom-4">
                                                  <span class="post-time">
                                                                        <?php echo get_the_date('d F Y'); ?>

                                            </span>
                                            <h2 class="fs-14 my-2 line-1 fw-bold"><?php the_title() ?></h2>

                                            <div class="fs-14 line-2"><?php echo get_the_excerpt(); ?></div>

                                            <svg class="float-start" width="33" height="33" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7071 4.29289C16.0976 4.68342 16.0976 5.31658 15.7071 5.70711L9.41421 12L15.7071 18.2929C16.0976 18.6834 16.0976 19.3166 15.7071 19.7071C15.3166 20.0976 14.6834 20.0976 14.2929 19.7071L7.29289 12.7071C7.10536 12.5196 7 12.2652 7 12C7 11.7348 7.10536 11.4804 7.29289 11.2929L14.2929 4.29289C14.6834 3.90237 15.3166 3.90237 15.7071 4.29289Z" fill="var(--second)"/>
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

