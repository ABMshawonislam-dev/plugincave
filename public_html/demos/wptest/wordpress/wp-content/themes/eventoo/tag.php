<?php
/**
* Template Name: Blog Gride
*/
?>
<?php if ( is_active_sidebar( 'blog-gride' ) ) {
  $blog_col = "col-lg-8";
  $blog_item_col = "col-lg-6";
  $blog_bottom_pagi_col = "col-lg-8";

}else{
  $blog_col = "col-lg-12";
  $blog_item_col = "col-lg-4";
  $blog_bottom_pagi_col = "col-lg-12";

}
  ?>

<?php get_template_part("template-parts/common/header");?>
    <!--=================
        navigation-part start
    ==================-->
    <?php get_template_part("template-parts/common/navigation");?>
    <!--=================
        navigation-part start
    ==================-->
      <!--=================
        banner-part start
    ==================-->
    <section id="banner-part" style="background: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];?>)">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-text">
                        <h2><?php _e('You are looking for tag:','eventoo');?></h2>
                        <h2><span class="search_keyword"><?php single_tag_title();?></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================
        banner-part end
    ==================-->
  <!--====================
     pagination-part start
  ==================== -->
  <section id="pagination-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-6 t-c">
              <?php
                    if(get_theme_mod('eventoo_blog_view_check',1)):
              ?>
              <a href="<?php echo get_theme_mod('eventoo_topbar_left_icon_url_check','#')?>" class="bar active">
              <i class="<?php echo get_theme_mod('eventoo_topbar_left_icon_check','fa fa-th')?>"></i>
          </a>
          <a href="<?php echo get_theme_mod('eventoo_topbar_right_icon_url_check','#')?>" class="bar">
             <i class="<?php echo get_theme_mod('eventoo_topbar_left_icon_check','fa fa-bars')?>" aria-hidden="true"></i>
          </a>
              <?php
                    endif;
              ?>

        </div>
        <div class="col-lg-6 col-sm-6">
           <div class="pagination-top-main">
              <?php
                    if(get_theme_mod('eventoo_topbar_pagination_check',1)):
              ?>
              <nav aria-label="Page navigation example" class="toppagination">
                <?php
                  $paged = get_query_var("paged")?get_query_var("paged"):1;
                  eventoo_pagination();
                ?>
              </nav>
              <?php
                    endif;
              ?>

              <i class="fa fa-search srch-icon"></i>
                  <div class="srch">
                  <?php
                    echo get_search_form();
                  ?>
                  </div>

           </div>
        </div>
      </div>
    </div>
  </section>
    <!--====================
     pagination-part end
  ==================== -->

  <!--====================
    blog-part start
  ==================== -->
  <section id="blog-part">


      <div class="container">
        <div class="row">
          <div class="<?php echo esc_attr($blog_col);?> p-r">
            <div class="row">
              <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                  <div class="<?php echo esc_attr($blog_item_col);?> col-sm-6 mb-4" <?php post_class();?>>
                      <div class="blog-item blog-gride-item">
                        <div class="blog-img">
                          <?php
                            if(has_post_thumbnail()){
                              the_post_thumbnail();
                            }
                          ?>
                        </div>
                        <div class="blog-details">
                          <p class="date"><?php echo get_the_date();?></p>
                          <p class="tips"><?php the_title();?></p>
                          <a href="<?php the_permalink(); ?>">read more<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                      </div>
                    </div>

                    <?php endwhile; ?>

                  <?php wp_reset_postdata(); ?>

              <?php else : ?>
                  <p><?php _e( 'Sorry, no posts matched your criteria.','eventoo' ); ?></p>
              <?php endif; ?>

          </div>

      </div>
      <?php if ( is_active_sidebar( 'blog-gride' ) ) { ?>
      <div class="col-lg-4">

                <ul id="sidebar">
                    <?php dynamic_sidebar('blog-gride'); ?>
                </ul>

        </div>
        <?php } ?>
	  </div>
    </section>

    <!--====================
      blog-part end
    ==================== -->


      <!--====================
     pagination-part start
  ==================== -->
  <section id="pagination-bottom-part">
      <div class="container">
        <div class="row">
          <div class="<?php echo esc_attr($blog_bottom_pagi_col);?>">
              <?php
                    if(get_theme_mod('eventoo_bottom_pagination_check',1)):
              ?>
              <nav aria-label="Page navigation example" class="bottompagination">
                  <?php eventoo_pagination();?>
              </nav>
              <?php
                    endif;
              ?>

          </div>
        </div>
      </div>
    </section>

      <!--====================
       pagination-part end
    ==================== -->


 <!--=================
        footer-part start
    ==================-->
    <?php get_template_part("template-parts/common/footer");?>

    <!--=================
        footer-part end
    ==================-->
