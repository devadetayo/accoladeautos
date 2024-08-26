<?php 
    define('APP_FUNCTION', 'Contact');

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

	<main class="w-full d-flex min-vh-100 align-items-center justify-content-center pt-68 sm:pt-60 px-60 lg:px-40 sm:px-16 sm:flex-column-reverse">

        <section class="d-flex flex-column w-hf h-full sm:w-full align-items-start justify-content-center py-16 overflow-hidden left-text px-28 sm:p-0">
            <div class="d-flex flex-column align-items-start justify-content-start w-full gap-8 sm:w-full letf-text">
                <h4 class="font-s-2lg font-w-semibold color-black line-h-normal">Contact us.</h4>
                <?php include("includes/errors.php"); ?>
            </div>

            <div class="d-flex flex-column w-full align-items-center justify-content-center mt-12 mb-68 sm:flex-column sm:w-full cart-container">
                <form class="d-flex flex-column w-full gap-16" action="contact_process" method="POST">
                    <div class="d-flex w-full gap-16 sm:flex-column">
                        <label class="d-flex flex-column w-hf sm:w-full">
                            <input type="text" class="p-8 h-24 color-black bg-slate-100 hover:border-slate-50 focus:border-indigo-200 border-w-4 border-solid border-slate-100 border-round-lg" placeholder="Your Name" name="name">
                        </label>
                        <label class="d-flex flex-column w-hf sm:w-full">
                            <input type="text" class="p-8 h-24 color-black bg-slate-100 hover:border-slate-50 focus:border-indigo-200 border-w-4 border-solid border-slate-100 border-round-lg" placeholder="Your Phone" name="phone">
                        </label>
                    </div>
                    <div class="d-flex w-full gap-16 sm:flex-column">
                        <label class="d-flex flex-column w-hf sm:w-full">
                            <input type="email" class="p-8 h-24 color-black bg-slate-100 hover:border-slate-50 focus:border-indigo-200 border-w-4 border-solid border-slate-100 border-round-lg" placeholder="Your Email - johndoe@example.com" name="email">
                        </label>
                        <label class="d-flex flex-column w-hf sm:w-full">
                            <input type="text" class="p-8 h-24 color-black bg-slate-100 hover:border-slate-50 focus:border-indigo-200 border-w-4 border-solid border-slate-100 border-round-lg" placeholder="Subject" name="subject">
                        </label>
                    </div>
                    <div class="d-flex w-full gap-16">
                        <label class="d-flex flex-column w-full sm:w-full">
                            <textarea class="p-8 color-black bg-slate-100 hover:border-slate-50 focus:border-indigo-200 border-w-4 border-solid border-slate-100 border-round-lg" placeholder="Your Message here" rows="8" name="send_mail"></textarea>
                        </label>
                    </div>
                    <div class="d-flex w-full sm:gap-16">
                        <button type="submit" name="searchparts" class="no-decoration-text d-flex align-items-center justify-content-center px-24 h-24 gap-4 bg-indigo-500 color-white hover:bg-indigo-600 border-round-2lg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M231.4,44.34s0,.1,0,.15l-58.2,191.94a15.88,15.88,0,0,1-14,11.51q-.69.06-1.38.06a15.86,15.86,0,0,1-14.42-9.15L107,164.15a4,4,0,0,1,.77-4.58l57.92-57.92a8,8,0,0,0-11.31-11.31L96.43,148.26a4,4,0,0,1-4.58.77L17.08,112.64a16,16,0,0,1,2.49-29.8l191.94-58.2.15,0A16,16,0,0,1,231.4,44.34Z"/></svg> Send Message</button>
                    </div>
                </form>
            </div>
        </section>
        
        <section class="d-flex flex-column w-hf sm:w-full align-items-start justify-content-center py-16 overflow-hidden left-text px-28 sm:p-0 sm:mb-40">
            <div class="d-flex px-32 w-full sm:px-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3359.116031779459!2d-97.23295652522214!3d32.6563562901441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e65a432339779%3A0x6aeb5eaa3a5ab826!2sAccolade%20Autos%20and%20General%20LLC!5e0!3m2!1sen!2sng!4v1724158522456!5m2!1sen!2sng" class="w-full h-48" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="d-flex gap-12 my-20 px-32 w-full sm:px-0">

                <a href=""><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M480,257.35c0-123.7-100.3-224-224-224s-224,100.3-224,224c0,111.8,81.9,204.47,189,221.29V322.12H164.11V257.35H221V208c0-56.13,33.45-87.16,84.61-87.16,24.51,0,50.15,4.38,50.15,4.38v55.13H327.5c-27.81,0-36.51,17.26-36.51,35v42h62.12l-9.92,64.77H291V478.66C398.1,461.85,480,369.18,480,257.35Z" fill-rule="evenodd"/></svg></a>

                <a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M214.75,211.71l-62.6-98.38,61.77-67.95a8,8,0,0,0-11.84-10.76L143.24,99.34,102.75,35.71A8,8,0,0,0,96,32H48a8,8,0,0,0-6.75,12.3l62.6,98.37-61.77,68a8,8,0,1,0,11.84,10.76l58.84-64.72,40.49,63.63A8,8,0,0,0,160,224h48a8,8,0,0,0,6.75-12.29ZM164.39,208,62.57,48h29L193.43,208Z"/></svg></a>

                <a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"/></svg></a>

                <a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M187.58,144.84l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88,40,40,0,0,0,40-40A8,8,0,0,0,187.58,144.84ZM152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155l14.61-9.74,23,11.48A24,24,0,0,1,152,176ZM128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm0,192a87.87,87.87,0,0,1-44.06-11.81,8,8,0,0,0-6.54-.67L40,216,52.47,178.6a8,8,0,0,0-.66-6.54A88,88,0,1,1,128,216Z"/></svg></a>
            </div>
        </section>
    </main>
</body>

</html>