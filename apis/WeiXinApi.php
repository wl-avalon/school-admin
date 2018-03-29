<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 下午12:28
 */

namespace app\modules\apis;
use sp_framework\apis\ApiContext;

class WeiXinApi
{
    public static function createCodeUnLimit($page, $params, $accessToken){
        $params = [
            'scene'         => base64_encode($params),
            'page'          => $page,
            'accessToken'   => $accessToken,
        ];
        return ApiContext::get('weixin', 'createCodeUnLimit', $params);
    }
}