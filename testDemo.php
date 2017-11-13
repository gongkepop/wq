<?php
/**
 * Created by PhpStorm.
 * User: gok11139
 * Date: 2017/11/13
 * Time: 10:58
 */

require '../framework/bootstrap.inc.php';
require '../web/common/bootstrap.sys.inc.php';
require 'common/core/CoreFactory.php';


load()->model('reply');
load()->classs('wesession');
$hash = $_GPC['hash'];

file_put_contents('test.txt',$_W);