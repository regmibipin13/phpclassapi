-- User
 -- id, name, email, password

-- Create User, Update User, Delete User, Get All Users

create table if not exists users(
    id int primary key auto_increment,
    name varchar(30) not null,
    email varchar(30) unique,
    password varchar(200) not null
);


create table if not exists roles(
    id int primary key auto_increment,
    name varchar(20) not null
);

alter table users add column role_id int;
alter table users add constraint fk_role_id foreign key(role_id) references roles(id);


