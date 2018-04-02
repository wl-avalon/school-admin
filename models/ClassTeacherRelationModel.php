<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/4/2
 * Time: 下午4:06
 */

namespace app\modules\models;


use app\modules\models\beans\ClassTeacherRelationBean;
use sp_framework\components\SpException;
use sp_framework\constants\SpErrorCodeConst;
use yii\db\Query;

class ClassTeacherRelationModel
{
    const TABLE_NAME = "class_teacher_relation";
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
        return array_map(function($d){return new ClassTeacherRelationBean($d);}, $aData);
    }

    public static function convertDbToBean($aData){
        return new ClassTeacherRelationBean($aData);
    }

    /**
     * @param ClassTeacherRelationBean $schoolRecordBean
     * @return mixed
     * @throws SpException
     */
    public static function insertOneRecord(ClassTeacherRelationBean $schoolRecordBean){
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
     * @param $teacherUuid
     * @param $classUuid
     * @param $subject
     * @return ClassTeacherRelationBean
     * @throws SpException
     */
    public static function queryRelationByChildAndRelation($teacherUuid, $classUuid, $subject){
        $aWhere = [
            'class_uuid'    => $classUuid,
            'teacher_uuid'  => $teacherUuid,
            'subject'       => $subject
        ];

        try{
            $aData = (new Query())->select([])->where($aWhere)->from(self::TABLE_NAME)->createCommand(self::getDB())->queryOne();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, 'select db error,message is:' . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return self::convertDbToBean($aData);
    }
}