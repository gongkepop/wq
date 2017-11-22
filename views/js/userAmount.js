/**
 * Created by gok11139 on 2017/11/20.
 */

$(function () {

    function GetQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null)return (r[2]);
        return 0;
    }

// 调用方法

    var uid = GetQueryString("uid");

    //var url = window.location.search;

    var host = window.location.host;
    var userUrl = 'http://' + host + '/wq/controllers/userManager.php?uid=' + uid;
    $.getJSON(userUrl, function (json) {
        if (json.code == 0) {
            $("input[name='realname']").val(json.data.list[0].realname);
            $("input[name='mobile']").val(json.data.list[0].mobile);

        } else {
            alert('系统繁忙请稍后再试');
        }
    });
});