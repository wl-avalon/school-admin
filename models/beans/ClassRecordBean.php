<?php
/**
 * Create by script:createSqlBean.php
 * Date is:2018-03-12
 * Time is:03:53:39
 */

namespace app\modules\models\beans;

/**
 * Comment: 班级记录表
 * Engine: InnoDB
 * Default Charset: utf8
 * Class ClassRecordBean
 * Package namespace app\modules\models\beans
 */
class ClassRecordBean
{
    private $id                 = null; //BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID'
    private $uuid               = null; //VARCHAR(100) DEFAULT '' COMMENT '班级唯一ID'
    private $school_uuid        = null; //VARCHAR(200) DEFAULT '' COMMENT '所属学校ID'
    private $class_name         = null; //VARCHAR(10) DEFAULT '' COMMENT '班级名称',
    private $class_create_grade = null; //TINYINT(4) DEFAULT 0 COMMENT '班级建立时年级',
    private $class_create_time  = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '班级建立时间'
    private $class_grade        = null; //TINYINT(4) DEFAULT 0 COMMENT '班级当前年级',
    private $graduate_time      = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '预期毕业期限',
    private $class_status       = null; //TINYINT(4) DEFAULT 0 COMMENT '班级状态 0:预创建 1:正常 2:已毕业 3:毕业后保留'
    private $class_master       = null; //VARCHAR(500) DEFAULT '' COMMENT '班主任ID,多个用户以逗号分隔,最多5个'
    private $create_time        = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间'
    private $update_time        = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间'
    
    public function __construct($input){
        $this->id                   = $input['id']                  ?? null;
        $this->uuid                 = $input['uuid']                ?? null;
        $this->school_uuid          = $input['school_uuid']         ?? null;
        $this->class_name           = $input['class_name']          ?? null;
        $this->class_create_grade   = $input['class_create_grade']  ?? null;
        $this->class_create_time    = $input['class_create_time']   ?? null;
        $this->class_grade          = $input['class_grade']         ?? null;
        $this->graduate_time        = $input['graduate_time']       ?? null;
        $this->class_status         = $input['class_status']        ?? null;
        $this->class_master         = $input['class_master']        ?? null;
        $this->create_time          = $input['create_time']         ?? null;
        $this->update_time          = $input['update_time']         ?? null;
    }
    
    public function toArray(){
        return [
            'id'                    => $this->id,
            'uuid'                  => $this->uuid,
            'school_uuid'           => $this->school_uuid,
            'class_name'            => $this->class_name,
            'class_create_grade'    => $this->class_create_grade,
            'class_create_time'     => $this->class_create_time,
            'class_grade'           => $this->class_grade,
            'graduate_time'         => $this->graduate_time,
            'class_status'          => $this->class_status,
            'class_master'          => $this->class_master,
            'create_time'           => $this->create_time,
            'update_time'           => $this->update_time,
        ];
    }
    
    public function getID()                 {return $this->id;}
    public function getUuid()               {return $this->uuid;}
    public function getSchoolUuid()         {return $this->school_uuid;}
    public function getClassName()          {return $this->class_name;}
    public function getClassCreateGrade()   {return $this->class_create_grade;}
    public function getClassCreateTime()    {return $this->class_create_time;}
    public function getClassGrade()         {return $this->class_grade;}
    public function getGraduateTime()       {return $this->graduate_time;}
    public function getClassStatus()        {return $this->class_status;}
    public function getClassMaster()        {return $this->class_master;}
    public function getCreateTime()         {return $this->create_time;}
    public function getUpdateTime()         {return $this->update_time;}
    
    public function setID($id)                                  {$this->id                  = $id;}
    public function setUuid($uuid)                              {$this->uuid                = $uuid;}
    public function setSchoolUuid($school_uuid)                 {$this->school_uuid         = $school_uuid;}
    public function setClassName($class_name)                   {$this->class_name          = $class_name;}
    public function setClassCreateGrade($class_create_grade)    {$this->class_create_grade  = $class_create_grade;}
    public function setClassCreateTime($class_create_time)      {$this->class_create_time   = $class_create_time;}
    public function setClassGrade($class_grade)                 {$this->class_grade         = $class_grade;}
    public function setGraduateTime($graduate_time)             {$this->graduate_time       = $graduate_time;}
    public function setClassStatus($class_status)               {$this->class_status        = $class_status;}
    public function setClassMaster($class_master)               {$this->class_master        = $class_master;}
    public function setCreateTime($create_time)                 {$this->create_time         = $create_time;}
    public function setUpdateTime($update_time)                 {$this->update_time         = $update_time;}
}
