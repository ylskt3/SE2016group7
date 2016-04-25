#For general info on main profile page
#company, city, state, and recruitment email only filled when #registered as employer
DROP TABLE IF EXISTS user;
create table user(
    user_id int not null auto_increment,
    username varchar(50) not null,
    password varchar(50) not null,
    date_created TIMESTAMP not null,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    picture blob,
    title varchar(50),
    area_of_interest varchar(50),
    email varchar(100) not null,
    phone varchar(10),
    address varchar(100),
    company varchar(50),
    city varchar(25),
    state varchar(25),
    recruitment_email varchar(100),
    primary key(user_id)
);


#PROFILE PAGE
DROP TABLE IF EXISTS education;
create table education(
    user_id int references user(user_id),
    school varchar(50) not null,
    location varchar(100) not null,
    gpa varchar(10),
    dates_attended varchar(50),
    field_of_study varchar(50),
    degree varchar (50),
    activities_and_societies varchar(500),
    description varchar(500),
    primary key(user_id, school, location)
);

#PROFILE PAGE
DROP TABLE IF EXISTS experience;
create table experience(
    user_id int references user(user_id),
    company varchar(20) not null,
    title varchar(50) not null,
    location varchar(50) not null,
    time_period varchar(20) not null,
    description varchar(500),
    primary key(user_id, company, title)
);

#PROFILE PAGE
DROP TABLE IF EXISTS volunteer;
create table volunteer(
    user_id int references user(user_id),
    organization varchar(50) not null,
    role varchar(50),
    cause varchar(50) not null,
    dates varchar(20),
    description varchar(500),
    primary key(user_id, organization, role)
);

#PROFILE PAGE
DROP TABLE IF EXISTS skills;
create table skills(
    user_id int references user(user_id),
    skill varchar(50),
    primary key(user_id, skill)
);

#MESSAGES PAGE
#CONNECTIONS PAGE
DROP TABLE IF EXISTS messages;
create table messages(
    sender int references user(user_id),
    receiver int references user(user_id),
    date timestamp default current_timestamp,
    subject varchar(100),
    body varchar(1000),
    primary key(sender, receiver, date)
);
#CONNECTIONS PAGE
DROP TABLE IF EXISTS connections;
create table connections(
    user_id1 int references user(user_id),
    user_id2 int references user(user_id),
    primary key(user_id1, user_id2)
);

#NOTIFICATIONS PAGE
DROP TABLE IF EXISTS notifications;
create table notifications(
    user_id int references user(user_id),
    notification1 varchar(100),
    notification2 varchar(100),
    notification3 varchar(100),
    notification4 varchar(100),
    notification5 varchar(100),
    notification6 varchar(100),
    notification7 varchar(100),
    notification8 varchar(100),
    notification9 varchar(100),
    notification10 varchar(100),
    primary key(user_id)
);

#NOTIFICATIONS PAGE
#make either user1 or user2 the receiver of the invitation
DROP TABLE IF EXISTS invitations;
create table invitations(
    receiver int references user(user_id),
    sender int references user(user_id),
    status varchar(10) not null,
    primary key(user_id1, user_id2)
);

#JOB PAGE
#RECRUITMENT PAGE
DROP TABLE IF EXISTS job;
create table job(
    job_id int not null auto_increment,
    logo blob,
    poster int references user(user_id),
    company varchar(50),
    industry varchar(25),
    location varchar(50),
    experience_level varchar(50),
    job_function varchar(30),
    job_title varchar(50),
    employment_type varchar(50),
    application_deadline varchar(30),
    job_description varchar(500),
    salary int,
    primary key(job_id)
);

INSERT INTO job (company, job_title, job_description, salary) 
VALUES ("Apple", "Programer", "Typing codes all day", "150000");

INSERT INTO job (company, job_title, job_description, salary) 
VALUES ("Blizzard", "Game tester", "Only one requirement: you must have played Blizzard's games.", "100000");

INSERT INTO job (company, job_title, job_description, salary) 
VALUES ("Google", "Translator", "At least knowing two languages", "120000");

INSERT INTO job (company, job_title, job_description, salary) 
VALUES ("Mizzou", "TA", "Grade student assignment", "20000");

INSERT INTO job (company, job_title, job_description, salary) 
VALUES ("Jingo", "Cook", "Knowing how to cook Chinese food", "30000");


#RECRUITMENT PAGE
#STATS PAGE
DROP TABLE IF EXISTS applicants;
create table applicants(
    job_id int references job(job_id),
    user_id int references user(user_id),
    application_date timestamp default current_timestamp,
    status varchar(25),
    primary key(job_id, user_id)
);

#STATS PAGE
DROP TABLE IF EXISTS recent_viewers;
create table recent_viewers(
    user_id int references user(user_id),
    viewer1 int references user(user_id),
    viewer2 int references user(user_id),
    viewer3 int references user(user_id),
    viewer4 int references user(user_id),
    viewer5 int references user(user_id),
    primary key(user_id)
);

#STATS PAGE
#Trents Version
DROP TABLE IF EXISTS number_of_views;
create table number_of_views(
    user_id int references user,
    date DATE not null,
    numberOfViews int not null,
    primary key(user_id, date)
);

#My Version XD (whichever works boys!)
DROP TABLE IF EXISTS profile_views;d
create table profile_views(
    user_id int references user(user_id),
    date timestamp default current_timestamp,
    data1 int,
    data2 int,
    data3 int,
    data4 int,
    data5 int,
    data6 int,
    data7 int,
    data8 int,
    data9 int,
    data10 int,
    data11 int,
    data12 int,
    data13 int,
    data14 int,
    data15 int,
    data16 int,
    data17 int,
    data18 int,
    data19 int,
    data20 int,
    data21 int,
    data22 int,
    data23 int,
    data24 int,
    data25 int,
    data26 int,
    data27 int,
    data28 int,
    data29 int,
    data30 int,
    primary key(user_id)
);
