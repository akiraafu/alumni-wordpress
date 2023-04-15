<?php
get_header();

?>
</div>

<section class="jobs-page container py-5">
    <div class="heading-area mt-5">
        <p class="tag">Career Opportunity</p>
        <p class="heading">Open the door to your dream career path today.</p>

    </div>
    <div class="jobs d-flex flex-column align-items-start justify-content-center">
        <form class="filter">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Keywords(e.g. job, city, role...)" />
                <input type="text" class="form-control" placeholder="Location" />
                <select class="form-select" aria-label="Default select example">
                    <option selected>Not Specified</option>
                    <option value="1">
                        < $45,000</option>
                    <option value="2">$45,000 - $75,000</option>
                    <option value="3">$75,000 - $95,000</option>
                    <option value="4">> $95,000</option>
                </select>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Not Specified</option>
                    <option value="1">Full-Time</option>
                    <option value="2">Part-Time</option>
                    <option value="3">Contract</option>
                    <option value="4">Intern</option>
                </select>
                <a href="" type="button" class="button">Search</a>
            </div>
        </form>

        <?php 
         while(have_posts()){ 
        the_post(  );
        ?>
        <div class="box">
            <div class="job-image">
                <?php if( get_field('company_logo') ){ ?>
                <img src="<?php the_field('company_logo'); ?>" class="img-fluid" alt="" />

                <?php } elseif( get_field('company_name') ) {?>
                <p><?php the_field('company_name'); ?></p>
                <?php } else {?>
                <img src="<?php echo get_theme_file_uri('/images/No_Image_Available.jpg')?>" class="img-fluid"
                    alt="..." />
                <?php } ?>
            </div>
            <div class="detail-box">
                <div class="job-desc">
                    <a href="<?php the_permalink( )?>">
                        <h4><?php the_title();?></h4>
                    </a>
                    <div class="location d-flex align-items-center justify-content-center">
                        <p><i class="bx bxs-map-pin"></i> <?php the_field('location');?></p>
                        <p><i class="bx bx-time"></i> <?php the_field('work_type');?></p>
                    </div>
                </div>
            </div>
            <div class="date-box">
                <a href="<?php the_permalink( )?>" class="button">Apply Now</a>
                <p><em> Posted <?php echo time_ago(); ?></em></p>
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