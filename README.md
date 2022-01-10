# challenge-symfony

## Learning objectives
* Install Symfony
* Learn about the lifecycle of software
* Learn to use the MVC layer of Symfony
* Learn to use the routing component
* Learn the basics of twig

----
## Steps

### 1. Isntalling Composer
I have a local folder called GitHub where I work with all projects and keep my repositories.

In GitHub folder I opened an cmd terminal and typed to create composer-setup and composer.phar the following code:

>php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

>php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

>php composer-setup.php

>php -r "unlink('composer-setup.php');"

From https://getcomposer.org/download/


I created a folder called Composer where I put composer-setup and composer.phar. I got this folder and put its in C:\Users\userfolder\Composer

Then:
*Using cmd.exe:

>C:\bin> echo @php "%~dp0composer.phar" %*>composer.bat

*Using PowerShell:

>PS C:\bin> Set-Content composer.bat '@php "%~dp0composer.phar" %*'

Now in C:\Users\userfolder\Composer I also have a composer.bat and I can use this composer globally.

----
### 2. Isntalling Gofish

Using PowerShell terminal I installed [GoFish](https://gofi.sh/#install) package manager using the following code:

>Set-ExecutionPolicy Bypass -Scope Process -Force
iex ((New-Object System.Net.WebClient).DownloadString('https://raw.githubusercontent.com/fishworks/gofish/main/scripts/install.ps1'))

Then:
>gofish init

Then: 
>gofish install gofish

Then:
>gofish upgrade gofish

I installed [Symfony](https://symfony.com/download) using the following code:

> gofish rig add https://github.com/symfony-cli/fish-food

>gofish install github.com/symfony-cli/fish-food/symfony-cli

----

### 3. Create Symfony project

I created this repository to work with my first project using Symfony.

Into this repository I required apache/pack using the command:

>composer require symfony/apache-pack

And I created a symfony structre using the command:

>composer create-project symfony/website-skeleton symfony-mcv