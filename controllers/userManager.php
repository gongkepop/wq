<?php
/**
 * Created by PhpStorm.
 * User: gok11139
 * Date: 2017/11/20
 * Time: 9:56
 */

define('IN_SYS', true);

require_once '../../framework/bootstrap.inc.php';
require_once IA_ROOT . '/web/common/bootstrap.sys.inc.php';
require_once IA_ROOT . '/wq/common/core/CoreFactory.php';
require_once IA_ROOT . '/wq/service/userManager.php';

$t  = new UserManager();
echo  $t->getAllUser();
