<?php
/*
     template name:contact
  */
get_header(); ?>
<div class="clear"></div>
<div class="main" style="border-top: 1px solid #ededee;">
    <div class="main-body" style="height: 730px;">
        <div class="bread">
            <?php wheatv_breadcrumbs(); ?>
        </div>
        <div style="width: 420px;float: left;">
            <h2>公司坐标</h2>
            <div class="line-blue"></div>
            <div class="baidumap" style="margin-top: 30px;">
                <div style="width: 100%;height: 300px;overflow: hidden;" id="dituContent126"></div>
            </div>
        </div>
        <div class="text" style="margin-left: 600px;">
            <h2>联系方式</h2>
            <div class="line-blue"></div>
            <div>
                <span class="text-bk" style="display:inline-block;margin-top: 30px;margin-bottom: 10px;">联系人</span>
                <ul class="text-details">
                    <li style="line-height: 45px;"><span class="icon-people"></span>金浴雅</li>
                    <li style="line-height: 45px;"><span class="icon-address"></span>江苏省常熟市常熟高新技术产业开发区东南大道68号3幢</li>
                    <li style="line-height: 45px;"><span class="icon-code"></span>215500</li>
                    <li style="line-height: 45px;"><span class="icon-email"></span>suzhoudejie@163.com</li>
                    <li style="line-height: 45px;"><span class="icon-tel"></span>0512-82368016</li>
                    <li style="line-height: 45px;"><span class="icon-phone"></span>13814991884</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="bottom">
    <div class="bottom-main">
        <p>版权所有：苏州德捷膜材料科技有限公司 苏ICP备15029316号</p>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    $('._btn_toggle').click(function () {
        $('#display-form').toggle();
    });
    //创建和初始化地图函数：
    function initMap() {
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }

    //创建地图函数：
    function createMap() {
        var map = new BMap.Map("dituContent126");//在百度地图容器中创建一个地图
        var point = new BMap.Point(120.817832, 31.607861);//定义一个中心点坐标
        map.centerAndZoom(point, 16);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent() {
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl() {
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_LARGE});
        map.addControl(ctrl_nav);


        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT});
        map.addControl(ctrl_sca);
    }
    //标注点数组
    var markerArr = [
        {
            title: "苏州德捷膜材料科技有限公司",
            content: "常熟高新技术产业开发区东南大道68号3幢",
            point: "120.817832,31.607861",
            isOpen: 1,
            icon: {w: 23, h: 25, l: 0, t: 21, x: 9, lb: 12}
        }];


    //创建marker
    function addMarker() {
        for (var i = 0; i < markerArr.length; i++) {
            var json = markerArr[i];
            var p0 = json.point.split(",")[0];
            var p1 = json.point.split(",")[1];
            var point = new BMap.Point(p0, p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point, {icon: iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title, {"offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                borderColor: "#808080",
                color: "#555",
                cursor: "pointer"
            });

            (function () {
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click", function () {
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open", function () {
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close", function () {
                    _marker.getLabel().show();
                })
                label.addEventListener("click", function () {
                    _marker.openInfoWindow(_iw);
                })
                if (!!json.isOpen) {
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i) {
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>" + json.content + "</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json) {
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w, json.h), {
            imageOffset: new BMap.Size(-json.l, -json.t),
            infoWindowOffset: new BMap.Size(json.lb + 5, 1),
            offset: new BMap.Size(json.x, json.h)
        })
        return icon;
    }

    initMap();//创建和初始化地图
</script>
