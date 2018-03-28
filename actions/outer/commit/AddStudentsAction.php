<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/28
 * Time: 下午3:35
 */

namespace app\modules\actions\outer\commit;
use app\modules\services\outer\commit\AddStudentsService;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class AddStudentsAction extends BaseAction
{
    private $class;
    private $studentList;

    protected function formatParams()
    {
        $this->class        = $this->get('class');
        Assert::isTrue(!empty($this->class), "网络繁忙,请稍后再试", "班级不能为空");

        $studentListTemp    = json_decode($this->get('studentList'), true);

        $this->studentList  = [];
        foreach($studentListTemp as $student){
            if(empty($student['name'])){
                continue;
            }
            else{
                $this->studentList[] = [
                    'name'  => $student['name'],
                ];
            }
        }
        Assert::isTrue(!empty($this->studentList), "网络繁忙,请稍后再试", "学生列表不能为空");
    }

    public function execute()
    {
        return AddStudentsService::addStudents($this->class, $this->studentList);
    }
}