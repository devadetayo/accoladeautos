<?php

    define('APP_FUNCTION', 'Hello World - ');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $year_id = $_POST['year'];
        $brand_id = $_POST['brand'];
        $model_id = $_POST['model'];
        $part_type = $_POST['category'];

        $parts = getParts($year_id, $brand_id, $model_id, $part_type);
    }else{
        redirect('searchparts');
    }

?>
<!DOCTYPE html>
<html>
<?php include("includes/home/head.php"); ?>
<body class="font-s-md line-h-md text-grey-600 dark:text-grey-100 bg-grey-50 dark:bg-slate-900">

    <?php include("includes/home/navbar.php"); ?>

	<main class="w-full d-flex flex-column min-vh-100 align-items-center justify-content-center pt-68 sm:pt-60">

        <section class="d-flex flex-column w-three-fifth sm:w-full align-items-center justify-content-center py-16 px-40 lg:px-40 sm:px-16 overflow-hidden center-text sm:left-text">
            <h4 class="font-s-2lg font-w-semibold color-black dark:color-white line-h-normal mb-16">Available Parts!</h4>
        </section>
        
        <section class="d-flex flex-column w-full align-items-center justify-content-center mt-12 mb-68 px-68 lg:px-16 md:px-16 sm:px-16 sm:flex-column sm:w-full">
            <?php if(!empty($parts)) : ?>
            <div class="d-grid w-full grtpcols-3 line-h-sm lg:grtpcols-2 sm:grtpcols-1 gap-20 justify-self-center align-items-center sm:w-full">
                <?php include("includes/blog-card.php") ; ?>
            </div>
            <?php else : ?>
                <p>No parts Available!</p>
            <?php endif ; ?>
        </section>
        
        <?php include("includes/home/footer.php"); ?>
                    

    </main>

    <script src="<?php echo ROOT ?>/assets/js/ajax.js"></script>
</body>

</html>