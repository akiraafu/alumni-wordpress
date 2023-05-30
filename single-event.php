<?php
get_header();
while(have_posts(  )){
the_post(  );?>


</div>
<section class="detail-page">
    <div class="title-area d-flex justify-content-center flex-column">

        <a href="<?php echo get_post_type_archive_link('event');?>" class="button"> <i class="bx bx-arrow-back"></i>
            Event Home
        </a>


        <h1><?php the_title();?></h1>

    </div>
    <div class="content-area container p-5 blog-content">
        <div class="content-info">

            <p class="text-body-secondary"> <i class="bx bxs-calendar"></i> Event Date:<?php 
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate -> format('d M Y');
                                    ?></p>
            <p class="text-body-secondary"> <i class='bx bx-location-plus'></i> Location:
                <?php the_field('event_location');?>
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