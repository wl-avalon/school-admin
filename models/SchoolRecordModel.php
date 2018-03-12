<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/12
 * Time: 下午6:19
 */

namespace app\modules\models;
use app\modules\models\beans\SchoolRecordBean;
use sp_framework\components\SpException;
use sp_framework\constants\SpErrorCodeConst;

class SchoolRecordModel
{
    const TABLE_NAME = "school_record";
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
        return array_map(function($d){return new SchoolRecordBean($d);}, $aData);
    }

    public static function convertDbToBean($aData){
        return new SchoolRecordBean($aData);
    }

    public static function insertOneRecord(SchoolRecordBean $schoolRecordBean){
        $aInsertData = $schoolRecordBean->toArray();
        $aInsertData = array_filter($aInsertData, function($item){return !is_null($item);});
        try{
            $rowNum = self::getDB()->createCommand()->insert(self::TABLE_NAME, $aInsertData)->execute();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, "insert db error, message is:" . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return $rowNum;
    }
}