<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 下午7:28
 */

namespace app\modules\services\outer\commit;


use app\modules\apis\IDAllocApi;
use app\modules\constants\ParentChildRelationBeanConst;
use app\modules\models\beans\ParentChildRelationBean;
use app\modules\models\ParentChildRelationModel;
use sp_framework\components\Assert;

class BindChildToParentService
{
    public static function bindChildToParent($childUuid, $parentUuid, $relation){
        $relationBeanData = [
            'child_uuid'    => $childUuid,
            'parent_uuid'   => $parentUuid,
            'relation'      => $relation,
            'create_time'   => date('Y-m-d H:i:s'),
        ];
        $relationBean = new ParentChildRelationBean($relationBeanData);
        try{
            ParentChildRelationModel::insertOneRecord($relationBean);
        }catch(\Exception $e){
            self::checkRelationRetry($childUuid, $relation);
            self::checkParentUuidRetry($parentUuid, $childUuid);
        }
    }

    public static function checkRelationRetry($childUuid, $relation){
        $relationBean = ParentChildRelationModel::queryRelationByChildAndRelation($childUuid, $relation);
        Assert::isTrue(empty($relationBean->getChildUuid()), "请勿重复绑定,若要重复绑定关系,请联系班主任");
        Assert::isTrue(!empty($relationBean->getChildUuid()), "网络繁忙,请稍后再试");
    }

    public static function checkParentUuidRetry($parentUuid, $childUuid){
        $relationBean = ParentChildRelationModel::queryParentByChildAndRelation($parentUuid, $childUuid);
        Assert::isTrue(empty($relationBean->getChildUuid()), "请勿重复绑定,若要重复绑定关系,请联系班主任");
        Assert::isTrue(!empty($relationBean->getChildUuid()), "网络繁忙,请稍后再试");
    }
}