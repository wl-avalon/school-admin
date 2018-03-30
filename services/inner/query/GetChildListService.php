<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 下午8:18
 */

namespace app\modules\services\inner\query;
use app\modules\models\ClassStudentRelationModel;
use app\modules\models\ParentChildRelationModel;

class GetChildListService
{
    public static function getChildList($parentUuid){
        $relationBeanList = ParentChildRelationModel::queryChildListByParentUuid($parentUuid);

        $childUuidList = [];
        foreach($relationBeanList as $relationBean){
            $childUuidList[] = $relationBean->getChildUuid();
        }

        $childInfoList = ClassStudentRelationModel::queryStudentListByUuidList($childUuidList);

        $result = [];
        foreach($childInfoList as $childInfoBean){
            $result[] = [
                'childUuid' => $childInfoBean->getStudentUuid(),
                'childName' => $childInfoBean->getStudentName(),
                'classUUid' => $childInfoBean->getClassUuid(),
            ];
        }
        return ['childList' => $result];
    }
}