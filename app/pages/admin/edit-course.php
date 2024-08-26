<?php

    //define('APP_FUNCTION', 'Admin - Edit Category');

    $title_url = $url[2];
    $title = urldecode($title_url);

	$username = $_SESSION['username'];
	$results = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
	$row = mysqli_fetch_assoc($results);

    $course_res = mysqli_query($db, "SELECT * FROM courses WHERE title='$title'");
    $course = mysqli_fetch_assoc($course_res);

?>
<form method="POST" class="d-flex flex-column w-full align-items-center py-24 h-auto" enctype="multipart/form-data">

    <div class="d-flex flex-column w-full align-items-center">

        <div class="w-three-quarter d-flex flex-column sm:w-full">

            <div class="d-flex w-full pb-12 align-items-center justify-content-center center-text">
                <h4 class="font-s-2md font-w-medium color-black dark:color-white">Create New Post</h4>
            </div>

            <div class="d-flex w-full align-items-center justify-content-start mb-20">
                <?php include('includes/errors.php'); ?>
            </div>

            <div class="d-flex flex-column w-full gap-16" action="" id="admin-form">

                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="title" placeholder="Course Title" value="<?php echo $course['title']; ?>">
                </label>

                <div class="d-flex w-full">
                    <div class="d-flex flex-column align-items-center justify-content-center w-full h-52 border-round-xl border-dotted border-w-2 border-slate-100 dark:border-slate-600 hover:border-blue-500 active:border-blue-600 overflow-hidden cursor-pointer" id="img-preview">
                        <img src="<?php echo ROOT ?>/assets/images/courses/<?php echo $course['icon'] ?>" class="w-full h-full object-fit-cover object-position-center" id="profileDisplay">
                    </div>

                </div>

                <input type="file"  name="contentImg" id="coverImg" onchange="displayImage(this)" accept=".jpeg, .jpg, .png, .webp, .gif" style="display: none;" value="<?php echo retain_value('contentImg') ?>">

                <input type="hidden" class="" name="user_id" value="<?php echo $row['user_id'] ; ?>">
                <input type="hidden" class="" name="course_id" value="<?php echo $course['course_id'] ; ?>">

                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="link" placeholder="link to course" value="<?php echo $course['link']; ?>">
                </label>

                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="time" placeholder="Course Duration" value="<?php echo $course['duration']; ?>">
                </label>
                <textarea id="editor" name="description">
                    <?php echo $course['description']; ?>
                </textarea>

                <div class="d-flex gap-8 w-full justify-content-between sm:w-auto sm:justify-content-end">
                    <a type="button" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill no-decoration-text border-slate-100 dark:border-slate-600 border-solid border-w-1 hover:border-slate-300 dark:hover:border-slate-700 active:bg-slate-300 dark:active:bg-slate-600" href="<?php echo ROOT ?>/admin/courses">Cancel</a>

                    <button type="submit" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill bg-blue-500 hover:bg-blue-600 active:bg-blue-400 color-white" name="update-course">Publish</button>
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