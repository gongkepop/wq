<?php
/**
 * Created by PhpStorm.
 * User: gok11139
 * Date: 2017/11/1
 * Time: 17:07
 */

require_once 'common/core/CurlBase.php';
require_once 'common/core/CoreFactory.php';

class AddToHaiQi
{

    const HAI_QI_ADD_USER_URL = 'http://weiqing.liansuosoft.com/syn.ashx';
    const TEST_URL = 'http://t.com/-WeEngineToFeng/Sync/testDemo.php';
    private $_curl;

    public function __construct()
    {
        $this->_curl = new CurlBase();
    }

//http://weiqing.liansuosoft.com/syn.ashx?m=addcard&CardID=13911111124&CardName=13911111124&PassWord=1742ef4b4b87e617200858474f5240b6&CompId=743&ShopId=692&groupId=1&mobile=13911111124&realname=test21&score=10&money=10
    public function addUser($params)
    {
        $params =   [
            'm' => 'addcard',
            'CardID' => $params['mobile'],
            'CardName' => $params['mobile'],
            'PassWord' => $params['password'],
            'CompId' => CoreFactory::COMP_ID,
            'ShopId' => CoreFactory::SHOP_ID,
            'groupId' => '1',
            'mobile' => $params['mobile'],
            'realname' => $params['realName'],
            'score' => $params['score'],
            'money' => $params['amount']
        ];
        $this->_curl->get(self::HAI_QI_ADD_USER_URL, $params);
    }

}