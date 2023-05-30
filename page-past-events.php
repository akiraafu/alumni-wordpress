<?php
get_header();

?>
</div>

<section class="event-page container py-5">
    <div class="heading-area mt-5">
        <h1 class="heading">Past Events</h1>
        <p class="tag">A recap of our past events.</p>

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
                    <h2 class="fs-4 event-title"><?php the_title( ) ?></h2>
                </a>
                <h6><?php the_field('event_location');?></h6>
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
        <p class="mt-5">Don't wanna miss out? <a class="border-bottom" href="
                    <?php echo site_url('/events' ) ?>">Check
                out our upcoming
                events archive.</a></P>
        <div class="paginate">
            <?php

    echo paginate_links( array(
        'total' => $pastEvents -> max_num_pages,
    ) );
    ?>



        </div>



</section>

<?php

get_footer();
?>