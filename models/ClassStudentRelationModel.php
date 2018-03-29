<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/28
 * Time: 下午3:52
 */

namespace app\modules\models;
use app\modules\models\beans\ClassStudentRelationBean;
use sp_framework\components\SpException;
use sp_framework\constants\SpErrorCodeConst;
use yii\db\Query;

class ClassStudentRelationModel
{
    const TABLE_NAME = "class_student_relation";
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
        return array_map(function($d){return new ClassStudentRelationBean($d);}, $aData);
    }

    public static function convertDbToBean($aData){
        return new ClassStudentRelationBean($aData);
    }

    public static function insertOneRecord(ClassStudentRelationBean $schoolRecordBean){
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
     * @param ClassStudentRelationBean[] $homeworkItemList
     * @return mixed
     * @throws SpException
     */
    public static function insertBatchRecord($homeworkItemList){
        $insertDataList = [];
        $columnKey      = [];
        foreach($homeworkItemList as $homeworkItemBean){
            $aInsertData        = $homeworkItemBean->toArray();
            $aInsertData        = array_filter($aInsertData, function($item){return !is_null($item);});
            $insertDataList[]   = array_values($aInsertData);
            $columnKey          = array_keys($aInsertData);
        }

        try{
            $rowNum = self::getDb()->createCommand()->batchInsert(self::TABLE_NAME, $columnKey, $insertDataList)->execute();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, "insert db error, message is:" . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return $rowNum;
    }

    /**
     * @param $classUuid
     * @return ClassStudentRelationBean[]
     * @throws \Exception
     */
    public static function queryAllClassByClassMaster($classUuid){
        $aWhere = [
            'class_uuid'    => $classUuid,
        ];

        try{
            $aData = (new Query())->select([])->where($aWhere)->from(self::TABLE_NAME)->createCommand(self::getDB())->queryAll();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, 'select db error,message is:' . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return self::convertDbToBeans($aData);
    }

    /**
     * @param $studentUuidList
     * @return ClassStudentRelationBean[]
     * @throws \Exception
     */
    public static function queryStudentListByUuidList($studentUuidList){
        $aWhere = [
            'student_uuid'    => $studentUuidList,
        ];

        try{
            $aData = (new Query())->select([])->where($aWhere)->from(self::TABLE_NAME)->createCommand(self::getDB())->queryAll();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, 'select db error,message is:' . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return self::convertDbToBeans($aData);
    }
}