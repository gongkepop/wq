<?php
/**
 * Created by PhpStorm.
 * User: Merlin
 * Date: 2017/10/28
 * Time: 16:58
 */


require '../framework/bootstrap.inc.php';
require '../web/common/bootstrap.sys.inc.php';
require 'common/core/CoreFactory.php';


$list = [];


$where = '';

$time = time();

$starttime = empty($_GPC['starttime']) ? $starttime = date('Y-m-d', $time) . ' 00:00:00' : $_GPC['starttime'];

$endtime = empty($_GPC['endtime']) ? $endtime = date('Y-m-d', $time) . ' 23:59:59' : $_GPC['endtime'];


$where = 'where r.createtime >= :starttime AND r.createtime < :endtime';

$params[':starttime'] = strtotime($starttime);

$params[':endtime'] = strtotime($endtime);


$where .= " AND r.credittype =  'credit2'";


$sql = 'SELECT `num` FROM ' . tablename('mc_credits_record') . " WHERE  $where";




$sql = 'SELECT * FROM ' . tablename('mc_credits_record') . ' r left join ' .tablename('mc_members').
    ' u on r.uid = u.uid '
    . "{$where} ORDER BY r.createtime DESC ";
//echo $sql;die;
$data = pdo_fetchall($sql, $params);


echo CoreFactory::formatSuccess($data);