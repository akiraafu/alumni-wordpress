<?php
get_header();
while(have_posts(  )){
the_post(  );?>


</div>
<section class="detail-page" style="margin:0 150px;">
    <?php the_content( );?>
</section>



<?php
}

get_footer();
?>