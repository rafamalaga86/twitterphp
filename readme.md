# Twitter PHP Client

This is a simple PHP Client.

It is live in http://testing.clickcreacion.com/twitterphp/

The cron file can be executed with this link.

http://testing.clickcreacion.com/twitterphp/app/controllers/cron.php




## Installation

It is needed to install the dependencies with Composer. All the details can be changed in the php files found in app/config directory.


## Comments.

The cron.php file is in app/controllers/ directory.

I did this app without framework because I think it is what was expected and to show that I am framework agnostic. However, I always use a framework, mostly Laravel.

For that reason, and due to the lack of Front Controller in the app, the MVC separation is not that obvious but it exist.
	- The views are in the views folder
	- The controllers are in the controllers folder
	- The only model is in the app folder (Twitterphp.php)

Other consequence of the lack of Front Controller and due to the need to route towards specific controllers is that the controllers are not classes.

### About the Database
I made the structure base on the need, and also took some more data just in case. I didn't collect the entities from the API REST. I had several options for them, like serialising in JSON and storing, or make a one to many relationship with other Entities table... I needed more information about what was expected from the app.

### About the features of the app
It is possible you think there are some features missing, like twitter authentication. I didn't know where shall I have put more attention because I don't know the ultimate purpose the app would have. Neither 100% what you were expecting. Maybe it needed more attention in the client design and the user experience on it? Maybe a more impressive database? Maybe a really strict security? Maybe they are expecting extra features? If you want to see my skills further in any part, do not hesitate to let me know.

Due to the fact that there is no authentication, the app by default work with a test twitter account, with username of @PeterGrahamson and the password 01012004 .

### About Javascript
It is only used in the client browser. I couldn't think in any way of doing the front-end part of the answering tweets feature without it. I had to change dynamically the POST data sent with it. And also use the bootstrap js to make the popup text field appear. Otherwise I had to render a textarea with every tweet, everyone with their own POST data, and it would have ruined the design. All the logic is PHP.

### About the design
I would love to do something more creative with more time, but I also wanted to keep JS use to the minimum.


### About the GIT commit texts
Sorry for them because they explain little about the commit itself. I normally work in local environment, but I couldn't this time because couldn't use Curl for the API REST. So had to work 100% in the server and I had to do a commit every time I did a change to deploy the app in the server and try it.

### About security
I followed some good practises but I am not being super strict with it in the app. SQL Injections, CSRF or XSS attacks, etc. I prefer to not trust anybody, just in case the app scale and someone after me take it, change something, and all of the sudden the field in the DB that was filled with tweets from the API REST are filled by our own app. 


### Contact information
That's all. My email is rafamalaga86@gmail.com, do not hesitate to contact me. Thank you for your time! 

