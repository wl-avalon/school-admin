<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/2/26
 * Time: 下午9:10
 */

namespace app\modules\actions\query;
use app\modules\services\outer\query\GetRandomQuestionByConditionService;
use sp_framework\actions\BaseAction;

class GetRandomQuestionByConditionAction extends BaseAction
{
    private $grade;
    private $subject;
    private $version;
    private $module;
    private $nodeID;

    protected function formatParams()
    {
        $this->grade    = intval($this->get('grade'));
        $this->subject  = intval($this->get('subject'));
        $this->version  = intval($this->get('version'));
        $this->module   = intval($this->get('module'));
        $this->nodeID   = intval($this->get('nodeID'));
    }

    public function execute(){
        $questionList = GetRandomQuestionByConditionService::getRandomQuestionByCondition($this->grade, $this->subject,
            $this->version, $this->module, $this->nodeID);
        return $questionList;
    }
}