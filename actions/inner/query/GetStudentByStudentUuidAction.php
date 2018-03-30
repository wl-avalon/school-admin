<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/30
 * Time: 下午3:01
 */

namespace app\modules\actions\inner\query;
use app\modules\services\inner\query\GetStudentByStudentUuidService;
use sp_framework\actions\BaseAction;

class GetStudentByStudentUuidAction extends BaseAction
{
    private $studentUuid;

    protected function formatParams()
    {
        $this->studentUuid  = $this->get('studentUuid');
    }

    public function execute()
    {
        return GetStudentByStudentUuidService::getStudentByStudentUuid($this->studentUuid);
    }
}