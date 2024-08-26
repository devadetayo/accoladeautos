<?php
    session_start();

    include('../includes/db.php');
    include('functions/admin.php');

    if (!isset($_SESSION['username'])) {
		$_SESSION['message'] = "You must log in first";
		header('location: ../login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../login.php");
	}

    if(isset($_GET['user_id'])){
        $id = $_GET['user_id'];
    }else{
        header("location: index.php");
    }


	$username = $_SESSION['username'];
	$results = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
	$row = mysqli_fetch_assoc($results);

    if($row['role'] === 'admin'){

    $user_res = mysqli_query($db, "SELECT * FROM users Where user_id = $id");
    $user = mysqli_fetch_assoc($user_res);

?>

<!DOCTYPE html>
<html>
<head>
    <?php include("functions/head.php") ; ?>
</head>
<body>

<?php if(isset($_SESSION['username'])) : ?>
    <div class="colorlib-loader"></div>
    
    <!--..................... side-bar............................-->
    <main id="main" class="main">
                
        <!--..................... navbar............................-->
        <?php include("functions/navbar.php") ; ?>

        <div class="body-wrapper w-100">
            <?php include("functions/sidenav.php"); ?>

            <!--end of header section-->
            <section id="home" class="d-flex col cen-hor cen-ver w-100 krypton relative">

            <!-- ============================== errors =========================-->

            <div class="d-flex w-100 justify-start">
                <?php include('../includes/errors.php'); ?>
            </div>

            <!-- ========================== Post Wrapper ============================ -->

                <div class="post--wrapper w-100">
                    <!-- ========================== Post Header ============================ -->

                    <div class="d-flex col cen-ver cen-hor w-100" style="padding-bottom: 2rem;">
                        <h4 class="table--title">Edit User Role</h4>
                        <?php if($user['role'] === 'admin'): ?>
                            <p>Are you sure you want to make this admin a user</p>
                        <?php else : ?>
                            <p>Are you sure you want to make this user an admin</p>
                        <?php endif ; ?>
                    </div>
                    <div class="d-flex col w-90 cen-ver cen-hor">

                        <div class="form--container w-100">

                            <form method="POST" class="post--form d-flex col w-100 cen-ver cen-hor" action="" id="admin-form" style="gap: 1rem;" enctype="multipart/form-data">

                            <!-- ========================== id hidden ============================ -->
                            <img src="../../resources/profile_imgs/<?php echo $user['avatar'] ; ?>" class="profile--img card-pill">
                            <h4><?php echo $user['username'] ; ?></h4>
                            <input type="hidden" class="" name="user_id" value="<?php echo $user['user_id'] ; ?>">
                            <?php if($user['role'] === 'admin'): ?>
                                <input type="hidden" class="" name="role" value="user">
                            <?php else : ?>
                                <input type="hidden" class="" name="role" value="admin">
                            <?php endif ; ?>
                            <div class=" d-flex" style="gap: 1rem;">
                                <button type="submit" class="btn btn-primary" style="margin: 0;" name="save_edit">Yes</button>
                                <a href="users.php" class="btn btn-danger" style="margin: 0;" name="go_back">No</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
<?php else : ?>
    session_destroy();
    header("location: ../login.php");
<?php

endif;

}else{
    session_destroy();
    header("location: ../login.php");
}

?>