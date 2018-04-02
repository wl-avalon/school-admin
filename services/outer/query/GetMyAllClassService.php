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
use app\modules\models\ClassTeacherRelationModel;

class GetMyAllClassService
{

    public static function getMyAllClass($memberID){
        $classRecordList        = ClassRecordModel::queryAllClassByClassMaster($memberID);
        $myClassList = [];
        foreach($classRecordList as $classRecordBean){
            $myClassList[] = [
                'classUuid'     => $classRecordBean->getUuid(),
                'classNowGrade' => ClassRecordBeanConst::$gradeMap[$classRecordBean->getClassGrade()],
                'className'     => $classRecordBean->getClassName(),
            ];
        }

        $bindClassRecordList    = ClassTeacherRelationModel::queryClassListByTeacher($memberID);
        $bindClassUuidList      = array_column($bindClassRecordList, 'class_uuid');
        $myBindClassList        = [];
        if(!empty($bindClassUuidList)){
            $bindClassInfoList      = ClassRecordModel::queryOneRecordByUuidList($bindClassUuidList);
            foreach($bindClassInfoList as $bindClassBean){
                $myBindClassList[] = [
                    'classUuid'     => $bindClassBean->getUuid(),
                    'classNowGrade' => ClassRecordBeanConst::$gradeMap[$bindClassBean->getClassGrade()],
                    'className'     => $bindClassBean->getClassName(),
                ];
            }
        }

        return [
            'classList'     => $myClassList,
            'bindClassList' => $myBindClassList,
        ];
    }
}