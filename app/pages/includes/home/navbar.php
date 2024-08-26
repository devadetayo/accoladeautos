<nav class="d-flex flex-column w-full justify-content-between align-items-center h-auto z-10 position-fixed navbar--scrolling bg-slate-50 dark:bg-slate-900" style="top: 0;">
    <section class="d-flex w-full px-40 sm:px-16 py-16 sm:py-12 md:py-20 justify-content-between align-items-center position-relative">
        <a href="<?php echo ROOT ?>/home" class="d-flex justify-content-center align-items-center font-s-xl no-decoration-text h-full font-w-medium color-black dark:color-white hover:font-w-medium font-mono gap-8 z-30 position-relative">
            <span class="color-indigo-500 sm:p-8 sm:bg-indigo-500 sm:color-white m-0 h-fit d-flex align-items-center justify-content-center border-round-full"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" style="width: 28px; height: 28px;"><path d="M240,104H229.2L201.42,41.5A16,16,0,0,0,186.8,32H69.2a16,16,0,0,0-14.62,9.5L26.8,104H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V184h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V120h8a8,8,0,0,0,0-16ZM69.2,48H186.8l24.89,56H44.31ZM64,200H40V184H64Zm128,0V184h24v16Zm24-32H40V120H216ZM56,144a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,144Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,144Z"/></svg></span>
            <span class="sm:d-none">Accoladeautos</span>
        </a>

        <ul class="d-flex h-full gap-8 justify-content-center align-items-center sm:d-none">
            <li class="d-flex w-full h-min"><a href="<?php echo ROOT ?>/home" class="no-decoration-text px-12 py-4 hover:color-indigo-500 d-flex align-items-center justify-content-center sm:w-full sm:py-12 sm:px-16">Home</a></li>
            <li class="d-flex w-full h-min"><a href="<?php echo ROOT ?>/about" class="no-decoration-text px-12 py-4 hover:color-indigo-500 d-flex align-items-center justify-content-center sm:w-full sm:py-12 sm:px-16">About</a></li>
            <li class="d-flex w-full h-min"><a href="<?php echo ROOT ?>/inventory" class="no-decoration-text px-12 py-4 hover:color-indigo-500 d-flex align-items-center justify-content-center sm:w-full sm:py-12 sm:px-16">Inventory</a></li>
            <li class="d-flex w-full h-min"><a href="<?php echo ROOT ?>/contact" class="no-decoration-text px-12 py-4 hover:color-indigo-500 d-flex align-items-center justify-content-center sm:w-full sm:py-12 sm:px-16">Contact</a></li>
            <li class="d-flex w-full h-min position-relative"><a href="<?php echo ROOT ?>/search" class="no-decoration-text p-8 hover:color-indigo-500 d-flex align-items-center justify-content-center sm:w-full sm:py-12 sm:px-16 border-round-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"/></svg>
            </a></li>
            <li class="d-flex w-full h-min position-relative"><a href="<?php echo ROOT ?>/cart" class="no-decoration-text p-8 bg-slate-100 hover:color-indigo-500 d-flex align-items-center justify-content-center sm:w-full sm:py-12 sm:px-16 border-round-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M233.21,56.31A12,12,0,0,0,224,52H66L60.53,21.85A12,12,0,0,0,48.73,12H24a12,12,0,0,0,0,24H38.71L63.62,173a28,28,0,0,0,4.07,10.21A32,32,0,1,0,123,196h34a32,32,0,1,0,31-24H91.17a4,4,0,0,1-3.93-3.28L84.92,156H196.1a28,28,0,0,0,27.55-23l12.16-66.86A12,12,0,0,0,233.21,56.31ZM100,204a8,8,0,1,1-8-8A8,8,0,0,1,100,204Zm88,8a8,8,0,1,1,8-8A8,8,0,0,1,188,212Zm12-83.28A4,4,0,0,1,196.1,132H80.56L70.38,76H209.62Z"/></svg>
                <span class="d-flex font-s-md position-absolute w-20 h-20 m-0 border-round-full align-items-center justify-content-center bg-red-500 color-white cart-count" style="top: -6px; right: -6px;"><?php if(isset($_SESSION['cart'])) { echo count($_SESSION['cart']); } else {
                    echo "0";
                } ?></span>
            </a></li>
        </ul>

        <ul class="d-none h-full gap-8 justify-content-center align-items-center sm:d-flex">
            <li class="d-flex w-full h-min position-relative"><a href="<?php echo ROOT ?>/search" class="no-decoration-text p-8 hover:color-indigo-500 d-flex align-items-center justify-content-center sm:w-full border-round-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"/></svg>
            </a></li>
            <li class="d-flex w-full h-min position-relative"><a href="<?php echo ROOT ?>/cart" class="no-decoration-text p-8 bg-slate-100 hover:color-indigo-500 d-flex align-items-center justify-content-center sm:w-full border-round-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M233.21,56.31A12,12,0,0,0,224,52H66L60.53,21.85A12,12,0,0,0,48.73,12H24a12,12,0,0,0,0,24H38.71L63.62,173a28,28,0,0,0,4.07,10.21A32,32,0,1,0,123,196h34a32,32,0,1,0,31-24H91.17a4,4,0,0,1-3.93-3.28L84.92,156H196.1a28,28,0,0,0,27.55-23l12.16-66.86A12,12,0,0,0,233.21,56.31ZM100,204a8,8,0,1,1-8-8A8,8,0,0,1,100,204Zm88,8a8,8,0,1,1,8-8A8,8,0,0,1,188,212Zm12-83.28A4,4,0,0,1,196.1,132H80.56L70.38,76H209.62Z"/></svg>
                <span class="d-flex font-s-md position-absolute w-20 h-20 m-0 border-round-full align-items-center justify-content-center bg-red-500 color-white cart-count" style="top: -6px; right: -6px;"><?php if(isset($_SESSION['cart'])) { echo count($_SESSION['cart']); } else {
                    echo "0";
                } ?></span>
            </a></li>
            <li class="w-full h-full" id="showNav">
                <a class="d-flex justify-content-center align-items-center h-full no-decoration-text border-round-full p-8 hover:color-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M228,128a12,12,0,0,1-12,12H40a12,12,0,0,1,0-24H216A12,12,0,0,1,228,128ZM40,76H216a12,12,0,0,0,0-24H40a12,12,0,0,0,0,24ZM216,180H40a12,12,0,0,0,0,24H216a12,12,0,0,0,0-24Z"/></svg>
                </a>
            </li>

            <li class="w-full h-full d-none" id="closeNav">
                <a class="d-flex justify-content-center align-items-center h-full no-decoration-text border-round-full p-8 hover:color-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M289.94,256l95-95A24,24,0,0,0,351,127l-95,95-95-95A24,24,0,0,0,127,161l95,95-95,95A24,24,0,1,0,161,385l95-95,95,95A24,24,0,0,0,385,351Z"/></svg>
                </a>
            </li>
        </ul>
    </section>

