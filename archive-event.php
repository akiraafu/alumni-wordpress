<?php
get_header();

?>
</div>

<section class="event-page container py-5">
    <div class="heading-area mt-5">
        <p class="tag">Our Events</p>
        <p class="heading">Join us for a great time at our upcoming event.</p>

    </div>
    <div class="events d-flex flex-column align-items-start justify-content-center">
        <?php 
    while(have_posts()){ 
        the_post(  );
        ?>
        <div class="box">
            <div class="event-image">
                <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ); 
                if($feat_image) {?>
                <img src="<?php echo $feat_image; ?>" class="img-fluid" alt="..." />
                <?php } ?>
            </div>
            <div class="detail-box">
                <a href="<?php the_permalink( )?>">
                    <h4><?php the_title( ) ?></h4>
                </a>
                <h6>3:00 PM - 5:00 PM North Metropolitan TAFE</h6>
            </div>
            <div class="date-box">
                <h3>
                    <span> <?php $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate -> format('d');
                    ?> </span>
                    <?php $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate -> format('M');?>
                </h3>
            </div>
        </div>
        <?php
    } ?>
        <div class="paginate">
            <?php

    echo paginate_links(  );
    ?>
        </div>



</section>

<?php

get_footer();
?>