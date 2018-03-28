<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/13
 * Time: 上午11:11
 */

namespace app\modules\actions\outer\commit;
use app\modules\services\outer\commit\AddClassService;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class AddClassAction extends BaseAction
{
    private $schoolUuid;
    private $classMaster;
    private $className;
    private $nowGrade;

    protected function formatParams()
    {
        $this->schoolUuid   = $this->get('schoolUuid', '839816122361442312');
        $this->className    = $this->get('className');
        $this->nowGrade     = $this->get('nowGrade');
        $this->classMaster  = $this->get('memberID');
        Assert::isTrue(!empty($this->schoolUuid), "学校ID不能为空");
        Assert::isTrue(!empty($this->className), "班级名称不能为空");
        Assert::isTrue(!empty($this->nowGrade), "班级当前年级不能为空");
        Assert::isTrue(in_array($this->nowGrade, [15,16,17]), "暂不支持该年级");
    }

    public function execute()
    {
        $addResult = AddClassService::addClass($this->schoolUuid, $this->className, $this->nowGrade, $this->classMaster);
        return $addResult;
    }
}