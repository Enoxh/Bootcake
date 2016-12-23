
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="#">WebSiteName</a>
    </div>


    <?php

    if (!securePage($_SERVER['PHP_SELF'])){die();}

    //Links for logged in user
    if(isUserLoggedIn()) {

    include_once('user_menu.php');


    //Links for permission level 2 (default admin)
    if ($loggedInUser->checkPermission(array(2))){
    include_once('admin_menu.php');
    }
    } 
    //Links for users not logged in
    else {

    }

    ?>   

    </div>
    </nav>
