<?php

/**
 * Created by PhpStorm.
 * User: gok11139
 * Date: 2017/11/16
 * Time: 15:54
 */
define('IN_SYS', true);


require_once '../../framework/bootstrap.inc.php';
require_once IA_ROOT . '/web/common/bootstrap.sys.inc.php';
require_once IA_ROOT . '/wq/common/core/CoreFactory.php';
require_once IA_ROOT . '/wq/service/AddToHaiQi.php';


if (trim($_GPC['mobile'])) {
    $mobile = trim($_GPC['mobile']);
} else {
    CoreFactory::urlGo('views/User.html', '手机号被不能为空');
}
//$user = pdo_get('mc_members', array('uniacid' => $_W['uniacid'], 'mobile' => $mobile));
//
//if (!empty($user) || !$user) {
//    CoreFactory::urlGo('views/User.html', '手机号被占用');
//}

$password = $_GPC['password'];

$salt = random(8);
$data = array(
    'uniacid' => $_W['uniacid'],
    'realname' => $_W['realname'],
    'mobile' => $mobile,
    'email' => $_W['email'],
    'salt' => $salt,
    'password' => md5(trim($password) . $salt . $_W['config']['setting']['authkey']),
    'credit1' => intval($_GPC['credit1']),
    'credit2' => intval($_GPC['credit2']),
    'groupid' => intval($_GPC['groupid']),
    'createtime' => TIMESTAMP,
);

pdo_insert('mc_members', $data);
$uid = pdo_insertid();


$params = [
    'm' => 'addcard',
    'CardID' => $mobile,
    'CardName' => $mobile,
    'password' => $password,
    'CompId' => CoreFactory::COMP_ID,
    'ShopId' => CoreFactory::SHOP_ID,
    'groupId' => '1',
    'mobile' => $mobile,
    'realname' =>  $mobile,
    'score' => intval($_GPC['credit1']),
    'money' => intval($_GPC['credit2'])
];

$haiqi = new AddToHaiQi();
$haiqi->addUser($params);


CoreFactory::urlGo('views/User.html', '创建成功用户id' . $uid);


