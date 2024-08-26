<?php

    //define('APP_FUNCTION', 'Admin - Create New Post');

    $post_res = mysqli_query($db, "SELECT * FROM posts");
    $posts = mysqli_fetch_all($post_res, MYSQLI_ASSOC);

    $tag_res = mysqli_query($db, "SELECT * FROM tags");
    $tags = mysqli_fetch_all($tag_res, MYSQLI_ASSOC);

    $topic_res = mysqli_query($db, "SELECT * FROM topics");
    $topics = mysqli_fetch_all($topic_res, MYSQLI_ASSOC);

?>
<form method="POST" class="d-flex flex-column w-full align-items-center py-24 h-auto" enctype="multipart/form-data">

    <div class="d-flex flex-column w-full align-items-center mt-48">

        <div class="w-three-quarter d-flex flex-column sm:w-full">

            <div class="d-flex w-full pt-8 align-items-center justify-content-center center-text">
                <h4 class="font-s-2md font-w-medium color-black dark:color-white">Create New Post</h4>
            </div>

            <div class="d-flex w-full align-items-center justify-content-start mb-20">
                <?php include('includes/errors.php'); ?>
            </div>

            <div class="d-flex flex-column w-full gap-16" action="" id="admin-form">

                <input type="hidden" class="" name="user_id" value="<?php echo $row['user_id'] ; ?>">

                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white" name="title" placeholder="Post Subject" value="<?php echo retain_value('title') ?>">
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
                    <div class="d-none flex-column align-items-center justify-content-center w-full h-52 border-round-xl border-dotted border-w-2 border-slate-100 dark:border-slate-600 hover:border-blue-500 active:border-blue-600 overflow-hidden cursor-pointer sm:h-44" id="img-preview">
                        <img src="<?php echo ROOT ?>/assets/images/cover/placehold.png" class="w-full h-full object-fit-cover object-position-center" id="profileDisplay">
                    </div>

                </div>

                <input type="file"  name="contentImg" id="coverImg" accept=".jpeg, .jpg, .png, .webp, .gif" style="display: none;" value="<?php echo retain_value('contentImg') ?>">
                <label class="d-flex w-full h-auto">
                    <input type="text" class="w-full h-24 bg-white dark:bg-slate-700 border-none hover:bg-blue-50 dark:hover:bg-slate-800 focus:bg-transparent focus:border-blue-500 focus:border-solid focus:border-w-2 dark:focus:bg-transparent border-round-lg px-16 color-black dark:color-white"  name="description" placeholder="Description" value="<?php echo retain_value('description') ?>">
                </label>
                <textarea id="editor" class="editor" name="content"><?php echo retain_value('content') ?></textarea>
                <div class="<?php echo retain_checked('tags') ?> d-flex w-full flex-wrap gap-8">
                    <?php foreach ($tags as $tag) : ?>
                    <div class="tag-box d-flex px-12 py-4 bg-white dark:bg-slate-800 border-round-pill font-s-md cursor-pointer border-w-1 border-solid border-slate-100 dark:border-slate-600 hover:border-blue-500 hover:color-blue-500 transition-property-all transition-duration-300 transition-ease-in-out" id="<?php echo $tag['tag_id']; ?>">
                        <input <?php echo retain_checked('tags') ?> type="checkbox" id="<?php echo $tag['tag_id']; ?>" class="check-tags d-none <?php echo $tag['tag_id']; ?>" name="tags[]" value="<?php echo $tag['tag_name']; ?>"> <?php echo $tag['tag_name']; ?>
                    </div>
                    <?php endforeach ?>
                </div>
                <label class="custom-select d-flex h-24 flex-column position-relative w-full p-0" role="combobox" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="selected-select">
                    <div class="select-selected d-flex align-items-center justify-content-between h-full border-round-pill bg-white dark:bg-slate-800 border-white dark:border-slate-800 outline-w-0 w-full color-slate-800 dark:color-slate-300 position-relative overflow-hidden" 
                    role="button" aria-controls="select-list" tabindex="0">
                        <span class="selected-text d-flex w-auto h-full align-items-center px-16 color-black dark:color-white">
                            <?php 
                                $selectedText = 'Select an option';
                                if (retain_value('topic_id')) { // Assuming $selectedTopicId holds the previously selected topic id
                                    $topic_id = retain_value('topic_id');
                                    $sql = mysqli_query($db, "SELECT * FROM topics WHERE topic_id=$topic_id LIMIT 1");
                                    $topic_name = mysqli_fetch_assoc($sql);
                                    $selectedText = $topic_name['title'];
                                }
                                echo $selectedText;
                            ?>
                        </span> 
                        <span class="select-arrow d-flex align-items-center justify-content-center h-full w-24 position-relative" aria-hidden="true"></span>
                    </div>
                    <div class="select-options d-none flex-column w-full p-4 bg-white dark:bg-slate-800 position-absolute border-round-2xl box-shadow-2xl overflow-y-auto z-40 transition-all transition-duration-300 transition-ease" role="listbox" id="select-list">
                    <?php foreach ($topics as $topic) : ?>
                        <!-- Options are static or added manually here -->
                        <span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800 hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="<?php echo $topic['topic_id'] ?>" data-index="<?php echo $index; ?>" role="option" tabindex="-1"><?php echo $topic['title'] ?></span>
                    <?php endforeach ?>
                    </div>
                </label>
                <input type="hidden" id="select-name" name="topic_id" value="<?php echo retain_value('topic_id'); ?>">

                <div class="d-flex gap-8 w-full justify-content-between sm:w-auto sm:justify-content-end">
                    <a type="button" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill no-decoration-text border-slate-100 dark:border-slate-600 border-solid border-w-1 hover:border-slate-300 dark:hover:border-slate-700 active:bg-slate-300 dark:active:bg-slate-600" href="<?php echo ROOT ?>/admin/posts">Cancel</a>
                    
                    <button type="submit" class="d-flex px-20 h-24 align-items-center justify-content-center border-round-pill bg-blue-500 hover:bg-blue-600 active:bg-blue-400 color-white" name="sharepost">Publish</button>
                </div>
                
            </div>

        </div>

    </div>
</form>
<script src="<?php echo ROOT ?>/assets/js/select.js"></script>
<script>
    $(document).ready(function(){
        $('#editor').swiftEditor({
            plugins: ['bold', 'findReplace', 'save', 'load', 'italic', 'underline', 'strike', 'headers', 'color', 'background', 'unorderedList', 'orderedList', 'blockQuote', 'align', 'link', 'image', 'codeBlock', 'codeSnippet', 'blockquote', 'sourcePreview', 'table', 'indent', 'outdent', 'undo', 'redo', 'textCase', 'mediaEmbed', 'fontSize', 'textSpacing']
        });
    });
</script>