<?php
get_header();

?>
</div>

<section class="event-page container py-5">
    <div class="heading-area mt-5">
        <p class="tag">Past Events</p>
        <p class="heading">A recap of our past events.</p>

    </div>
    <div class="events d-flex flex-column align-items-start justify-content-center">
        <?php 
       $today = date('Ymd');
       $pastEvents = new WP_Query(array(
            'paged'=> get_query_var( 'paged',1),
           'post_type'=> 'event',
           'meta_key' => 'event_date',
           'orderby' => 'meta_value_num',
           'order' => 'ASC',
           'meta_query' => array(
               array(
                   'key' => 'event_date',
                   'compare' => '<',
                   'value' => $today,
                   'type' => 'numeric'
               )
           )
       ));
    while( $pastEvents->have_posts()){ 
        $pastEvents -> the_post(  );
        ?>
        <div class="box">
            <div class="event-image">
                <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ); 
                if($feat_image) {?>
                <img src="<?php echo $feat_image; ?>" class="img-fluid" alt="..." />
                <?php } else {?>
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

    echo paginate_links( array(
        'total' => $pastEvents -> max_num_pages,
    ) );
    ?>


            <p class="mt-5">Don't wanna miss out? <a class="border-bottom" href="
                    <?php echo site_url('/events' ) ?>">Check
                    out our upcoming
                    events archive.</a></P>
        </div>



</section>

<?php

get_footer();
?>