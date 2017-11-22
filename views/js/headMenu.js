/**
 * Created by gok11139 on 2017/11/21.
 */
var htmlMenu = '\
<nav class="navbar navbar-default" role="navigation">\
    <div class="container ">\
        <div class="navbar-header">\
            <a class="navbar-brand" href="../../">\
                <img src="../../web/resource/images/logo/logo.png" class="pull-left" width="110px" height="35px">\
                <span class="version hidden">1.0</span>\
            </a>\
        </div>\
        <div class="collapse navbar-collapse">\
            <ul class="nav navbar-nav navbar-left">\
                <li class="active"><a href="./../../../index.php?c=home&a=welcome&do=platform&">公众号</a></li>\
                <li><a href="./../../../index.php?c=wxapp&a=display&do=home&">小程序</a></li>\
                <li><a href="./../../../index.php?c=module&a=display&">应用</a></li>\
                <li><a href="./../../../index.php?c=home&a=welcome&do=system&">系统管理</a></li>\
                <li><a href="./../../../index.php?c=cloud&a=upgrade&">站点管理</a></li>\
                <li><a href="./../../../index.php?c=advertisement&a=content-provider&">广告联盟</a></li>\
                <li><a href="./../../../index.php?c=help&a=display&" target="_blank">帮助系统</a></li>\
            </ul>\
            <ul class="nav navbar-nav navbar-right">\
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="wi wi-user color-gray"></i>admin<span class="caret"></span></a>\
                <ul class="dropdown-menu color-gray" role="menu">\
                    <li><a href="./../../../index.php?c=user&a=profile&" target="_blank"><i class="wi wi-account color-gray"></i> 我的账号</a></li>\
                    <li class="divider"></li>\
                    <li><a href="./../../../index.php?c=cloud&a=upgrade&" target="_blank"><i class="wi wi-update color-gray"></i> 自动更新</a></li>\
                    <li><a href="./../../../index.php?c=system&a=updatecache&" target="_blank"><i class="wi wi-cache color-gray"></i> 更新缓存</a></li>\
                    <li class="divider"></li>\
                    <li><a href="./../../../index.php?c=user&a=logout&"><i class="fa fa-sign-out color-gray"></i>退出系统</a></li>\
                </ul>\
                </li>\
            </ul>\
        </div>\
    </div>\
</nav>';

$(function () {
    $("#head").html(htmlMenu);
});