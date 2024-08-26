<?php
    
    //define('APP_FUNCTION', 'Admin - Add New Category');

	$username = $_SESSION['username'];
	$results = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
	$row = mysqli_fetch_assoc($results);

    $topic_res = mysqli_query($db, "SELECT * FROM topics");
    $titles = mysqli_fetch_all($topic_res, MYSQLI_ASSOC);

?>

<form method="POST" class="d-flex flex-column w-full align-items-center py-24 h-auto" enctype="multipart/form-data">
    <div class="d-flex bg-slate-50 dark:bg-slate-900 w-full position-fixed justify-content-between align-items-center pr-32 py-12 z-10" style="padding-left: calc(20% + 2rem); top: 0; right: 0;">
        <h4 class="font-weight-xl">Add New Category</h4>
        <div class="d-flex gap-8">
            <a type="button" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill no-decoration-text border-slate-100 dark:border-slate-600 border-solid border-w-1 hover:border-slate-300 dark:hover:border-slate-700 active:bg-slate-300 dark:active:bg-slate-600" href="<?php echo ROOT ?>/admin/category">Cancel</a>

            <button type="submit" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill bg-blue-500 hover:bg-blue-600 active:bg-blue-400 color-white" name="add_topic">Publish</button>
        </div>
    </div>

    <div class="d-flex flex-column w-full align-items-center mt-48">

        <div class="w-three-quarter d-flex flex-column sm:w-full">

            <div class="d-flex w-full pb-12 align-items-center justify-content-center center-text">
                <h4 class="font-s-2md font-w-medium color-black dark:color-white">Create New Category</h4>
            </div>

            <div class="d-flex w-full align-items-center justify-content-start mb-20">
                <?php include('includes/errors.php'); ?>
            </div>

            <div class="d-flex flex-column w-full gap-16" action="" id="admin-form">

            <input type="hidden" class="name-box" name="user_id" value="<?php echo $row['user_id'] ; ?>" style="margin: 0;">
            <label class="d-flex w-full h-auto">
                <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="title" placeholder="Post Subject" value="<?php echo retain_value('title'); ?>">
            </label>
            <textarea id="editor" name="content"><?php echo retain_value('content'); ?></textarea>
        </form>    
    </div>
</div>
<script>
    $('#editor').swiftEditor();
</script>