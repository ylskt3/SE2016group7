#user table
“INSERT INTO user (user_id, username, hashed_password, salt, date_created, first_name, last_name, picture, title, area_of_interest, email, phone, address, company, city, state, recruitment_email)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)”

“UPDATE user 
SET username = ?, first_name = ?, last_name = ?, picture = ?, title = ?, area_of_interest = ?, email = ?, phone = ?, address = ? , city = ?, state = ?, recruitment_email = ?
WHERE user_id = ?”

“DELETE FROM user
WHERE user_id = ?”

#education table
“INSERT INTO education (user_id, school, location, degree, field_of_study, gpa, dates_attended, description, activities_and_societies) 
VALUES (?,?,?,?,?,?,?,?,?)”

“UPDATE education
SET school = ?, location = ?, degree = ?, field_of_study =?, gpa = ?, dates_attended = ?, description = ?, activities_and_societies = ?
WHERE user_id = ?”

DELETE FROM education
WHERE user_id = ? AND school = ? AND location = ?”

#experience table
“INSERT INTO experience (user_id, title, company, location, time_period, description) 
VALUES (?, ?, ?, ?, ?, ?)”

“UPDATE experience
SET title = ?, company = ?, location = ?, time_period = ?, description = ?
WHERE user_id = ?”

“DELETE FROM experience
WHERE user_id = ? AND title = ? AND company = ?”

#volunteer table
“INSERT INTO volunteer (user_id, role, organization, dates, cause, description) 
VALUES (?, ?, ?, ?, ?, ?)”

“UPDATE volunteer
SET role = ?, organization = ?, dates = ?, cause = ? , description = ?
WHERE user_id = ?”


“DELETE FROM volunteer
WHERE user_id = ? AND role = ? AND organization = ?”

#skills table
“INSERT INTO skills (user_id, skill) 
VALUES (?, ?)”

“UPDATE skills
SET skill = ?
WHERE username = ?”

“DELETE FROM skills
WHERE username = ? AND skill = ?”

#job table
“INSERT INTO job (job_id, logo, poster, company, industry, location, experience_level, job_function, job_title, employment_type, application_deadline, job_description) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)”

“UPDATE job
SET logo = ?, poster = ?, company = ?, industry = ?, location = ?, experience_level = ?, job_function = ?, job_title = ?, employment_type = ?, application_deadline = ?, job_description = ?
WHERE job_id = ?”

“DELETE FROM job
WHERE jod_id = ?”

#connections table
“INSERT INTO connections (user_id1, user_id2) 
VALUES (?, ?)”

“UPDATE connections  //maybe no updates needed for connections
SET user_id2 = ?
WHERE user_id1 = ?”

“DELETE FROM connections
WHERE user_id1 = ? AND user_id2 = ?”

#applicants table
“INSERT INTO applicants (job_id, user_id, application_date, status) 
VALUES (?, ?, ?, ?)”

“UPDATE applicants
SET application_date = ?, status = ?
WHERE user_id = ? AND job_id = ?”

“DELETE FROM applicants
WHERE username = ? AND job_id = ?”

”#recentviewers table
“INSERT INTO recentviewers (user_id, viewer1, viewer2, viewer3, viewer4, viewer5) 
VALUES (?, ?, ?, ?, ?)”

“UPDATE recentviewers
SET viewer1 = ?, viewer2 = ?, viewer3 = ?, viewer4 = ?, viewer5 = ?
WHERE user_id = ?”

“DELETE FROM recentviewers
WHERE user_id = ?

#invitations table
“INSERT INTO invitations (sender, reciever, status) 
VALUES (?, ?, ?)”

“UPDATE invitations
SET reciever_id = ?, status = ?
WHERE sender_id = ?”

“DELETE FROM invitations
WHERE sender_id = ? AND reciever_id = ?”

#Page Views table
“INSERT INTO pageviews (user_id, date, numOfViews) 
VALUES (?, ?, ?)”

“UPDATE pageviews
SET user_id = ?, date = ?, numOfViews = ?
WHERE username = ?”

“DELETE FROM pageviews
WHERE username = ?”

#Messages table
“INSERT INTO messages (sender, receiver, date, subject, body) 
VALUES (?, ?, ?, ?, ?)”

“UPDATE messages
SET subject = ?, body = ?
WHERE sender = ? AND receiver = ? AND date = ?”

“DELETE FROM messages
WHERE sender = ? AND reciever = ? AND date = ?”

#notifications table
“INSERT INTO notifications (user_id, notification_1, notification_2, notification_3, notification_4, notification_5, notification_6, notification_7, notification_8, notification_9, notification_10) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)”

“UPDATE notifications
SET user_id = ?, notification_1 = ?, notification_2 = ?, notification_3 = ?, notification_4 = ?, notification_5 = ?, notification_6 = ?, notification_7 = ?, notification_8 = ?, notification_9 = ?, notification_10 = ?
WHERE user_id = ?”

“DELETE FROM notifications
WHERE user_id = ?”

#profileviews table
“INSERT INTO profileviews (user_id, date, date1, date2, date3, date4, date5, date6, date7, date8, date9, date10, date11, date12, date13, date14, date15, date16, date17, date18, date19, date20, date21, date22, date23, date24, date25, date26, date27, date28, date29, date30) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)”

“UPDATE profileviews 
SET date = ?, date1 = ?, date2 = ?, date3 = ?, date4 = ?, date5 = ?, date6 = ?, date7 = ?, date8 = ?, date9 = ?, date10 = ?, date11 = ?, date12 = ?, date13 = ?, date14 = ?, date15 = ?, date16 = ?, date17 = ?, date18 = ?, date19 = ?, date20 = ?, date21 = ?, date22 = ?, date23 = ?, date24 = ?, date25 = ?, date26 = ?, date27 = ?, date28 = ?, date29 = ?, date30 = ?
WHERE user_id = ?”

“DELETE FROM profileviews
WHERE user_id = ?”





