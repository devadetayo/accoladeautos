<?php

    $request_uri = $_SERVER['REQUEST_URI'];
    $base_uri = '/accoladeautos/search/';
    if(strpos($request_uri, $base_uri) === 0){
        $term = str_replace($base_uri, '', $request_uri);
        $term = urldecode($term);
    }else{
        $term = '';
    }

    if($term != ''){
        define("APP_FUNCTION", "Search for '" .$term . "'");
    }else{
        define("APP_FUNCTION", "Search for amazing content");
    }

    $year_query = mysqli_query($db, "SELECT * FROM years");
    $years = mysqli_fetch_all($year_query, MYSQLI_ASSOC);

    $brands_query = mysqli_query($db, "SELECT * FROM brands");
    $brands = mysqli_fetch_all($brands_query, MYSQLI_ASSOC);

    if(!empty($term)){
        $parts = searchPosts($term);
    }
    
?>
<!DOCTYPE html>
<html>
<?php include("includes/home/head.php"); ?>
<body class="font-s-md line-h-md text-grey-600 dark:text-grey-100 bg-grey-50 dark:bg-slate-900">

    <?php include("includes/home/navbar.php"); ?>

	<main class="w-full d-flex flex-column min-vh-100 align-items-center justify-content-center pt-68 sm:pt-60">
        <section class="d-flex flex-column w-full align-items-center min-vh-60 justify-content-center py-16 px-40 lg:px-40 sm:px-16 overflow-hidden">
            <h4 class="font-s-2xl font-w-semibold color-black dark:color-white line-h-normal mb-16">Enter Text to Search!</h4>
            <p>What are you looking for?, let's help you find it.</p>
            <form class="d-flex w-two-fifth py-28 search-form sm:w-full" method="POST">
                <label class="d-flex position-relative w-full p-8">
                    <input type="text" name="search-term" class="d-flex w-full py-16 px-24 h-full w-auto border-round-pill bg-white dark:bg-slate-700 focus:border-indigo-500 focus:bg-transparent dark:focus:bg-transparent dark:focus:border-indigo-500 transition-duration-300 transition-ease-in-out transition-property-all border-w-3 border-solid border-slate-100 dark:border-slate-600" placeholder="Some text" value="<?php if(!empty($term)) { echo $term ?> <?php } ?>">
                    <button type="submit" name="search" class="w-max no-decoration-text d-flex align-items-center justify-content-center p-12 gap-4 bg-indigo-500 color-white border-round-pill hover:bg-indigo-600 active:indigo-400 gap-12 position-absolute" style="right: 14px; top: 13px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M168,112a56,56,0,1,1-56-56A56,56,0,0,1,168,112Zm61.66,117.66a8,8,0,0,1-11.32,0l-50.06-50.07a88,88,0,1,1,11.32-11.31l50.06,50.06A8,8,0,0,1,229.66,229.66ZM112,184a72,72,0,1,0-72-72A72.08,72.08,0,0,0,112,184Z"/></svg></button>
                </label>
            </form>
            <div class="w-full footer d-flex flex-column justify-content-center align-items-center">
                <p>Click to search by? <a href="<?php echo ROOT ?>/searchparts" class="no no-decoration-text color-indigo-500 hover:color-indigo-400 active:color-indigo-200">Brands and Models</a> instead</p>
            </div>
        </section>
        
        <section class="d-flex flex-column w-full align-items-center justify-content-center mb-68 px-72 lg:px-16 md:px-16 sm:px-16 sm:flex-column sm:w-full">
            <?php if(!empty($term)) : ?>
            <div class="d-grid w-full grtpcols-3 line-h-sm lg:grtpcols-2 sm:grtpcols-1 gap-20 justify-self-center align-items-center sm:w-full">
                <?php include("includes/blog-card.php") ; ?>
            </div>
            <?php else : ?>
            <div class="d-flex w-full line-h-sm gap-20 justify-content-center align-items-center sm:w-full">
                <h4 class="font-s-xl font-w-semibold color-black dark:color-white line-h-normal mb-16 center-text">Nothing to See here</h4>
            </div>
            <?php endif ; ?>
        </section>
        
        <?php include("includes/home/footer.php"); ?>
                    

    </main>
</body>

</html>