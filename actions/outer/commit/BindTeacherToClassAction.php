<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/2
 * Time: 下午3:38
 */

namespace app\modules\actions\outer\commit;
use app\modules\services\outer\commit\BindTeacherToClassService;
use sp_framework\actions\BaseAction;

class BindTeacherToClassAction extends BaseAction
{
    private $teacherID;
    private $classID;
    private $subject;

    protected function formatParams()
    {
        $this->teacherID    = $this->get('memberID');
        $this->classID      = $this->get('classUuid');
        $this->subject      = $this->get('subject');
    }

    public function execute()
    {
        return BindTeacherToClassService::bindTeacherToClass($this->teacherID, $this->classID, $this->subject);
    }
}