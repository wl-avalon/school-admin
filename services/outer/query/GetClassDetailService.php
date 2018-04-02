<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/2
 * Time: 下午8:43
 */

namespace app\modules\services\outer\query;
use app\modules\constants\ClassRecordBeanConst;
use app\modules\models\ClassRecordModel;
use sp_framework\components\Assert;

class GetClassDetailService
{
    public static function getClassDetail($classUuid){
        $classBean = ClassRecordModel::queryOneRecordByUuid($classUuid);
        Assert::isTrue(!empty($classBean->getUuid()), "网络繁忙,请稍后再试", "班级不存在");
        return [
            'className'     => $classBean->getClassName(),
            'classNowGrade' => ClassRecordBeanConst::$gradeMap[$classBean->getClassGrade()],
        ];
    }
}