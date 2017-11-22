/**
 * Created by gok11139 on 2017/11/20.
 */
var html = '<table class="table we7-table table-hover vertical-middle">'
    + '<colgroup>'
    + '<col width="150px">'
    + '<col width="150px">'
    + '  <col width="150px">'
    + '  <col>'
    + '  <col>'
    + '  <col>'
    + '  <col width="120px">'
    + '  <col width="210px">'

    + '  </colgroup>'
    + '  <tbody>'

    + '  <th>会员编号</th>'
    + '  <th>昵称/真实姓名</th>'
    + ' <th>手机</th>'
    + ' <th>邮箱</th>'
    + ' <th class="text-left">余额/积分</th>'
    + ' <th>注册时间</th>'
    + ' <th>操作</th>';

//< / tbody >
//< / table > ';
$(function () {
    var host = window.location.host;
    var userUrl = 'http://' + host + '/wq/controllers/userManager.php';
    $.getJSON(userUrl, function (json) {
        if (json.code == 0) {
            for (var i = 0; i < json.data.list.length; i++) {
                html = html + '<tr>'
                    + '<td>' + json.data.list[i].uid + '</td>'
                    + '<td> ' + json.data.list[i].realname + ' <br> ' + json.data.list[i].nickname + ' </td>'
                    + '<td>' + json.data.list[i].mobile + '</td>'
                    + '<td>' + json.data.list[i].email + '</td>'
                    + '<td class="text-left">'
                    + ' <span class="label label-primary">余额：' + json.data.list[i].credit2 + '</span>'
                    + ' <br>'
                    + ' <span class="label label-warning">积分：' + json.data.list[i].credit1 + '</span>'
                    + '</td>'
                    + '<td>' + json.data.list[i].createtime + '</td>'
                    + '<td style="overflow:visible;">'
                    + ' <div class="link-group">'
                    + ' <a href="./UserScore.html?uid=' + json.data.list[i].uid + '">修改积分</a>'
                    + ' <a href="./UserAmount.html?uid=' + json.data.list[i].uid + '">修改余额</a>'
                    + ' </div>'
                    + '</td>'
                    + '</tr>';
            }
            html = html +
                '</tbody>' +
                '</table>';
            $("#content").html(html);
        } else {
            alert('系统繁忙请稍后再试');
        }

    });
});