<?php if($errors) : ?>
    <div class="d-flex flex-column gap-2 w-full border-round-lg px-12 py-8 bg-red-100 color-red-800 w-full">
        <?php foreach($errors as $error) : ?>
            <span><?php echo $error; ?></span>
        <?php endforeach; ?>
    </div>
<?php endif ?>
