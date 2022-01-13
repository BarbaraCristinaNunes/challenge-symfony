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

### 4. Use the MVC
When I created my project Symfone made a folder with a MVC structure with folde templates, where are my views. In folder src I have folder Controller, to keep my controllers and Entity, to keep my models.

### 5. Add some functionality

I created a new view called showMyName, where I did a form with a path, an input to get name and a button.
In LearningController I created the method showName() to execute the functionality when a user clik on the button.

Now I can't see my page on browser. I don't know why yet but since I wrote functon showName it hasn't worked. I am tring to fix this problem.

<B>NOTE: Yesterday my project was not wotking because I was runing it localy. Now I am using web server link and my path is working! </B>

> Use symfony server:start to start web server

I created the method changeMyName() where I set input's value in a session. To get input's value I used Request component. A Request object holds information about the client request. This information can be accessed via several public properties. I uses method POST in my form so I used <b> request</b>: equivalent of $_POST and method get('input's name').
So I have this => <b> $name = $request->request->get('name'); </b>

> [use Symfony\Component\HttpFoundation\Request](https://symfony.com/doc/current/components/http_foundation.html)

To save input's value in a session I used Session component and the method set('name', $name).

> [use Symfony\Component\HttpFoundation\Session\Session](https://symfony.com/doc/current/components/http_foundation/sessions.html);

To redirect the user to homepage after get and save input's value I used RedirectResponse component.

> [use Symfony\Component\HttpFoundation\RedirectResponse](https://symfony.com/doc/current/components/http_foundation.html);

### 5. Add links on pages

I added the following line to create links in homepage (showMyName.html.twig) and about me page (index.html.twig). Read more abotu this method [here](https://symfony.com/doc/current/templates.html#templates-link-to-pages)

> '<a href="{{ path('blog_index') }}"'>'Homepage '<'/a>'

----

# challenge-twig

I had prolem to start this new exercise because my serve was been used in another project and I didn't know how to stop this. 

I found ths following code and it stoped my server. So I could continue with my exercise.

>symfony server:stop

## Must-have features
Use the MVC Routing exercise you created previously. If yours was unstable, ask another student to use theirs. 

- Add a <footer>&copy; Becode</footer> in the base template file, this footer should appear on all pages!<b>OK</b>

### Menu
- in the base.html.twig file add a menu block surrounded by an ``<aside>`` tag (make it appear to the left with css).<b>OK</b>

- Inside the menu block add 2 links to the homepage and the about me page. <b>OK</b>

### About me
Added some content to the new left menu that only appears on the about-me page.
I show the current date in 3 different formats in the left menu, but only pass a `DateTime` object once trough your controller. <b>OK</b>

Imported the `DateTime` class! <b>OK</b>

- Europe: DMY <b>OK</b>
- America: MDY <b>OK</b>
- China & Japan: YMD <b>OK</b>

To do this I need to use the [format_date](https://twig.symfony.com/doc/3.x/filters/format_date.html) filter.

### Home page (show my name)
Now we add some extra functionality on the homepage, in the menu below the default navigation.

Let show his name with each word capitalized, but all the rest in lower case, so "JOHN SMITH" becomes "John Smith".

You will need to a filter to do this, here is a selection that might be useful:

- [capitalize](https://twig.symfony.com/doc/3.x/filters/capitalize.html)
- [title](https://twig.symfony.com/doc/3.x/filters/title.html)
- [upper](https://twig.symfony.com/doc/3.x/filters/upper.html)
- [lower](https://twig.symfony.com/doc/3.x/filters/lower.html)

### Creating a custom twig helper
Sometimes you want to add a piece of custom code on several places in your website, and always passing the same code to your controller can become cumbersome. 
This is why we can extend with our custom twig functions and filters!

We are going to create a "Random quote generator", you don't need to write the code for the quotes anymore, just copy the [quotes.php](quotes.php) script. Add a random quote on each page below the current content.

You need a custom [TwigFunction](https://symfony.com/doc/current/templating/twig_extension.html) to do this, follow the symfony documentation for more information.

Make sure to show the enters ```(<br>)``` being displayed in the quotes, don't show a quote on only 1 line.
You can do this with the [nl2br filter](https://twig.symfony.com/doc/3.x/filters/nl2br.html).