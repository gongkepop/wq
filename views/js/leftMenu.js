/**
 * Created by gok11139 on 2017/11/21.
 */
var leftMenu ='\
    <div class="left-menu-content">\
        <div class="panel panel-menu">\
            <div class="panel-heading">\
                <span class="no-collapse">用户管理<i class="wi wi-appsetting pull-right setting"></i></span>\
            </div>\
            <ul class="list-group">\
                <li class="list-group-item ">\
                    <a href="./UserManage.html" class="text-over"><i class="wi wi-fansmanage"></i> 用户列表 </a>\
                </li>\
                <li class="list-group-item active">\
                    <a href="./User.html" class="text-over"><i class="wi wi-fans"></i> 新增用户 </a>\
                </li>\
            </ul>\
        </div>\
    </div>';

$(function(){
    $("#leftMenu").html(leftMenu);
});