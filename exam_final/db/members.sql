create table members (
    num int not null auto_increment,
    id char(15) not null,
    pass char(15) not null,
    name char(10) not null,
    email char(80),
    regist_day char(20),
    level int,
    point int,
    age int,
    sex char(10),
    address char(80),
    intro char(30),
    music char(30),
    phone char(30),
    image char(10),
    primary key(num)
);
