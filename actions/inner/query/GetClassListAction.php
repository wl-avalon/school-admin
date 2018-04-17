<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/17
 * Time: 上午11:41
 */

namespace app\modules\actions\inner\query;
use app\modules\services\inner\query\GetClassListService;
use sp_framework\actions\BaseAction;

class GetClassListAction extends BaseAction
{
    private $pageNo;
    private $pageSize;

    public function formatParams()
    {
        $this->pageNo   = $this->get('pageNo', 0);
        $this->pageSize = $this->get('pageSize', 20);
    }

    public function execute()
    {
        return GetClassListService::getClassList($this->pageNo, $this->pageSize);
    }
}