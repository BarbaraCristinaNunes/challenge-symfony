# challenge-symfony -> Dependency Injection

## Learning objectives
* Understand the value of a Dependency Injection Layer
* Use the DI container inside Symfony
* Knows how to configure services and dependencies

----
## Steps

### Step 1
Create an interface called transform, that requires one public method called transform, this function accepts a string and returns a string. <b> OK </b>

Make a class which capitalizes every other letter in a string (eg: "hElLo WoRlD"). Implement the transform interface. <b> OK </b>

Make another class which changes all spaces to dashes "-" (eg: "hello-world-i-love-to-code"). Implement the transform interface. <b> OK </b>

Make a logger class which logs messages in a file called "log.info". <b> OK </b>

### Step 2
Now make a "master" class which accepts a user input (simple form with 1 field). It should do the following. <b> OK </b>

I log the message <b> OK </b>

I echo it to the screen using the weird capitalization <b> OK </b>

Reuse the classes you made inside the master class, but you should not use the keyword "new" inside the master class. Pass it to the constructor. OK

You can execute this master class in a simple controller. <b> OK </b>

### Step 3: Polymorphism
Add a dropdown with 2 options in your form (keep it simple, just an html dropdown will be enough for now). The 2 options are the names of the 2 classes you made that transform a string. Make it so that depending on the user input one transformation is applied. <b> OK </b>

Do not change anything in your master class file!

I am able to change the behavior of the master class without having to change any code in the master class! <b> OK </b>

This is a really powerful concept called polymorphism. It is made possible because both classes use the same interface, so they have the same function names: the code that uses this class does not care about which one it gets, as long as it has a function called transform.

In short: When two objects have the same interface, they are functionally interchangeable = polymorphism.

----
## My observations

### 12/01/2022

I can write the message in log.info file, but my code rewrite the messages. So in this moment I can't save one message after another. <b> I have to resolve this problem yet </b>

<b> ==> My code was rewritng my messages because I forgot to write FILE_APPEND in method file_put_contents() from Logger.php </b>

I don't show the messages on brouser yet also!

<b> ==> Now I can show the message on browser because I created a method caled getMessage() in Master class. This method return the message after it is tranformed and I return this message as a variable in method changeMessage() from controller when I return a render where I call homepage.