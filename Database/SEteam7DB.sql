DROP TABLE IF EXISTS user;
create table user(
    user_id int not null auto_increment,
    username varchar(20) not null,
    password varchar(50) not null,
    name varchar(50) not null,
    email varchar(100) not null,
    primary key(user_id)
);

DROP TABLE IF EXISTS employer;
create table employer(
    employer_id int not null auto_increment,
    business_name varchar(20) not null,
    password varchar(50) not null,
    email varchar(100) not null,
    primary key(employer_id)
);


DROP TABLE IF EXISTS experience;
create table experience(
	university_id int not null auto_increment,
	job_id int references job(job_id),
    company_name varchar(20) not null,
    title varchar(50) not null,
    location varchar(50) not null,
    time_period time not null,
    primary key(university_id, job_id)
);

DROP TABLE IF EXISTS education;
create table education(
	university_id int not null auto_increment,
    university_name varchar(50) not null,
    location varchar(100) not null,
    grade varchar(10) not null,
    dates_attended time not null,
    field_of_study varchar(50) not null,
    details varchar(200) not null,
    primary key(university_id)
);

DROP TABLE IF EXISTS job;
create table job(
	employer_id int references employer(employer_id),
	location varchar(200) not null,
	experience_level varchar(50) not null,
    company_name varchar(20) not null,
    position varchar(20) not null,
    job_title varchar(20) not null,
    employer_type varchar(50) not null,
    job_poster varchar(50) not null,
    job_description varchar(200) not null,
    primary key(employer_id)
);

DROP TABLE IF EXISTS publications;
create table publications(
	url varchar(200) not null,
	description varchar(200) not null,
	authors varchar(200) not null
);

