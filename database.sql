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
    `price` int,
    `stock`int,
    `resname` varchar(30) NOT NULL
    
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
     on update cascade
     on delete cascade,
     constraint fk_res_buylist foreign key (resId)
     references res(resId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table `member`
add constraint fk_buylist_member foreign key (listId)
    references buylist(listId)
    on update cascade
    on delete cascade;



insert into member (muse,paswd,username) values
('apple','1234','王小明'),('wang','4232','大平台');

insert into res (price,stock,resname) values
(30,100,'蘋果'),(50,70,'香蕉');

-- insert into buylist(resname,quantity,totol) values
-- ()