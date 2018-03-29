<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 下午7:23
 */

namespace app\modules\models;


use app\modules\models\beans\ParentChildRelationBean;
use sp_framework\components\SpException;
use sp_framework\constants\SpErrorCodeConst;
use yii\db\Query;

class ParentChildRelationModel
{
    const TABLE_NAME = "parent_child_relation";
    private static $db_school;

    public static function getDB(){
        if(is_null(self::$db_school)){
            self::$db_school = \Yii::$app->db_school_admin;
        }
        return self::$db_school;
    }

    public static function convertDbToBeans($aData){
        if(!is_array($aData) || empty($aData)) {
            return [];
        }
        return array_map(function($d){return new ParentChildRelationBean($d);}, $aData);
    }

    public static function convertDbToBean($aData){
        return new ParentChildRelationBean($aData);
    }

    /**
     * @param ParentChildRelationBean $schoolRecordBean
     * @return mixed
     * @throws SpException
     */
    public static function insertOneRecord(ParentChildRelationBean $schoolRecordBean){
        $aInsertData = $schoolRecordBean->toArray();
        $aInsertData = array_filter($aInsertData, function($item){return !is_null($item);});
        try{
            $rowNum = self::getDB()->createCommand()->insert(self::TABLE_NAME, $aInsertData)->execute();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, "insert db error, message is:" . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return $rowNum;
    }

//    /**
//     * @param ParentChildRelationBean[] $homeworkItemList
//     * @return mixed
//     * @throws SpException
//     */
//    public static function insertBatchRecord($homeworkItemList){
//        $insertDataList = [];
//        $columnKey      = [];
//        foreach($homeworkItemList as $homeworkItemBean){
//            $aInsertData        = $homeworkItemBean->toArray();
//            $aInsertData        = array_filter($aInsertData, function($item){return !is_null($item);});
//            $insertDataList[]   = array_values($aInsertData);
//            $columnKey          = array_keys($aInsertData);
//        }
//
//        try{
//            $rowNum = self::getDb()->createCommand()->batchInsert(self::TABLE_NAME, $columnKey, $insertDataList)->execute();
//        }catch(\Exception $e){
//            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, "insert db error, message is:" . $e->getMessage(), "网络繁忙,请稍后再试");
//        }
//        return $rowNum;
//    }


    /**
     * @param $childUuid
     * @param $relation
     * @return ParentChildRelationBean
     * @throws SpException
     */
    public static function queryRelationByChildAndRelation($childUuid, $relation){
        $aWhere = [
            'child_uuid'    => $childUuid,
            'relation'      => $relation,
        ];

        try{
            $aData = (new Query())->select([])->where($aWhere)->from(self::TABLE_NAME)->createCommand(self::getDB())->queryOne();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, 'select db error,message is:' . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return self::convertDbToBean($aData);
    }

    /**
     * @param $parentUuid
     * @param $childUuid
     * @return ParentChildRelationBean
     * @throws SpException
     */
    public static function queryParentByChildAndRelation($parentUuid, $childUuid){
        $aWhere = [
            'parent_uuid'   => $parentUuid,
            'child_uuid'    => $childUuid,
        ];

        try{
            $aData = (new Query())->select([])->where($aWhere)->from(self::TABLE_NAME)->createCommand(self::getDB())->queryOne();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, 'select db error,message is:' . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return self::convertDbToBean($aData);
    }
}