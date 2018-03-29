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
            'scene'         => $params,
            'page'          => $page,
            'access_token'   => $accessToken,
        ];
        return ApiContext::get('weixin', 'createCodeUnLimit', $params);
    }

    public static function createWxACode($path, $accessToken){
        $params = [
            'path'          => $path,
            'access_token'  => $accessToken,
        ];
        return ApiContext::get('weixin', 'createWxACode', $params);
    }

    public static function createWxAQrCode($path, $accessToken){
        $params = [
            'path'          => $path,
            'access_token'  => $accessToken,
        ];
        return ApiContext::get('weixin', 'createWxAQrCode', $params);
    }
}