#user table
INSERT INTO user (username, password, first_name, last_name, title, area_of_interest, email, phone, address, company, city, state, recruitment_email) VALUES ("test","pass","Yidong", “Sun”, “Computer programmer”, “Computer programming”, "12345@missouri.edu", “573-355-1234”, “1234 Heaven Road”, “MIZZOU”, “Columbia”, “MO”, “54321@hotmail.com”);

UPDATE user 
SET phone = ‘573-355-4321’
WHERE first_name = ‘Yidong’’;

DELETE FROM user
WHERE username = ‘test’ AND last_name = ‘Sun’;

#education table
INSERT INTO education (user_id, school, location, gpa, dates_attended, field_of_study, activities_and_societies, description) VALUES (“1”, “University of Missouri”, “Columbia, Missouri”, “4.0”, “No activities or societies”, “Too lazy to write description”);

UPDATE education
SET gpa = ‘2.0’
WHERE user_id = ‘1’;

DELETE FROM education
WHERE school = ‘University of Missouri’ AND location = ‘Columbia, Missouri”;


#experience table

INSERT INTO experience (user_id, company, title, location, time_period, description) VALUES (“1”, “GameStop”, “Seller”, “Columbia, Missouri”, “2010-2015”, “Too lazy to write description”);

UPDATE experience
SET company = ‘BestBuy’
WHERE user_id = ‘1’ AND company = ‘GameStop’;

DELETE FROM experiece
WHERE user_id = ‘1’;

#volunteer table

INSERT INTO volunteer (user_id, organization, role, cause, dates, description) VALUES (“1”, “FUCSS”, “member”, “blablabla”, “2016-4-10”, “No description”);


UPDATE volunteer
SET date = ‘2015-4-10”
WHERE user_id = ‘1’;

DELETE FROM experiece
WHERE user_id = ‘1’;


#skills table

INSERT INTO skills (user_id, skill) VALUES (“1”, “C programming”);

UPDATE skills
SET skills = ‘JAVA programming’
WHERE user_id = ‘1’;

DELETE FROM skills
WHERE user_id = ‘1’;




