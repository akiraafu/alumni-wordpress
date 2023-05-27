<?php
get_header();
while(have_posts(  )){
the_post(  );?>


</div>
<section class="detail-page" style="margin:0 20px;">
    <?php the_content( );?>
</section>



<?php
}

get_footer();
?>