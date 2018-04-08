<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/8
 * Time: 下午6:17
 */

namespace app\modules\services\outer\commit;


use app\modules\apis\WeiXinApi;
use app\modules\constants\RedisKey;
use sp_framework\util\RedisUtil;

class CreateRegisterQRCodeService
{
    public static function createRegisterQRCode(){
        $redis          = RedisUtil::getInstance('redis');
        $accessToken    = $redis->get(RedisKey::WEI_XIN_ACCESS_TOKEN);
        $response       = WeiXinApi::createCodeUnLimit("pages/passport/register/register", '', $accessToken)->toArray();
        header( "Content-type: image/jpeg");
        echo $response;
        exit;
    }
}