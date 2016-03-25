DROP TABLE IF EXISTS user;
create table user(
    user_id int not null auto_increment,
    username varchar(20) not null,
    password varchar(50) not null,
    primary key(user_id)
);

DROP TABLE IF EXISTS experience;
create table experience(
    company_name varchar(20) not null,
    title varchar(50) not null,
    location varchar(50) not null,
    time_period time not null,
    description varchar(200) not null
);

DROP TABLE IF EXISTS education;
create table education(
    university_name varchar(20) not null,
    grade varchar(10) not null,
    field_of_study varchar(50) not null,
    description varchar(200) not null
);

DROP TABLE IF EXISTS job;
create table job(
    company_name varchar(20) not null,
    industry varchar(20) not null,
    job_title varchar(20) not null,
    country varchar(20) not null,
    job_poster varchar(50) not null,
    description varchar(200) not null
);

