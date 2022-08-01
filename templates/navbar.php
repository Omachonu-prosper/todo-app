<nav class="navbar navbar-dark navbar-expand-sm">
    <a class="navbar-brand" href="./">Todo-app</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo htmlspecialchars($user['username']); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/todo-app/auth/logout.php">Logout</a>
                    <a class="dropdown-item disabled" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item disabled" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>