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


$uid  = $_GPC['uid'];
$user = pdo_get('mc_members', array('uniacid' => 1, 'uid' => $uid));
$data = array('credit1' => $user['credit1'] + intval($_GPC['credit1']));
pdo_update('mc_members', $data , array('uid' => $uid));



$params = [
    'mobile' => $user['mobile'],
    'score' => intval($_GPC['credit1']),
];

$haiqi = new AddToHaiQi();
$haiqi->updateScore($params);


CoreFactory::urlGo('views/UserManage.html', '更新积分成功用户id' . $uid);


