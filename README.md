##Pseudo LinkedIn

###Authors
-------
* Mateusz Haruza
* Aren Wells

###Downloading the Project
-------------------------
To download and make changes to project:
 1. Make a pull request.
 2. Make a new branch of the project.
 3. Make changes locally via GitHub desktop or on the web.
 4. Merge the branch with changes back to the project.
 5. Wait for the branch to be committed.
 6. Run the SEteam7DB.sql in the DML folder.
 7. Put the Website folder to your server, then change the server, databse name, host name, password in the dbcontroller.php to yours.
 	* Project is located at: https://github.com/ylskt3/SE2016group7

###What’s the Project?
-------------------
The purpose of the project is to reverse engineer the popular social media site LinkedIn. The project does not have the full functionality of LinkedIn and is currently under construction. The finished product will allow for basic LinkedIn features such as logging in and logging out, editing profile, registering with a company and posting jobs, accepting jobs, declining jobs, applicant management for recruiters, message sending between connections, notifications, statistics showing profile view data, a contact us page, and other possible features. Below are descriptions of the current pages and features of the website and their current functionality.

####Login Page
----------
This is the first page of our website. If you are already a registered user then simply enter your username and password in the appropriate fields and press the Sign in button. If you are not a registered user then you can simply press the register button underneath the sign in button. A module will pop up and in order to register just fill in all of the empty fields with the appropriate information and press the sign up button. The password and confirm your password fields must contain the same string otherwise you will get a warning however currently the warning will not prevent you from registering.

####Home Page
------------
Once you login you will be directed to your home page. If you ever need to get back to the home page simply click on the Pseudo Linkedin tab in the top left corner. The home page displays all of the user’s information. The most relevant information being displayed on top and education, volunteer, and work experience information being displayed at the bottom in an accordion system. In order to view education, volunteer, or work information, simply click on the corresponding blue header. In order to update the profile information go to the update profile page.

####Update Profile Page
-------------------
To navigate to the update profile page simply mouse over the profile tab in the top left corner of the page and select update profile once you are logged in. This page consists of four sections in order to update information on the profile/home page. The first section currently has a bug in which the name mike andrew is permanently saved in the first and last name fields. This doesn’t affect the correct name on the profile page but will be changed later. Currently the basic information section forces the user to fill in all fields but does update the home/profile page upon pressing the update profile button within the basic information section. The other sections also require the user to fill in all of the fields but do not currently update the home/profile page upon pressing the update profile button in their respective sections.

####Create Business Page
---------------------
To navigate to the create business page simply mouse over the profile tab in the top left corner of the page and select create business once you are logged in. The create business page is currently under construction and has no functionality.

####Connections Page
----------------
To navigate to the connections page simply click the connection tab at the top of the page after you login. The connections page is currently under construction and has no functionality.

####Job Search Page
---------------
To navigate to the job search page simply click the search jobs tab at the top of the page after you login. The initial job search page has no listed jobs but by simply pressing the magnifying glass button at the end of the search field without entering anything in the search field, all job postings will be displayed. The job postings are listed with basic information such as company, job title, description, and salary. The view button for each job listing currently has no functionality but will later allow the user to view more details on each job posting. To narrow a job search a user can filter the search by either company or job title by using the filter by dropdown menu and then type the corresponding company or job title that they are looking for in the search field and then press the magnifying glass button at the end of the search field. If a user does not specify a filter then the page will simply display all of the job postings available.

####Contact Us Page
---------------
To navigate to the contact us page simply click the contact us tab at the top of the page after you login. The contact us page allows the user to send a message to the developers. In order to do so the user just has to fill in all the fields and press the send message button at the bottom of the fields. This page also includes the contact information of the developers at the bottom. The address link when clicked directs you to a google maps page of the address. The email link when clicked opens the outlook application on your computer allowing you to send an email to the developers and the wechat link displays a QR code that you can use to connect to the developers on wechat.

####Notification Button
-------------------
The notification button located at the top right corner of the page once you login is currently under construction and has no functionality.

####Logout Button
-------------
The logout button located at the top right corner of the page once you login will sign you out and direct you back to the login page.

###Contact
-------
To contact us about anything please use the contact us page on the website. http://zzyrdswe.centralus.cloudapp.azure.com/group7/contact/contact_us.php 

To submit bugs, feature requests, or submit patches, please visit our GitHub page at https://github.com/ylskt3/SE2016group7.
