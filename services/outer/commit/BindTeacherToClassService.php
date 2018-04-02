<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/2
 * Time: 下午3:41
 */

namespace app\modules\services\outer\commit;
use app\modules\apis\IDAllocApi;
use app\modules\models\beans\ClassTeacherRelationBean;
use app\modules\models\ClassTeacherRelationModel;
use sp_framework\components\Assert;

class BindTeacherToClassService
{
    public static function bindTeacherToClass($teacherUuid, $classUuid, $subject){
        $idResponse = IDAllocApi::nextId();
        Assert::isTrue(!empty($idResponse['data']['nextId']), "网络繁忙,请稍后再试", "获取classUuid失败");
        $relationUuid  = $idResponse['data']['nextId'];
        $relationBeanData = [
            'uuid'          => $relationUuid,
            'teacher_uuid'  => $teacherUuid,
            'class_uuid'    => $classUuid,
            'subject'       => $subject,
            'create_time'   => date('Y-m-d H:i:s'),
        ];
        $relationBean = new ClassTeacherRelationBean($relationBeanData);
        try{
            ClassTeacherRelationModel::insertOneRecord($relationBean);
        }catch(\Exception $e){
            self::checkBindRetry($teacherUuid, $classUuid, $subject);
        }
        return [];
    }

    public static function checkBindRetry($teacherUuid, $classUuid, $subject){
        $relationBean = ClassTeacherRelationModel::queryRelationByChildAndRelation($teacherUuid, $classUuid, $subject);
        Assert::isTrue(!empty($relationBean), "网络繁忙,请稍后再试");
    }
}