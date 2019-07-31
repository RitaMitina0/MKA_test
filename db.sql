create database comments;
use comments;

create table `user`(
`id` int primary key auto_increment,
`name` varchar(20), 
`msg` text,
`date` date
)engine = MyISAM;