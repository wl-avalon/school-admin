<?php
/**
 * Create by script:createSqlBean.php
 * Date is:2018-04-02
 * Time is:07:58:47
 */

namespace app\modules\models\beans;

/**
 * Comment: 班级教师关系表
 * Engine: InnoDB
 * Default Charset: utf8
 * Class ClassTeacherRelationBean
 * Package namespace app\modules\models\beans
 */
class ClassTeacherRelationBean
{
    private $id             = null; //BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID'
    private $uuid           = null; //VARCHAR(100) DEFAULT '' COMMENT '唯一ID',
    private $class_uuid     = null; //VARCHAR(100) DEFAULT '' COMMENT '班级ID'
    private $teacher_uuid   = null; //VARCHAR(100) DEFAULT '' COMMENT '教师ID'
    private $subject        = null; //TINYINT(4) DEFAULT 0 COMMENT '教师科目'
    private $create_time    = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间'
    private $update_time    = null; //TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
    
    public function __construct($input){
        $this->id               = $input['id']              ?? null;
        $this->uuid             = $input['uuid']            ?? null;
        $this->class_uuid       = $input['class_uuid']      ?? null;
        $this->teacher_uuid     = $input['teacher_uuid']    ?? null;
        $this->subject          = $input['subject']         ?? null;
        $this->create_time      = $input['create_time']     ?? null;
        $this->update_time      = $input['update_time']     ?? null;
    }
    
    public function toArray(){
        return [
            'id'            => $this->id,
            'uuid'          => $this->uuid,
            'class_uuid'    => $this->class_uuid,
            'teacher_uuid'  => $this->teacher_uuid,
            'subject'       => $this->subject,
            'create_time'   => $this->create_time,
            'update_time'   => $this->update_time,
        ];
    }
    
    public function getID()             {return $this->id;}
    public function getUuid()           {return $this->uuid;}
    public function getClassUuid()      {return $this->class_uuid;}
    public function getTeacherUuid()    {return $this->teacher_uuid;}
    public function getSubject()        {return $this->subject;}
    public function getCreateTime()     {return $this->create_time;}
    public function getUpdateTime()     {return $this->update_time;}
    
    public function setID($id)                      {$this->id              = $id;}
    public function setUuid($uuid)                  {$this->uuid            = $uuid;}
    public function setClassUuid($class_uuid)       {$this->class_uuid      = $class_uuid;}
    public function setTeacherUuid($teacher_uuid)   {$this->teacher_uuid    = $teacher_uuid;}
    public function setSubject($subject)            {$this->subject         = $subject;}
    public function setCreateTime($create_time)     {$this->create_time     = $create_time;}
    public function setUpdateTime($update_time)     {$this->update_time     = $update_time;}
}
