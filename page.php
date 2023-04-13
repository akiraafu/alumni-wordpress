<?php
get_header();
while(have_posts(  )){
the_post(  );?>


</div>
<section class="detail-page">
    <div class="title-area d-flex flex-column">
        <?php
        $theParent = wp_get_post_parent_id( get_the_ID() );
        if($theParent){?>
        <a href="<?php echo get_permalink( $theParent)?>" class="button"> <i class="bx bx-arrow-back"></i> Back to
            <?php echo get_the_title($theParent )?> </a>
        <?php
        }
        ?>

        <h1><?php the_title();?></h1>

    </div>
    <div class="content-area container p-5 blog-content">
        <div class="content-info">
            <p><i class="bx bxs-user"></i> author</p>
            <p><i class="bx bxs-calendar"></i> 20 May 2023</p>
            <p class="blog-tags">
                <i class="bx bx-purchase-tag-alt"></i> News, Event
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