<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/8
 * Time: 下午6:16
 */

namespace app\modules\actions\outer\commit;
use sp_framework\actions\BaseAction;

class CreateRegisterQRCodeAction extends BaseAction
{

    protected function formatParams()
    {
    }

    public function execute()
    {
        CreateBindTeacherClassQRCodeService::createBindTeacherClassQRCode($this->classUuid);
    }
}