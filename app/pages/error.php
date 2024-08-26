<?php 
    define('APP_FUNCTION', "404 Error page");

?>
<html>
<?php include("includes/home/head.php"); ?>
<body class="font-s-md line-h-md text-grey-600 dark:text-grey-100 bg-white dark:bg-slate-900">

    <main class="w-full d-flex flex-column min-vh-100 align-items-center justify-content-center">

        <section class="d-flex min-vh-100 w-full align-items-center justify-content-center mt-24 px-72 lg:px-40 sm:px-16 pt-28 xm:min-vh-100 md:min-vh-90 sm:min-vh-100">
            <div class="d-flex flex-column w-three-quarter sm:w-full h-full align-items-center justify-content-center center-text gap-16">
                <img src="<?php echo ROOT ?>/assets/images/404.png" class="w-44 d-flex sm:w-full">
                <h1 class="font-s-2xl font-w-semibold color-black dark:color-white sm:font-s-2xl line-h-normal">Opps!, Can't seem to find this page</h1>
                <p class="w-full">The page you are looking for may have been deleted or broken.</p>
                <div class="d-flex w-full h-auto align-items-start justify-content-center mt-8 gap-16">
                    <a href="javascript:history.back()" class="no-decoration-text d-flex align-items-center justify-content-center px-24 h-24 gap-4 border-red-500 border-solid border-w-1 color-red-500 border-round-md hover:bg-red-500 hover:color-white active:bg-red-400">Go back</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>