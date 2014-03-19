#FuelPHP

* Version: 1.7
* [Website](http://fuelphp.com/)
* [Release Documentation](http://docs.fuelphp.com)
* [Release API browser](http://api.fuelphp.com)
* [Development branch Documentation](http://dev-docs.fuelphp.com)
* [Development branch API browser](http://dev-api.fuelphp.com)
* [Support Forum](http://fuelphp.com/forums) for comments, discussion and community support

## Description

FuelPHP is a fast, lightweight PHP 5.3 framework. In an age where frameworks are a dime a dozen, We believe that FuelPHP will stand out in the crowd.  It will do this by combining all the things you love about the great frameworks out there, while getting rid of the bad.

## More information

For more detailed information, see the [development wiki](https://github.com/fuelphp/fuelphp/wiki).

## Note

* FuelPHP-BlogMVC is a very simple blog application with FuelPHP
* No SQL dump file was needed, defaults data are added by migrations files
* Admin login : admin/admin

## Install

1. See [FuelPHP Installation](http://fuelphp.com/docs/installation/instructions.html) for installation of the framework
2. Edit config db in fuel/app/config/development and fuel/app/config/production
3. Load migration : Open console and run `oil refine migrate --all`
4. Enjoy !

## Features

* Usage of ORM Model and relationship
* Usage of SimpleAuth for Authentification
* Usage of Cache class and HMVC Request for the sidebar
* Usage of Pagination class
* Usage of Fieldset class for form (post and comment)
* Usage of Router class for all links
* Usage of Theme class
* Usage of Markdown class
* Usage of translation files
* Usage of migration files