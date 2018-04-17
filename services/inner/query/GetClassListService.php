<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/17
 * Time: 下午3:04
 */

namespace app\modules\services\inner\query;


use app\modules\models\ClassRecordModel;

class GetClassListService
{
    public static function getClassList($pageNo, $pageSize){
        $classRecordList = ClassRecordModel::queryClassListCutPage($pageNo, $pageSize);

        $result = [];
        foreach($classRecordList as $classRecordBean){
            $result[] = [
                'classUuid'     => $classRecordBean->getUuid(),
                'masterUuid'    => $classRecordBean->getClassMaster(),
                'schoolUuid'    => $classRecordBean->getSchoolUuid(),
            ];
        }
        return [
            'classList' => $result,
        ];
    }
}