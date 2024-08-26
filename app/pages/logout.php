<?php
    if(!empty($_SESSION['username'])) {
	    unset($_SESSION['username']);
        unset($_SESSION['message']);
	    redirect("login");
        $_SESSION['type'] = 'warning';
        $_SESSION['message'] = "you've been logged out!";
    }

?>