<?php

/**
 * Created by PhpStorm.
 * User: gok11139
 * Date: 2017/11/16
 * Time: 15:54
 */
define('IN_SYS', true);


require '../../framework/bootstrap.inc.php';
require IA_ROOT . '/web/common/bootstrap.sys.inc.php';
require IA_ROOT . '/Sync/common/core/CoreFactory.php';


if (trim($_GPC['mobile'])) {
    $mobile = trim($_GPC['mobile']);
} else {
    CoreFactory::urlGo('views/User.html', '手机号被不能为空');
}
$user = pdo_get('mc_members', array('uniacid' => $_W['uniacid'], 'mobile' => $mobile));

if (!empty($user) || !$user) {
    CoreFactory::urlGo('views/User.html', '手机号被占用');
}


$salt = random(8);
$data = array(
    'uniacid' => $_W['uniacid'],
    'realname' => $realname,
    'mobile' => $mobile,
    'email' => $email,
    'salt' => $salt,
    'password' => md5(trim($_GPC['password']) . $salt . $_W['config']['setting']['authkey']),
    'credit1' => intval($_GPC['credit1']),
    'credit2' => intval($_GPC['credit2']),
    'groupid' => intval($_GPC['groupid']),
    'createtime' => TIMESTAMP,
);

pdo_insert('mc_members', $data);
$uid = pdo_insertid();
CoreFactory::urlGo('views/User.html','创建成功用户id'.$uid);


