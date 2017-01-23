<?php get_header(); ?>
<div class="clear"></div>
<div class="main" style="border-top: 1px solid #ededee;">
    <div class="main-body">
        <div class="bread">
            <?php wheatv_breadcrumbs(); ?>
        </div>
        <div class="text">
            <h2 class="text-title"><?php the_title_attribute(); ?></h2>
            <span class="text-bk">背景资料</span>
            <span class="text-time"><span class="time"></span>发布于<?php the_date_xml(); ?></span>
            <div class="text-details" style="margin-top: 30px;">
                <?php echo $post->post_content;?>”
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
</body>
</html>