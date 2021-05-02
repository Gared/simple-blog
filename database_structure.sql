create table user
(
    id int auto_increment
        primary key,
    login varchar(30) not null,
    password varchar(100) not null,
    created_at datetime default CURRENT_TIMESTAMP not null,
    name varchar(100) not null
);

create table post
(
    id int auto_increment
        primary key,
    slug varchar(300) not null,
    content text not null,
    title varchar(300) not null,
    user_id int not null,
    created_at datetime default CURRENT_TIMESTAMP not null,
    updated_at datetime default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP,
    constraint post_slug_uindex
        unique (slug),
    constraint post_user_id_fk
        foreign key (user_id) references user (id)
);

