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

$data = array(
    'credit2' => $user['credit2'] + intval($_GPC['credit2']),
);

pdo_update('mc_members', $data);
$uid = pdo_insertid();


$params = [
    'mobile' => $mobile,
    'amount' => intval($_GPC['credit2']),
];

$haiqi = new AddToHaiQi();
$haiqi->updateAmount($params);


CoreFactory::urlGo('views/User.html', '更新积分成功用户id' . $uid);


