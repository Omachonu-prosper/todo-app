<?php require_once '../templates/header.php' ?>

	<div class="container mx-auto mt-5 pl-3 pr-3 auth-container">
		<div class="card">
			 <div class="card-body">
			 	<h1 class="text-center display-4 mb-3">Login</h1>

			 	<form method="post" action="" class="needs-validation" novalidate>
	                <div class="form">
	                    <div class="form-group mb-md-0">
	                        <label class="sr-only" for="username">Username</label>
	                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"  minlength="2" maxlength="20" required>
	                        <div class="invalid-feedback">
	                            Username must be between 2 and 20 characters
	                        </div>
	                    </div>

	                    <div class="form-group mb-md-0 mt-3">
	                        <label class="sr-only" for="password">Password</label>
	                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
	                        <div class="invalid-feedback">
	                            Passwords must be more than 8 characters.
	                        </div>
	                    </div>

	                    <div class="form-group mb-md-0 mt-3">
	                        <label class="sr-only" for="password">Confirm Password</label>
	                        <input type="text" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
	                        <div class="invalid-feedback">
	                            Passwords Must match
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
			<p>Already have an account? <a href="./login.php">login</a>.</p>
		</div>
	</div>

<?php require_once '../templates/footer.php' ?>