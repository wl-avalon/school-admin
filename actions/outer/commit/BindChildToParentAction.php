<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 下午7:25
 */

namespace app\modules\actions\outer\commit;
use app\modules\services\outer\commit\BindChildToParentService;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class BindChildToParentAction extends BaseAction
{
    private $childUuid;
    private $parentUuid;
    private $relation;

    protected function formatParams()
    {
        $this->childUuid    = $this->get('childUuid');
        $this->parentUuid   = $this->get('memberID');
        $this->relation     = $this->get('relation');
        Assert::isTrue(!empty($this->childUuid), "网络繁忙,请稍后再试", "孩子ID不能为空");
        Assert::isTrue(!empty($this->parentUuid), "网络繁忙,请稍后再试", "父母ID不能为空");
        Assert::isTrue(!empty($this->relation), "网络繁忙,请稍后再试", "亲属关系不能为空");
    }

    public function execute()
    {
        BindChildToParentService::bindChildToParent($this->childUuid, $this->parentUuid, $this->relation);
        return [];
    }
}