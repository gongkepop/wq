<?php

/**
 * Created by PhpStorm.
 * User: gk
 * Date: 2017/11/16
 * Time: 15:54
 */
define('IN_SYS', true);


require_once '../../framework/bootstrap.inc.php';
require_once IA_ROOT . '/web/common/bootstrap.sys.inc.php';
require_once IA_ROOT . '/wq/common/core/CoreFactory.php';
require_once IA_ROOT . '/wq/service/AddToHaiQi.php';


$uid  = $_GPC['uid'];
$user = pdo_get('mc_members', array('uniacid' => 1, 'uid' => $uid));
$data = array('credit2' => $user['credit2'] + intval($_GPC['credit2']));
pdo_update('mc_members', $data , array('uid' => $uid));



$params = [
    'mobile' => $user['mobile'],
    'amount' => intval($_GPC['credit2']),
];

$haiqi = new AddToHaiQi();
$haiqi->updateAmount($params);


CoreFactory::urlGo('views/UserManage.html', '更新余额成功用户id' . $uid);


