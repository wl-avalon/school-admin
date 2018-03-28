<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/28
 * Time: 下午7:46
 */

namespace app\modules\actions\outer\query;
use app\modules\services\outer\query\GetStudentOfClassService;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class GetStudentOfClassAction extends BaseAction
{
    private $classUuid;

    protected function formatParams()
    {
        $this->classUuid    = $this->get('classUuid');
        Assert::isTrue(!empty($this->classUuid), "网络繁忙,请稍后再试", "班级ID不能为空");
    }

    public function execute()
    {
        return GetStudentOfClassService::getStudentOfClass($this->classUuid);
    }
}