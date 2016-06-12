# blockBruteForceLogin

![license](https://img.shields.io/packagist/l/alphayax/freebox_api_php.svg)

BlockBruteForce light weight open source library that automatically prevent bruteforce login attempts on your website(s) login forms.
This library is design to be easily used and installed. The necessary dependencies such as the database(optionally) and table need
for the blockbruteforce is automatically taken care of under the hood so there is no need for you to spend additional minutes setting
it up. The goal of this library is to give you peace of mind and more time on focus on building your applications and keep hackers
at the bay. As we all know, when it comes to security, there is no single method that works for everything. As mentioned,
this library is a light weight and focus solely on registering the user failed attempts, update the attempt, block the user
for x amount of time which is specified by you as well as return how many minutes before the user may try to login again. With that
being said, this library is not meant to be use alone as the overall security to your application but incoprate with your existing
security implementation and is only used to do the functions specified above.

#Divisions
1. [`config.php`](https://github.com/kemoycampbell/blockBruteForceLogin/blob/master/config.php) - use to configure the database/ as well as developer localhost and production settings such as enableDebug,enable sandbox, maxAttempts and blockTime
2. [`block.php`](https://github.com/kemoycampbell/blockBruteForceLogin/blob/master/block.php) - contains the instance of the `BlockBruteForce.php` and the config. This class does not require any changes.
3. [`BlockBruteForce.php`](https://github.com/kemoycampbell/blockBruteForceLogin/blob/master/BlockBruteForce.php) - This is the class file and the core of the library
4. [`autoload.php`](https://github.com/kemoycampbell/blockBruteForceLogin/blob/master/autoload.php) - include this on every pages you want to use the library as it will autoload the necessary dependencies.
5. [`kemoybrute_force_login_attempts.sql`](https://github.com/kemoycampbell/blockBruteForceLogin/blob/master/kemoybrute_force_login_attempts.sql) -  This is the sql for to generate the table need for the blockbruteforce. This file should NOT be modified. In additonal,there is no need to automatically upload this file unless necessary. The file is automatically uploaded when you included the 'autoload.php' in your project. If it failed to upload you may try manual but til then do not worry about it.


#Installation
The most recommended way to install this library is using composer. 
###### As a composer dependency:
You can installed it by running the command in the terminal: 

    composer require kemoycampbell/blockbruteforce'

###### Alternative installations:
You may also installed the project by click on the download as zip or run wget  or git clone

#Getting Started | Setting up
In order to get start with this library, you only need to navigate to the [`config.php`](https://github.com/kemoycampbell/blockBruteForceLogin/blob/master/config.php) file and edit the necessary fields which are pointed out with comments. No further changes is necessary in the other files.

#Usage
Below you will find a clear example of the usuage. Truth is with this library you will actually need 1 method namely the $block->isBlock($username) . However, out of courtesy I have set the functions in the class BlockBruteForce.php to public in case you desired to use it in a more complex way and build advance features.
```php
<?php

include('autoload.php');//required

//assume you have some complex login check script here such as this pseduocode

get username and password
hash the password
perform select on database against the username and the hashed password
if select failed:
    //this is where the library come into play

    //this is an example of how to check if a user is block
    $username = 'someone@example.com'
    $res = $block->isBlock($username);
    
    if($res===true)
    {
      echo "No hacking allowed";
    }
    else if($res===false)
    {
      echo "This user is not block :-) "
    }
    
    /**
    *You wont need to do this line if you have debug enabled in config.php
    */
    else if($res instance of \stdClass)
    {
      //print the error
       $block->outputDebug(true); 
    }
```

Remember that it is important to call out to the library as follows:

    $block->someMethod();
    
#Contributing and goal

It is my hope that this library will:
#
1. Mature
2. Fix and patch bugs as they are discovered
3. Improve in robustness
4. Implemented Additional features
5. Remained lightweight

BlockBruteForce is an open source, community-driven project. If you'd like to contribute, feel free to fork the project, play around with it, break it, improve it and lastly but not the least, submit pull requests.

The class documents may be found at [`Document`](http://kemoycampbell.github.io/bruteforce_document/)



