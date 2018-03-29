<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 上午11:49
 */

namespace app\modules\actions\outer\commit;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class CreateParentCodeAction extends BaseAction
{
    private $classUuid;
    private $classMaster;

    protected function formatParams()
    {
        $this->classUuid    = $this->get('classUuid');
        $this->classMaster  = $this->get('memberID');
        Assert::isTrue(!empty($this->classUuid), "网络繁忙,请稍后再试", "班级不能为空");
        Assert::isTrue(!empty($this->classMaster), "网络繁忙,请稍后再试", "班主任不能为空");
    }

    public function execute()
    {

    }
}