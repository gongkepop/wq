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
$user = pdo_get('mc_members', array('uniacid' => 1, 'mobile' => $mobile));
//
//if (!empty($user) || !$user) {
//    CoreFactory::urlGo('views/User.html', '手机号被占用');
//}

$password = $_GPC['password'];

$salt = random(8);
$data = array(
    'credit1' => $user['credit1'] + intval($_GPC['credit1']),
);

pdo_update('mc_members', $data);
$uid = pdo_insertid();


$params = [
    'score' => intval($_GPC['credit1']),
];

$haiqi = new AddToHaiQi();
$haiqi->addUser($params);


CoreFactory::urlGo('views/User.html', '更新积分成功用户id' . $uid);


