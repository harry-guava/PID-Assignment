drop database buy;
create database buy default character set utf8;

use buy;

create table member
(
    `memberId` int auto_increment not NULL primary key,
    `muse` varchar(30) NOT NULL,
    `paswd` varchar(30) NOT NULL,
    `username` varchar(15) NOT NULL,
    `listId` int,
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
    resId int NOT NULL,
    resname varchar(30) NOT NULL,
    price int,
    want int NOT NULL default 0,
    total int,
    constraint fk_res_buycar foreign key (resId)
    references res(resId)
);
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

create table serverlist
(
    serverId int auto_increment primary key,
    sername varchar(30) NOT NULL,
    serpaswd varchar(30) NOT NULL
);

alter table `member`
add constraint fk_buylist_member foreign key (listId)
    references buylist(listId)
    on update cascade
    on delete cascade;



insert into member (muse,paswd,username) values
('apple','1234','王小明'),('wang','4232','大平台');


insert into serverlist (serverId,sername,serpaswd) values
(1,'guava','0507'),(2,'alan','1207');

insert into res (resname,price,stock) values
('蘋果',30,100),('香蕉',50,70);

insert into buycar (resId,resname,price,want,total) values
(1,'蘋果',30,0,(want*price)),(2,'香蕉',50,0,(want*price));









