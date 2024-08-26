<?php

    //define('APP_FUNCTION', 'Admin - Manage Categories');

	$username = $_SESSION['username'];
	$results = mysqli_query($db, "SELECT * FROM admins WHERE username = '$username'");
	$row = mysqli_fetch_assoc($results);

    $part_res = mysqli_query($db, "SELECT * FROM parts LIMIT $start, $limit");
    $parts = mysqli_fetch_all($part_res, MYSQLI_ASSOC);

?>
<div class="d-flex flex-column w-full align-items-center py-24">

    <div class="d-flex w-full align-items-center justify-content-start">
        <?php include('includes/messages.php'); ?>
    </div>

    <div class="d-flex flex-column w-full pb-20">
    <table class="white-space-nowrap w-full h-auto min-w-100 table-collapse">
        <thead class="w-full h-auto">
            <tr class="w-full h-auto justify-content-start">
                <th class="p-8 w-max justify-content-start align-items-center start-text color-black dark:color-white font-w-medium border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">
                    S/N
                </th>
                <th class="p-8 w-max justify-content-start align-items-center start-text color-black dark:color-white font-w-medium border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">Part Name</th>
                <th class="p-8 w-max justify-content-start align-items-center start-text color-black dark:color-white font-w-medium border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">Brand Name</th>
                <th class="p-8 w-max justify-content-start align-items-center start-text color-black dark:color-white font-w-medium border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">Model Name</th>
                <th class="p-8 w-max justify-content-start align-items-center start-text color-black dark:color-white font-w-medium border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">Part Type</th>
                <th class="p-8 w-max justify-content-start align-items-center start-text color-black dark:color-white font-w-medium border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">availability</th>
                <th class="p-8 w-max justify-content-start align-items-center start-text color-black dark:color-white font-w-medium border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">Date</th>
                <th class="p-8 w-max justify-content-start align-items-center start-text color-black dark:color-white font-w-medium border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($parts as $key => $part) : ?>
            <tr class="w-full h-auto justify-content-start">
                <td class="p-8 w-max justify-content-start align-items-center start-text border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">
                    <?php echo $key + 1 ; ?>
                </td>
                <td class="p-8 w-max justify-content-start align-items-center start-text border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800"><?php echo $part['part_name'] ; ?></td>
                <td class="p-8 w-max justify-content-start align-items-center start-text border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800"><?php echo getBrandNameById($part['brand_id']) ; ?></td>
                <td class="p-8 w-max justify-content-start align-items-center start-text border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800"><?php echo getModelNameById($part['model_id']) ; ?></td>
                <td class="p-8 w-max justify-content-start align-items-center start-text border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800"><?php echo getPartTypeById($part['part_type_id']) ; ?></td>
                <td class="p-8 w-max justify-content-start align-items-center start-text border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800"><?php echo $part['availability'] ; ?></td>
                <td class="p-8 w-max justify-content-start align-items-center start-text border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800"><?php echo date('d F, Y', strtotime($part['date'])) ; ?></td>
                <td class="p-8 w-max justify-content-start align-items-center start-text border-solid border-wb-1 border-w-0 border-slate-100 dark:border-slate-800">
                    <div style="display: flex; flex-direction: row; gap: .6rem;">
                        <a href="edit_topics/<?php echo str_to_url($part['part_name']); ?>" class="d-flex align-items-center justify-content-center p-8 bg-orange-500 hover:bg-orange-600 active:bg-orange-400 color-white border-round-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" width="20" height="20"><path d="M224,120v88a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32h88a8,8,0,0,1,0,16H48V208H208V120a8,8,0,0,1,16,0Zm5.66-50.34-96,96A8,8,0,0,1,128,168H96a8,8,0,0,1-8-8V128a8,8,0,0,1,2.34-5.66l96-96a8,8,0,0,1,11.32,0l32,32A8,8,0,0,1,229.66,69.66Zm-17-5.66L192,43.31,179.31,56,200,76.69Z"/></svg>
                        </a>

                        <a class="d-flex align-items-center justify-content-center p-8 bg-red-500 hover:bg-red-700 active:bg-red-400 color-white border-round-md delete-category" data-category="<?php echo $part['part_name'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" width="20" height="20"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM112,168a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm0-120H96V40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Z"/></svg>
                        </a>
                    </div>    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <ul class="d-flex w-full align-items-center justify-content-center py-24 gap-12">
        <?php if ($page > 1) {
            echo "<li class='d-flex h-auto w-auto'><a href='?table=$table&page=" . ($page - 1) ."' class='d-flex align-items-center justify-content-center no-decoration-text p-8 bg-slate-100 color-black border-round-xl'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 256 256' fill='currentColor'><path d='M168.49,199.51a12,12,0,0,1-17,17l-80-80a12,12,0,0,1,0-17l80-80a12,12,0,0,1,17,17L97,128Z'/></svg></a></li>";
        } ?>
        <?php for($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $page) ? 'style="background: var(--velocity-indigo-500); color: var(--white);"' : '';
            echo "<li class='d-flex h-auto w-auto'><a href='?table=$table&page=$i' class='d-flex align-items-center justify-content-center no-decoration-text p-20 w-20 h-20 bg-slate-100 color-black border-round-xl' $active>" . $i ."</a></li>";
        }
        ?>

        <?php if ($page < $total_pages) {
            echo "<li class='d-flex h-auto w-auto'><a href='?table=$table&page=" . ($page + 1) ."' class='d-flex align-items-center justify-content-center no-decoration-text p-8 bg-slate-100 color-black border-round-xl'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 256 256' fill='currentColor'><path d='M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z'/></svg></a></li>";
        } ?>
    </ul>
</div>