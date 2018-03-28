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
 * Class ParentChildRelationBean
 * Package namespace app\modules\models\beans
 */
class ParentChildRelationBean
{
    private $id             = null; //BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID'
    private $parent_uuid    = null; //VARCHAR(100) DEFAULT '' COMMENT '家长ID'
    private $child_uuid     = null; //VARCHAR(100) DEFAULT '' COMMENT '学生ID'
    private $relation       = null; //TINYINT(4) DEFAULT 0 COMMENT '亲属关系'
    private $create_time    = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间'
    private $update_time    = null; //TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
    
    public function __construct($input){
        $this->id           = $input['id']          ?? null;
        $this->parent_uuid  = $input['parent_uuid'] ?? null;
        $this->child_uuid   = $input['child_uuid']  ?? null;
        $this->relation     = $input['relation']    ?? null;
        $this->create_time  = $input['create_time'] ?? null;
        $this->update_time  = $input['update_time'] ?? null;
    }
    
    public function toArray(){
        return [
            'id'            => $this->id,
            'parent_uuid'   => $this->parent_uuid,
            'child_uuid'    => $this->child_uuid,
            'relation'      => $this->relation,
            'create_time'   => $this->create_time,
            'update_time'   => $this->update_time,
        ];
    }
    
    public function getID()             {return $this->id;}
    public function getParentUuid()     {return $this->parent_uuid;}
    public function getChildUuid()      {return $this->child_uuid;}
    public function getRelation()       {return $this->relation;}
    public function getCreateTime()     {return $this->create_time;}
    public function getUpdateTime()     {return $this->update_time;}
    
    public function setID($id)                      {$this->id          = $id;}
    public function setParentUuid($parent_uuid)     {$this->parent_uuid = $parent_uuid;}
    public function setChildUuid($child_uuid)       {$this->child_uuid  = $child_uuid;}
    public function setRelation($relation)          {$this->relation    = $relation;}
    public function setCreateTime($create_time)     {$this->create_time = $create_time;}
    public function setUpdateTime($update_time)     {$this->update_time = $update_time;}
}
