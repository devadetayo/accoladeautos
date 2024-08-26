<?php 
    define('APP_FUNCTION', 'Homepage');

    $term = '';

    $parts_query = mysqli_query($db, "SELECT * FROM parts ORDER BY id LIMIT 3");
	$parts = mysqli_fetch_all($parts_query, MYSQLI_ASSOC);
    
?>
<!DOCTYPE html>
<html>
<?php include("includes/home/head.php"); ?>
<body class="font-s-md line-h-md text-grey-600 dark:text-grey-100 bg-slate-50 dark:bg-slate-900">

    <?php include("includes/home/navbar.php"); ?>
	<main class="w-full d-flex flex-column min-vh-100 align-items-center justify-content-center pt-68">

        <section class="d-flex w-full align-items-center h-full justify-content-center px-40 lg:px-40 sm:px-20 sm:flex-column sm:align-items-start sm:justify-content-start sm:h-auto hero-section">
            <div class="d-flex flex-column w-hf h-auto px-24 align-items-start justify-content-start sm:w-full sm:p-0">
                <h4 class="font-s-4md font-w-bold color-black dark:color-white line-h-normal mb-16 w-nine-tenth md:font-s-2xl md:w-full">Choose the best <span class="color-indigo-500 font-w-bold">parts</span> for your car<span class="color-indigo-500 font-w-bold">.</span></h4>
                <p class="font-s-lg mb-16 md:font-s-md">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad deleniti consequatur recusandae quisquam nam, consequuntur maxime veritatis commodi. Nemo, neque animi aliquam eos possimus perspiciatis voluptas sunt consequuntur?</p>
                <div class="d-flex w-full gap-16">
                    <a href="<?php echo ROOT ?>/search" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-28 py-12 gap-4 bg-indigo-500 color-white border-round-xl hover:bg-indigo-600 active:indigo-500 mt-12 transition-duration-300 transition-property-all transition-ease-in-out">Start search</a>

                    <a href="<?php echo ROOT ?>/inventory" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-28 py-12 gap-4 border-w-2 border-solid border-indigo-500 color-indigo border-round-xl hover:bg-indigo-500 hover:border-indigo-500
                    active:bg-indigo-500 active:border-indigo-500 color-indigo-500 hover:color-white active:color-white mt-12 transition-duration-300 transition-property-all transition-ease-in-out">Shop Now</a>
                </div>
            </div>

            <div class="d-flex flex-column w-hf p-16 center-text align-items-center justify-content-center sm:w-full h-full sm:px-0">
                <div class="d-grid w-four-fifth grflcol grtpcols-2 grtprows-2 h-full gap-20 justify-content-center py-24 md:w-full sm:w-full">
                    <div class="grcol-span-2 d-flex w-full overflow-hidden border-round-sxl md:h-32">
                        <img src="<?php echo ROOT ?>/assets/images/part-1.jpg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
                    </div>
                    <div class="grcol-span-1 d-flex w-full h-32 overflow-hidden border-round-sxl md:h-32">
                        <img src="<?php echo ROOT ?>/assets/images/part-2.jpeg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
                    </div>

                    <div class="grcol-span-1 d-flex w-full h-36 overflow-hidden border-round-sxl md:h-32">
                        <img src="<?php echo ROOT ?>/assets/images/part-3.jpeg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="d-flex w-full align-items-center h-full justify-content-center px-40 lg:px-40 sm:px-20 sm:flex-column" style="height: calc(100vh - 6rem);">
            <div class="d-flex flex-column w-hf h-auto px-24 align-items-start justify-content-start sm:w-full sm:p-0">
                <h4 class="font-s-4md font-w-bold color-black dark:color-white line-h-normal mb-16">Choose the best <br><span class="color-indigo-500 font-w-bold">parts</span> for your car<span class="color-indigo-500 font-w-bold">.</span></h4>
                <p class="font-s-lg mb-16">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad deleniti consequatur recusandae quisquam nam, consequuntur maxime veritatis commodi. Nemo, neque animi aliquam eos possimus perspiciatis voluptas sunt consequuntur?</p>
                <div class="d-flex w-full gap-16">
                    <a href="<?php echo ROOT ?>/search" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-28 py-12 gap-4 bg-indigo-500 color-white border-round-xl hover:bg-indigo-600 active:indigo-500 mt-12 transition-duration-300 transition-property-all transition-ease-in-out">Start search</a>

                    <a href="<?php echo ROOT ?>/inventory" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-28 py-12 gap-4 border-w-2 border-solid border-indigo-500 color-indigo border-round-xl hover:bg-indigo-500 hover:border-indigo-500
                    active:bg-indigo-500 active:border-indigo-500 color-indigo-500 hover:color-white active:color-white mt-12 transition-duration-300 transition-property-all transition-ease-in-out">Shop Now</a>
                </div>
            </div>

            <div class="d-flex flex-column w-hf p-16 center-text align-items-center justify-content-center sm:w-full h-full">
                <div class="d-grid w-four-fifth grflcol grtpcols-2 grtprows-2 h-full gap-20 justify-content-center py-24">
                    <div class="grcol-span-2  d-flex w-full overflow-hidden border-round-sxl">
                        <img src="<?php echo ROOT ?>/assets/images/part-1.jpg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
                    </div>
                </div>
            </div>
        </section> -->

        <section class="d-flex flex-column w-full align-items-center justify-content-start px-68 lg:px-40 sm:px-16 my-40">
            <div class="d-flex flex-column w-full align-items-center center-text mb-24">
                <h4 class="font-s-2md font-w-semibold text-black dark:text-white">Our Services</h4>
                <p>What we offer.</p>
            </div>

            <div class="d-grid w-full grtpcols-3 lg:grtpcols-2 sm:grtpcols-1 gap-20 pl-8 sm:pl-0">
                <div class="d-flex flex-column align-items-start justify-content-start p-28 sm:p-24 bg-white dark:bg-slate-800 box-shadow-2xl gap-20 border-round-sxl hover:-translate-y-2 transition-duration-700 transition-ease-in-out transition-property-transform md:flex-column">
                    <div class="d-flex h-min">
                        <span class="d-flex bg-blue-50 color-blue-900 border-round-full p-20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" style="width: 4rem; height: 4rem;"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"/></svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column h-min gap-12">
                        <h4 class="font-s-xl font-w-medium color-black dark:color-white">Car Parts Sales</h4>
                        <p>Browse a wide range of genuine car parts from trusted brands, available for immediate purchase and shipping.</p>
                        <a href="<?php echo ROOT ?>/inventory" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-24 py-8 gap-4 border-w-2 border-solid border-blue-500 color-blue-500 border-round-xl hover:bg-blue-500 hover:border-blue-500 active:bg-blue-500 active:border-blue-500 color-blue-500 hover:color-white active:color-white mt-12 transition-duration-300 transition-property-all transition-ease-in-out">Shop Parts</a>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-start justify-content-start p-28 sm:p-24 bg-white dark:bg-slate-800 box-shadow-2xl gap-20 border-round-sxl hover:-translate-y-2 transition-duration-700 transition-ease-in-out transition-property-transform md:flex-column">
                    <div class="d-flex h-min">
                        <span class="d-flex bg-indigo-100 color-indigo-900 border-round-full p-20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" style="width: 4rem; height: 4rem;"><path d="M226.76,69a8,8,0,0,0-12.84-2.88l-40.3,37.19-17.23-3.7-3.7-17.23,37.19-40.3A8,8,0,0,0,187,29.24,72,72,0,0,0,88,96,72.34,72.34,0,0,0,94,124.94L33.79,177c-.15.12-.29.26-.43.39a32,32,0,0,0,45.26,45.26c.13-.13.27-.28.39-.42L131.06,162A72,72,0,0,0,232,96,71.56,71.56,0,0,0,226.76,69ZM160,152a56.14,56.14,0,0,1-27.07-7,8,8,0,0,0-9.92,1.77L67.11,211.51a16,16,0,0,1-22.62-22.62L109.18,133a8,8,0,0,0,1.77-9.93,56,56,0,0,1,58.36-82.31l-31.2,33.81a8,8,0,0,0-1.94,7.1L141.83,108a8,8,0,0,0,6.14,6.14l26.35,5.66a8,8,0,0,0,7.1-1.94l33.81-31.2A56.06,56.06,0,0,1,160,152Z"/></svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column h-min gap-12">
                        <h4 class="font-s-xl font-w-medium color-black dark:color-white">Auto Repair</h4>
                        <p>Our certified mechanics are ready to help you with everything from regular maintenance to complex repairs.</p>
                        <a href="<?php echo ROOT ?>/inventory" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-24 py-8 gap-4 border-w-2 border-solid border-indigo-500 color-indigo border-round-xl hover:bg-indigo-500 hover:border-indigo-500 active:bg-indigo-500 active:border-indigo-500 color-indigo-500 hover:color-white active:color-white mt-12 transition-duration-300 transition-property-all transition-ease-in-out">Book a repair</a>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-start justify-content-start p-28 sm:p-24 bg-white dark:bg-slate-800 box-shadow-2xl gap-20 border-round-sxl hover:-translate-y-2 transition-duration-700 transition-ease-in-out transition-property-transform md:flex-column">
                    <div class="d-flex h-min">
                        <span class="d-flex bg-rose-50 color-rose-900 border-round-full p-20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" style="width: 4rem; height: 4rem;"><path d="M240,104H229.2L201.42,41.5A16,16,0,0,0,186.8,32H69.2a16,16,0,0,0-14.62,9.5L26.8,104H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V184h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V120h8a8,8,0,0,0,0-16ZM69.2,48H186.8l24.89,56H44.31ZM64,200H40V184H64Zm128,0V184h24v16Zm24-32H40V120H216ZM56,144a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,144Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,144Z"/></svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column h-min gap-12">
                        <h4 class="font-s-xl font-w-medium color-black dark:color-white">Car Sales</h4>
                        <p>Looking for a new or used vehicle? Explore our curated selection of cars for sale, complete with financing options.</p>
                        <a href="<?php echo ROOT ?>/inventory" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-24 py-8 gap-4 border-w-2 border-solid border-rose-500 color-rose border-round-xl hover:bg-rose-500 hover:border-rose-500 active:bg-rose-500 active:border-rose-500 color-rose-500 hover:color-white active:color-white mt-12 transition-duration-300 transition-property-all transition-ease-in-out">View Cars</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="d-flex flex-column w-full align-items-center justify-content-start px-68 lg:px-40 sm:px-16 my-40">
            <div class="d-flex flex-column w-full align-items-center center-text mb-24">
                <h4 class="font-s-2md font-w-semibold text-black dark:text-white">Why Choose Us</h4>
                <p>What makes us unique.</p>
            </div>

            <div class="d-grid w-full grtpcols-3 lg:grtpcols-2 sm:grtpcols-1 gap-20 pl-8 sm:pl-0">
                <div class="d-flex align-items-start justify-content-start p-28 sm:p-24 bg-white dark:bg-slate-800 box-shadow-2xl gap-20 border-round-sxl hover:-translate-y-2 transition-duration-700 transition-ease-in-out transition-property-transform md:flex-column">
                    <div class="d-flex h-min">
                        <span class="d-flex color-indigo-500 border-round-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-24 h-24"><path d="M255.42,117l-14-35A15.93,15.93,0,0,0,226.58,72H192V64a8,8,0,0,0-8-8H32A16,16,0,0,0,16,72V184a16,16,0,0,0,16,16H49a32,32,0,0,0,62,0h50a32,32,0,0,0,62,0h17a16,16,0,0,0,16-16V120A7.94,7.94,0,0,0,255.42,117ZM192,88h34.58l9.6,24H192ZM32,72H176v64H32ZM80,208a16,16,0,1,1,16-16A16,16,0,0,1,80,208Zm81-24H111a32,32,0,0,0-62,0H32V152H176v12.31A32.11,32.11,0,0,0,161,184Zm31,24a16,16,0,1,1,16-16A16,16,0,0,1,192,208Zm48-24H223a32.06,32.06,0,0,0-31-24V128h48Z"/></svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column h-min gap-12">
                        <h4 class="font-s-xl font-w-semibold color-black dark:color-white">Fast Shipping</h4>
                        <p>Get your parts quickly with our express delivery.</p>
                    </div>
                </div>

                <div class="d-flex align-items-start justify-content-start p-28 sm:p-24 bg-white dark:bg-slate-800 box-shadow-2xl gap-20 border-round-sxl hover:-translate-y-2 transition-duration-700 transition-ease-in-out transition-property-transform md:flex-column">
                    <div class="d-flex h-min">
                        <span class="d-flex color-indigo-500 border-round-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-24 h-24" fill="currentcolor"><path d="M152,120H136V56h8a32,32,0,0,1,32,32,8,8,0,0,0,16,0,48.05,48.05,0,0,0-48-48h-8V24a8,8,0,0,0-16,0V40h-8a48,48,0,0,0,0,96h8v64H104a32,32,0,0,1-32-32,8,8,0,0,0-16,0,48.05,48.05,0,0,0,48,48h16v16a8,8,0,0,0,16,0V216h16a48,48,0,0,0,0-96Zm-40,0a32,32,0,0,1,0-64h8v64Zm40,80H136V136h16a32,32,0,0,1,0,64Z"/></svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column h-min gap-12">
                        <h4 class="font-s-xl font-w-semibold color-black dark:color-white">Competitive Prices</h4>
                        <p>We offer the best prices without compromising on quality.</p>
                    </div>
                </div>

                <div class="d-flex align-items-start justify-content-start p-28 sm:p-24 bg-white dark:bg-slate-800 box-shadow-2xl gap-20 border-round-sxl hover:-translate-y-2 transition-duration-700 transition-ease-in-out transition-property-transform md:flex-column">
                    <div class="d-flex h-min">
                        <span class="d-flex color-indigo-500 border-round-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" class="w-24 h-24"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"/></svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column h-min gap-12">
                        <h4 class="font-s-xl font-w-semibold color-black dark:color-white">Genuine Parts</h4>
                        <p>All our parts are 100% genuine and come with a warranty.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="d-flex flex-column w-full align-items-center justify-content-center mt-32 mb-68 px-72 lg:px-16 md:px-16 sm:px-16 sm:flex-column sm:w-full">
            <div class="d-flex flex-column w-full align-items-center center-text mb-24">
                <h4 class="font-s-2md font-w-semibold text-black dark:text-white">Our Catalogue</h4>
                <p>Check out our store.</p>
            </div>

            <div class="d-grid w-full grtpcols-3 line-h-sm lg:grtpcols-2 sm:grtpcols-1 gap-20 justify-self-center align-items-center sm:w-full">
                <?php include("includes/blog-card.php") ; ?>
            </div>

            <div class="d-flex flex-column w-full align-items-center center-text my-24">
                <a href="<?php echo ROOT ?>/inventory" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-24 py-12 gap-4 bg-indigo-500 border-round-xl hover:bg-indigo-600 active:bg-indigo-400 color-white hover:color-white active:color-white mt-12 transition-duration-300 transition-property-all transition-ease-in-out">View the full catalogue</a>
            </div>

        </section>

        <section class="d-flex flex-column w-full align-items-center center-text">
        <div class="d-flex w-full align-items-center justify-content-center px-72 py-68 lg:px-16 md:px-16 sm:px-16 sm:flex-column sm:w-full sm:py-36" style="background: var(--velocity-slate-900);">
            <div class="d-flex flex-column w-three-fifth align-items-start start-text mb-8 gap-12 sm:w-full">
                <div class="d-flex w-auto flex-column w-four-fifth md:w-full">
                    <h4 class="font-s-2xl font-w-semibold text-white line-h-normal mb-12">Looking for the perfect Part for your car?</h4>
                    <p class="color-white font-s-lg font-w-normal">Check out our inventory, we surely have what you are looking for, i believe you will be glad to shop with us.</p>
                </div>
            </div>

            <div class="d-flex w-two-fifth align-items-center justify-content-start start-text my-8 gap-12 sm:w-full">
                <a href="<?php echo ROOT ?>/inventory" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-24 py-12 gap-4 bg-indigo-500 border-round-xl hover:bg-indigo-600 active:bg-indigo-400 color-white hover:color-white active:color-white mt-12 transition-duration-300 transition-property-all transition-ease-in-out">View inventory</a>
                <a href="<?php echo ROOT ?>/contact" class="w-max no-decoration-text d-flex align-items-center justify-content-center px-28 py-12 gap-4 border-w-2 border-solid border-white color-white border-round-xl hover:bg-white hover:border-white active:bg-white active:border-white color-white hover:color-slate-900 active:color-slate-900 mt-12 transition-duration-300 transition-property-all transition-ease-in-out">Book a repair</a>
            </div>
        </div>

        </section>
        
        <?php include("includes/home/footer.php"); ?>                
    </main>
</body>

</html>