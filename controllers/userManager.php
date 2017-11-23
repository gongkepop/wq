<?php
/**
 * Created by PhpStorm.
 * User: gk
 * Date: 2017/11/20
 * Time: 9:56
 */



require_once '../../framework/bootstrap.inc.php';
require_once IA_ROOT . '/web/common/bootstrap.sys.inc.php';
require_once IA_ROOT . '/wq/common/core/CoreFactory.php';
require_once IA_ROOT . '/wq/service/UserManager.php';

$uid = $_GPC['uid'];
$t  = new UserManager();
echo  $t->getAllUser(1,20,$uid);
