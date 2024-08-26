<?php

	define('APP_FUNCTION', 'Search Parts');

	$year_query = mysqli_query($db, "SELECT * FROM years");
	$years = mysqli_fetch_all($year_query, MYSQLI_ASSOC);

	$brand_query = mysqli_query($db, "SELECT * FROM brands");
	$brands = mysqli_fetch_all($brand_query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
	<?php include("includes/home/head.php"); ?>
<body class="font-s-md line-h-md text-grey-600 dark:text-grey-100 bg-slate-50 dark:bg-slate-900 position-relative">
	<?php include "includes/home/navbar.php"; ?>
	<main class="w-full d-flex flex-column h-full align-items-start justify-content-center">

		<section class="d-flex flex-row-reverse w-full h-full align-items-cemter h-full">

			<div class="w-hf h-full d-flex sm:d-none">
				<div class="d-flex flex-column w-full p-16 center-text align-items-center justify-content-center sm:w-full h-full pt-68">
					<div class="d-grid w-four-fifth grflcol grtpcols-2 grtprows-2 h-full gap-20 justify-content-center py-24">
						<div class="grcol-span-2  d-flex w-full overflow-hidden border-round-sxl">
							<img src="<?php echo ROOT ?>/assets/images/part-1.jpg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
						</div>
						<div class="grcol-span-1 d-flex w-full h-32 overflow-hidden border-round-sxl">
							<img src="<?php echo ROOT ?>/assets/images/part-2.jpeg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
						</div>

						<div class="grcol-span-1 d-flex w-full h-36 overflow-hidden border-round-sxl">
							<img src="<?php echo ROOT ?>/assets/images/part-3.jpeg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
						</div>
					</div>
				</div>
			</div>

			<div class="d-flex h-full flex-column align-items-start justify-content-center w-hf px-68 sm:w-full sm:px-16">

				<div class="w-full d-flex flex-column mt-24">

					<div class="w-full d-flex flex-column align-items-start justify-content-center mb-16">
						<h3 class="font-s-2md font-w-semibold text-black dark:text-white">Start Your Search!</h3>
						<p>What are you looking for</p>
					</div>
					<div class="d-flex flex-column justify-content-center align-items-center text-center w-full mb-16">
						<?php require_once 'includes/errors.php'; ?>
						<?php require_once 'includes/messages.php' ;?>
					</div>

					<form method="POST" class="d-flex flex-column w-full gap-16 mb-16" action="parts" id="search-form">
                        <div class="custom-select d-flex h-24 flex-column position-relative w-full p-0" role="combobox" aria-haspopup="listbox" aria-expanded="false"aria-labelledby="selected-country">
                            <div class="select-selected d-flex align-items-center justify-content-between h-full border-round-2lg bg-white dark:bg-slate-800 border-solid border-w-2 border-white dark:border-slate-800 outline-w-0 w-full color-black dark:color-white focus:border-indigo-500 dark:focus:border-indigo-500 w-full position-relative overflow-hidden" role="button" aria-controls="country-list" tabindex="0">
                                <span class="selected-text d-flex w-auto h-full align-items-center px-16 color-black dark:color-white">Select a Year</span> 
                                <span class="select-arrow d-flex align-items-center justify-content-center h-full w-24 position-relative" aria-hidden="true"></span>
                            </div>
                            <div class="select-options d-none flex-column w-full p-4 bg-white dark:bg-slate-800 position-absolute border-round-2xl box-shadow-2xl overflow-y-scroll z-40 transition-all transition-duration-300 transition-ease select-list" role="listbox" id="year-options">
								<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="" data-index="0" role="option" tabindex="-1">Select a Year</span>
								<?php foreach($years as $key => $year) : ?>
								<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="<?php echo $year['id'] ; ?>" data-index="<?php echo $key ?>" role="option" tabindex="-1"><?php echo $year['year']; ?></span>
								<?php endforeach ?>
                            </div>
							<input type="hidden" class="select-name" id="select-name" name="year" value="">
                        </div>

                        <div class="custom-select d-flex h-24 flex-column position-relative w-full p-0" role="combobox" aria-haspopup="listbox" aria-expanded="false"aria-labelledby="">
                            <div class="select-selected d-flex align-items-center justify-content-between h-full border-round-2lg bg-white dark:bg-slate-800 border-solid border-w-2 border-white dark:border-slate-800 outline-w-0 w-full color-black dark:color-white focus:border-indigo-500 dark:focus:border-indigo-500 w-full position-relative overflow-hidden" role="button" aria-controls="country-list" tabindex="0">
                                <span class="selected-text d-flex w-auto h-full align-items-center px-16 color-black dark:color-white">Select a Brand</span> 
                                <span class="select-arrow d-flex align-items-center justify-content-center h-full w-24 position-relative" aria-hidden="true"></span>
                            </div>
                            <div class="select-options d-none flex-column w-full p-4 bg-white dark:bg-slate-800 position-absolute border-round-2xl box-shadow-2xl overflow-y-scroll z-40 transition-all transition-duration-300 transition-ease select-list selected-brand" role="listbox" id="brand-options">
								<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="" data-index="0" role="option" tabindex="-1">Select a brand</Select></span>
								<?php foreach($brands as $key => $brand) : ?>
								<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="<?php echo $brand['id'] ; ?>" data-index="<?php echo $key; ?>" role="option" tabindex="-1"><?php echo $brand['brand_name']; ?></span>
								<?php endforeach ?>
                            </div>
							<input type="hidden" class="select-name brand-select" id="select-name" name="brand" value="">
                        </div>

						<div class="custom-select d-flex h-24 flex-column position-relative w-full p-0" role="combobox" aria-haspopup="listbox" aria-expanded="false"aria-labelledby="selected-model">
                            <div class="select-selected d-flex align-items-center justify-content-between h-full border-round-2lg bg-white dark:bg-slate-800 border-solid border-w-2 border-white dark:border-slate-800 outline-w-0 w-full color-black dark:color-white focus:border-indigo-500 dark:focus:border-indigo-500 w-full position-relative overflow-hidden" role="button" aria-controls="country-list" tabindex="0">
                                <span class="selected-text d-flex w-auto h-full align-items-center px-16 color-black dark:color-white">Select a Model</span> 
                                <span class="select-arrow d-flex align-items-center justify-content-center h-full w-24 position-relative" aria-hidden="true"></span>
                            </div>
                            <div class="select-options d-none flex-column w-full p-4 bg-white dark:bg-slate-800 position-absolute border-round-2xl box-shadow-2xl overflow-y-scroll z-40 transition-all transition-duration-300 transition-ease select-list selected-model" role="listbox" id="model-options">
                                <span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="" data-index="0" role="option" tabindex="-1">Select a Model</span>
                            </div>
							<input type="hidden" class="select-name" id="select-name" name="model" value="">
                        </div>

						<div class="custom-select d-flex h-24 flex-column position-relative w-full p-0" role="combobox" aria-haspopup="listbox" aria-expanded="false"aria-labelledby="selected-part">
                            <div class="select-selected d-flex align-items-center justify-content-between h-full border-round-2lg bg-white dark:bg-slate-800 border-solid border-w-2 border-white dark:border-slate-800 outline-w-0 w-full color-black dark:color-white focus:border-indigo-500 dark:focus:border-indigo-500 w-full position-relative overflow-hidden" role="button" aria-controls="country-list" tabindex="0">
                                <span class="selected-text d-flex w-auto h-full align-items-center px-16 color-black dark:color-white">Select a Category</span> 
                                <span class="select-arrow d-flex align-items-center justify-content-center h-full w-24 position-relative" aria-hidden="true"></span>
                            </div>
                            <div class="select-options d-none flex-column w-full p-4 bg-white dark:bg-slate-800 position-absolute border-round-2xl box-shadow-2xl overflow-y-scroll z-40 transition-all transition-duration-300 transition-ease select-list" role="listbox" id="parts-options">
								<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="" data-index="0" role="option" tabindex="-1">Select a Part type</span>
                            </div>
							<input type="hidden" class="select-name" id="select-name" name="category" value="">
                        </div>

						<button type="submit" name="searchparts" class="no-decoration-text d-flex align-items-center justify-content-center px-24 h-24 gap-4 bg-indigo-500 color-white hover:bg-indigo-600 border-round-2lg">Search</button>
					</form>
					<div class="w-full footer d-flex flex-column justify-content-center align-items-center">
						<p>Don't have an Account? <a href="signup" class="no no-decoration-text color-indigo-500 hover:color-indigo-400 active:color-indigo-200">Signup instead</a></p>
					</div>
				</div>
			</div>
		</section>
	</main>
	<script src="<?php echo ROOT ?>/assets/js/ajax.js"></script>
</body>
</html>