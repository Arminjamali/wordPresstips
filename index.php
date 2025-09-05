<?php
get_header();

if (have_rows('builder')) :
    while (have_rows('builder')) : the_row();
        get_template_part('page-builder/content', get_row_layout());
    endwhile;
else:
    get_template_part('page-builder/content-page');
endif;

get_footer();
?>

