<?php
get_header();

?>
</div>

<section class="event-page container py-5">
    <div class="heading-area">
        <p class="heading">Our Events</p>
        <p class="tag">Join us for a great time at our upcoming event.</p>
    </div>
    <div class="events d-flex flex-column align-items-start justify-content-center">
        <?php
                    $today = date('Ymd');
                    $homepageEvents = new WP_Query(array(
                        'post_type'=> 'event',
                        'meta_key' => 'event_date',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                                'key' => 'event_date',
                                'compare' => '>=',
                                'value' => $today,
                                'type' => 'numeric'
                            )
                        )
                    ));
                    while( $homepageEvents -> have_posts(  )){
                        $homepageEvents-> the_post(  );?>
        <article class="box shadow-sm bg-body-tertiary">
            <div class=" event-image p-2">
                <a href="<?php the_permalink( )?>">
                    <?php 
                $first_image = get_first_image_from_post_content(get_the_content());
                if (!empty($first_image)) {
                 ?>
                    <img src="<?php echo $first_image ;?>" class="img-fluid" alt="...">
                    <?php  }  else {?>
                    <img src="<?php echo get_theme_file_uri('/images/event.jpg')?>" class="img-fluid" alt="...">
                    <?php } ?>
                </a>
            </div>
            <div class="detail-box p-3">
                <a href="<?php the_permalink( )?>">
                    <h4><?php the_title( ) ?></h4>
                </a>
                <h6><?php the_field('location');?></h6>
            </div>
            <div class="date-box p-2">
                <a href="<?php the_permalink( )?>">
                    <h3>
                        <span> <?php $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate -> format('d');
                    ?> </span>
                        <?php $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate -> format('M');?>
                    </h3>
                </a>

            </div>
        </article>



        <?php
            } ?>
        <p class="mt-5">Looking for a recap of past events? <a class="border-bottom" href="
                    <?php echo site_url('/past-events' ) ?>">Check
                out our past
                events archive.</a></P>

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