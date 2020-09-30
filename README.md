# Set up structure

To set up the application in your server you need to create MYSQL database called “testdb”. Then run the command “php artisan migrate” as command line arguments to create database tables. Then to seed photos table with the provided data the following commands need to be executed:
php artisan db:seed
There is no password to connect to the database; otherwise password could be added to .env file configuration. 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testDB
DB_USERNAME=root
DB_PASSWORD= 
Application structure
The application structure is based on Model View Controller known as MVC pattern. The following diagram displays the overview of the system architecture. Based on this architecture, each component is separately involved in managing the application behaviour while interacting with others. The view is managing view and interface which is the point of sending request to the controller and controller dispatches the request to the model and return the model response to the view. 
 
Fig 1
To serve this model, we need a well-organised and powerful framework to automate loads of unnecessary coding which was handled by professional programmers for rapid application development. Due to the familiarity to PHP and SQL technologies, Laravel was a good choice as this framework taken care of many modules and model view controller separation effectively. Once you understand this framework, many tools are available to assist programmers to create maintainable applications. Thus, the choice of the framework was to simplify the coding process in order to achieve readability for other developers. 
The aim was to achieve the main objectives of the application in a limited time framework, which are the main functionality of the system; therefore, there is a little attention paid to the user interface and unit testing.
View
Prior to entering home page, the user needs to register or login. After login a link directs the user to the form with a few fields to fill in and a drop down list populated with ten records from the database table for the user to pick an action. This is the list of photo categories supplied by the tester which were seeded, in a method, to the database table from the API address in the GitHub repository. That includes an option to the user to click as done otherwise it throws an error message. The validation are all working fine as well as creating a new record. After creating a new record, the image will be added to the page for administration to view. Duplicate photos are not accepted with the same name; therefore, it will throw an error.
Model
Next is to create model via command line arguments provided by Laravel framework. The database tables are managed by model classes. There are three models and there three database tables. One is created by Laravel auth scaffolding which directs the user login and register as well as password reminder functionality. Another table was created from the API provided by the tester called “photos” and the other table which are connected by the foreign key “photo_id” which is primary key in “photo” table. This is useful if there information exists in another table and needs to be stored separately.
Controller
There is one controller called ItemController with one constructor to make sure that all the users have logged to access the pages. There are also three main methods to respond to the user requests. Controller validates the requests and sends the requests to the model and after processing directs the user to the appropriate routes.
Route
Routes are defined in “routes” directory. Routing is the application navigation in specific manner. Get and post are two main application routes here as well as Auth::routes() that being created by the scaffolding for user authentication. For normal link navigation get method used and for sending form input to controller post method is used to protect user information being seen in the URL.
Seeding 
PhotosTableSeeder class create to handle database table with regards to the API provided to input data with specific records. In this class run() function gets the file content from API url address and decode it to JSON. Then a foreach loop goes through the record and creates records incrementally.

Testing
To visualize the application browser testing screenshots have been made in several cases to demonstrate the scope of the application success.
Test Action form:
 
Fig 2







Test action form options:
 
Fig 3







	

Test form validation:
 
Fig 4









Test successful image upload:
 
Fig 5









Test display uploaded image in view:
 
Fig 6
