<?php foreach($parts as $part) : ?>
<div class="d-flex w-full flex-column align-items-center justify-content-between bg-white border-slate-200 dark:bg-slate-800 dark:border-slate-600 border-round-xl overflow-hidden sm:bg-white dark:sm:bg-slate-800 dark:sm:border-w-0 sm:border-w-0 box-shadow-2xl h-full" id="<?php echo $part['id']; ?>">
    <div class="d-flex w-full h-36 overflow-hidden">
        <img src="<?php echo  ROOT ?>/assets/images/cover/1721937996_cover.png" class="w-full h-full object-fit-cover object-position-center">
    </div>
    <div class="d-flex flex-column w-full gap-8 justify-content-start">
        <div class="d-flex flex-column h-min gap-8 w-full p-20">
            <div class="d-flex w-full justify-content-between"><h4 class="font-s-xl color-black dark:color-white dark-text font-w-semibold"><?php echo $part['part_name'] ?></h4></div>
            <div class="d-flex justify-content-start gap-8">
                <p><?php echo getBrandNameById($part['brand_id']) ?> <?php echo  getModelNameById($part['model_id']); ?> <?php echo getYearById($part['year_id']) ; ?>
            </div>
            <div class="d-flex w-full gap-12 align-items-center">
                <h4 class="font-s-2md font-w-medium color-black dark:color-white dark-text">$<?php echo $part['price']; ?></h4>
                <p>Availabilty: <?php echo $part['availability']; ?></p>
            </div>
            <form method="POST" class="d-flex flex-column w-full gap-12">
                <div class="d-flex align-items-center justify-content-between w-full pt-12 border-wt-1 border-w-0 border-solid border-slate-200 dark:border-slate-600 gap-12 cart-box">
                    <div class="d-flex align-items-center gap-8 increment-card border-solid border-slate-100 border-w-1 border-round-lg w-max p-4">
                        <button type="button" class="d-flex align-items-center justify-content-center p-8 decrement-btn bg-transparent border-round-xl color-black dark:color-white hover:bg-blue-50 active:bg-blue-500 active:color-white" data-part-id="<?php echo $part['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-16 h-16"><path d="M228,128a12,12,0,0,1-12,12H40a12,12,0,0,1,0-24H216A12,12,0,0,1,228,128Z"/></svg></button>
                        <span class="d-flex align-items-center justify-content-center py-8 px-12 border-round-xl quantity-value text-center">1</span>
                        <button type="button" class="d-flex align-items-center justify-content-center p-8 increment-btn bg-transparent border-round-xl color-black dark:color-white hover:bg-blue-50 active:bg-blue-500 active:color-white" data-part-id="<?php echo $part['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-16 h-16"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"/></svg></button>
                        <input type="hidden" class="quantity-input" value="1">
                    </div>
                    <div class="d-flex align-items-center justify-content-end w-full gap-12">
                        <button type="button" class="p-12 d-flex justify-content-center align-items-center bg-indigo-500 hover:bg-indigo-400 color-white no-decoration-text border-round-xl hover:font-w-normal hover:color-white add-to-cart-btn" data-id="<?php echo $part['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M233.21,56.31A12,12,0,0,0,224,52H66L60.53,21.85A12,12,0,0,0,48.73,12H24a12,12,0,0,0,0,24H38.71L63.62,173a28,28,0,0,0,4.07,10.21A32,32,0,1,0,123,196h34a32,32,0,1,0,31-24H91.17a4,4,0,0,1-3.93-3.28L84.92,156H196.1a28,28,0,0,0,27.55-23l12.16-66.86A12,12,0,0,0,233.21,56.31ZM100,204a8,8,0,1,1-8-8A8,8,0,0,1,100,204Zm88,8a8,8,0,1,1,8-8A8,8,0,0,1,188,212Zm12-83.28A4,4,0,0,1,196.1,132H80.56L70.38,76H209.62Z"/></svg></button>

                        <button type="submit" class="sm:d-none xl:d-none md:d-flex px-20 py-12 w-max d-flex justify-content-center align-items-center bg-indigo-500 hover:bg-indigo-400 color-white no-decoration-text border-round-xl hover:font-w-normal hover:color-white" name="buynow">Buy Now</button>
                    </div>
                </div>
                <button type="button" class="d-none xl:d-flex md:d-none sm:d-flex px-20 py-12 w-full justify-content-center align-items-center bg-indigo-500 hover:bg-indigo-400 color-white no-decoration-text border-round-xl hover:font-w-normal hover:color-white">Buy Now</button>
            </form>
        </div>
    </div>
</div>
<?php endforeach ;?>