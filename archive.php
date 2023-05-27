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

        <article class="blog-box card shadow-sm bg-body-tertiary mb-4 p-3">
            <div class="row g-0">

                <div class="col-md-4">
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ); 
                
                if($feat_image) {?>
                        <img src="<?php echo $feat_image; ?>" class="img-fluid rounded-start h-100 object-fit-cover"
                            alt="..." />
                        <?php  }  else {
                    $first_image = get_first_image_from_post_content(get_the_content());
                    if (!empty($first_image)) {
                 ?>
                        <img src="<?php echo $first_image ;?>" class="img-fluid rounded-start h-100 object-fit-cover"
                            alt="..." />

                        <?php } 
                    if (!$first_image){?>
                        <img src="<?php echo get_theme_file_uri('/images/No_Image_Available.jpg')?>"
                            class="img-fluid rounded-start object-fit-cover" alt="..." />
                        <?php }} ?>
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body position-relative">
                        <a href="<?php the_permalink(); ?>">
                            <h5 class="card-title fs-3 fw-bold">
                                <?php the_title( )?>
                            </h5>
                        </a>
                        <p class="card-text text-body-secondary">
                            <small class=""><?php the_time('d M Y')?></small>
                            &#x2022;
                            <small class="text-body-secondary"><?php the_author_posts_link(  );?></small>
                            &#x2022;
                            <small> <?php echo get_the_category_list(' , ')?></small>
                        </p>
                        <a href="<?php the_permalink(); ?>">
                            <p class="card-text" style="text-align: justify">
                                <?php
                                if(has_excerpt(  )){
                                
                                    echo wp_trim_words(get_the_excerpt(  ),35);
                                }else{
                                    echo wp_trim_words( get_the_content( ),35);
                                }
                                ?>
                            </p>
                        </a>
                        <p class="read-more text-end">

                            <a href="<?php the_permalink(); ?>" class="text-decoration-underline">
                                Read More
                            </a>

                        </p>
                        <p class="card-text mb-4">

                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </p>
                        <div class="post-tagbox">
                            <?php echo get_the_tag_list(' ')?>
                        </div>
                    </div>
                </div>
            </div>
        </article>


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