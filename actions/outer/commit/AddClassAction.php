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

class AddClassAction extends BaseAction
{
    private $schoolUuid;
    private $className;
    private $nowGrade;
    private $createTime;
    private $graduateTime;

    protected function formatParams()
    {
        $this->schoolUuid   = $this->get('schoolUuid');
        $this->className    = $this->get('className');
        $this->nowGrade     = $this->get('nowGrade');
        $this->createTime   = $this->get('createTime');
        $this->graduateTime = $this->get('graduateTime');
    }

    public function execute()
    {
        AddClassService::addClass($this->schoolUuid, $this->className, $this->nowGrade, $this->createTime, $this->graduateTime);
    }
}