drop database buy;
create database buy default character set utf8;

use buy;

create table member
(
    `memberId` int auto_increment not NULL primary key,
    `muse` varchar(30) NOT NULL,
    `paswd` varchar(30) NOT NULL,
    `username` varchar(15) NOT NULL,
    `listId` int
    
    
);

create table buylist
(
    `listId` int auto_increment primary key,
    `memberId` int NOT NULL,
    `bname` varchar(30) NOT NULL,
    `quantity` int,
    `total` int,
     constraint fk_member_buylist foreign key (memberId)
     references member(memberId)
    
);
create table res
(
    `resId` int auto_increment primary key,
    `price` int,
    `stock`int,
    `resname` varchar(30)NOT NULL   
);

alter table `member`
add constraint fk_buylist_member foreign key (listId)
    references buylist(listId);



insert into member (muse,paswd,username) values
('apple','1234','王小明'),('wang','4232','大平台');

insert into res (price,stock,resname) values
(30,100,'蘋果'),(50,70,'香蕉');