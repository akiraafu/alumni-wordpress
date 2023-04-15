<!DOCTYPE html>
<html <?php language_attributes( )?>>

<head>
    <meta charset="<?php bloginfo("charset");?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(  );?>
</head>

<body <?php body_class(); ?>>

    <div class="hero-area" style=" background-image: linear-gradient(
      rgba(29, 38, 113, 0.8),
      rgba(195, 55, 100, 0.8)
    ),
    url(<?php echo get_theme_file_uri( "/images/hero-bg1.jpg" )?>);">
        <div class="header">
            <nav class="navbar navbar-expand-lg bg-body-tertiary custom-nav-container">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo site_url('/')?>">
                        <h3>North Metropolitan</h3>
                        <span>TAFE Alumni</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style=" background-image: url(<?php echo get_theme_file_uri("/images/Hamburger_icon_white.svg")?>);
    "></span>
                    </button>
                    <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item <?php if(is_front_page()) echo 'active'?>">
                                <a class="nav-link" href="<?php echo site_url('/')?>">Home</a>
                            </li>

                            <li class="nav-item <?php if(is_page('about-us')) echo 'active'?>">
                                <a class="nav-link" href="<?php echo site_url('/about-us')?>">About Us</a>
                            </li>
                            <li class="nav-item  <?php if(get_post_type() == 'post' ) echo 'active'?>">
                                <a class="nav-link" href="<?php echo site_url('/blog')?>">Blog</a>
                            </li>
                            <li
                                class="nav-item <?php if(get_post_type() == 'event' OR is_page('past-events') ) echo 'active'?>">
                                <a class="nav-link" href="<?php echo site_url('/events')?>">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/jobs.html">Job Opportunity</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://2022.gradshow.screencraft.net.au/"
                                    target="_blank">2023 Gradshow</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>