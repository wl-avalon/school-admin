<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/28
 * Time: 下午7:47
 */

namespace app\modules\services\outer\query;


use app\modules\models\ClassStudentRelationModel;

class GetStudentOfClassService
{
    public static function getStudentOfClass($classUuid){
        $relationBeanList = ClassStudentRelationModel::queryAllClassByClassMaster($classUuid);

        $result = [];
        foreach($relationBeanList as $relationBean){
            $result[] = [
                'studentUuid'   => $relationBean->getStudentUuid(),
                'studentName'   => $relationBean->getStudentName(),
            ];
        }
        return [
            'studentList'   => $result,
        ];
    }
}