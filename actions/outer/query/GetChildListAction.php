<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 下午8:17
 */

namespace app\modules\actions\outer\query;
use app\modules\services\outer\query\GetChildListService;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class GetChildListAction extends BaseAction
{
    private $parentUuid;

    protected function formatParams()
    {
        $this->parentUuid   = $this->get('memberID');
        Assert::isTrue(!empty($this->parentUuid), "网络繁忙,请稍后再试", "用户ID不能为空");
    }

    public function execute()
    {
        return GetChildListService::getChildList($this->parentUuid);
    }
}