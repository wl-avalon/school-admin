<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/28
 * Time: 下午3:43
 */

namespace app\modules\services\outer\commit;
use app\modules\models\beans\ClassStudentRelationBean;
use app\modules\models\ClassStudentRelationModel;
use sp_framework\apis\IdAllocApi;
use sp_framework\components\Assert;

class AddStudentsService
{
    public static function addStudents($class, $studentList){
        $idCount    = count($studentList);
        $idList     = IdAllocApi::batch($idCount)->toArray();
        Assert::isTrue(count($idList) == $idCount, "网络繁忙,请稍后再试", "获取学生ID失败");

        $i = 0;
        $relationBeanList = [];
        foreach($studentList as $student){
            $beanData = [
                'student_uuid'  => $idList[$i++],
                'student_name'  => $student['name'],
                'class_uuid'    => $class,
                'create_time'   => date('Y-m-d H:i:s'),
            ];
            $bean = new ClassStudentRelationBean($beanData);
            $relationBeanList[] = $bean;
        }
        return ClassStudentRelationModel::insertBatchRecord($relationBeanList);
    }
}