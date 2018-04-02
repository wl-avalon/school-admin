<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/2
 * Time: 下午5:03
 */

namespace app\modules\actions\outer\commit;
use app\modules\services\outer\commit\CreateBindTeacherClassQRCodeService;
use sp_framework\actions\BaseAction;

class CreateBindTeacherClassQRCodeAction extends BaseAction
{
    private $classUuid;

    protected function formatParams()
    {
        $this->classUuid    = $this->get('classUuid');
    }

    public function execute()
    {
        CreateBindTeacherClassQRCodeService::createBindTeacherClassQRCode($this->classUuid);
    }
}