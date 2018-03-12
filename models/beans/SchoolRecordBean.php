<?php
/**
 * Create by script:createSqlBean.php
 * Date is:2018-03-12
 * Time is:03:53:39
 */

namespace app\modules\models\beans;

/**
 * Comment: 学校记录表
 * Engine: InnoDB
 * Default Charset: utf8
 * Class SchoolRecordBean
 * Package namespace app\modules\models\beans
 */
class SchoolRecordBean
{
    private $id                 = null; //BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID'
    private $uuid               = null; //VARCHAR(100) DEFAULT '' COMMENT '学校唯一ID'
    private $school_name        = null; //VARCHAR(200) DEFAULT '' COMMENT '学校名称'
    private $school_level       = null; //TINYINT(4) DEFAULT 0 COMMENT '学校类型 0:小学 1:初中 2:高中'
    private $school_attribution = null; //INT(11) DEFAULT 0 COMMENT '学校归属地'
    private $school_status      = null; //TINYINT(4) DEFAULT 0 COMMENT '学校状态 0:预注册 1:正常，2:挂失(临时不用) 3:注销(永久不用)'
    private $administrator_uuid = null; //VARCHAR(500) DEFAULT '' COMMENT '管理员ID,多个用户以逗号分隔,最多5个'
    private $register_time      = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间'
    private $create_time        = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间'
    private $update_time        = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间'
    
    public function __construct($input){
        $this->id                   = $input['id']                  ?? null;
        $this->uuid                 = $input['uuid']                ?? null;
        $this->school_name          = $input['school_name']         ?? null;
        $this->school_level         = $input['school_level']        ?? null;
        $this->school_attribution   = $input['school_attribution']  ?? null;
        $this->school_status        = $input['school_status']       ?? null;
        $this->administrator_uuid   = $input['administrator_uuid']  ?? null;
        $this->register_time        = $input['register_time']       ?? null;
        $this->create_time          = $input['create_time']         ?? null;
        $this->update_time          = $input['update_time']         ?? null;
    }
    
    public function toArray(){
        return [
            'id'                    => $this->id,
            'uuid'                  => $this->uuid,
            'school_name'           => $this->school_name,
            'school_level'          => $this->school_level,
            'school_attribution'    => $this->school_attribution,
            'school_status'         => $this->school_status,
            'administrator_uuid'    => $this->administrator_uuid,
            'register_time'         => $this->register_time,
            'create_time'           => $this->create_time,
            'update_time'           => $this->update_time,
        ];
    }
    
    public function getID()                 {return $this->id;}
    public function getUuid()               {return $this->uuid;}
    public function getSchoolName()         {return $this->school_name;}
    public function getSchoolLevel()        {return $this->school_level;}
    public function getSchoolAttribution()  {return $this->school_attribution;}
    public function getSchoolStatus()       {return $this->school_status;}
    public function getAdministratorUuid()  {return $this->administrator_uuid;}
    public function getRegisterTime()       {return $this->register_time;}
    public function getCreateTime()         {return $this->create_time;}
    public function getUpdateTime()         {return $this->update_time;}
    
    public function setID($id)                                  {$this->id                  = $id;}
    public function setUuid($uuid)                              {$this->uuid                = $uuid;}
    public function setSchoolName($school_name)                 {$this->school_name         = $school_name;}
    public function setSchoolLevel($school_level)               {$this->school_level        = $school_level;}
    public function setSchoolAttribution($school_attribution)   {$this->school_attribution  = $school_attribution;}
    public function setSchoolStatus($school_status)             {$this->school_status       = $school_status;}
    public function setAdministratorUuid($administrator_uuid)   {$this->administrator_uuid  = $administrator_uuid;}
    public function setRegisterTime($register_time)             {$this->register_time       = $register_time;}
    public function setCreateTime($create_time)                 {$this->create_time         = $create_time;}
    public function setUpdateTime($update_time)                 {$this->update_time         = $update_time;}
}
