<?php 
	
	require_once '../scripts/model.php';

	$error = false;
	
	if(isset($_POST['submit'])) {
		$username  = $_POST['username'];
		$password = $_POST['password'];

		// Credentials check 
		if(checkUserLogin($username, $password)) {
			// Login was successful
			header('location: ../');
		}
		else {
			$error = true;
		}
	}

?>


<?php require_once '../templates/header.php' ?>

	<div class="container mx-auto mt-5 pl-3 pr-3 auth-container">
		<div class="card">
			 <div class="card-body">
			 	<h1 class="text-center display-4 mb-3">Login</h1>

			 	<!-- The login was unsuccessful because of credential issues  -->
			 	<?php if(!empty($error)) { ?>
			 		<div class="alert alert-danger" role="alert">
					 	Username or Password incorrect
					</div>
			 	<?php } ?>

			 	<form method="post" action="" class="needs-validation" novalidate>
	                <div class="form">
	                    <div class="form-group mb-md-0">
	                        <label class="sr-only" for="username">Username</label>
	                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"  minlength="2" maxlength="20" required value="<?php if($error) { echo $username; }?>">
	                        <div class="invalid-feedback">
	                            Username must be between 2 and 20 characters
	                        </div>
	                    </div>

	                    <div class="form-group mb-md-0 mt-3">
	                        <label class="sr-only" for="password">Password</label>
	                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
	                        <div class="invalid-feedback">
	                            Password can not be empty.
	                        </div>
	                    </div>

	                    <div class="submit-task mt-3">
	                        <button type="submit" name="submit" class="btn primary-background">Login</button>
	                    </div>
	                </div>
	            </form>
			</div>
		</div>

		<div class="text-center mt-5">
			<p>Don't have an account? <a href="./signup.php">Signup</a>.</p>
		</div>
	</div>

<?php require_once '../templates/footer.php' ?>