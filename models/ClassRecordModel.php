<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/13
 * Time: 下午4:11
 */

namespace app\modules\models;
use app\modules\constants\ClassRecordBeanConst;
use app\modules\models\beans\ClassRecordBean;
use sp_framework\components\SpException;
use sp_framework\constants\SpErrorCodeConst;
use yii\db\Query;

class ClassRecordModel
{
    const TABLE_NAME = "class_record";
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
        return array_map(function($d){return new ClassRecordBean($d);}, $aData);
    }

    public static function convertDbToBean($aData){
        return new ClassRecordBean($aData);
    }

    public static function insertOneRecord(ClassRecordBean $schoolRecordBean){
        $aInsertData = $schoolRecordBean->toArray();
        $aInsertData = array_filter($aInsertData, function($item){return !is_null($item);});
        try{
            $rowNum = self::getDB()->createCommand()->insert(self::TABLE_NAME, $aInsertData)->execute();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, "insert db error, message is:" . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return $rowNum;
    }

    /**
     * @param $classMaster
     * @return ClassRecordBean[]
     * @throws \Exception
     */
    public static function queryAllClassByClassMaster($classMaster){
        $aWhere = [
            'class_master'  => $classMaster,
            'class_status'  => ClassRecordBeanConst::CLASS_STATUS_NORMAL,
        ];

        try{
            $aData = (new Query())->select([])->where($aWhere)->from(self::TABLE_NAME)->createCommand(self::getDB())->queryAll();
        }catch(\Exception $e){
            throw new \Exception('select db error,message is:' . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return self::convertDbToBeans($aData);
    }
}