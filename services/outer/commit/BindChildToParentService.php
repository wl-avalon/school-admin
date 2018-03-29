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
        }
    }

    public static function checkRelationRetry($childUuid, $relation){
        $relationBean = ParentChildRelationModel::queryRelationByChildAndRelation($childUuid, $relation);
        Assert::isTrue(empty($relationBean->getChildUuid()), "他已经被绑定过一位:" . ParentChildRelationBeanConst::$relationMap[$relation] . "了,若要重复绑定关系,请联系班主任");
        Assert::isTrue(!empty($relationBean->getChildUuid()), "网络繁忙,请稍后再试");
    }
}