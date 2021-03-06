CREATE TABLE `school_record` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID',
  `uuid` VARCHAR(100) DEFAULT '' COMMENT '学校唯一ID',
  `school_name` VARCHAR(200) DEFAULT '' COMMENT '学校名称',
  `school_level` TINYINT(4) DEFAULT 0 COMMENT '学校类型 0:小学 1:初中 2:高中',
  `school_attribution` INT(11) DEFAULT 0 COMMENT '学校归属地',
  `school_status` TINYINT(4) DEFAULT 0 COMMENT '学校状态 0:预注册 1:正常，2:挂失(临时不用) 3:注销(永久不用)',
  `administrator_uuid` VARCHAR(500) DEFAULT '' COMMENT '管理员ID,多个用户以逗号分隔,最多5个',
  `register_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `create_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_uuid` (`uuid`),
  KEY `idx_school_level` (`school_level`),
  KEY `idx_school_attribution` (`school_attribution`),
  KEY `idx_school_status` (`school_status`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = '学校记录表';

CREATE TABLE `class_record` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID',
  `uuid` VARCHAR(100) DEFAULT '' COMMENT '班级唯一ID',
  `school_uuid` VARCHAR(200) DEFAULT '' COMMENT '所属学校ID',
  `class_name` VARCHAR(10) DEFAULT '' COMMENT '班级名称',
  `class_create_grade` TINYINT(4) DEFAULT 0 COMMENT '班级建立时年级',
  `class_create_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '班级建立时间',
  `class_grade` TINYINT(4) DEFAULT 0 COMMENT '班级当前年级',
  `graduate_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '预期毕业期限',
  `class_status` TINYINT(4) DEFAULT 0 COMMENT '班级状态 0:预创建 1:正常 2:已毕业 3:毕业后保留',
  `class_master` VARCHAR(500) DEFAULT '' COMMENT '班主任ID,多个用户以逗号分隔,最多5个',
  `create_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_uuid` (`uuid`),
  KEY `idx_school_id` (`school_uuid`),
  KEY `idx_class_grade` (`class_grade`),
  KEY `idx_class_status` (`class_status`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = '班级记录表';

CREATE TABLE `class_student_relation` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID',
  `student_uuid` VARCHAR(100) DEFAULT '' COMMENT '学生ID',
  `student_name` VARCHAR(100) DEFAULT '' COMMENT '学生姓名',
  `class_uuid` VARCHAR(100) DEFAULT '' COMMENT '班级ID',
  `create_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_student_uuid` (`student_uuid`),
  KEY `idx_class_uuid` (`class_uuid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = '家长学生关系表';

CREATE TABLE `parent_child_relation` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID',
  `parent_uuid` VARCHAR(100) DEFAULT '' COMMENT '家长ID',
  `child_uuid` VARCHAR(100) DEFAULT '' COMMENT '学生ID',
  `relation` TINYINT(4) DEFAULT 0 COMMENT '亲属关系',
  `create_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_child_relation_uuid` (`child_uuid`, `relation`),
  UNIQUE KEY `idx_parent_child_uuid` (`parent_uuid`, `child_uuid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = '家长学生关系表';

CREATE TABLE `class_teacher_relation` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID',
  `uuid` VARCHAR(100) DEFAULT '' COMMENT '唯一ID',
  `class_uuid` VARCHAR(100) DEFAULT '' COMMENT '班级ID',
  `teacher_uuid` VARCHAR(100) DEFAULT '' COMMENT '教师ID',
  `subject` TINYINT(4) DEFAULT 0 COMMENT '教师科目',
  `create_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_uuid` (`uuid`),
  UNIQUE KEY `idx_class_teacher_subject_uuid` (`class_uuid`, `teacher_uuid`, `subject`),
  KEY `idx_teacher_uuid` (`teacher_uuid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = '班级教师关系表';