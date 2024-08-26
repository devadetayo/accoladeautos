<?php
    
    //define('APP_FUNCTION', 'Admin - Add New Category');

	$username = $_SESSION['username'];
	$results = mysqli_query($db, "SELECT * FROM admins WHERE username = '$username'");
	$row = mysqli_fetch_assoc($results);

?>
<form method="POST" class="d-flex flex-column w-full align-items-center py-24 h-auto" enctype="multipart/form-data">

    <div class="d-flex flex-column w-full align-items-center">

        <div class="w-three-quarter d-flex flex-column sm:w-full">

            <div class="d-flex w-full pb-12 align-items-center justify-content-center center-text">
                <h4 class="font-s-2md font-w-medium color-black dark:color-white">Add New Brand</h4>
            </div>

            <div class="d-flex w-full align-items-center justify-content-start mb-20">
                <?php include('includes/errors.php'); ?>
            </div>

            <div class="d-flex flex-column w-full gap-16" action="" id="admin-form">

                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-slate-100 dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="name" placeholder="Brand name" value="<?php echo retain_value('name'); ?>">
                </label>

                <input type="hidden" class="name-box" name="admin_id" value="<?php echo $row['id'] ; ?>" style="margin: 0;">
            
                <textarea id="editor" name="description" class="w-full bg-slate-100 dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg p-16 color-black dark:color-white" rows="8" placeholder="Brand Description"><?php echo retain_value('description'); ?></textarea>

                <div class="d-flex gap-8 w-full justify-content-between sm:w-auto sm:justify-content-end">
                    <a type="button" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill no-decoration-text border-slate-100 dark:border-slate-600 border-solid border-w-1 hover:border-slate-300 dark:hover:border-slate-700 active:bg-slate-300 dark:active:bg-slate-600" href="<?php echo ROOT ?>/admin/posts">Cancel</a>

                    <button type="submit" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill bg-blue-500 hover:bg-blue-600 active:bg-blue-400 color-white" name="create-brand">Publish</button>
                </div>
            </div>
        </div>    
    </div>
</form>