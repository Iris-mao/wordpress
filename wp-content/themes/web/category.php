<?php get_header(); ?>
<div class="clear"></div>
<div class="main" style="border-top: 1px solid #ededee;">
    <div class="main-body">
        <div class="bread">
            <?php wheatv_breadcrumbs(); ?>
        </div>
        <div style="width: 200px;float: left;">
            <?php
            $categoryID = $cat;
            $wp_query = new WP_Query('cat=' . $categoryID . 'orderby=date&order=desc&posts_per_page=' . $postsperpage . '&paged=' . $paged); ?>
            <h2><?php single_cat_title(); ?></h2>
            <div class="line-blue"></div>
            <div class="list-left">
                <?php while (have_posts()) : the_post(); ?>
                    <ul>
                        <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                <?php echo mb_strimwidth(get_the_title(), 0, 18, '…'); ?> </a></li>
                    </ul>
                <?php endwhile; ?>
            </div>
            <?php pagination($query_string); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
</body>
</html>