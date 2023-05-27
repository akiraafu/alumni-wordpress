<?php
get_header();

?>

<div class="slides">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="detail-box">
                        <div>
                            <h1>&lt;Reconnect/&gt;</h1>
                            <h2>Build Lifelong Connections with Graduates</h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="detail-box">
                        <div>
                            <h1>&lt;Resources/&gt;</h1>
                            <h2>
                                Discover the Power of Our Alumni Network
                            </h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="detail-box">
                        <div>
                            <h1>&lt;Reunions/&gt;</h1>
                            <h2>Relive Memories and Make New Ones</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<section class="upcoming-event py-5">
    <div class="container">
        <p class="tag">Upcoming Event</p>
        <?php
                    $today = date('Ymd');
                    $homepageEvents = new WP_Query(array(
                        'posts_per_page' => 1,
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
        <div class="event-details row g-3 d-flex align-items-center justify-content-center">
            <div class="col-lg-3 event-image">
                <a href="<?php the_permalink( )?>">
                    <?php 
                $first_image = get_first_image_from_post_content(get_the_content());
                if (!empty($first_image)) {
                 ?>
                    <img src="<?php echo $first_image ;?>" class="img-fluid event-image-one" alt="...">
                    <?php  }  else {?>
                    <img src="<?php echo get_theme_file_uri('/images/event.jpg')?>" class="img-fluid event-image-one"
                        alt="...">
                    <?php } ?>
                </a>
            </div>
            <div class="event-content col-lg-5">
                <a href="<?php the_permalink( )?>">
                    <h2><?php the_title( )?></h2>

                    <i class='bx bx-location-plus'></i>
                    <span><?php the_field('event_location');?></span>
                </a>
                <p class="mt-3">
                    <?php
                    if(has_excerpt(  )){
                       
                        echo wp_trim_words(get_the_excerpt(  ),25);
                    }else{
                        echo wp_trim_words( get_the_content( ),25);
                    }
                     ?>
                </p>
            </div>
            <div class="event-utils col-lg-3">
                <div class="event-date">
                    <span><?php 
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate -> format('d');
                                    ?></span>
                    <span><?php 
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate -> format('M');
                                    ?></span>
                    <span><?php 
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate -> format('Y');
                                    ?></span>
                </div>
                <a class="button" href="<?php the_permalink( )?>">Join now</a>
            </div>
        </div>
        <?php   }
                    ?>
    </div>
</section>

<section class="aboutus container py-5">
    <div class="row py-5 mb-3">
        <div class="col-md d-flex flex-column align-items-start justify-content-center">
            <p class="tag mb-3">About Us</p>
            <h2 class="mb-3">
                Stay Connected to Your School and Your Fellow Alumni!
            </h2>
            <p class="about-us-detail">
                The Alunmi website is for current and former students of Central and
                North Metropolitan TAFE, to enable them to connect and remain in
                contact with lecturers and other students (current and former).
                Members can keep track of where former students are and what they
                are doing in industry, and have a forum to share their experiences.
            </p>
        </div>
        <div class="col-md-5 about-img">
            <img src="<?php echo get_theme_file_uri( "/images/hero-bg3.jpg" )?>" alt=""
                class="img-fluid aboutus-img-one">
        </div>
    </div>
</section>

<section class="activities">
    <div class="container py-5">
        <div class="row d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-md d-flex flex-column align-items-center">
                <div class="desc w-100 d-flex flex-column align-items-center my-4">
                    <h3>Latest Blogs</h3>
                </div>
                <div class="cards scrollbar" id="scrollbar">

                    <?php
                $homepagePosts = new WP_Query(array(
                    'posts_per_page' => 6,

                ));

                while($homepagePosts -> have_posts( )){
                    $homepagePosts -> the_post(); ?>
                    <div class="card mb-3" style="max-width: 540px">
                        <div class="row g-0">
                            <div class="col-4">
                                <a href="<?php the_permalink(  ) ?>">
                                    <?php 
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ); 
                
                if($feat_image) {?>
                                    <img src="<?php echo $feat_image; ?>"
                                        class="img-fluid rounded-start h-100 object-fit-cover" alt="...">
                                    <?php  }  else {
                    $first_image = get_first_image_from_post_content(get_the_content());
                    if (!empty($first_image)) {
                 ?>
                                    <img src="<?php echo $first_image ;?>"
                                        class="img-fluid rounded-start h-100 object-fit-cover" alt="...">

                                    <?php } 
                    if (!$first_image){?>
                                    <img src="<?php echo get_theme_file_uri('/images/No_Image_Available.jpg')?>"
                                        class="img-fluid rounded-start object-fit-cover" alt="...">
                                    <?php }} ?>
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="<?php the_permalink(  ) ?>">
                                        <h4 class="card-title"><?php the_title( )?></h4>
                                    </a>
                                    <p class="card-text">
                                        <?php
                    if(has_excerpt(  )){
                       
                        echo wp_trim_words(get_the_excerpt(  ),12);
                    }else{
                        echo wp_trim_words( get_the_content( ),12);
                    }
                     ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } wp_reset_postdata(  );
                ?>

                </div>
                <a href="<?php echo site_url('/blog')?>" class="button">View All Blogs</a>
            </div>
            <div class="col-md d-flex flex-column align-items-center mx-3">
                <div class="desc w-100 d-flex flex-column align-items-center my-4">
                    <h3>Job Opportunities</h3>
                </div>
                <div class="cards jobs scrollbar" id="scrollbar">
                    <?php
                    $today = date('Ymd');
                    $homepageJobs = new WP_Query(array(
                        'posts_per_page' => 6,
                        'post_type'=> 'job',
                        'meta_key' => 'closing_date',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                                'key' => 'closing_date',
                                'compare' => '>=',
                                'value' => $today,
                                'type' => 'numeric'
                            )
                        )
                       
                    ));
                    while( $homepageJobs  -> have_posts(  )){
                        $homepageJobs -> the_post(  );?>
                    <div class="card mb-3" style="max-width: 540px">
                        <div class="row g-0">
                            <div class="col-4">
                                <a href="<?php the_permalink( )?>">
                                    <?php if( get_field('company_logo') ){ ?>
                                    <img src="<?php the_field('company_logo'); ?>" class="img-fluid" alt="">

                                    <?php } else {?>
                                    <img src="<?php echo get_theme_file_uri('/images/default_company.jpg')?>"
                                        class="img-fluid" alt="...">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="<?php the_permalink( )?>">
                                        <h4 class="card-title"><?php the_title(); ?></h4>
                                    </a>
                                    <p class="card-text">
                                        <span><i class="bx bxs-map-pin"></i> <?php the_field('location');?></span>
                                        <span><i class="bx bx-time"></i> <?php the_field('work_type');?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php   }
                    ?>

                </div>
                <a href="<?php echo get_post_type_archive_link('job')?>" class="button">View All Jobs</a>
            </div>
            <div class="col-md d-flex flex-column align-items-center">
                <div class="desc w-100 d-flex flex-column align-items-center my-4">
                    <h3>Upcoming Events</h3>
                </div>
                <div class="cards scrollbar events" id="scrollbar">
                    <?php
                    $today = date('Ymd');
                    $homepageEvents = new WP_Query(array(
                        'posts_per_page' => 6,
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
                    <div class="card" style="max-width: 540px">
                        <div class="row g-0">
                            <div class="col-4">
                                <div class="event-date">
                                    <span><?php 
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate -> format('M');
                                    ?></span>
                                    <span class="date"><?php 
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate -> format('d');
                                    ?></span>
                                    <span><?php 
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate -> format('Y');
                                    ?></span>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="<?php the_permalink( )?>">
                                        <h4 class="card-title"><?php the_title( )?></h4>

                                        <p class="card-text">
                                            <?php
                    if(has_excerpt(  )){
                       
                        echo wp_trim_words(get_the_excerpt(  ),10);
                    }else{
                        echo wp_trim_words( get_the_content( ),10);
                    }
                     ?>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php   }
                    ?>

                </div>
                <a href="<?php echo get_post_type_archive_link('event')?>" class="button">View All Events</a>
            </div>
        </div>
    </div>
</section>


<?php

get_footer();
?>