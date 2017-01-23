<?php get_header(); ?>
<div class="main">
    <div class="banner">
        <div class="banner">
            <img src="<?php bloginfo('template_directory'); ?>/images/dejiemo-banner.png"/>
            <ul>
                <li></li>
                <li style="background-color:#0c6fc2;"></li>
                <li></li>
            </ul>
        </div>
    </div>
    <div class="main-list-body">
        <div class="info-list">
            <!--                调用分类目录，以及该目录下面的文章-->
            <div class="summary" style="width: 365px;">
                <?php $display_categories = array(1);
                foreach ($display_categories as $category) { ?>
                    <?php query_posts("showposts=8&cat=$category") ?>
                    <h2><?php single_cat_title(); ?></h2>
                    <div class="line-blue"></div>
                    <?php while (have_posts()) : the_post(); ?>
                        <p><?php echo mb_strimwidth(get_the_content(), 0, 600, '…'); ?></p>
                    <?php endwhile; ?>
                    <div class="more-link"><a href="<?php echo get_category_link($category); ?>">READ MORE -></a></div>
                <?php }
                wp_reset_query(); ?>
            </div>
            <div class="news" style="width: 350px;margin: 0 45px;">
                <?php query_posts("cat=3") ?>
                <h2><?php single_cat_title(); ?></h2>
                <div class="line-blue"></div>
                <ul>
                    <?php query_posts("showposts=1&cat=3"); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li style="padding-bottom: 60px;">
                            <a href="#"><?php echo mb_strimwidth(get_the_title(), 0, 40, '…'); ?></a>
                            <p><?php echo mb_strimwidth(get_the_content(), 0, 100, '…'); ?></p>
                            <div class="more-link"><a href="<?php echo get_permalink()?>">READ MORE -></a></div>
                        </li>
                    <?php endwhile; ?>
                    <?php query_posts("showposts=2&cat=3&offset=1"); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li><a href="#"><?php echo mb_strimwidth(get_the_title(), 0, 40, '…'); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="device" style="width: 350px;">
                <?php query_posts("showposts=1&cat=12") ?>
                <h2><?php single_cat_title(); ?></h2>
                <div class="line-blue"></div>
                <div style="margin-top: 15px;">
                    <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php echo get_permalink()?>"><?php echo mb_strimwidth(get_the_title(), 0, 40, '…'); ?></a>
                    <p>13-06-2015 Hits:1307 生产设备 Super User</p>
                    <img src="<?php echo catch_that_image() ?>" width="345" height="200" style="margin-top: 20px;">
                    <?php endwhile; ?>
                </div>
                <div class="more-link"><a href="<?php echo get_permalink()?>">READ MORE -></a></div>
            </div>
        </div>
    </div>
    <div class="main-show-body">
        <div class="info-list">
            <div class="show">
                <h2>产品展示</h2>
                <div class="line-blue"></div>
                <p>
                    苏州德捷膜材料科技有限公司成立于2013年8月26日，坐落于江苏省常熟市，是一家集特种膜材料研发、生产、销售为一体的企业。具体涉及热熔胶膜、高透明高分子膜、光致变色膜这三个既相互关联又处于不同行业的业务领域。<br>
                    企业宗旨：部分或全部取代进口产品，为国内有需求的企业提供高性能高质量的特种膜材料，为国家的环保政策服务，为人民的健康幸福生活服务。<br>
                    经营范围：1、热熔胶膜，生物降解膜材料，高透光度高分子农膜，特种电致变色膜，光致变色薄膜的生产研发及销售。2、承接各种贸易公司的来料加工（包括塑料薄膜的打孔加工）、各公司所要求制作的各种膜。
                </p>
                <div class="more-link"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
</body>
</html>