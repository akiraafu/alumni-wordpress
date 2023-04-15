<section class="newsletter d-flex align-items-center justify-content-center" style=" background-image: linear-gradient(
      rgba(29, 38, 113, 0.8),
      rgba(29, 38, 113, 0.8)
    ),
    url(<?php echo get_theme_file_uri("/images/bg-newsletter.jpg" )?>);">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h2 class="mb-4">Don’t Miss Awesome Updates From Our Alumni</h2>
        <p class="mb-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </p>
        <form class="d-flex flex-column align-items-center justify-content-center">
            <input type="email" placeholder="Your Email Address" required />
            <a href="" class="button">Subscribe</a>
        </form>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="row g-3">
            <div class="col-sm-6 col-md-3 item">
                <h3>Explore</h3>
                <ul>
                    <li><a href="https://www.northmetrotafe.wa.edu.au/courses/information-technology-library-and-digital"
                            target="_blank">Programs</a></li>
                    <li><a href="https://www.northmetrotafe.wa.edu.au/campuses/perth" target="_blank">Campuses</a></li>
                    <li><a href="https://www.northmetrotafe.wa.edu.au/apply-and-enrol" target="_blank">Apply</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 item">
                <h3>About</h3>
                <ul>
                    <li><a href="https://2022.gradshow.screencraft.net.au/" target="_blank">Sitemap</a></li>
                    <li><a href="<?php echo site_url('/privacy-policy')?>">Privacy</a></li>
                    <li><a href="https://www.northmetrotafe.wa.edu.au/community/jobs-and-skills-centres-north-metropolitan-tafe"
                            target="_blank">Jobs and Skills Centres </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 item text">
                <div class="logo">
                    <a class="navbar-brand" href="<?php echo site_url('/')?>">
                        <h3>North Metropolitan</h3>
                        <span>TAFE Alumni</span>
                    </a>
                </div>
                <p>
                    Whether you're looking to reconnect with old friends or make new
                    connections, our alumni website is the perfect place to start.
                    Join us today and become a part of our global alumni network!
                </p>
            </div>
            <div class="col item social">
                <a href="#"><i class="bx bxl-facebook"></i></a><a href="#"><i class="bx bxl-twitter"></i></a><a
                    href="#"><i class="bx bxl-youtube"></i></a><a href="#"><i class="bx bxl-linkedin"></i></a>
                <a href="#"><i class="bx bxl-instagram-alt"></i></a>
            </div>
        </div>
        <p class="copyright">North Metropolitan TAFE Alumni © 2023</p>
    </div>
</footer>

<?php wp_footer(  )?>
</body>

</html>