<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/30
 * Time: 下午3:03
 */

namespace app\modules\services\inner\query;


use app\modules\models\ClassStudentRelationModel;

class GetStudentByStudentUuidService
{
    public static function getStudentByStudentUuid($studentUuid){
        $studentBean = ClassStudentRelationModel::queryStudentByUuid($studentUuid);
        return [
            'studentUuid'   => $studentUuid,
            'studentName'   => $studentBean->getStudentName(),
            'classUuid'     => $studentBean->getClassUuid(),
        ];
    }
}