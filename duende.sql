-- create database duende character set ='utf8';
use duende;

drop TABLE if EXISTS type_products;

create table type_products(
	ID_type char(10) primary key,
    name_type varchar(30)
);

drop TABLE if EXISTS products;
create table products(
	ID_product char(10) primary key,
    name_product varchar(50),
    price int,
    image varchar(100),
    ID_type char(10),
    flag int,
    FOREIGN KEY (ID_type) REFERENCES type_products(ID_type)
);

drop TABLE if EXISTS accounts;
create table accounts(
	username varchar(20) primary key,
    	password varchar(20),
    	role int
);

drop TABLE if EXISTS users;
create table users(
	ID_user int primary key auto_increment,
    full_name varchar(30),
    email varchar(50),
	username varchar(20),
    otp int,
    verify int,
	foreign key (username ) references  accounts(username )
);

drop TABLE if EXISTS carts;
create table carts(
	ID_cart int(10) primary key auto_increment,
    ID_user int,
	foreign key (ID_user) references users(ID_user)
);

drop TABLE if EXISTS cart_detail;
create table cart_detail(
	ID_product char(10),
    ID_cart int,
    primary key(ID_product, ID_cart),
	quanlity int
);

drop TABLE if EXISTS bills;
create table bills(
	ID_bill int primary key auto_increment,
    full_name varchar(30),
    number_phone char(10),
email_pay varchar(20),
    address varchar(100),
    total int,
    status_bill int,
    date_time datetime,
    ID_user int,
    foreign key (ID_user) references users(ID_user)
);


drop TABLE if EXISTS bill_detail;
create table bill_detail(
	ID_product char(10),
    ID_bill int,
    primary key(ID_product, ID_bill),
    quanlity int,
    note varchar(100)
);
insert into accounts values ('admin', 'admin', 1);

-- VD thêm sp nhẫn 01 có tên file ảnh và loại sp là L01
insert into type_products values('L01', 'Nhẫn');
insert into products values('N01', 'ELEVATION RING', 1800000,'sp1.png','L01',1);
insert into products values('N02', 'CLASSIC RING', 1120000,'sp2.png','L01',1);
insert into products values('N03', 'ELAN RING', 1340000,'sp3.png','L01',0);
insert into products values('N04', 'ELAN DUAL RING', 1800000,'sp4.png','L01',0);
insert into products values('N05', 'ELAN TRIAD RING', 2030000,'sp5.png','L01',0);
insert into products values('N06', 'EMALIE SATIN', 1340000,'sp6.png','L01',0);
insert into products values('N07', 'EMALIE DUSTY', 1340000,'sp7.png','L01',0);
insert into products values('N08', 'EMALIE SAND', 1340000,'sp8.png','L01',0);
insert into type_products values('L02', 'Lắc tay');
insert into products values('T01', 'ELAN UNITY', 1800000,'sp1.png','L02',1);
insert into products values('T02', 'ELAN BRACELET', 2030000,'sp2.png','L02',1);
insert into products values('T03', 'CLASSIC BRACELET', 1570000,'sp3.png','L02',0);
insert into products values('T04', 'EMALIE SLIMT', 2030000,'sp4.png','L02',0);
insert into products values('T05', 'EMALIE SATIN', 2030000,'sp5.png','L02',0);
insert into products values('T06', 'EMALIE DESERT SAND', 2030000,'sp6.png','L02',0);
insert into products values('T07', 'EMALIE DUSTY', 2030000,'sp7.png','L02',0);
insert into type_products values('L03', 'Khuyên tai');
insert into products values('K01', 'ELAN EARRINGS', 2030000,'sp1.png','L03',1);
insert into products values('K02', 'EMALIE EARRINGS', 2030000,'sp2.png','L03',1);
insert into products values('K04', 'ASPIRATION EARRINGS', 2480000,'sp4.png','L03',0);
insert into type_products values('L04', 'Dây chuyền');
insert into products values('D01', 'COEUR NECKLACE', 1800000,'sp1.png','L04',1);
insert into products values('D02', 'LUMINE NECKLACE', 2030000,'sp2.png','L04',1);
insert into products values('D03', 'ELEVATION NECKLACE', 2030000,'sp3.png','L04',0);
insert into products values('D04', 'UNITY NECKLACE', 2030000,'sp4.png','L04',0);
insert into products values('D05', 'ELAN NECKLACE', 2030000,'sp5.png','L04',0);
insert into products values('D06', 'EMALIE NECKLACE', 2030000,'sp6.png','L04',0);
insert into products values('D07', 'ASPIRATION NECKLACE', 2030000,'sp7.png','L04',0);
insert into products values('D08', 'ELEVATION NECKLACE', 2030000,'sp8.png','L04',0);
