<?php
get_header();

?>
</div>

<section class="event-page container py-5">
    <div class="heading-area mt-5">
        <p class="tag">Our Events</p>
        <p class="heading">Join us for a great time at our upcoming events.</p>

    </div>
    <div class="events d-flex flex-column align-items-start justify-content-center">
        <?php 
         while(have_posts()){ 
        the_post(  );
        ?>
        <div class="box">
            <div class="event-image">
                <?php 
                $first_image = get_first_image_from_post_content(get_the_content());
                if (!empty($first_image)) {
                 ?>
                <img src="<?php echo $first_image ;?>" class="img-fluid" alt="..." />
                <?php  }  else {?>
                <img src="<?php echo get_theme_file_uri('/images/event.jpg')?>" class="img-fluid" alt="..." />
                <?php } ?>
            </div>
            <div class="detail-box">
                <a href="<?php the_permalink( )?>">
                    <h4><?php the_title( ) ?></h4>
                </a>
                <h6><?php the_field('location');?></h6>
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

            <p class="mt-5">Looking for a recap of past events? <a class="border-bottom" href="
                    <?php echo site_url('/past-events' ) ?>">Check
                    out our past
                    events archive.</a></P>
        </div>

    </div>

</section>

<?php

get_footer();
?>