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

	<main class="w-full d-flex flex-column min-vh-100 align-items-center justify-content-center pt-68">

        <section class="d-flex flex-column w-three-fifth sm:w-full align-items-center justify-content-center py-16 px-40 lg:px-40 sm:px-16 overflow-hidden center-text sm:left-text">
            <h4 class="font-s-2lg font-w-semibold color-black dark:color-white line-h-normal mb-16">Your Cart!</h4>
        </section>

        <section class="d-flex flex-column w-full align-items-center justify-content-center mt-12 mb-68 px-72 lg:px-16 md:px-16 sm:px-16 sm:flex-column sm:w-full cart-container">
            <?php if(!empty($_SESSION['cart'])) : ?>
            <div class="d-flex flex-column w-full align-items-center w-full h-auto cart-items gap-20">
                <?php include("includes/cartbox.php") ; ?>
                <div class="d-flex w-full align-items-center justify-content-between bg-white border-slate-200 dark:bg-slate-800 dark:border-slate-600 border-round-xl overflow-hidden sm:bg-white dark:sm:bg-slate-800 dark:sm:border-w-0 sm:border-w-0 box-shadow-2xl h-full p-16 sm:p-8" id="<?php echo $cart['id']; ?>">
                    <div class="d-flex flex-column w-full gap-8 justify-content-between align-items-center">
                        <div class="d-flex h-min gap-8 w-full p-20 justify-content-between align-items-center sm:flex-column sm:gap-4 sm:p-12">
                            <div class="d-flex flex-column gap-8 w-three-quarter sm:gap-4 sm:w-full">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><strong>Total Items: </strong></td>
                                            <td class="cart-count"><?php echo count($_SESSION['cart']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total quantity: </strong></td>
                                            <td><?php echo $total_quantity ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Price: </strong></td>
                                            <td>$<?php echo $total_price ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form method="POST" class="d-flex flex-column w-quarter gap-12 sm:w-full">
                                <div class="d-flex align-items-center justify-content-between w-full pt-12 gap-12 cart-box md:flex-column sm:flex-row">
                                    <div class="d-flex flex-column align-items-center justify-content-end md:justify-content-start w-full gap-12 sm:flex-row">
                                        <button type="submit" class="px-24 py-12 md:px-12 w-max h-min d-flex justify-content-center align-items-center bg-indigo-500 hover:bg-indigo-400 color-white no-decoration-text border-round-xl hover:font-w-normal hover:color-white gap-8" name="checkout"><span class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-20 h-20"><path d="M232.49,80.49l-128,128a12,12,0,0,1-17,0l-56-56a12,12,0,1,1,17-17L96,183,215.51,63.51a12,12,0,0,1,17,17Z"/></svg></span> <span>Checkout</span></button>

                                        <button type="submit" class="clear-cart-btn px-24 h-24 bg-green-500 border-round-xl color-white border-none w-max d-flex align-items-center gap-8" name="whatsapp"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M152.58,145.23l23,11.48A24,24,0,0,1,152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155ZM232,128A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-40,24a8,8,0,0,0-4.42-7.16l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88A40,40,0,0,0,192,152Z"/></svg> Whatsapp</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button id="clear-cart-btn" class="clear-cart-btn px-24 h-24 bg-red-500 border-round-xl color-white border-none w-max d-flex align-items-center justify-content-center sm:w-full">Clear Cart</button>
            </div>
            <div class="d-none flex-column w-full h-full align-items-center cart-empty gap-16">
                <span class="cart-icon d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-36 h-36"><path d="M233.21,56.31A12,12,0,0,0,224,52H66L60.53,21.85A12,12,0,0,0,48.73,12H24a12,12,0,0,0,0,24H38.71L63.62,173a28,28,0,0,0,4.07,10.21A32,32,0,1,0,123,196h34a32,32,0,1,0,31-24H91.17a4,4,0,0,1-3.93-3.28L84.92,156H196.1a28,28,0,0,0,27.55-23l12.16-66.86A12,12,0,0,0,233.21,56.31ZM100,204a8,8,0,1,1-8-8A8,8,0,0,1,100,204Zm88,8a8,8,0,1,1,8-8A8,8,0,0,1,188,212Zm12-83.28A4,4,0,0,1,196.1,132H80.56L70.38,76H209.62Z"/></svg>
                </span>
                <h4>No items in your cart yet!</h4>
                <a href="<?php echo ROOT ?>/inventory" class="clear-cart-btn px-24 py-12 bg-red-500 border-round-sxl color-white border-none d-flex align-items-center justify-content-center no-decoration-text sm:w-full">Shop Now</a>
            </div>
            <?php else : ?>
            <div class="d-flex flex-column w-full h-full align-items-center cart-empty gap-16">
                <span class="cart-icon d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-36 h-36"><path d="M233.21,56.31A12,12,0,0,0,224,52H66L60.53,21.85A12,12,0,0,0,48.73,12H24a12,12,0,0,0,0,24H38.71L63.62,173a28,28,0,0,0,4.07,10.21A32,32,0,1,0,123,196h34a32,32,0,1,0,31-24H91.17a4,4,0,0,1-3.93-3.28L84.92,156H196.1a28,28,0,0,0,27.55-23l12.16-66.86A12,12,0,0,0,233.21,56.31ZM100,204a8,8,0,1,1-8-8A8,8,0,0,1,100,204Zm88,8a8,8,0,1,1,8-8A8,8,0,0,1,188,212Zm12-83.28A4,4,0,0,1,196.1,132H80.56L70.38,76H209.62Z"/></svg>
                </span>
                <h4>No items in your cart yet!</h4>
                <a href="<?php echo ROOT ?>/inventory" class="clear-cart-btn px-24 py-12 bg-red-500 border-round-sxl color-white border-none d-flex align-items-center justify-content-center no-decoration-text sm:w-full">Shop Now</a>
            </div>
            <?php endif ; ?>
        </section>
    </main>
</body>

</html>