<?php
/**
 * Created by PhpStorm.
 * User: Merlin
 * Date: 2017/11/19
 * Time: 21:00
 */
require '../framework/bootstrap.inc.php';
require IA_ROOT . '/web/common/bootstrap.sys.inc.php';
require IA_ROOT . '/wq/common/core/CoreFactory.php';

CoreFactory::urlGo('views/User.html');