<?php 
    define('APP_FUNCTION', 'Inventory');

    $year_query = mysqli_query($db, "SELECT * FROM years");
	$years = mysqli_fetch_all($year_query, MYSQLI_ASSOC);

	$brand_query = mysqli_query($db, "SELECT * FROM brands");
	$brands = mysqli_fetch_all($brand_query, MYSQLI_ASSOC);

    $brand_query = mysqli_query($db, "SELECT * FROM brands");
	$brands = mysqli_fetch_all($brand_query, MYSQLI_ASSOC);

    $model_query = mysqli_query($db, "SELECT * FROM models");
	$models = mysqli_fetch_all($model_query, MYSQLI_ASSOC);

    $category_query = mysqli_query($db, "SELECT * FROM part_types");
	$categories = mysqli_fetch_all($category_query, MYSQLI_ASSOC);

    $parts_query = mysqli_query($db, "SELECT * FROM parts");
	$parts = mysqli_fetch_all($parts_query, MYSQLI_ASSOC);
    
?>
<!DOCTYPE html>
<html>
<?php include("includes/home/head.php"); ?>
<body class="font-s-md line-h-md text-grey-600 dark:text-grey-100 bg-slate-50 dark:bg-slate-900">

    <?php include("includes/home/navbar.php"); ?>

	<main class="w-full d-flex flex-column min-vh-100 align-items-center justify-content-center pt-68 sm:pt-60">

        <section class="d-flex flex-column w-three-fifth sm:w-full align-items-center justify-content-center py-16 px-40 lg:px-40 sm:px-16 overflow-hidden center-text sm:left-text">
            <h4 class="font-s-2lg font-w-semibold color-black dark:color-white line-h-normal mb-16">Available Parts!</h4>
        </section>

        <section class="d-flex flex-column w-full align-items-center justify-content-center mt-12 mb-68 px-72 lg:px-16 md:px-16 sm:px-16 sm:flex-column sm:w-full">
            <div class="d-grid w-full grtpcols-3 line-h-sm lg:grtpcols-2 sm:grtpcols-1 gap-20 justify-self-center align-items-center sm:w-full">
                <?php include("includes/blog-card.php") ; ?>
            </div>

        </section>
        
        <?php include("includes/home/footer.php"); ?>
    </main>
</body>

</html>