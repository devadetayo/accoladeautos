
<?php
    if(isset($_SESSION['cart'])) {
        $total_quantity = 0;
        $total_items = 0;
        $total_price = 0;
        
        foreach($_SESSION['cart'] as $part_id => $item) {
            $cart_query = mysqli_query($db, "SELECT * FROM parts WHERE id = $part_id");
            $carts = mysqli_fetch_all($cart_query, MYSQLI_ASSOC);
            
            foreach($carts as $cart) {
                $item_quantity = $item['quantity'];
                $item_total_price = $cart['price'] * $item_quantity;
                
                $total_quantity += $item_quantity;
                $total_items += 1;
                $total_price += $item_total_price;
?>
<div class="d-flex w-full align-items-center justify-content-between bg-white border-slate-200 dark:bg-slate-800 dark:border-slate-600 border-round-xl overflow-hidden sm:bg-white dark:sm:bg-slate-800 dark:sm:border-w-0 sm:border-w-0 box-shadow-2xl h-full p-16 sm:p-8 cart-card" id="<?php echo $cart['id']; ?>">
    <div class="d-flex w-quarter h-32 overflow-hidden border-round-xl sm:w-two-fifth sm:h-32">
        <img src="<?php echo  ROOT ?>/assets/images/cover/1721937996_cover.png" class="w-full h-full object-fit-cover object-position-center">
    </div>
    <div class="d-flex flex-column w-three-quarter gap-8 justify-content-between sm:w-three-fifth">
        <div class="d-flex h-full gap-8 w-full px-20 justify-content-between sm:flex-column sm:gap-4 sm:px-12 line-h-normal sm:align-items-start">
            <div class="d-flex flex-column gap-8 w-full sm:gap-4 mb-16">
                <h4 class="font-s-xl color-black dark:color-white dark-text font-w-semibold"><?php echo $cart['part_name'] ?></h4>
                <p class="w-fit"><?php echo getBrandNameById($cart['brand_id']) ?> <?php echo  getModelNameById($cart['model_id']); ?> <?php echo getYearById($cart['year_id']) ; ?></p>
            </div>
            <div class="d-flex w-full flex-column align-items-start justify-content-center sm:flex-row gap-2 sm:justify-content-start">
                <p class="color-black mb-4 sm:mb-0"><strong>Total Price: </strong></p>
                <p>$<?php echo $cart['price'] * $item['quantity']; ?></p>
            </div>
            <div class="d-flex align-items-center justify-content-between w-full pt-12 gap-12 cart-box md:flex-column sm:flex-row">
                <div class="d-flex align-items-center gap-8 increment-card border-solid border-slate-100 border-w-1 border-round-lg w-max p-4">
                    <button type="button" class="d-flex align-items-center justify-content-center p-8 decrement-btn bg-transparent border-round-xl color-black dark:color-white hover:bg-indigo-50 active:bg-indigo-500 active:color-white sm:p-4" data-part-id="<?php echo $cart['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-16 h-16"><path d="M228,128a12,12,0,0,1-12,12H40a12,12,0,0,1,0-24H216A12,12,0,0,1,228,128Z"/></svg></button>
                    <span class="d-flex align-items-center justify-content-center py-8 px-12 border-round-xl quantity-value text-center sm:py-4 px-8"><?php echo $item['quantity'] ; ?></span>
                    <button type="button" class="d-flex align-items-center justify-content-center p-8 increment-btn bg-transparent border-round-xl color-black dark:color-white hover:bg-indigo-50 active:bg-indigo-500 active:color-white sm:p-4" data-part-id="<?php echo $cart['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-16 h-16"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"/></svg></button>
                    <input type="hidden" class="quantity-input" value="<?php echo $item['quantity'] ; ?>">
                </div>
                <button type="button" class="p-12 w-max d-none sm:d-flex justify-content-center align-items-center bg-red-500 hover:bg-red-400 active:bg-red-400 color-white no-decoration-text border-round-xl hover:font-w-normal hover:color-white sm:p-8 remove-item-btn" data-id="<?php echo $cart['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M216,48H180V36A28,28,0,0,0,152,8H104A28,28,0,0,0,76,36V48H40a12,12,0,0,0,0,24h4V208a20,20,0,0,0,20,20H192a20,20,0,0,0,20-20V72h4a12,12,0,0,0,0-24ZM100,36a4,4,0,0,1,4-4h48a4,4,0,0,1,4,4V48H100Zm88,168H68V72H188ZM116,104v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Zm48,0v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Z"/></svg></button>
            </div>
            <div class="d-flex align-items-center justify-content-end md:justify-content-start w-full gap-12 sm:d-none">
                <button type="button" class="p-12 w-max d-flex justify-content-center align-items-center bg-red-500 hover:bg-red-400 active:bg-red-400 color-white no-decoration-text border-round-xl hover:font-w-normal hover:color-white sm:p-8 remove-item-btn" data-id="<?php echo $cart['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M216,48H180V36A28,28,0,0,0,152,8H104A28,28,0,0,0,76,36V48H40a12,12,0,0,0,0,24h4V208a20,20,0,0,0,20,20H192a20,20,0,0,0,20-20V72h4a12,12,0,0,0,0-24ZM100,36a4,4,0,0,1,4-4h48a4,4,0,0,1,4,4V48H100Zm88,168H68V72H188ZM116,104v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Zm48,0v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Z"/></svg></button>
            </div>
        </div>
    </div>
</div>
<?php } } } ?>