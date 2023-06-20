# Blog App

<b> Scenario : </b> Suppose you have a website named as myblogs.com, and in your website user can add new blogs so that other users can see their blogs. So whenever any random user opens your site the list of blogs should be seen. 

<b>User Panel : </b> 

<li> Sign up and login functionality for user. </li> 
<li> In homepage list all the latest posts in pagination of 10. To see all the posts login of user is not necessary.</li> 
<li> Give a create post button in home page to create post.</li> 
<li> On click on the create post, user should redirect to create post form, if user is not logged in, redirect it to login page.</li> 
<li> Post form should have Title, Description and save button. For insert the description use CKEDITOR.</li> 
<li> After saving it will show in list of homepage. </li> 
<li> Give a My Post button in homepage, on click on that user can see all his posts with action of Edit and Delete. </li> 
<li> On edit, user can edit his own post. User should not be edit any other user posts. </li> 
<li> User can also delete his own post. </li> 

<br>

<b> Admin Panel : </b>

<li> Create only login page for admin, admin data should be store in another table called admins. </li> 
<li> Create migration for admins table. Admin should be able to login using this table. </li> 
<li> On homepage, list all users post with action of edit, delete and block. </li> 
<li> On view user can view full detail of Posts. </li> 
<li> Also create a tab to see all users of his application. </li> 
<li> Give functionality to block us. </li> 
<li> Block users does not able to log in. </li> 



## Laravel Multi Authentication System (Admin / User) in Laravel 10

<li> composer require laravel/breeze </li>
<li> php artisan breeze:install </li>
<li> npm install </li>
<li> npm run build </li>
<li> php artisan serve </li>

# Steps to Run the application on local system

1. Clone this repository in your local system.
2. To download the <b>node_modules</b> folders in a Laravel application, you can use the following steps: <br>
• Open your command-line interface (CLI) or terminal. <br>
• Navigate to the root directory of your Laravel application. <br>
• `npm install` and `composer install` <br>

3. Run this command `php artisan serve` to start the server.
4. Start the application from `http://127.0.0.1:8000/` using local server.
5. To access the admin dashboard go to `http://127.0.0.1:8000/admin/login` using local server.

--- 
<h3 align='center'>Hope you like this application :)</h3>
<h4 align='center'>Show some ❤️ by giving ⭐ to this repository !!</h4>
