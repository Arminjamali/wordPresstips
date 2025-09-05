<div class="side-section">
    <h4 class="fw-bold">جست و جو</h4>

    <form role="search" method="get" id="searchform" action="/">
        <button type="submit" class="Btn-primary-iconless searchButtonBlog">
            <svg width="30" height="30" viewBox="0 0 44 44" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M28.4164 25.6667H26.968L26.4547 25.1717C27.6005 23.8406 28.4378 22.2728 28.9069 20.5803C29.376 18.8878 29.4651 17.1126 29.168 15.3817C28.3064 10.285 24.053 6.21501 18.9197 5.59168C17.115 5.36337 15.282 5.55093 13.5609 6.14001C11.8399 6.72909 10.2764 7.70408 8.99007 8.99037C7.70378 10.2767 6.72879 11.8402 6.13971 13.5612C5.55062 15.2823 5.36306 17.1153 5.59138 18.92C6.21471 24.0533 10.2847 28.3067 15.3814 29.1683C17.1123 29.4654 18.8875 29.3763 20.58 28.9072C22.2725 28.4381 23.8403 27.6008 25.1714 26.455L25.6664 26.9683V28.4167L33.458 36.2083C34.2097 36.96 35.438 36.96 36.1897 36.2083C36.9414 35.4567 36.9414 34.2283 36.1897 33.4767L28.4164 25.6667ZM17.4164 25.6667C12.8514 25.6667 9.16638 21.9817 9.16638 17.4167C9.16638 12.8517 12.8514 9.16668 17.4164 9.16668C21.9814 9.16668 25.6664 12.8517 25.6664 17.4167C25.6664 21.9817 21.9814 25.6667 17.4164 25.6667Z"
                      fill="var(--second)"/>
            </svg>
        </button>
        <input name="s" class="form-control" type="search" placeholder="جستجو کنید..." id="gsearch">
        <input name="post_type" class="form-control" type="hidden" value="blog">

    </form>
</div>
<div class="my-5 side-section shadow-sm px-2 py-3 rounded-4">
    <h4 class="fw-bold">پست‌های اخیر</h4>

    <ul>

        <?php $the_query2 = new WP_Query(array('post_type' => 'blog', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'dcs')); ?>
        <?php if ($the_query2->have_posts()) : ?>
            <?php while ($the_query2->have_posts()) : $the_query2->the_post(); ?>

                <li class="mt-3">
                    <a class="items d-flex align-items-center " href="<?php the_permalink(); ?>">
                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'thumbnail', false, array('class' => 'img-fluid')); ?>
                        <div class="content d-inline-block px-3" style="width: 70%">
                            <h6 class=" pt-2"><?php the_title(); ?></h6>
                            <svg class="float-start" width="33" height="33" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7071 4.29289C16.0976 4.68342 16.0976 5.31658 15.7071 5.70711L9.41421 12L15.7071 18.2929C16.0976 18.6834 16.0976 19.3166 15.7071 19.7071C15.3166 20.0976 14.6834 20.0976 14.2929 19.7071L7.29289 12.7071C7.10536 12.5196 7 12.2652 7 12C7 11.7348 7.10536 11.4804 7.29289 11.2929L14.2929 4.29289C14.6834 3.90237 15.3166 3.90237 15.7071 4.29289Z" fill="var(--second)"/>
                            </svg>                        </div>

                    </a>
                </li>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e('مقاله ای برای نمایش یافت نشد'); ?></p>
        <?php endif; ?>
    </ul>
</div>

<div class="side-section shadow-sm px-2 py-3 rounded-4">
    <h4 class="fw-bold">لیست دسته‌بندی‌ها</h4>

    <?php $items = get_categories(); ?>
    <ul class="list-cat">
        <?php foreach ($items as $item):
            $active_class = is_category($item->term_id) ? 'active' : '';
            ?>

            <li class="my-3 d-block">
                <svg width="12" height="24" viewBox="0 0 12 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.84306 12.711L7.50006 18.368L8.91406 16.954L3.96406 12.004L8.91406 7.05401L7.50006 5.64001L1.84306 11.297C1.65559 11.4845 1.55028 11.7389 1.55028 12.004C1.55028 12.2692 1.65559 12.5235 1.84306 12.711Z" fill="#505050"/>
                </svg>


                <a title="<?php echo $item->name; ?>"
                   href="<?php echo esc_url(get_category_link($item->term_id)); ?>" class="fs-12 text-black">
                    <?php echo $item->name; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php echo wp_get_attachment_image(get_field('side_banner','option'), 'full', false, array('class' => 'mt-5 w-100 img-fluid rounded-4')); ?>

<div class="my-5 side-section shadow-sm px-2 py-3 rounded-4">
    <h4 class="fw-bold">محصولات اخیر</h4>

    <ul>

        <?php $the_query2 = new WP_Query(array('post_type' => 'product', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'dcs')); ?>
        <?php if ($the_query2->have_posts()) : ?>
            <?php while ($the_query2->have_posts()) : $the_query2->the_post(); ?>

                <li class="mt-3">
                    <a class="items d-flex align-items-center " href="<?php the_permalink(); ?>">
                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'thumbnail', false, array('class' => 'img-fluid')); ?>
                        <div class="content d-inline-block px-3" style="width: 70%">
                            <h6 class=" pt-2"><?php the_title(); ?></h6>
                            <svg class="float-start" width="33" height="33" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7071 4.29289C16.0976 4.68342 16.0976 5.31658 15.7071 5.70711L9.41421 12L15.7071 18.2929C16.0976 18.6834 16.0976 19.3166 15.7071 19.7071C15.3166 20.0976 14.6834 20.0976 14.2929 19.7071L7.29289 12.7071C7.10536 12.5196 7 12.2652 7 12C7 11.7348 7.10536 11.4804 7.29289 11.2929L14.2929 4.29289C14.6834 3.90237 15.3166 3.90237 15.7071 4.29289Z" fill="var(--second)"/>
                            </svg>                        </div>

                    </a>
                </li>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e('محصولی ای برای نمایش یافت نشد'); ?></p>
        <?php endif; ?>
    </ul>
</div>