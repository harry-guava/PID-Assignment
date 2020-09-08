drop database buy;
create database buy default character set utf8;

use buy;

create table member
(
    `memberId` int auto_increment  primary key,
    `muse` varchar(30) ,
    `paswd` varchar(30) ,
    `username` varchar(15) NOT NULL,
    `email` varchar(30),
    `phone` varchar(15),
    `iden` varchar(10),
    `login` int not null default 0
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table res
(
    `resId` int auto_increment primary key,
    `resname` varchar(30),
    `detail` varchar(40),
    `price` int,
    `stock` int,
     `temp` int
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table buycar
(
    memberId int ,
    resId int ,
    resname varchar(30),
    price int,
    want int NOT NULL default 0,
    total int,
    serverId int NOT NULL default 0 ,
    foreign key (memberId) references member(memberId)
);

create table serverlist
(
    serverId int auto_increment primary key,
    sername varchar(30) NOT NULL,
    serpaswd varchar(30) NOT NULL
);

create table Orderlist
(   
    num int ,
    listnumber int,
    memberId int,
    serverId int
);
insert into res (`resname`,`detail`,`price`,`stock`,`temp`)
values ('高雄特產','跟著月亮走',888,50,50),('苗栗特產','議員說很多',1000000,5,5),('台灣特產','販賣恐龍無罪',1,1000,1000);

insert into member (muse,paswd,username,phone,email,iden) values
('apple','1234','王小明','0988123456','wang88@gmail.com','T123456789'),('wang','4232','大平台','0931123456','bigtai@yahoo.com.tw','F224546789');


insert into serverlist (serverId,sername,serpaswd) values
(1,'guava','0507'),(2,'alan','1207');

insert into orderlist (num) values (0);




