<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/28
 * Time: 下午6:57
 */

namespace app\modules\actions\outer\query;
use app\modules\services\outer\query\GetMyAllClassService;
use sp_framework\actions\BaseAction;

class GetMyAllClassAction extends BaseAction
{
    private $classMaster;

    protected function formatParams()
    {
        $this->classMaster  = $this->get('memberID');
    }

    public function execute()
    {
        return GetMyAllClassService::getMyAllClass($this->classMaster);
    }
}