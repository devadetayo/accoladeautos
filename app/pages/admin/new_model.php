<?php
    
    //define('APP_FUNCTION', 'Admin - Add New Category');

	$username = $_SESSION['username'];
	$results = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
	$row = mysqli_fetch_assoc($results);

?>
<form method="POST" class="d-flex flex-column w-full align-items-center py-24 h-auto" enctype="multipart/form-data">

    <div class="d-flex flex-column w-full align-items-center">

        <div class="w-three-quarter d-flex flex-column sm:w-full">

            <div class="d-flex w-full pb-12 align-items-center justify-content-center center-text">
                <h4 class="font-s-2md font-w-medium color-black dark:color-white">Create New Course</h4>
            </div>

            <div class="d-flex w-full align-items-center justify-content-start mb-20">
                <?php include('includes/errors.php'); ?>
            </div>

            <div class="d-flex flex-column w-full gap-16" action="" id="admin-form">

                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="title" placeholder="Course Title" value="<?php echo retain_value('title'); ?>">
                </label>

                <div class="d-flex w-full">
                    <div class="d-flex flex-column align-items-center justify-content-center w-full h-52 sm:h-44 bg-white dark:bg-slate-800 border-round-xl border-dotted border-w-2 border-slate-100 dark:border-slate-600 hover:border-blue-500 active:border-blue-600 gap-12 p-16" id="img-placehold">
                        <span class="d-flex flex-column align-items-center justify-content-center w-fifth h-auto color-slate-200 dark:color-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" style="width: 200; height: 200;"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM156,88a12,12,0,1,1-12,12A12,12,0,0,1,156,88Zm60,112H40V160.69l46.34-46.35a8,8,0,0,1,11.32,0h0L165,181.66a8,8,0,0,0,11.32-11.32l-17.66-17.65L173,138.34a8,8,0,0,1,11.31,0L216,170.07V200Z"/></svg>
                        </span>
                        <div class="d-flex flex-column center-text">
                            <p>Select Cover Image: Drag and Drop or <a class="color-blue-500 no-decoration-text hover:underline-text" id="changeImg">Browse File</a></p>
                        </div>
                    </div>
                    <div class="d-none flex-column align-items-center justify-content-center w-full h-52 sm:h-44 border-round-xl border-dotted border-w-2 border-slate-100 dark:border-slate-600 hover:border-blue-500 active:border-blue-600 overflow-hidden cursor-pointer" id="img-preview">
                        <img src="<?php echo ROOT ?>/assets/images/cover/placehold.png" class="w-full h-full object-fit-cover object-position-center" id="profileDisplay">
                    </div>

                </div>

                <input type="file"  name="contentImg" id="coverImg" accept=".jpeg, .jpg, .png, .webp, .gif" style="display: none;" value="<?php echo retain_value('contentImg') ?>">

                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="link" placeholder="link to course" value="<?php echo retain_value('link'); ?>">
                </label>

                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="time" placeholder="Course Duration" value="<?php echo retain_value('time'); ?>">
                </label>

                <input type="hidden" class="name-box" name="user_id" value="<?php echo $row['user_id'] ; ?>" style="margin: 0;">
            
                <textarea id="editor" name="description"><?php echo retain_value('description'); ?></textarea>

                <div class="d-flex gap-8 w-full justify-content-between sm:w-auto sm:justify-content-end">
                    <a type="button" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill no-decoration-text border-slate-100 dark:border-slate-600 border-solid border-w-1 hover:border-slate-300 dark:hover:border-slate-700 active:bg-slate-300 dark:active:bg-slate-600" href="<?php echo ROOT ?>/admin/posts">Cancel</a>

                    <button type="submit" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill bg-blue-500 hover:bg-blue-600 active:bg-blue-400 color-white" name="create-course">Publish</button>
                </div>
            </div>
        </div>    
    </div>
</form>
<script>
    $(document).ready(function(){
        $('#editor').swiftEditor({
            plugins: ['bold', 'findReplace', 'save', 'load', 'italic', 'underline', 'strike', 'headers', 'color', 'background', 'unorderedList', 'orderedList', 'blockQuote', 'align', 'link', 'image', 'codeBlock', 'codeSnippet', 'blockquote', 'sourcePreview', 'table', 'indent', 'outdent', 'undo', 'redo', 'textCase', 'mediaEmbed', 'fontSize', 'textSpacing']
        });
    });
</script>