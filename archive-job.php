<?php
get_header();

?>
</div>

<section class="jobs-page container py-5">
    <div class="heading-area">
        <h1 class="heading">Career Opportunities</h1>
        <p class="tag">Open the door to your dream career path today.</p>
    </div>

    <div class="jobs d-flex flex-column align-items-start justify-content-center">
        <?php dynamic_sidebar('my_new_widget_area'); 

         while( have_posts()){ 
       the_post(  );
        ?>
        <article class="box shadow-sm bg-body-tertiary">
            <div class="job-image">
                <?php if( get_field('company_logo') ){ ?>
                <img src="<?php the_field('company_logo'); ?>" class="img-fluid" alt="">

                <?php } elseif( get_field('company_name') ) {?>
                <p><?php the_field('company_name'); ?></p>
                <?php } else {?>
                <img src="<?php echo get_theme_file_uri('/images/No_Image_Available.jpg')?>" class="img-fluid"
                    alt="...">
                <?php } ?>
            </div>
            <div class="detail-box p-3">
                <div class="job-desc">
                    <a href="<?php the_permalink( )?>">
                        <h2 class="fs-4 fw-bold text-center"><?php the_title();?></h2>
                    </a>
                    <div class="location d-flex align-items-center justify-content-center">
                        <p><i class="bx bxs-map-pin"></i> <?php the_field('job_location');?></p>
                        <p><i class="bx bx-time"></i> <?php the_field('work_type');?></p>
                    </div>
                </div>
            </div>
            <div class="date-box">
                <a href="<?php the_permalink( )?>" class="button">Apply Now</a>
                <p><em>Closing Date <p><?php the_field('closing_date'); ?></p></em></p>
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