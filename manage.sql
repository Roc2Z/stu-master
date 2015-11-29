-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-10-28 06:24:49
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manage`
--

-- --------------------------------------------------------

--
-- 表的结构 `info_type`
--

CREATE TABLE IF NOT EXISTS `info_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_type_id` int(11) NOT NULL,
  `info_type_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `info_type`
--

INSERT INTO `info_type` (`id`, `info_type_id`, `info_type_name`) VALUES
(1, 1, '素质拓展证书（计算机证书等）'),
(2, 2, '学团活动'),
(3, 3, '惩罚'),
(4, 4, '奖励'),
(5, 5, '社会志愿活动'),
(6, 6, '科技创新'),
(7, 7, '成绩（有管理员导入）');

-- --------------------------------------------------------

--
-- 表的结构 `mix`
--

CREATE TABLE IF NOT EXISTS `mix` (
  `mix_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '综合信息ID',
  `stu_id` int(11) NOT NULL COMMENT '学生ID',
  `name` varchar(60) NOT NULL COMMENT '综合信息名称',
  `content` text NOT NULL COMMENT '综合信息内容',
  `item` int(11) NOT NULL COMMENT '所在学期，总共1-8个学期',
  `grade` int(11) NOT NULL COMMENT '所在年级',
  `info_type` int(11) NOT NULL DEFAULT '1' COMMENT '信息类型1为素质拓展证书（计算机证书等），2为学团活动，3为惩罚，4为奖励，5为社会实践志愿活动，6为科技创新，7为成绩（由管理员导入）',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '信息状态0为回收站，1为正常，2为审核通过',
  `timer` char(12) NOT NULL,
  `zs` int(6) NOT NULL,
  PRIMARY KEY (`mix_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `mix`
--

INSERT INTO `mix` (`mix_id`, `stu_id`, `name`, `content`, `item`, `grade`, `info_type`, `status`, `timer`, `zs`) VALUES
(1, 1, '5944', '&lt;p&gt;我就试试好不好使&lt;/p&gt;', 1, 2013, 3, 0, '0000-00-00', 0),
(3, 1, '测试3', '&lt;p&gt;测试3&lt;/p&gt;', 1, 0, 3, 3, '0000-00-00', 0),
(4, 2, '测试1', '&lt;p&gt;测试1&lt;/p&gt;', 1, 0, 3, 2, '0000-00-00', 0),
(5, 1, 'test the u', '&lt;p&gt;我们都是好孩子的萨芬大事&lt;img title=&quot;1439469669555798.jpg&quot; alt=&quot;iwant.jpg&quot; src=&quot;/ueditor/php/upload/image/20150813/1439469669555798.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;我们是一群快乐的小孩子&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 1, 2013, 3, 2, '0000-00-00', 0),
(6, 1, '1', '&lt;p&gt;东方大师傅，你们好么&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 1, 2013, 3, 2, '0000-00-00', 0),
(7, 1, '2', '&lt;p&gt;啊时代发生的f&lt;/p&gt;', 1, 2013, 3, 0, '0000-00-00', 0),
(8, 1, '啊上的尴尬打发的 ', '&lt;p&gt;的撒发生的规范撒旦&lt;/p&gt;', 1, 2013, 3, 2, '0000-00-00', 0),
(9, 11, '规范收费收费的噶啥地方', '&lt;p&gt;十大发生的发生的&lt;/p&gt;', 1, 2013, 2, 2, '0000-00-00', 0),
(10, 1, '发给发生的故事的噶啥地方', '&lt;p&gt;是大法师打广告上的发&lt;/p&gt;', 1, 2013, 3, 2, '0000-00-00', 0),
(11, 1, '萨芬申达股份噶啥地方的啊', '&lt;p&gt;萨芬等等撒范德萨方式打法&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(12, 1, '的萨芬的撒', '&lt;p&gt;爱上对方撒地方撒&lt;/p&gt;', 1, 2013, 3, 0, '0000-00-00', 0),
(13, 1, '啊收到了好覅大会覅怕是的', '&lt;p&gt;啊顺丰啊好烦噶打谁嘎嘎额噶速度过&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(14, 1, '阿股份我去热', '&lt;p&gt;啊和热武器粉去&amp;nbsp;&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(15, 1, '啊三个方位去特区认同热情未发生大', '&lt;p&gt;啊感情特委屈范德萨发展出发&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(16, 1, '爱国王企鹅鬼斧神工大幅的萨芬的', '&lt;p&gt;啊多少个的撒发生的发生的发多少&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(17, 1, '爱上对方去跳舞 ', '&lt;p&gt;犬瘟热福娃地方&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(18, 1, '你好么', '&lt;p&gt;你好我也好&lt;/p&gt;', 4, 2013, 3, 2, '0000-00-00', 0),
(19, 1, '5944', '&lt;p&gt;我就试试好不好使&lt;/p&gt;', 1, 2013, 3, 2, '0000-00-00', 0),
(20, 1, '夏天的故事', '&lt;p&gt;你们好么，我很好&lt;/p&gt;', 1, 2013, 3, 2, '0000-00-00', 0),
(21, 1, '5944', '&lt;p&gt;我就试试好不好使&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(22, 1, '规范收费收费的噶啥地方', '&lt;p&gt;十大发生的发生的&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(23, 1, '5944', '&lt;p&gt;我就试试好不好使&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(24, 1, '啊上的尴尬打发的 ', '&lt;p&gt;的撒发生的规范撒旦&lt;/p&gt;', 1, 2013, 3, 2, '0000-00-00', 0),
(25, 1, '5944', '&lt;p&gt;我就试试好不好使&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(26, 1, '5944', '&lt;p&gt;我就试试好不好使&lt;/p&gt;', 1, 2013, 3, 1, '0000-00-00', 0),
(27, 1, '冬天的故事', '&lt;p&gt;你们好&lt;/p&gt;', 5, 2013, 3, 1, '0000-00-00', 0),
(28, 1, '春天的故事', '&lt;p&gt;你们好么&lt;/p&gt;', 7, 2013, 0, 1, '0000-00-00', 0),
(29, 1, '今天好么', '&lt;p&gt;那你们好呢&lt;/p&gt;', 0, 2013, 5, 2, '0000-00-00', 0),
(30, 1, '你好我就试试', '&lt;p&gt;测试一下好不好用&lt;/p&gt;', 6, 2013, 5, 1, '0000-00-00', 0),
(31, 1, '这次在试试好不好使', '&lt;p&gt;看样子应该不错&lt;/p&gt;', 5, 2013, 5, 1, '2015-10', 0);

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '状态ID',
  `status` int(11) NOT NULL COMMENT 'mix 表中的状态ID',
  `status_name` varchar(60) NOT NULL COMMENT '对应的状态名称',
  PRIMARY KEY (`sta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `status`
--

INSERT INTO `status` (`sta_id`, `status`, `status_name`) VALUES
(1, 0, '已删除'),
(2, 1, '未审核'),
(3, 2, '通过'),
(4, 3, '驳回');

-- --------------------------------------------------------

--
-- 表的结构 `stu`
--

CREATE TABLE IF NOT EXISTS `stu` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `student_id` varchar(30) NOT NULL COMMENT '学号',
  `password` varchar(30) NOT NULL COMMENT '密码',
  `gender` varchar(4) NOT NULL COMMENT '性别',
  `major` varchar(60) NOT NULL COMMENT '专业',
  `political_status` varchar(20) NOT NULL COMMENT '政治面貌',
  `nation` varchar(40) NOT NULL COMMENT '民族',
  `country` varchar(40) NOT NULL COMMENT '国家',
  `birth` varchar(30) NOT NULL COMMENT '出生日期',
  `id_card` varchar(120) NOT NULL COMMENT '身份证号码',
  `phone` varchar(20) NOT NULL COMMENT '手机号',
  `health` varchar(20) NOT NULL COMMENT '健康状况',
  `address` varchar(120) NOT NULL COMMENT '家庭住址',
  `home_phone` varchar(20) NOT NULL COMMENT '家庭电话',
  `zipcode` int(11) NOT NULL COMMENT '邮编',
  `email` varchar(60) NOT NULL COMMENT '邮箱',
  `grade` int(11) NOT NULL COMMENT '所在年级',
  `composite` int(12) NOT NULL COMMENT '综合素质得分',
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `stu`
--

INSERT INTO `stu` (`stu_id`, `name`, `student_id`, `password`, `gender`, `major`, `political_status`, `nation`, `country`, `birth`, `id_card`, `phone`, `health`, `address`, `home_phone`, `zipcode`, `email`, `grade`, `composite`) VALUES
(1, '王小明', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 2013, -51),
(2, '王小明1', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(3, '张小白', '21212121', '87654321', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '12341234', '1234214', '12344312', '23412342', 12342134, '2133242314', 0, 0),
(4, '王小明2', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(5, '张小白1', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(6, '王小明3', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(7, '张小白2', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(8, '王小明4', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(9, '张小白3', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(10, '王小明5', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(11, '张小白4', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(12, '王小明6', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(13, '张小白5', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(14, '王小明7', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(15, '张小白6', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(16, '王小明8', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(17, '张小白7', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(18, '王小明9', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(19, '张小白8', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(20, '王小明10', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(21, '张小白9', '21212121', '21212121', '女', '专业', '政治面貌', '民族', '国家', '出生时间', '身份证号', '手机号', '健康状况', '家庭住址', '家庭联系方式', 0, '邮箱', 0, 0),
(22, '王小明11', '20132213686', '20132213686', '男', '网络工程', '团员', '汉', '中国', '1994.08.18', '370481199408185016', '18353580563', '健康', '山东省滕州市洪绪镇', '2891739817', 277510, 'coiajdoiwj@ldustu.com', 0, 0),
(23, '你是谁', '123123', '123123', '1', '信息与计算科学', '', '', '', '', '', '', '', '', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tec`
--

CREATE TABLE IF NOT EXISTS `tec` (
  `tec_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '教师主键ID',
  `account` varchar(20) NOT NULL COMMENT '账户',
  `password` varchar(30) NOT NULL COMMENT '密码',
  `username` varchar(30) NOT NULL COMMENT '昵称',
  `power` int(11) NOT NULL COMMENT '权限',
  PRIMARY KEY (`tec_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tec`
--

INSERT INTO `tec` (`tec_id`, `account`, `password`, `username`, `power`) VALUES
(1, '20132113501', '123123', '你我他', 0),
(2, '211211111', '123123', '我你他', 0),
(3, '20132113501', '123123', '你我他', 0),
(4, '211211111', '123123', '我你他', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
