<?php
/**
 * Created by PhpStorm.
 * User: gk
 * Date: 2017/11/23
 * Time: 10:05
 */
define('IN_SYS', true);
require_once '../../framework/bootstrap.inc.php';

require IA_ROOT . '/web/common/bootstrap.sys.inc.php';

require_once IA_ROOT . '/wq/common/core/CoreFactory.php';

if (!isset($_W['uid']) || empty($_W['uid'])) {
    echo json_encode(['code' => 0]);
    $redirect = 'http://' . $_SERVER['SERVER_NAME'] . '/web/index.php?c=user&a=login&';
    header('Location: ' . $redirect);
} else {
    echo json_encode([
        'username' => $_W['username'],
        'code' => 1
    ]);
}

