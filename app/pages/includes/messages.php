<?php if (isset($_SESSION['message'])) : ?>
    <div class="<?php echo $_SESSION['type'] ; ?> d-flex flex-column gap-2 w-full border-round-lg px-12 py-8 bg-green-100 color-green-800 w-full">
      	<span class="color-green-800"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></span>
    </div>
<?php endif ?>