<?php
if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
        'primary' => '导航菜单',
    ));
}

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

//获取文章中第一张图片的路径并输出
    $first_img = $matches [1] [0];

//如果文章无图片，获取自定义图片

    if(empty($first_img)){ //Defines a default image
        $first_img = "/images/default.jpg";

//请自行设置一张default.jpg图片
    }

    return $first_img;
}

function pagination($query_string)
{
    global $posts_per_page, $paged;
    $my_query = new WP_Query($query_string . "&posts_per_page=-1");
    $total_posts = $my_query->post_count;
    if (empty($paged)) $paged = 1;
    $prev = $paged - 1;
    $next = $paged + 1;
    $range = 6; // 修改数字,可以显示更多的分页链接
    $showitems = ($range * 2) + 1;
    $pages = ceil($total_posts / $posts_per_page);
    if (1 != $pages) {
        echo "<div class='pagination'>";
        echo ($paged > 2 && $paged + $range + 1 > $pages && $showitems < $pages) ? "<a href='" . get_pagenum_link(1) . "'>最前</a>" : "";
        echo ($paged > 1 && $showitems < $pages) ? "<a href='" . get_pagenum_link($prev) . "'>上一页</a>" : "";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
            }
        }
        echo ($paged < $pages && $showitems < $pages) ? "<a href='" . get_pagenum_link($next) . "'>下一页</a>" : "";
        echo ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) ? "<a href='" . get_pagenum_link($pages) . "'>最后</a>" : "";
        echo "</div>\n";
    }
}

function wheatv_breadcrumbs()
{
    $delimiter = ' > ';
    $name = '首页'; //

    if (!is_home() || !is_front_page() || is_paged()) {

        global $post;
        $home = get_bloginfo('url');
        echo '<a href="' . $home . '"  class="gray">' . $name . '</a> ' . $delimiter . ' ';

        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo single_cat_title();

        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '"  class="gray">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '"  class="gray">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo get_the_time('d');

        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '"  class="gray">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo get_the_time('F');

        } elseif (is_year()) {
            echo get_the_time('Y');

        } elseif (is_single()) {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo "正文";

        } elseif (is_page() || !$post->post_parent) {
            the_title();

        } elseif (is_page() || $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="http://www.wheatv.com/site/wp-admin/ . get_permalink($page->ID) . "  class="gray">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            the_title();

        } elseif (is_search()) {
            echo get_search_query();

        } elseif (is_tag()) {
            echo single_tag_title();

        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo '由' . $userdata->display_name . '发表';

        } elseif (is_404()) {
            echo '404 错误';
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo '第' . ' ' . get_query_var('paged') . ' 页';
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }
    } else {
        echo $name;
    }
}
?>