</nav>

<ul class="d-none h-full gap-8 justify-content-center align-items-center bg-white dark:bg-slate-900 sm:d-flex sm:w-three-quarter sm:flex-column sm:box-shadow-2xl sm:gap-4 sm:position-fixed sm:h-full sm:position-left-0 sm:position-top-0 sm:justify-content-start pb-16 side-nav transition-duration-300 transition-property-transform transition-ease-in-out z-20" style="transform: translateX(-32rem);">
    <li class="d-flex w-full h-min sm:px-24 py-12 align-items-center justify-content-start font-s-lg gap-8"><span class="color-indigo-500 sm:p-8 sm:bg-indigo-500 sm:color-white m-0 h-fit d-flex align-items-center justify-content-center border-round-full"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" style="width: 28px; height: 28px;"><path d="M240,104H229.2L201.42,41.5A16,16,0,0,0,186.8,32H69.2a16,16,0,0,0-14.62,9.5L26.8,104H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V184h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V120h8a8,8,0,0,0,0-16ZM69.2,48H186.8l24.89,56H44.31ZM64,200H40V184H64Zm128,0V184h24v16Zm24-32H40V120H216ZM56,144a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,144Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,144Z"/></svg></span>
    <span class="font-w-semibold color-black">Accoladeautos</span></li>

    <li class="d-flex w-full h-min sm:px-16"><a href="<?php echo ROOT ?>/home" class="no-decoration-text px-12 py-4 hover:bg-slate-50 hover:color-indigo-500 sm:w-full sm:py-12 sm:px-16">Home</a></li>
    <li class="d-flex w-full h-min sm:px-16"><a href="<?php echo ROOT ?>/about" class="no-decoration-text px-12 py-4 hover:bg-slate-50 hover:color-indigo-500 sm:w-full sm:py-12 sm:px-16">About</a></li>
    <li class="d-flex w-full h-min sm:px-16"><a href="<?php echo ROOT ?>/inventory" class="no-decoration-text px-12 py-4 hover:bg-slate-50 hover:color-indigo-500 sm:w-full sm:py-12 sm:px-16">Inventory</a></li>
    <li class="d-flex w-full h-min sm:px-16"><a href="<?php echo ROOT ?>/contact" class="w-max no-decoration-text px-12 py-4 bg-indigo-500 color-white hover:bg-indigo-600 active:bg-indigo-400 sm:w-full sm:py-12 sm:px-24 border-round-pill  d-flex align-items-center justify-content-center">Contact</a></li>
</ul>

<div class="d-none position-fixed py-12 px-16 min-w-48 sm:w-full bg-slate-900 color-white box-shadow-2xl border-round-lg sm:min-w-24" id="copy-message" style="bottom: 1rem; right: 1rem; z-index: 999;"></div>