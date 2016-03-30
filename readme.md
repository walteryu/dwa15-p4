# HES, DWA-15 P3 - Random Text & User Generator

## Live URL
<http://p3.walteryu.pw>

## Description
Random text/user generator (Developer's Best Friend Application) that 
generates random text (lorem ipsum) and random users based on user input.

Random text is generated based on user input for number of paragraphs
between 0-9; user input is validated and error message returned if
conditions are not met.

Random users is generated based on user input for number of paragraphs
between 0-9; user input is validated and error message returned if
conditions are not met. 

## Demo
YouTube video is submitting using personal project account (StormSavvy),
which contains my other coding demos:

[Demo on YouTube]()

## Details for Teaching Team

Lecture videos were referenced for general approaches to starting the
homework set and class foobooks examples used as starting point for problem set.

No login is required since there are no user accounts; POST/create forms
are protected against CSRF attacks with the csrf_field() method.

Form validation is handled both server-side (controller validation methods) and
client-side (HTML5 validation methods); jQuery was considered for client-side
validation but abandoned due to time constraints.

Commits are made using "git add -p" command; hence they are small/atomic
in nature.

## References & Outside Code
* [Bootstrap](http://getbootstrap.com) - Called as CDN Asset
* [Class Notes](https://github.com/walteryu/dwa15-spring2016-notes) - Reference for Controllers/Views
* [Subtle Patterns](http://subtlepatterns.com) - Background Image, Set Inside Stylesheet
* [Bootstrap Documentation](https://v5-alpha.getbootstrap.com/components/forms) - Referenced for Form Elements
* [Laravel Docs](https://laravel.com/docs/5.1/validation) - Referenced for HTML Form Validation/Error Handling
