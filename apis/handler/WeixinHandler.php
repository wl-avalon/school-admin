<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午4:36
 */

namespace app\modules\apis\handler;
use sp_framework\apis\handler\DefaultHandler;
use sp_framework\apis\models\Response;
use sp_framework\constants\SpErrorCodeConst;

class WeixinHandler extends DefaultHandler
{
    public function getParams() {
        return json_encode($this->params);
    }

    public function getUrl()
    {
        $url = parent::getUrl();
        $url .= '?access_token=' . $this->params['access_token'];
        unset($this->params['access_token']);
        return $url;
    }

    public function handleResponse(Response &$response, $arrJson){
        $decode = json_decode($arrJson, true);
        if(isset($decode['errcode'])){
            $response->setReturnCode($decode['errcode']);
            $response->setReturnUserMessage($decode['errmsg']);
            $response->setReturnMessage($decode['errmsg']);
        }else{
            $response->setReturnCode(SpErrorCodeConst::SUCCESSFUL);
            $response->setReturnUserMessage("");
            $response->setReturnMessage("");
            $response->setData($arrJson);
        }
        return $response;
    }

    public function getDeserializer(){
        return static function($data){
            return $data;
        };
    }
}