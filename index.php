<?php
    require('header.php');
?>


    <form class="form-signin text-center" method="post" action="chatbox.php">
        <h1 class="h3 mb-3 font-weight-normal">What people should call you?</h1>
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name.." required autofocus>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id="submit" value="Sign in">   
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>


<?php
    require('footer.php');
?>