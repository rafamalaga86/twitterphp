## Twitter PHP Client

This is a simple PHP Client.

## Notes

The packages of Composer are already in the proper folder, so no need to install dependencies.

Comments.

There is not model, view and controllers folder.

Dependencies are not included in the repository, they should be installed with Composer.

Using twig in templates.

Tried to used best practices.

Explain MVC.

Everyone can access the PHP files.

Limitations for not using a Framework.

Serializing JSON

Is not secure

"ORDER by ID DESC LIMIT 50,5"

Responsive

About the POST sent data: I would have make the POST sent data with JS, but it the Test said only HTML, CSS, PHP and MySQL was valid for the solution, so I didn't use it.

About the design and the front-end in general: I would have done something more creative, but without Javascript I was kind of limited.


The twitter account

The commits name.

Javascript

Something more to do: 
	- Counters in the twitter icons
	- Add the images



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