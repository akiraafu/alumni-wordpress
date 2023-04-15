<?php
get_header();

?>
</div>

<section class="blog-page container py-5">
    <div class="heading-area mt-5">
        <p class="heading"><?php the_archive_title( )?></p>
        <p class="tag"><?php the_archive_description( )?></p>

    </div>

    <div class="blogs d-flex flex-column align-items-start justify-content-center">

        <?php 
    while(have_posts()){ 
        the_post(  );
        ?>
        <div class="blog-box">
            <div class="blog-image">

                <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ); 
                if($feat_image) {?>
                <img src="<?php echo $feat_image; ?>" class="img-fluid" alt="..." />
                <?php } ?>

            </div>
            <div class="blog-details">
                <div class="blog-info">
                    <p><?php the_time('d M Y')?></p>
                    <p>
                        <strong><?php the_author_posts_link(  );?></strong>
                    </p>
                </div>
                <div class="blog-textbox">
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="blog-title">
                            <?php the_title( )?>
                        </h3>
                    </a>
                    <p class="blog-excerpt">
                        <?php
                    if(has_excerpt(  )){
                       
                        echo wp_trim_words(get_the_excerpt(  ),20);
                    }else{
                        echo wp_trim_words( get_the_content( ),20);
                    }
                     ?>
                    </p>
                    <p class="blog-tags">
                        <i class="bx bx-purchase-tag-alt"></i> <?php echo get_the_category_list(' , ')?>
                    </p>
                </div>
            </div>
        </div>

        <?php
         } ?>
        <div class="paginate">
            <?php

        echo paginate_links(  );
        ?>
        </div>
    </div>
</section>

<?php

get_footer();
?>