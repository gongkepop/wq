<?php

/**
 * Created by PhpStorm.
 * User: gok11139
 * Date: 2017/11/20
 * Time: 9:57
 */
require_once '../../framework/bootstrap.inc.php';

require_once IA_ROOT . '/wq/common/core/CoreFactory.php';

class UserManager
{
    public function getAllUser($pindex = 1, $psize = 20, $uid = 0)
    {
        $_W['page']['title'] = '会员列表';
        $condition = '';
        if ($uid > 0) {
            $condition = ' and uid = ' . $uid;
        }
        $params = [
            ':uniacid' => 1
        ];
        $sql = "SELECT uid, uniacid, groupid, realname, nickname, email, mobile, credit1, credit2, credit6, createtime  FROM " . tablename('mc_members') . " WHERE uniacid = :uniacid " . $condition . " ORDER BY createtime DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize;
        
        $list = pdo_fetchall($sql, $params);
        $max = ceil(pdo_fetchcolumn($sql, $params) / $psize);
        $result = [
            'pageIndex' => $pindex,
            'maxPage' => $max,
            'list' => $list
        ];

        return CoreFactory::formatSuccess($result);
    }
}