<?php

	$username = '';
	$password = '';
	$errors = [];

	define('APP_FUNCTION', 'login');

	if(isset($_SESSION['username'])){
		$logged_username = $_SESSION['username'];
	}else{
		$logged_username = retain_value('username');
	}

	if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
      
        if (empty($username)) {
            array_push($errors, "Please enter your username!");
        }
        if (empty($password)) {
            array_push($errors, "Please enter your password!");
        }
      
        if (count($errors) == 0) {
            $query = "SELECT * FROM admins WHERE username='$username' LIMIT 1";
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_assoc($result);
			if(mysqli_num_rows($result) > 0){
				$pass_verify = password_verify($password, $row['password']);
				if($pass_verify){
					$_SESSION['message'] = "You are on!";
					$_SESSION['type'] = 'success';
                	$_SESSION['username'] = $username;
					redirect("admin");
				}else{
					array_push($errors, "Username or password not found");
				}
			}else{
				array_push($errors, "Username or password not found");
			}
		}
	}

?>
<!DOCTYPE html>
<html>
	<?php include("includes/home/head.php"); ?>
<body class="font-s-md line-h-md text-grey-600 dark:text-grey-100 bg-slate-50 dark:bg-slate-900 position-relative" style="background-image: url('assets/images/rays.png'); background-repeat: no-repeat; background-size: contain;">
	<main class="w-full d-flex flex-column h-full align-items-start justify-content-center">

		<section class="d-flex flex-row-reverse w-full h-full align-items-cemter h-full">

			<div class="w-hf h-full d-flex sm:d-none">
				<div class="d-flex flex-column w-full p-16 center-text align-items-center justify-content-center sm:w-full h-full pt-68">
					<div class="d-grid w-four-fifth grflcol grtpcols-2 grtprows-2 h-full gap-20 justify-content-center py-24">
						<div class="grcol-span-2  d-flex w-full overflow-hidden border-round-sxl">
							<img src="<?php echo ROOT ?>/assets/images/part-1.jpg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
						</div>
						<div class="grcol-span-1 d-flex w-full h-32 overflow-hidden border-round-sxl">
							<img src="<?php echo ROOT ?>/assets/images/part-2.jpeg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
						</div>

						<div class="grcol-span-1 d-flex w-full h-36 overflow-hidden border-round-sxl">
							<img src="<?php echo ROOT ?>/assets/images/part-3.jpeg" alt="Image of engine" class="w-full h-full object-fit-cover object-position-center">
						</div>
					</div>
				</div>
			</div>

			<div class="d-flex h-full flex-column align-items-start justify-content-center w-two-fifth px-68 sm:w-full sm:px-16">

				<div class="w-full d-flex flex-column mt-24">

					<div class="w-full d-flex flex-column align-items-start justify-content-center mb-16">
						<h3 class="font-s-2md font-w-semibold text-black dark:text-white">Welcome Back!</h3>
						<p>Please sign in to continue</p>
					</div>
					<div class="d-flex flex-column justify-content-center align-items-center text-center w-full mb-16">
						<?php require_once 'includes/errors.php'; ?>
						<?php require_once 'includes/messages.php' ;?>
					</div>

					<form method="POST" class="d-flex flex-column w-full gap-16 mb-16" action="" id="login-form">
						<label class="position-relative text-box">
							<input type="text" class="pl-44 pr-12 h-24 border-round-xl bg-white dark:bg-slate-800 border-solid border-w-2 border-white dark:border-slate-800 outline-w-0 w-full color-black dark:color-white focus:border-indigo-500 dark:focus:border-indigo-500" name="username" placeholder="Username" value="<?php echo $logged_username; ?>">
							<span class="position-absolute d-flex align-items-center justify-content-center" style="left: 0;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M230.93,220a8,8,0,0,1-6.93,4H32a8,8,0,0,1-6.92-12c15.23-26.33,38.7-45.21,66.09-54.16a72,72,0,1,1,73.66,0c27.39,8.95,50.86,27.83,66.09,54.16A8,8,0,0,1,230.93,220Z"/></svg></span>
						</label>
						<label class="position-relative text-box">
							<input type="password" class="pl-44 pr-12 h-24 border-round-xl bg-white dark:bg-slate-800 border-solid border-w-2 border-white dark:border-slate-800 outline-w-0 w-full color-black dark:color-white focus:border-indigo-500 dark:focus:border-indigo-500" name="password" placeholder="Password" value="<?php echo retain_value('password'); ?>">
							<span class="position-absolute d-flex align-items-center justify-content-center" style="left: 0;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80Zm-80,84a12,12,0,1,1,12-12A12,12,0,0,1,128,164Zm32-84H96V56a32,32,0,0,1,64,0Z"/></svg></span>
							<span class="position-absolute d-flex align-items-center justify-content-center h-24 w-24 see-password" style="top: 0; right: 0;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"/></svg></span>
							<span class="position-absolute d-none align-items-center justify-content-center h-24 w-24 unsee-password" style="top: 0; right: 0;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M53.92,34.62A8,8,0,1,0,42.08,45.38L61.32,66.55C25,88.84,9.38,123.2,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208a127.11,127.11,0,0,0,52.07-10.83l22,24.21a8,8,0,1,0,11.84-10.76Zm47.33,75.84,41.67,45.85a32,32,0,0,1-41.67-45.85ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.16,133.16,0,0,1,25,128c4.69-8.79,19.66-33.39,47.35-49.38l18,19.75a48,48,0,0,0,63.66,70l14.73,16.2A112,112,0,0,1,128,192Zm6-95.43a8,8,0,0,1,3-15.72,48.16,48.16,0,0,1,38.77,42.64,8,8,0,0,1-7.22,8.71,6.39,6.39,0,0,1-.75,0,8,8,0,0,1-8-7.26A32.09,32.09,0,0,0,134,96.57Zm113.28,34.69c-.42.94-10.55,23.37-33.36,43.8a8,8,0,1,1-10.67-11.92A132.77,132.77,0,0,0,231.05,128a133.15,133.15,0,0,0-23.12-30.77C185.67,75.19,158.78,64,128,64a118.37,118.37,0,0,0-19.36,1.57A8,8,0,1,1,106,49.79,134,134,0,0,1,128,48c34.88,0,66.57,13.26,91.66,38.35,18.83,18.83,27.3,37.62,27.65,38.41A8,8,0,0,1,247.31,131.26Z"/></svg></span>
						</label>
						<div class="d-flex w-full align-items-start justify-content-start">
							<div class="checkbox-wrapper-48">
								<label class="custom-checkbox shadow">
									<input type="checkbox" name="remember">
									<span class="checkmark"></span>
									<span class="checkmark-text">Remember Me</span>
								</label>
							</div>
						</div>
						<button type="submit" name="login" class="no-decoration-text d-flex align-items-center justify-content-center px-24 h-24 gap-4 bg-indigo-500 color-white hover:bg-indigo-600 border-round-xl">Login</button>
					</form>
					<div class="w-full footer d-flex flex-column justify-content-center align-items-center">
						<p>Don't have an Account? <a href="signup" class="no no-decoration-text color-indigo-500 hover:color-indigo-400 active:color-indigo-200">Signup instead</a></p>
					</div>
				</div>
			</div>
		</section>
	</main>
</body>
</html>