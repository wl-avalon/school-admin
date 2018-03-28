<?php
/**
 * Create by script:createSqlBean.php
 * Date is:2018-03-28
 * Time is:07:34:07
 */

namespace app\modules\models\beans;

/**
 * Comment: 家长学生关系表
 * Engine: InnoDB
 * Default Charset: utf8
 * Class ClassStudentRelationBean
 * Package namespace app\modules\models\beans
 */
class ClassStudentRelationBean
{
    private $id             = null; //BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID'
    private $student_uuid   = null; //VARCHAR(100) DEFAULT '' COMMENT '学生ID'
    private $student_name   = null; //VARCHAR(100) DEFAULT '' COMMENT '学生姓名'
    private $class_uuid     = null; //VARCHAR(100) DEFAULT '' COMMENT '班级ID'
    private $create_time    = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间'
    private $update_time    = null; //TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
    
    public function __construct($input){
        $this->id               = $input['id']              ?? null;
        $this->student_uuid     = $input['student_uuid']    ?? null;
        $this->student_name     = $input['student_name']    ?? null;
        $this->class_uuid       = $input['class_uuid']      ?? null;
        $this->create_time      = $input['create_time']     ?? null;
        $this->update_time      = $input['update_time']     ?? null;
    }
    
    public function toArray(){
        return [
            'id'            => $this->id,
            'student_uuid'  => $this->student_uuid,
            'student_name'  => $this->student_name,
            'class_uuid'    => $this->class_uuid,
            'create_time'   => $this->create_time,
            'update_time'   => $this->update_time,
        ];
    }
    
    public function getID()             {return $this->id;}
    public function getStudentUuid()    {return $this->student_uuid;}
    public function getStudentName()    {return $this->student_name;}
    public function getClassUuid()      {return $this->class_uuid;}
    public function getCreateTime()     {return $this->create_time;}
    public function getUpdateTime()     {return $this->update_time;}
    
    public function setID($id)                      {$this->id              = $id;}
    public function setStudentUuid($student_uuid)   {$this->student_uuid    = $student_uuid;}
    public function setStudentName($student_name)   {$this->student_name    = $student_name;}
    public function setClassUuid($class_uuid)       {$this->class_uuid      = $class_uuid;}
    public function setCreateTime($create_time)     {$this->create_time     = $create_time;}
    public function setUpdateTime($update_time)     {$this->update_time     = $update_time;}
}
