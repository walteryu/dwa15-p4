# HES, DWA-15 P4 - Final Project

## Live URL
<http://p4.walteryu.pw>

## Description
StormSafe is a web application for environmental compliance.

## Video Demo
YouTube video is submitting using personal project account (StormSavvy),
which contains my other coding demos:

[Demo on YouTube]()

## Details for Teaching Team

Lecture videos were referenced for general approach and planning to starting the
homework set and class Foobooks examples used as starting point for problem set.

Specifically, view template inheritance is referenced place from Foobooks example.
Package installation was completed with help during TA sections.

POST/create forms are protected against CSRF attacks with the csrf_field() method.

Commits are made on an atomic level using "git add -p" command for clarity during
development, hence they are small in nature.

## Additional Features

Form validation is handled both server-side (controller validation methods) and
client-side (HTML5 validation methods); jQuery was considered for client-side
validation but abandoned due to time constraints.

PHPUnit has been implemented for test cases located in the /tests directory;
test suite can be run using either the "phpunit" or "/vendor/bin/phpunit" command.

## References & Outside Code
* [Bootstrap](http://getbootstrap.com) - Called as CDN Asset
* [Class Notes](https://github.com/walteryu/dwa15-spring2016-notes) - Reference for Controllers/Views
* [Subtle Patterns](http://subtlepatterns.com) - Background Image, Set Inside Stylesheet
* [Bootstrap Documentation](https://v5-alpha.getbootstrap.com/components/forms) - Referenced for Form Elements
* [Laravel Docs on Testing](https://laravel.com/docs/5.1/testing) - Referenced for PHPUnit testing in Laravel
* [Laravel Docs on Validation](https://laravel.com/docs/5.1/validation) - Referenced for HTML Form Validation/Error Handling
