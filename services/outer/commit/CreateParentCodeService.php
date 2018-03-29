<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 上午11:55
 */

namespace app\modules\services\outer\commit;


use app\modules\apis\WeiXinApi;
use app\modules\constants\RedisKey;
use sp_framework\util\RedisUtil;

class CreateParentCodeService
{
    public static function createParentCode($classUuid){
        $redis          = RedisUtil::getInstance('redis');
        $accessToken    = $redis->get(RedisKey::WEI_XIN_ACCESS_TOKEN);
        $response       = WeiXinApi::createWxACode('page/mine/mine', $accessToken)->toArray();
        return $response;
    }
}