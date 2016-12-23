<?php
//ALL PAGES MUST HAVE THESE 2 LINES OF CODE AT THE TOP
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
//END OF MUST HAVE 2 LINES
    
//ALWAYS CALL CLASSES BEFORE THE HEADER!
$main = new MainClass($mysqli);

//header will be on every page that a member sees.
require_once("models/header.php");

//getting data from DB for JS
/*REMEMBER THIS DATA WILL BE PUBLIC!!!!!*/
$users_js = json_encode($main->getUsersForJs());
?>

<body>
<!--menu-->
<?php include("top-nav.php"); ?>

<div class='container'>

<div class='row'>

<div class='inner'>
Hey, <?php echo $loggedInUser->displayname; ?>!
 
<p>Here are examples of all of the things that $loggedInUser has in it. (array)</p>
    
    
<?php echo $loggedInUser->username; ?> 

<?php echo "<br/>"; ?>     

<?php echo $loggedInUser->displayname; ?> 

<?php echo "<br/>"; ?> 

<?php echo $loggedInUser->title; ?>

<?php echo "<br/>"; ?> 

<?php echo date("M d, Y", $loggedInUser->signupTimeStamp()); ?>

<?php echo "<br/>"; ?> 

<?php echo $loggedInUser->email; ?>

<?php echo "<br/>"; ?>    

<?php echo $loggedInUser->user_id.' This is your userId'; ?>

<?php echo "<br/>"; ?>   


<p>To access class.main use $main->nameofpublicfunction(); <br/>
    
    <p>Example: $main->getUserList();</p>
    
    <?php echo $main->getUserList(); ?>
    
    or to get a variable called $this->test from the constructor you could use (see code) $main->test;
    
    <?php

    echo '<br/>Example: '.$main->test;
    
    ?>
    </p>
   
   
</div>
<div id='bottom'></div>
</div>
    
    
    <script>
    
  var users = JSON.parse(<?php echo $users_js; ?>);    
    
  console.log(users);  
    
    </script>
    
</body>
</html>
<!--this is red because the opening tags are in header.php that's OK-->

