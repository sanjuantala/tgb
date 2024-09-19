<?php get_header(); // add header ?>  

<!-- Begin Content -->
<div class="wrap-fullwidth">

    <div class="single-content">
        <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
        <div class="entry-top">
            <div class="single-category"> 
                <?php if ( function_exists( 'tianlock_wp_social_share_single' ) ) { echo wp_kses_post(tianlock_wp_social_share_single()); } ?>
            </div><!-- end .single-category -->
            <div class="clear"></div>

            <h1 class="article-title entry-title"><?php the_title(); ?></h1>
            <ul class="meta-single-content">
                <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo wp_kses_post(get_avatar( get_the_author_meta( 'user_email' ), 24 )); ?></a></li>
                <li class="aut-name"><span class="vcard author"><span class="fn"><?php esc_url(the_author_posts_link()); ?></span></span></li>
                <?php if ( function_exists( 'time_ago_tianlock_wp' ) ) { ?>
                    <li class="lm-space"><i class="fas fa-times"></i></li>
                    <li class="time-article updated"><?php echo esc_attr(time_ago_tianlock_wp()); ?> <?php esc_html_e('ago', 'tianlock-wp'); ?></li> 
                <?php } ?>
                <?php if ( function_exists( 'getPostViews_tianlock_wp' ) ) { ?>
                    <li class="lm-space"><i class="fas fa-times"></i></li>
                    <li><?php echo esc_attr(getPostViews_tianlock_wp(get_the_ID())); ?> <?php esc_html_e( 'Views', 'tianlock-wp' ); ?></li>
                <?php } ?>
                <?php if (function_exists('thumbs_rating_getlink')) { ?>
                    <li class="lm-space"><i class="fas fa-times"></i></li>
                    <li class="thumbs-ranting"><?php echo stripslashes(thumbs_rating_getlink()); ?></li>
                <?php } ?>
            </ul><!-- end .meta-single-content -->
            <div class="clear"></div>
        </div><div class="clear"></div>
        <?php endwhile; endif; ?>


        <article>
            <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
            <?php if ( function_exists( 'getPostViews_tianlock_wp' ) ) { setPostViews_tianlock_wp(get_the_ID()); } ?>
            <div <?php post_class('post') ?> id="post-<?php the_ID(); ?>">

                <?php if ( function_exists( 'rwmb_meta' ) ) {  
                // If Meta Box plugin is activate ?>
                    <?php
                    $tianlock_wp_hideimg_id = rwmb_meta('tianlock_wp_hideimg', true );
                    ?> 

                    <?php if ( 'option2' == get_theme_mod( 'tianlock_wp_hidefimg' ) ) { } else {
                            if(!empty($tianlock_wp_hideimg_id)) { } else { ?>
                                <?php the_post_thumbnail('tianlock-wp-thumbnail-single-image'); ?>
                            <?php } // disable featured image for one post ?>
                    <?php } // for all posts ?>

                <?php } else { 
                // Meta Box Plugin 
                    if ( 'option2' == get_theme_mod( 'tianlock_wp_hidefimg' ) ) { } else {
                        the_post_thumbnail('tianlock-wp-thumbnail-single-image'); 
                    }
                 } ?>  

                <div class="entry">
                    <!-- excerpt -->
                    <?php if ( !empty( $post->post_excerpt ) ) : ?> <div class="entry-excerpt"><h3> <?php echo wp_kses_post(the_excerpt()); ?> </h3></div> <?php else : false; endif;  ?> 

                    <!-- entry content -->
                    <?php the_content(''); // content ?>
                    <div class="clear"></div>
                    <?php wp_link_pages(); // content pagination ?>
                    <div class="clear"></div>

                        <div class="tags-cats">
                            <!-- tags -->
                            <?php $tianlock_wp_single_tags = get_the_tags(); 
                            if ($tianlock_wp_single_tags): ?>
                                <div class="ct-size"><div class="entry-btn"><?php esc_html_e( 'Article Tags:', 'tianlock-wp' ); ?></div> <?php the_tags('',' &middot; '); // tags ?></div><div class="clear"></div>
                            <?php endif; ?>

                            <!-- categories -->
                            <?php $tianlock_wp_single_categories = get_the_category(); 
                            if ($tianlock_wp_single_categories): ?>
                                <div class="ct-size"><div class="entry-btn"><?php esc_html_e( 'Article Categories:', 'tianlock-wp' ); ?></div> <?php the_category(' &middot; '); // categories ?></div><div class="clear"></div>
                            <?php endif; ?>
                        </div><!-- end .tags-cats -->

                </div><!-- end .entry -->
                <div class="clear"></div> 
            </div><!-- end #post -->
            <?php endwhile; endif; ?>
        </article><!-- end article -->
   

        <?php if(get_the_author_meta('description') ): ?>
        <div class="author-meta">
            <div class="author-meta-entry">
                <div class="author-left-meta">
                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo wp_kses_post(get_avatar( get_the_author_meta( 'user_email' ), 70 )); ?></a>
                </div><!-- end .author-left-meta -->
                <div class="author-info">
                    <strong><i class="fas fa-user"></i> <?php esc_url(the_author_posts_link()); ?></strong> <i class="fas fa-link"></i> <a class="author-link" href="<?php esc_url(the_author_meta('url')); ?>" target="_blank"><?php esc_url(the_author_meta('url')); ?></a><br />
                    <p><?php wp_kses_post(the_author_meta('description')); ?></p>
                </div><!-- end .autor-info -->
                <div class="clear"></div>
            </div><div class="clear"></div>
        </div><!-- end .author-meta -->
        <?php endif; ?>

        <!-- Prev and Next articles -->
        <div class="prev-articles">
            <?php previous_post_link('<div class="one_half" style="text-align: right;">' . esc_html__('Previous Article', 'tianlock-wp') . '  <br /><h2>%link </h2></div>'); ?> 
            <?php next_post_link('<div class="one_half_last">' . esc_html__('Next Article', 'tianlock-wp') . ' <br /> <h2> %link</h2></div>'); ?> 
            <div class="clear"></div>
        </div>

        <!-- Begin Sidebar (Left bottom) -->    
        <?php get_template_part('functions/custom/sidebar-post-bottom'); ?>
        <!-- end #sidebar (Left bottom) -->         

        <!-- Comments -->
        <?php if ( ! post_password_required() ) { ?>
            <div id="comments" class="comments">
                <?php if (get_comments_number()==0) { } else { ?>
                    <div class="article-btn"><h3><?php esc_html_e( 'All Comments', 'tianlock-wp' ); ?></h3></div>
                <?php } ?>
                <div class="clear"></div>
                <?php comments_template('', true); // comments ?>
            </div>
        <?php } ?>
        <div class="clear"></div>
    </div><!-- end .single-content -->


    <!-- Begin Sidebar (right) -->    
    <?php get_template_part('functions/custom/sidebar-post'); ?>
    <!-- end #sidebar (right) --> 


    <div class="clear"></div>
</div><!-- end .wrap-fullwidth  -->
<?php get_footer(); // add footer  ?>