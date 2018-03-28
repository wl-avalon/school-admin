<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/13
 * Time: 上午11:17
 */

namespace app\modules\services\outer\commit;
use app\modules\apis\IDAllocApi;
use app\modules\constants\ClassRecordBeanConst;
use app\modules\models\beans\ClassRecordBean;
use app\modules\models\ClassRecordModel;
use sp_framework\components\Assert;

class AddClassService
{
    public static function addClass($schoolUuid, $className, $nowGrade, $classMaster){
        $idResponse = IDAllocApi::nextId();
        Assert::isTrue(!empty($idResponse['data']['nextId']), "网络繁忙,请稍后再试", "获取classUuid失败");
        $classUuid  = $idResponse['data']['nextId'];

        $secondHalfYear     = time() > strtotime(date('Y-07-01'));
        $classYearsOld      = ($nowGrade - ClassRecordBeanConst::GRADE_HIGH_SCHOOL_FIRST) ;
        $classYearsOld      = $secondHalfYear ? $classYearsOld : $classYearsOld + 1;
        $waitGraduateYears  = ClassRecordBeanConst::GRADE_HIGH_SCHOOL_THIRD - $nowGrade;
        $waitGraduateYears  = $secondHalfYear ? $waitGraduateYears + 1 : $waitGraduateYears;

        $classRecordBeanData = [
            'uuid'                  => $classUuid,
            'school_uuid'           => $schoolUuid,
            'class_name'            => $className,
            'class_grade'           => $nowGrade,
            'class_create_time'     => date('Y-09-01 00:00:00', strtotime("-{$classYearsOld} year")),
            'graduate_time'         => date('Y-06-01 00:00:00', strtotime("+{$waitGraduateYears} year")),
            'class_status'          => ClassRecordBeanConst::CLASS_STATUS_NORMAL,
            'class_master'          => $classMaster,
            'create_time'           => date('Y-m-d H:i:s'),
        ];
        $classRecordBean = new ClassRecordBean($classRecordBeanData);
        ClassRecordModel::insertOneRecord($classRecordBean);
        return [];
    }
}