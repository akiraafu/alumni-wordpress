<?php
get_header();
while(have_posts(  )){
the_post(  );?>


</div>
<section class="detail-page">
    <div class="title-area d-flex flex-column">

        <a href="<?php echo get_post_type_archive_link('job');?>" class="button"> <i class="bx bx-arrow-back"></i>
            Job Home
        </a>


        <h1><?php the_title();?></h1>

    </div>
    <div class="job-content content-area container">
        <div class="content-info">
            <div class="box">

                <div class="detail-box ">
                    <div class="job-desc">
                        <h4><?php the_title();?></h4>
                        <p class="fs-4 mb-2"><?php the_field('company_name'); ?></p>
                        <div class="location d-flex align-items-center">
                            <p class="me-3"><i class="bx bxs-map-pin"></i> <?php the_field('job_location');?></p>
                            <p><i class="bx bx-time"></i> <?php the_field('work_type');?></p>
                        </div>
                        <p>Salary (Annual): $<?php the_field('salary'); ?></p>
                        <p>Closing Date: <?php the_field('closing_date'); ?></p>
                    </div>
                    <a href="<?php the_field('apply_now');?>" class="button" target="_blank">Apply Now</a>
                </div>

            </div>
        </div>

        <div class="content-text">
            <p><?php the_content( )?></p>
            <h3>Job description</h3>
            <p>
                <?php the_field('job_description');?>
            </p>
            <h3>Responsibility</h3>
            <p>
                <?php the_field('responsibility');?>
            </p>
            <h3>Qualifications</h3>
            <?php the_field('qualifications');?>
            </p>
        </div>

    </div>
</section>



<?php
}

get_footer();
?>