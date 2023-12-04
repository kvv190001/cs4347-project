# WeebWatch - Your anime watching guide #
## CS 4347.005 - Group 11 Semester Project ##
### Group Members: ###
#### - Khue Vu: kvv190001 <br>- Sasha Kaplan: amk20007 <br>- Stephanie Alonso: sxa190124<br>- Nabil Idrissi: nsi190000<br>- Viraaj Veeramachaneni: vxv200023<br>- Winifred Ojo: wxo210000 
Have you ever wanted to watch a new anime and see how much filler there is? Did you want to recommend new shows or episodes to your friends? Do you want to see what shows are the hottest or most popular? Use WeebWatch to solve these problems!

    

#### Tech Stack: <br>Frontend: HTML, CSS, JS<br>Backend/Server: MySQL, PHP, XAMPP

#### Installation/User Guide

Installation and Setup:
This setup guide assumes that PHP, MySQL, and a Server Side (we used XAMPP) is set up on your machine!

1. In your MySQL workbench or command line, run all statements in the create.sql file. Make sure the database you created is called “weebwatchdb”
2. Add a  “db_connect.php” file in your local repository and make the following changes where indicated:
```php
<?php
	$servername = <"YOUR SERVER NAME HERE">;
	$username = <"YOUR USERNAME HERE">;
	$password = <"YOUR PASSWORD HERE">;
	$dbname = "weebwatchdb";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	?>
```

3. Once all of these are configured, from your browser of choice, go to ‘http://localhost/cs4347-project/login.html’

4. Enter your choice of Username, email, and password. You will not have an account created or be navigated to the front page until all fields are filled. To confirm that your account is created, go to the login page and verify your credentials.
 
5. From there, you will be navigated to you homepage. To leave a review, click on the button in the navbar that says “Leave a review!”

6. From there, you will be taken to the review page where you will select your show, episode, rating out of 10, and leave it a review.

7. Upon leaving your reviews, you will be naviaged to the home page where you will see your history of reviews and all other reviews placed in the app

8. To add more reviews, repeat step 6 as much as you want. To see all reviews, go back to the homepage at “http://localhost/cs4347-project/home.html” 
