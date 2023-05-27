<?php
get_header();
while(have_posts(  )){
the_post(  );?>


</div>


<section class="aboutus container py-5">
    <div class="row container py-5 mb-3 d-flex align-items-center justify-content-center">
        <div class="col d-flex flex-column align-items-start justify-content-center">
            <div class="heading-area">
                <p class="heading mb-3">About Us</p>
            </div>

            <h2 class="mb-4">
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
        <div class="col about-img">
            <img src="<?php echo get_theme_file_uri( "/images/hero-bg3.jpg" )?>" alt=""
                class="img-fluid aboutus-img-one" />
        </div>
    </div>
</section>



<?php
}

get_footer();
?>