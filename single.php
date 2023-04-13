<?php
get_header();
while(have_posts(  )){
the_post(  );?>


</div>
<section class="detail-page">
    <div class="title-area d-flex flex-column">

        <a href="<?php echo site_url( '/blog' )?>" class="button"> <i class="bx bx-arrow-back"></i> Blog Home
        </a>


        <h1><?php the_title();?></h1>

    </div>
    <div class="content-area container p-5 blog-content">
        <div class="content-info">
            <p><i class="bx bxs-user"></i> <?php the_author_posts_link(  );?></p>
            <p><i class="bx bxs-calendar"></i> <?php the_time('d M Y')?></p>
            <p class="blog-tags">
                <i class="bx bx-purchase-tag-alt"></i> <?php echo get_the_category_list(' , ')?>
            </p>
        </div>
        <div class="content-text">
            <?php the_content( );?>
        </div>
    </div>
</section>



<?php
}

get_footer();
?>