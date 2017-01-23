<?php
/*
     template name:intro
  */
get_header(); ?>
<div class="clear"></div>
<div class="main" style="border-top: 1px solid #ededee;">
    <div class="main-body">
        <div class="bread">
            <?php wheatv_breadcrumbs(); ?>
        </div>
        <h2>企业简介</h2>
        <div class="line-blue"></div>
        <div class="text">
            <?php $post_content = get_post($title_id)->post_content; ?>
            <span class="text-bk">背景资料</span>
            <span class="text-time"><span class="time"></span>发布于<?php the_date_xml(); ?></span>
            <div class="text-details" style="margin-top: 30px;">
                <?php
                echo $post_content;//输出当前id文章的评论数
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
</body>
</html>