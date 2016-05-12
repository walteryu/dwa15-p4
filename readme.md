# HES, DWA-15 P4 - Final Project (StormSafe)

## Live URL
Please login using seed accounts per [Instructions](http://bit.ly/1R0cZZk) for the final project:

[StormSafe, Environmental App](http://p4.walteryu.pw)

## Objectives
* All users to track projects and site inspections to meet
  environmnetal permit requirements (primarily Water Quality)
* Save users time in filling out, submitting and storing paper forms
* Improve project record retention by storing them electronically
* Allow users to complete site inspection reports using the website, based
  on the US EPA [site inspection template](http://1.usa.gov/27hdYQA)

## Description
StormSafe helps Civil & Environmental engineers with environmental compliance.

The application is a PHP implementation of my personal project 
[StormSavvy](http://stormsavvy.com/), which is written in Ruby on Rails.

StormSavvy has the following features (inspiration for this assignment):

* Weather forecast and POP alerts using the NOAA XML API and Wunderground JSON API
* PDF generation using the [PrawnPDF RubyGem](https://rubygems.org/gems/prawn/versions/2.1.0)
* Document/image storage using Amazon S3
* User weather forecast and document attachment emails using SendGrid and
  [ActionMailer](http://guides.rubyonrails.org/action_mailer_basics.html)

## Video Demo
[Demo on YouTube](https://youtu.be/zrTFrxOlIgM)

Demo covers the following items:

* Walkthough of basic and bonus features 
* Coverage of major features within code base
* Known issues and/or challenges during development

Please note the demo length is 6 minutes (not 5 minutes per assignment instructions) due to time
for covering bonus features, issues/challenges and my StormSavvy app (used for reference).

Video is submitted using personal project account (StormSavvy), which contains my coding demos
for that project, showing major features as listed above.

## Details for Teaching Team

Application is a PHP implementation of my personal project, StormSavvy.

Lecture videos and Foobooks example were referenced during the planning/development
process for the following features:

* Master layout and parent/child template inheritance
* Some styling from Foobooks CSS stylesheets
* Foobooks search feature was re-implemented within this project

General approach was to use the Foobooks example as a scaffold during
development, then remove code as the features were completed; as a
result, commit history will show this progression within the code base.

Commits are made on an atomic level using "git add -p" command for clarity during
development, hence they are small in nature and also show references to Foobooks.

## Known Issues

### 1. Model Namespacing

As discussed during TA section, there are issues with the \App
namespace; as a result, the following adjustments were made:

* Most business logic is contained within the controller
* CRUD operations are completed using the Database Facade instead of
  Eloquent
* Model attributes are passed using arrays instead of Eloquent model
  objects

The upside of working with user data/model attributes provided a better
understanding of the following:

* PHP arrays, which helped with the Wunderground & Geocoder bonus features
* CRUD operations, which helped troubleshoot any database/migration issues

### 2. Wunderground API Forecast

Feature works in development; however, once pushed onto the server, the
data "forecast" array throws a "value unknown" error and crashes the
show project page.

As a result, feature is commented out to avoid breaking the page and
remains in the code base for review.

### 3. Google Maps API

Geocoding was successfully completed, lat/long received using the
getLatitude() and getLongitude() methods; however, data array also
throws "value unknown" error and crashes the show project page.

As a result, feature is commented out to avoid breaking the page and
remains in the code base for review.

## Additional Features

### 1. Integration/Unit Testing (PHPUnit)

Unit tests have been written in an integration-like style to cover 
project/inspection CRUD operations.

Tests are written using PHPUnit and test cases are located in the /tests directory;
test suite can be run using either the "phpunit" or "/vendor/bin/phpunit" command.

Ideally, the tests should have been written concurrently with
development but were written after development of the CRUD operations as
regression tests instead of test-driven development (TDD).

The following links were used in setting up and developing the
unit/integration tests:

[Model Unit Testing - TutsPlus](
http://code.tutsplus.com/tutorials/testing-like-a-boss-in-laravel-models--net-30087
)
[Model Unit Testing & Configuration](
http://www.patrickstephan.me/post/setting-up-a-laravel-5-test-database.html
)
[Integration Unit Testing Tutorial](
https://mattstauffer.co/blog/better-integration-testing-in-laravel-5.1-powerful-integration-tests-in-a-few-lines
)

### 2. User Data Visualization (D3.js & C3.js)

Users can see their project/inspection data in bar chart using the [D3.js](https://d3js.org/) and
[C3.js](http://c3js.org/) data visualization libraries.

Bar charts show user their current number of project/inspections and code is contained within
the [Project Controller](
https://github.com/walteryu/dwa15-p4/blob/master/app/Http/Controllers/ProjectController.php
)

Chart can be viewed from the "chart" link from the top navigation bar.

### 3. 10-day Weather Forecast (Wunderground API)

Feature works in development; however, it throws an "unknown value" error in production
as described above.

API was used to return a JSON document, which included a detailed 10-day forcast with
percentage of rain, forecast description and date/time: [Wunderground JSON API Documentation](
https://www.wunderground.com/weather/api/d/docs
)

As a result, code is contained within the [Project Controller](
https://github.com/walteryu/dwa15-p4/blob/master/app/Http/Controllers/ProjectController.php
)

### 4. Geocoding & Project Site Map (Geocoder Package & Google Map API)

Geocoder package was used for returning lat/long values for given
zipcode; user would input zipcode with their project, which would then
return lat/long for requesting site map form Google Map API.

Geocoder lat/long response was successfully incorporated but data array
returns an an "unknown value"; as a result, feature was commented out
for sake of completing remaining project requirements on time.

As a result, code is contained within the [Project Controller](
https://github.com/walteryu/dwa15-p4/blob/master/app/Http/Controllers/ProjectController.php
)

### 5. Wunderground API Caching (Redis)

Bonus feature started but commented out due to time limitations; intent was to cache 
Wunderground API response for the following reasons:

* Save page load time due to having to make API request
* Stay below Wunderground API request limit (fee required past limit)

Feature also provided an understanding of the Redis PHP implementation (StormSavvy uses
Redis as part of the SideKick RubyGem for speeding up PDF generation using 
multi-threading processes).

As a result, code is contained within the [Project Controller](
https://github.com/walteryu/dwa15-p4/blob/master/app/Http/Controllers/ProjectController.php
) and commented out to avoid issues in production. Main issue is that
Redis needs to be installed to read from the correct port in order to
run correctly (works correctly in development).

### 6. Additional Demo Video (Posted on Login Page)

Treating this project as if it were a real-life Minimum Viable Product
(MVP), I posted an additional demo video to the login page to explain
basic and bonus features

## References & Outside Code

Outside code/libraries were used as follows:

### Basic Feature Reference:
* [StormSavvy](http://stormsavvy.com/) - Original Ruby on Rails implementation of StormSafe
* [Bootstrap Documentation](https://v5-alpha.getbootstrap.com/components/forms) - Referenced for form elements
* [Bootstrap](http://getbootstrap.com) - Called as CDN Asset from master layout view template
* [Subtle Patterns](http://subtlepatterns.com) - Background image, which are set within stylesheet
* [Laravel Docs on Validation](https://laravel.com/docs/5.1/validation) - Referenced for HTML form validation/error handling

* [Class Notes](https://github.com/walteryu/dwa15-spring2016-notes) - Referenced for Foobooks example, search box feature and pulldown menu (book/authors)
### Bonue Feature Reference:
* [Laravel Docs on Testing](https://laravel.com/docs/5.1/testing) - Referenced for PHPUnit unit/integration testing in Laravel
* [Laravel Docs on Testing](https://laravel.com/docs/5.2/redis) - Referenced for Redis setup/configuration
* [PHP Geocoder Package on Github](https://github.com/geocoder-php/Geocoder) - Used for geocoding project zipcode to return lat/long
* [D3.js](https://d3js.org) - Data visualization library used for
  showing user project/inspection metrics
* [C3.js](http://c3js.org) - Add-on library used together with D3.js
* [Predis Package on Packagist](https://packagist.org/packages/predis/predis) - Required for using Redis
* [Laravel Docs on Database Interactions/Facade](https://laravel.com/docs/5.2/database) - Used for with Database Facade due to \App model namespacing issue 
* [Laravel Docs on Query Builder](https://laravel.com/docs/5.2/queries) -
Used for CRUD operations (create/edit) due to \App model namespacing issue
