<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/2
 * Time: 下午8:41
 */

namespace app\modules\actions\outer\query;
use app\modules\services\outer\query\GetClassDetailService;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class GetClassDetailAction extends BaseAction
{
    private $classUuid;

    protected function formatParams()
    {
        $this->classUuid    = $this->get('classUuid');
        Assert::isTrue(!empty($this->classUuid), "网络繁忙,请稍后再试", "班级ID不能为空");
    }

    public function execute()
    {
        return GetClassDetailService::getClassDetail($this->classUuid);
    }
}