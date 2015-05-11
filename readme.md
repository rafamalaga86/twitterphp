# Twitter PHP Client

This is a simple PHP Client.


## Installation

It is needed to install the dependencies with Composer. All the details can be changed in the php files found in app/config directory.


## Comments.

I did this app without framework because I think it is what was expected and to show that I am framework agnostic. However, I always use a framework, mostly Laravel.

For that reason, and due to the lack of Front Controller in the app, the MVC separation is not that obvious but it exist.
	- The views are in the views folder
	- The controllers are in the controllers folder
	- The only model is in the app folder (Twitterphp.php)

Other consecuence of the lack of Front Controller and due to the need to route towards specific controllers is that the controllers are not classes.



Hacer la documentacion de las fucniones

Tried to used best practices.


There is no controll in the form, I am not escaping the form.

Everyone can access the PHP files.

Serializing JSON

Explain GIT.

Is not secure


Tell them where is the cron.php file.

Twitter: @PeterGrahamson /// 01012004

Responsive

About the POST sent data: I would have make the POST sent data with JS, but it the Test said only HTML, CSS, PHP and MySQL was valid for the solution, so I didn't use it.

About the design and the front-end in general: I would have done something more creative, but without Javascript I was kind of limited.


The twitter account

The commits name.

Javascript

Something more to do: 
	- Counters in the twitter icons
	- Add the images


twitter account

http://testing.clickcreacion.com/twitterphp/app/scripts/cron.php


## Exercise

I. Create a Class with the following mandatory methods
  a) connect to the Twitter REST API and Call statuses (tweets).
  b) update the database with data from the API response
  And additional methods of your choice and need.
II. Create a MySQL DB with a logical structure to save and easily access the twitter data.
III. Create a cron.php to update the database with data from https://twitter.com/ekomi
IV. Create a index file to show the cached tweets with possibility to answer, retweet and favorite  each tweet. Design the page in a general ekomi like design of your choice.
 
You must not use the Twitter Javascript Widget and/or the Twitter Javascript API.
Only PHP, MySQL, HTML and CSS are valid for a solution.
 
Once finished:
- Create a free repository at bitbucket, push your project and share the repository with galeski@ekomi.de
- Finally create a dump file of your MySQL data and send it via mail to galeski@ekomi.de