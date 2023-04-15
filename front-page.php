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
                            <h2>Build Lifelong Connections with Graduates Worldwide</h2>
                            <a href="" class="button"> Read More </a>
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
                                Discover the Power of Our Alumni Network and Resources
                            </h2>
                            <a href="" class="button"> Read More </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="detail-box">
                        <div>
                            <h1>&lt;Reunions/&gt;</h1>
                            <h2>Relive cherished memories and create new ones with old friends</h2>
                            <a href="" class="button"> Read More </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<section class="upcoming-event py-5">
    <div class="container px-5">
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
                <img src="<?php echo get_theme_file_uri( "/images/aboutus.jpg" )?>" class="img-fluid" alt="..." />
            </div>
            <div class="event-content col-lg-5">
                <a href="<?php the_permalink( )?>">
                    <h2><?php the_title( )?></h2>

                    <i class='bx bxs-map-pin'></i>
                    <span><?php the_field('location');?></span>
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
        <div class="col-md-5 about-img">
            <img src="<?php echo get_theme_file_uri( "/images/hero-bg3.jpg" )?>" alt=""
                class="img-fluid aboutus-img-one" />
        </div>
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
    </div>
</section>
<section class="activities">
    <div class="container py-5">
        <p class="tag">Our Activities</p>
        <div class="row d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-md d-flex flex-column align-items-center">
                <div class="desc w-100 d-flex flex-column align-items-center my-4">
                    <h3>Latest Blog</h3>
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
                                <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ); 
                if($feat_image) {?>
                                <img src="<?php echo $feat_image; ?>" class="img-fluid" alt="..." />
                                <?php } else {?>
                                <img src="<?php echo get_theme_file_uri('/images/No_Image_Available.jpg')?>"
                                    class="img-fluid" alt="..." />
                                <?php } ?>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="<?php the_permalink(  ) ?>">
                                        <h5 class="card-title"><?php the_title( )?></h5>
                                    </a>
                                    <p class="card-text">
                                        <?php
                    if(has_excerpt(  )){
                       
                        echo wp_trim_words(get_the_excerpt(  ),15);
                    }else{
                        echo wp_trim_words( get_the_content( ),15);
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
                    <h3>Job Opportunity</h3>
                </div>
                <div class="cards jobs scrollbar" id="scrollbar">
                    <div class="card mb-3" style="max-width: 540px">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="<?php echo get_theme_file_uri( "/images/aboutus.jpg" )?>" class="img-fluid"
                                    alt="..." />
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">Card title</h5>
                                    </a>
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a
                                        natural lead-in to additional content...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="/images/aboutus.jpg" class="img-fluid" alt="..." />
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">Card title</h5>
                                    </a>
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a
                                        natural lead-in to additional content...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="/images/aboutus.jpg" class="img-fluid" alt="..." />
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">Card title</h5>
                                    </a>
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a
                                        natural lead-in to additional content...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="/images/aboutus.jpg" class="img-fluid" alt="..." />
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">Card title</h5>
                                    </a>
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a
                                        natural lead-in to additional content...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="button">View All Jobs</a>
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
                                        <h5 class="card-title"><?php the_title( )?></h5>
                                    </a>
                                    <p class="card-text">
                                        <?php
                    if(has_excerpt(  )){
                       
                        echo wp_trim_words(get_the_excerpt(  ),10);
                    }else{
                        echo wp_trim_words( get_the_content( ),10);
                    }
                     ?>
                                    </p>
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