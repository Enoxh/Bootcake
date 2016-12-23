<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
       Menu
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">








      <ul class="nav navbar-nav">
        <li class="active">
       
      </ul>
       <ul class="nav navbar-nav navbar-right">
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"> </i>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php

    if (!securePage($_SERVER['PHP_SELF'])){die();}

    //Links for logged in user
    if(isUserLoggedIn()) {

    echo "
	
	<li><a class='btn' href='account.php'><i class='glyphicon glyphicon-dashboard'></i> Dashboard</a></li>
	<li><a class='btn' href='user_settings.php'>User Settings</a></li>
	<li><a class='btn' href='logout.php'>Logout</a></li>
     </ul>
      </li>
	";


    //Links for permission level 2 (default admin)
    if ($loggedInUser->checkPermission(array(2))){
 	echo "
	 <li class='dropdown'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'><i class='glyphicon glyphicon-cog'></i>
        <span class='caret'></span></a>
        <ul class='dropdown-menu'>
	<li><a class='btn' href='admin_configuration.php'>Admin Configuration</a></li>
	<li><a class='btn' href='admin_users.php'>Admin Users</a></li>
	<li><a class='btn' href='admin_permissions.php'>Admin Permissions</a></li>
	<li><a class='btn' href='admin_pages.php'>Admin Pages</a></li>
	";
    }
    } 
    //Links for users not logged in
    else {

    }

    ?> 
  
    </ul>
           </li>
    </div>
  </div>
</nav>