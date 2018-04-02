<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/2
 * Time: 下午5:05
 */

namespace app\modules\services\outer\commit;
use app\modules\apis\WeiXinApi;
use app\modules\constants\RedisKey;
use sp_framework\util\RedisUtil;

class CreateBindTeacherClassQRCodeService
{
    public static function createBindTeacherClassQRCode($classUuid){
        $redis          = RedisUtil::getInstance('redis');
        $accessToken    = $redis->get(RedisKey::WEI_XIN_ACCESS_TOKEN);
//        $response       = WeiXinApi::createWxACode("pages/mine/bindTeacher/bindTeacher?classUuid={$classUuid}", $accessToken)->toArray();
        $response       = WeiXinApi::createCodeUnLimit("pages/mine/bindTeacher/bindTeacher", $classUuid, $accessToken)->toArray();
        header( "Content-type: image/jpeg");
        echo $response;
        exit;
    }
}