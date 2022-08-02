<?php 
	session_start();

	require_once '../scripts/new_user.php';

	$errors = ['username' => '', 'password' => ''];

	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Validate username 
		if(strlen($username) < 2) {
			$errors['username'] = 'Username must contain two or more characters';
		}

		// Validate password
		if(strlen($password) < 8) {
			$errors['password'] = 'Password must contain eight or more characters';
		}

		// No errors in the form / all is valid 
		if(empty($errors['username']) && empty($errors['password'])) {
			// Add user to database 
			$user = newUser($username, $password);

			$user = [
				'id' => $user['id'],
				'username' => $user['username'],
				'join_date' => $user['join_date']
			];
			
			$_SESSION['user'] = $user;

			header('location: ../');
		}
	}

?>

<?php require_once '../templates/header.php' ?>

	<div class="container mx-auto mt-5 pl-3 pr-3 auth-container">
		<div class="card">
			 <div class="card-body">
			 	<h1 class="text-center display-4 mb-3">Signup</h1>

			 	<form method="post" action="" id="signup" class="needs-validation" novalidate>
	                <div class="form">
	                    <div class="form-group mb-md-0">
	                        <label class="sr-only" for="username">Username</label>
	                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"   maxlength="20" required>
	                        <div class="invalid-feedback">
	                            Username must be between 2 and 20 characters
	                        </div>
	                    </div>

	                    <div class="form-group mb-md-0 mt-3">
	                        <label class="sr-only" for="password">Password</label>
	                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" required>
	                        <div class="invalid-feedback" id="password-feedback">
	                            Passwords must be 8 or more characters.
	                        </div>
	                    </div>

	                    <div class="form-group mb-md-0 mt-3">
	                        <label class="sr-only" for="password">Confirm Password</label>
	                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
	                        <div class="invalid-feedback">
	                            Passwords must match
	                        </div>
	                    </div>

	                    <div class="submit-task mt-3">
	                        <button type="submit" name="submit" class="btn primary-background">Signup</button>
	                    </div>
	                </div>
	            </form>
			</div>
		</div>

		<div class="text-center mt-5">
			<p>Already have an account? <a href="./login.php">login</a>.</p>
		</div>
	</div>

<?php require_once '../templates/footer.php' ?>