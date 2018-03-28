<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/28
 * Time: 下午6:58
 */

namespace app\modules\services\outer\query;


use app\modules\constants\ClassRecordBeanConst;
use app\modules\models\ClassRecordModel;

class GetMyAllClassService
{

    public static function getMyAllClass($classMaster){
        $classRecordList    = ClassRecordModel::queryAllClassByClassMaster($classMaster);

        $result = [];
        foreach($classRecordList as $classRecordBean){
            $result[] = [
                'classUuid'     => $classRecordBean->getUuid(),
                'classNowGrade' => ClassRecordBeanConst::$gradeMap[$classRecordBean->getClassGrade()],
                'className'     => $classRecordBean->getClassName(),
            ];
        }
        return $result;
    }
}