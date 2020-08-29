drop database buy;
create database buy default character set utf8;

use buy;

create table member
(
    `memberId` int auto_increment  primary key,
    `muse` varchar(30) ,
    `paswd` varchar(30) ,
    `username` varchar(15) NOT NULL,
    `listId` int ,
    `login` int not null default 0
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table res
(
    `resId` int auto_increment primary key,
    `resname` varchar(30) NOT NULL,
    `price` int,
    `stock` int
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table buycar
(
    buyId int auto_increment primary key,
    memberId int,
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

create table buylist0
(
    buylistId int auto_increment  primary key,
    listdate int,
    num int ,
    listnumber int,
    memberId int,
    serverId int
);

insert into member (muse,paswd,username,listId) values
('apple','1234','王小明',1),('wang','4232','大平台',1);


insert into serverlist (serverId,sername,serpaswd) values
(1,'guava','0507'),(2,'alan','1207');

insert into res (resname,price,stock) values
('蘋果',30,100),('香蕉',50,70);

insert into buylist0 (num) values (0);
--------------------------------------------------------

create table buylist
(
    `listId` int auto_increment primary key,
    `memberId` int NOT NULL,
    `resname` varchar(30) NOT NULL,
    `quantity` int,
    `total` int,
    `resId` int,
     constraint fk_member_buylist foreign key (memberId)
     references member(memberId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



insert into buycar (memberId) select memberId from member where muse = 'apple';



create table buylist
(
    `listId` int primary key
    
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into buycar (resId,resname,price,want,total) values
(1,'蘋果',30,0,(want*price)),(2,'香蕉',50,0,(want*price));



create table tempcar
(
    buyId int auto_increment primary key,
    memberId int,
    resId int ,
    resname varchar(30),
    price int,
    want int NOT NULL default 0,
    total int,
    serverId int,
    foreign key (memberId) references member(memberId)
);