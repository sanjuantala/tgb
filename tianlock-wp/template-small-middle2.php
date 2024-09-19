<?php 
/* 
Template Name: Template - Small Page 300px
*/ 
?>
<?php get_header(); // add header ?>  

<!-- Begin Content -->
<div class="wrap-small-middle2">

        <article>
            <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                  <div class="entry">
                    <nav class="menu--adsila">
                        <div class="menu__item">
                            <span class="menu__item-name"><?php the_title(); ?></span> 
                        </div>
                    </nav><!-- end .menu-adsila -->
                                    
                    <?php the_content(''); // content ?>
                    <div class="clear"></div>
                    <?php wp_link_pages(); // content pagination ?>
                    <div class="clear"></div>
                  </div><!-- end #entry -->
            </div><!-- end .post -->
            <?php endwhile; endif; ?>
        </article>

<div class="clear"></div>
</div><!-- end .wrap-small-middle -->
<?php get_footer(); // add footer  ?>