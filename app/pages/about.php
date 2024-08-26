<?php

    define('APP_FUNCTION', 'Hello WOrld - ');

?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/home/head.php"); ?>
</head>

<body>
    <div class="colorlib-loader"></div>
    <!--end of side-nav-->

    <main id="main" class="main relative">

        <!--navbar headr begins-->
        
        <?php include("includes/home/navbar.php") ; ?>
        
        <!--home section begins-->
        <section id="home" class="d-flex col cen-hor w-100 krypton relative post--content">
            <h4>ABOUT US</h4>
            <p>Hello World</p>
			
        </section>
        <!--Home Section ends-->


    </main>

    <?php include("includes/home/footer.php"); ?>
</body>

</html>